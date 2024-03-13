<?php

namespace App\Livewire;

use App\Models\Barang;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toastable;

class BarangForm extends ModalComponent
{
    use Toastable;
    use WithFileUploads;

    public Barang $barang;

    public $nama_barang, $keterangan, $gambar, $status, $gambar_url;

    protected $rules = [
        'nama_barang' => 'required',
        'keterangan' => 'required',
        'gambar' => 'image|max:2048|mimes:jpg,jpeg,png,gif',
        'status' => 'required',
    ];

    public function render()
    {
        return view('livewire.barang-form');
    }

    public function resetCreateForm()
    {
        $this->nama_barang = '';
        $this->keterangan = '';
        $this->gambar = '';
        $this->status = '';
    }

    public function store()
    {
        $validatedData = $this->validate();

        if ($this->gambar) {
            if ($this->barang->exists && $this->barang->gambar) {
                Storage::disk('public')->delete($this->barang->gambar);
            }
            $validatedData['gambar'] = $this->gambar->store('gambar-barang', 'public');
        } else {
            // Jika tidak ada gambar baru, gunakan gambar lama
            $validatedData['gambar'] = $this->barang->gambar;
        }

        $this->barang->fill($validatedData);
        $this->barang->save();

        $this->success($this->barang->wasRecentlyCreated ? 'Barang berhasil ditambahkan' : 'Barang berhasil diubah');
        $this->closeModalWithEvents([
            BarangTable::class => 'barangUpdated',
        ]);

        $this->resetCreateForm();
    }

    public function mount($rowId = null)
    {
        $this->barang = $rowId ? Barang::find($rowId) : new Barang();
        if ($this->barang->exists) {
            $this->nama_barang = $this->barang->nama_barang;
            $this->keterangan = $this->barang->keterangan;

            $this->status = $this->barang->status;
            // Menambahkan URL gambar
            if ($this->barang->gambar) {
                $this->gambar_url = Storage::disk('public')->url($this->barang->gambar);
            }
        }
    }
}
