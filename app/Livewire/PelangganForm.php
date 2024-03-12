<?php

namespace App\Livewire;

use App\Models\Detailpelanggan;
use App\Models\User;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toastable;

class PelangganForm extends ModalComponent
{
    use Toastable;

    public Detailpelanggan $detailPelanggan;
    public $user_id, $alamat, $no_wa, $user;

    public function render()
    {
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'pelanggan');
        })->get();
        return view('livewire.pelanggan-form', compact('users'));
    }

    public function resetCreateForm()
    {
        $this->user_id = '';
        $this->alamat = '';
        $this->no_wa = '';
    }

    protected $rules = [
        'user_id' => 'required|exists:users,id',
        'alamat' => 'required',
        'no_wa' => 'required',
    ];

    public function store()
    {
        $validatedData = $this->validate();
        $this->detailPelanggan->fill($validatedData);
        $this->detailPelanggan->save();
        $this->success($this->detailPelanggan->wasRecentlyCreated ? 'Detail Pelanggan berhasil ditambahkan' : 'Detail Pelanggan berhasil diubah');
        $this->closeModalWithEvents([PelangganTable::class => 'pelangganUpdated']);
        $this->resetCreateForm();
    }

    public function mount($rowId = null)
    {
        $this->detailPelanggan = $rowId ? detailPelanggan::find($rowId) : new detailPelanggan();
        if ($this->detailPelanggan->exists) {
            $this->user_id = $this->detailPelanggan->user_id;
            $this->alamat = $this->detailPelanggan->alamat;
            $this->no_wa = $this->detailPelanggan->no_wa;
        }
    }
}
