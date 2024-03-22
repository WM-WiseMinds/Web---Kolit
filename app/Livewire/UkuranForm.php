<?php

namespace App\Livewire;

use App\Models\Barang;
use App\Models\Ukuran;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toastable;

class UkuranForm extends ModalComponent
{
    use Toastable;

    public Ukuran $ukuran;
    public $barang, $barang_id;
    public $ukuranItems = [];

    public function render()
    {

        $barang = Barang::all();
        return view('livewire.ukuran-form', compact('barang'));
    }

    public function addUkuranItems()
    {
        $this->ukuranItems[] = [
            'barang_id' => '',
            'ukuran' => '',
            'panjang' => '',
            'lebar' => '',
            'tinggi' => '',
            'stock' => '',
            'harga' => '',
        ];
    }

    public function removeUkuranItems($index)
    {
        unset($this->ukuranItems[$index]);
        $this->ukuranItems = array_values($this->ukuranItems);
    }

    public function resetForm()
    {
        $this->reset(['barang_id', 'ukuranItems']);
    }

    public function store()
    {
        $validatedData = $this->validate([
            'barang_id' => 'required',
            'ukuranItems.*.ukuran' => 'required',
            'ukuranItems.*.panjang' => 'required|numeric|min:1',
            'ukuranItems.*.lebar' => 'required|numeric|min:1',
            'ukuranItems.*.tinggi' => 'required|numeric|min:1',
            'ukuranItems.*.stock' => 'required|numeric',
            'ukuranItems.*.harga' => 'required',
        ]);

        DB::beginTransaction();
        try {
            foreach ($this->ukuranItems as $item) {
                if ($this->ukuran->exists) {
                    $this->ukuran->update($item);
                    $this->success('Ukuran berhasil diupdate');
                } else {
                    $ukuran = new Ukuran();
                    $ukuran->fill($item);
                    $ukuran->barang_id = $this->barang_id;
                    $ukuran->save();
                    $this->success('Ukuran berhasil ditambahkan');
                }
            }
            DB::commit();
            $this->closeModalWithEvents([BarangTable::class => 'ukuranUpdated']);
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error('Ukuran gagal ditambahkan' . $e->getMessage());
        }
    }

    public function mount($ukuran_id = null, $barang_id = null)
    {
        $this->barang_id = $barang_id;
        $this->barang = Barang::find($barang_id);

        if ($ukuran_id) {
            $this->ukuran = Ukuran::find($ukuran_id);
            $this->ukuranItems = [
                [
                    'ukuran' => $this->ukuran->ukuran,
                    'panjang' => $this->ukuran->panjang,
                    'lebar' => $this->ukuran->lebar,
                    'tinggi' => $this->ukuran->tinggi,
                    'stock' => $this->ukuran->stock,
                    'harga' => $this->ukuran->harga,
                ]
            ];
            $this->barang_id = $this->ukuran->barang_id;
        } else {
            $this->ukuran = new Ukuran;
            $this->ukuranItems = [];
        }
    }
}
