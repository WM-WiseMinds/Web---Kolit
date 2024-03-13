<?php

namespace App\Livewire;

use App\Models\Barang;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toastable;

class PortfolioForm extends ModalComponent
{
    use Toastable;
    use WithFileUploads;

    public Portfolio $portfolio;

    public $barangs, $barang_id, $judul, $tanggal_pengerjaan, $deskripsi, $gambar, $gambar_url;

    protected $rules = [
        'barang_id' => 'required|exists:barang,id',
        'judul' => 'required',
        'tanggal_pengerjaan' => 'required|date',
        'deskripsi' => 'required',
        'gambar' => 'nullable|image|max:2048|mimes:jpg,jpeg,png,gif',
    ];

    public function render()
    {
        return view('livewire.portfolio-form');
    }

    public function resetCreateForm()
    {
        $this->barang_id = '';
        $this->judul = '';
        $this->tanggal_pengerjaan = '';
        $this->deskripsi = '';
        $this->gambar = '';
    }

    public function store()
    {
        $validatedData = $this->validate();

        if ($this->gambar) {
            if ($this->portfolio->exists && $this->portfolio->gambar) {
                Storage::disk('public')->delete($this->portfolio->gambar);
            }
            $validatedData['gambar'] = $this->gambar->store('gambar-portfolio', 'public');
        } else {
            // Jika tidak ada gambar baru, gunakan gambar lama
            $validatedData['gambar'] = $this->portfolio->gambar;
        }

        $this->portfolio->fill($validatedData);
        $this->portfolio->save();

        $this->success($this->portfolio->wasRecentlyCreated ? 'Portfolio berhasil ditambahkan' : 'Portfolio berhasil diubah');
        $this->closeModalWithEvents([
            PortfolioTable::class => 'portfolioUpdated',
        ]);
    }

    public function mount($rowId = null)
    {
        $this->portfolio = $rowId ? Portfolio::find($rowId) : new Portfolio();
        $this->barangs = Barang::all();
        if ($this->portfolio->exists) {
            $this->barang_id = $this->portfolio->barang_id;
            $this->judul = $this->portfolio->judul;
            $this->tanggal_pengerjaan = $this->portfolio->tanggal_pengerjaan->format('Y-m-d');
            $this->deskripsi = $this->portfolio->deskripsi;

            // Menambahkan URL gambar
            if ($this->portfolio->gambar) {
                $this->gambar_url = Storage::disk('public')->url($this->portfolio->gambar);
            }
        }

        // dump($this->tanggal_pengerjaan);
    }
}
