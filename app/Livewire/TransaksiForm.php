<?php

namespace App\Livewire;

use App\Models\DetailTransaksi;
use App\Models\Keranjang;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toastable;

class TransaksiForm extends ModalComponent
{
    use Toastable;
    use WithFileUploads;

    public Transaksi $transaksi;
    public $user, $id, $user_id, $total_harga, $status, $keranjangItems, $ukuranStandar, $ukuranCustom, $hargaStandar, $hargaCustom, $totalHargaItems, $grandTotal, $bukti_pembayaran, $bukti_pembayaran_url;
    public $keranjangIds = [];
    public $updatingStatusOnly = false;
    public $updatingPembayaranOnly = false;

    public function render()
    {
        $user = User::all();
        return view('livewire.transaksi-form', compact('user'));
    }

    public function switchToStatusOnlyMode()
    {
        $this->updatingStatusOnly = true;
    }

    public function switchToCreateOrUpdateMode()
    {
        $this->updatingStatusOnly = false;
    }

    public function switchToPembayaranOnlyMode()
    {
        $this->updatingPembayaranOnly = true;
    }

    protected $rules = [
        'user_id' => 'required|exists:users,id',
        'total_harga' => 'required',
        'status' => 'required',
    ];

    public function resetCreateForm()
    {
        $this->user_id = '';
        $this->total_harga = '';
        $this->status = '';
    }

    public function store()
    {
        if ($this->updatingStatusOnly) {
            $validated = $this->validate(['status' => 'required']);
            $this->transaksi->status = $validated['status'];

            // dd($validated['status']);

            if ($validated['status'] === 'Pembayaran Ditolak' && $this->transaksi->bukti_pembayaran) {
                Storage::disk('public')->delete($this->transaksi->bukti_pembayaran);
                $this->transaksi->bukti_pembayaran = null;
            }

            $this->transaksi->save();

            $this->success('Status transaksi berhasil diubah');
        } else if ($this->updatingPembayaranOnly) {
            $validated = $this->validate(['bukti_pembayaran' => 'required']);
            if ($this->bukti_pembayaran) {
                // Delete the old image if it exists
                if ($this->transaksi->bukti_pembayaran) {
                    Storage::disk('public')->delete($this->transaksi->bukti_pembayaran);
                }

                // Store the new image
                $path = $this->bukti_pembayaran->store('bukti-pembayaran', 'public');
                $this->transaksi->bukti_pembayaran = $path;

                $this->transaksi->status = 'Menunggu Konfirmasi';
                $this->transaksi->save();

                $this->success('Bukti pembayaran berhasil diupdate');
            }
        } else {
            $validated = $this->validate();

            // Menyimpan data Transaksi
            $transaksi = Transaksi::create($validated);

            // Menyimpan data Detail Transaksi
            foreach ($this->keranjangItems as $keranjangItem) {
                $ukuran = "";
                if ($keranjangItem->ukuran_id) {
                    $ukuran = $keranjangItem->ukuran->panjang . " cm x " . $keranjangItem->ukuran->lebar . " cm x " . $keranjangItem->ukuran->tinggi . " cm";
                } else {
                    $ukuran = $keranjangItem->ukuran_custom->panjang . " cm x " . $keranjangItem->ukuran_custom->lebar . " cm x " . $keranjangItem->ukuran_custom->tinggi . " cm";
                }

                $harga = 0;
                if ($keranjangItem->ukuran_custom_id) {
                    $harga = $keranjangItem->ukuran_custom->harga;
                } else {
                    $harga = $keranjangItem->ukuran->harga;
                }

                DetailTransaksi::create([
                    'transaksi_id' => $transaksi->id,
                    'nama_barang' => $keranjangItem->barang->nama_barang,
                    'jumlah' => $keranjangItem->jumlah,
                    'ukuran' => $ukuran,
                    'harga' => $harga,
                ]);
            }

            // Dapatkan ID User yang Sedang Login
            $userId = auth()->user()->id;

            // Hapus Semua Data Keranjang yang Berkaitan dengan User
            Keranjang::where('user_id', $userId)->delete();

            $this->success($transaksi->wasRecentlyCreated ? 'Transaksi berhasil dibuat dan Keranjang telah dibersihkan' : 'Transaksi berhasil diubah');
        }


        $this->closeModalWithEvents([
            TransaksiTable::class => 'transaksiUpdated',
        ]);

        if (!$this->updatingStatusOnly) {
            redirect()->route('transaksi');
        }
    }

    public function mount($rowId = null, $updatingStatusOnly = false, $keranjangIds = null, $updatingPembayaranOnly = false)
    {
        $this->keranjangIds = $keranjangIds;
        $this->updatingStatusOnly = $updatingStatusOnly;
        $this->updatingPembayaranOnly = $updatingPembayaranOnly;
        $this->user = User::all();
        if ($rowId) {
            $this->transaksi = Transaksi::find($rowId);

            if ($updatingStatusOnly) {
                $this->status = $this->transaksi->status;
            } else if ($updatingPembayaranOnly) {
                $this->bukti_pembayaran = $this->transaksi->bukti_pembayaran;

                if ($this->bukti_pembayaran) {
                    $this->bukti_pembayaran_url = Storage::disk('public')->url($this->bukti_pembayaran);
                }
            }
            $this->user_id = $this->transaksi->user_id;
            $this->total_harga = $this->transaksi->total_harga;
        }

        if ($keranjangIds) {
            $this->keranjangItems = Keranjang::whereIn('id', $keranjangIds)->get();
            $this->user_id = auth()->user()->id;
            $this->status = 'Pesanan Diproses';
            // Inisialisasi properti
            foreach ($this->keranjangItems as $keranjangItem) {
                $this->ukuranStandar[$keranjangItem->id] = $keranjangItem->ukuran_id != null;
                $this->ukuranCustom[$keranjangItem->id] = $keranjangItem->ukuran_custom_id != null;
                if ($keranjangItem->ukuran_custom_id) {
                    $this->hargaCustom[$keranjangItem->id] = $keranjangItem->ukuran_custom->harga;
                    $this->totalHargaItems[$keranjangItem->id] = $keranjangItem->jumlah * $keranjangItem->ukuran_custom->harga;
                } else {
                    $this->hargaStandar[$keranjangItem->id] = $keranjangItem->ukuran->harga;
                    $this->totalHargaItems[$keranjangItem->id] = $keranjangItem->jumlah * $keranjangItem->ukuran->harga;
                }
            }

            $this->total_harga = array_sum($this->totalHargaItems);
        }
    }
}
