<?php

namespace App\Livewire;

use App\Models\Barang;
use App\Models\Keranjang;
use App\Models\Ukuran;
use App\Models\UkuranCustom;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toastable;

class KeranjangForm extends ModalComponent
{
    use Toastable;

    public Keranjang $keranjang;
    public $user, $barang, $ukuran, $ukuran_custom, $jumlah, $barang_id, $ukuran_id, $user_id, $keranjang_id, $ukuran_custom_id, $user_name, $barang_name, $ukuran_name, $ukuran_custom_name, $panjang, $lebar, $tinggi, $harga, $hargaCustom;
    public $tipe_ukuran = '';

    public function render()
    {
        $ukuran_custom = UkuranCustom::all();
        return view('livewire.keranjang-form', compact('ukuran_custom'));
    }

    public function rules()
    {
        $rules = [
            'barang_id' => 'required|exists:barang,id',
            'user_id' => 'required|exists:users,id',
            'jumlah' => 'required|numeric|min:1',
            'tipe_ukuran' => 'required',
        ];

        if ($this->tipe_ukuran === 'standar') {
            $rules['ukuran_id'] = 'required|exists:ukuran,id';
        } else if ($this->tipe_ukuran === 'custom') {
            $rules['panjang'] = 'required|numeric|min:1';
            $rules['lebar'] = 'required|numeric|min:1';
            $rules['tinggi'] = 'required|numeric|min:1';
            $rules['hargaCustom'] = 'required|numeric|min:1';
        }

        return $rules;
    }


    public function resetinput()
    {
        $this->user_id = '';
        $this->barang_id = '';
        $this->jumlah = '';
        $this->ukuran_id = '';
        $this->ukuran_custom_id = '';
        $this->panjang = '';
        $this->lebar = '';
        $this->tinggi = '';
        $this->tipe_ukuran = '';
    }

    public function store()
    {
        $validated = $this->validate();
        $this->keranjang->fill($validated);


        if ($this->tipe_ukuran === 'standar') {

            $ukuran = Ukuran::find($this->ukuran_id);

            // Pengecekan stok
            if ($ukuran->stock < $this->jumlah) {
                $this->error('Stok tidak mencukupi');
                return; // Hentikan eksekusi lebih lanjut
            }
            $this->keranjang->ukuran_custom_id = null;

            $ukuran->stock -= $this->jumlah;
            $ukuran->save();
        } else {
            $this->keranjang->ukuran_id = null;
            $ukuranCustom = UkuranCustom::create([
                'barang_id' => $this->barang_id,
                'panjang' => $this->panjang,
                'lebar' => $this->lebar,
                'tinggi' => $this->tinggi,
                'harga' => $this->hargaCustom
            ]);

            $this->keranjang->ukuran_custom_id = $ukuranCustom->id;
        }

        $this->keranjang->save();
        $this->success('Data Keranjang berhasil disimpan');

        $this->closeModal();
        $this->resetinput();
    }

    public function mount($barang_id = null)
    {
        // Tetap pertahankan pengambilan user ID
        $this->user_id = auth()->user()->id;
        $this->user_name = auth()->user()->name;

        if ($barang_id) {
            // Menginisialisasi keranjang baru
            $this->keranjang = new Keranjang();

            // Mengisi data barang
            $this->barang_id = $barang_id;
            $this->barang = Barang::find($barang_id);
            $this->barang_name = $this->barang->nama_barang;

            // Mengambil data ukuran
            $this->ukuran = Ukuran::with('barang')->where('barang_id', $barang_id)->get();

            // Menginisialisasi variabel lainnya
            $this->ukuran_id = null;
            $this->ukuran_custom_id = null;
            $this->jumlah = null;
            $this->panjang = null;
            $this->lebar = null;
            $this->tinggi = null;
            $this->tipe_ukuran = null;
        }
    }


    public function getHarga()
    {
        if ($this->ukuran_id) {
            $ukuran = Ukuran::find($this->ukuran_id);
            $this->harga = $ukuran->harga; // Dapatkan harga berdasarkan ukuran yang dipilih
        } else {
            $this->harga = null; // Reset harga jika tidak ada ukuran yang dipilih
        }
    }

    public function hitungHargaCustom()
    {
        if ($this->panjang && $this->lebar && $this->tinggi) {
            $volumeKayuCm3 = ($this->panjang * $this->lebar * $this->tinggi); // Menghitung volume dalam cm kubik
            $volumeKayuM3 = $volumeKayuCm3 / 1000000; // Menghitung volume dalam m kubik
            $hargaKayuM3 = 1500000;
            $this->hargaCustom = $volumeKayuM3 * $hargaKayuM3; // Menghitung harga berdasarkan volume kayu
        } else {
            $this->hargaCustom = null; // Reset harga jika input belum lengkap
        }
    }
}
