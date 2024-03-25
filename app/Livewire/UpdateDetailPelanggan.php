<?php

namespace App\Livewire;

use App\Models\Detailpelanggan;
use Livewire\Component;

class UpdateDetailPelanggan extends Component
{
    public Detailpelanggan $detailPelanggan;
    public $no_wa, $alamat, $user_id;

    public function mount()
    {
        $this->detailPelanggan = auth()->user()->detailPelanggan;
        $this->no_wa = $this->detailPelanggan->no_wa;
        $this->alamat = $this->detailPelanggan->alamat;
    }

    public function update()
    {
        $this->validate([
            'no_wa' => 'required|string|max:255',
            'alamat' => 'required|string',
        ]);

        $this->detailPelanggan->update([
            'no_wa' => $this->no_wa,
            'alamat' => $this->alamat,
        ]);

        $this->dispatch('saved');
    }

    public function render()
    {
        return view('livewire.update-detail-pelanggan');
    }
}
