<?php

namespace App\Livewire;

use App\Models\Faq;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toastable;

class FaqForm extends ModalComponent
{
    use Toastable;

    public Faq $faq;
    public $penanya_id, $penanya_name, $penjawab_id, $penjawab_name, $pertanyaan, $jawaban;
    public $bertanyaOnlyMode = false;

    public function render()
    {
        return view('livewire.faq-form');
    }

    public function switchToBertanyaOnlyMode()
    {
        $this->bertanyaOnlyMode = true;
    }

    public function switchToMenjawabOnlyMode()
    {
        $this->bertanyaOnlyMode = false;
    }

    public function resetCreateForm()
    {
        $this->penanya_id = '';
        $this->penjawab_id = '';
        $this->pertanyaan = '';
        $this->jawaban = '';
    }

    public function store()
    {
        if ($this->bertanyaOnlyMode == true) {
            $validated = $this->validate([
                'penanya_id' => 'required|exists:users,id',
                'pertanyaan' => 'required',
            ]);

            $this->faq->fill($validated);
            $this->faq->save();

            $this->success($this->faq->wasRecentlyCreated ? 'Pertanyaan berhasil ditambahkan' : 'Pertanyaan berhasil diubah');
        } else {
            $validated = $this->validate([
                'penjawab_id' => 'required|exists:users,id',
                'jawaban' => 'required',
            ]);

            // dd($validated);

            $this->faq->penjawab_id = $validated['penjawab_id'];
            $this->faq->jawaban = $validated['jawaban'];
            $this->faq->save();

            $this->success($this->faq->wasRecentlyCreated ? 'Jawaban berhasil ditambahkan' : 'Jawaban berhasil diubah');
        }

        $this->closeModalWithEvents([
            FaqTable::class => 'faqUpdated',
        ]);

        $this->resetCreateForm();

        $this->dispatch('faqs-updated');
    }

    public function mount($rowId = null, $bertanyaOnlyMode = false)
    {
        $this->faq = $rowId ? Faq::find($rowId) : new Faq();

        $this->bertanyaOnlyMode = $bertanyaOnlyMode;
        if ($this->bertanyaOnlyMode == true) {
            $this->penanya_id = auth()->id();
            $this->penanya_name = auth()->user()->name;
        } else {
            $this->penjawab_id = auth()->id();
            $this->penjawab_name = auth()->user()->name;
        }
        if ($this->faq->exists) {
            $this->penanya_id = $this->faq->penanya_id;
            $this->pertanyaan = $this->faq->pertanyaan;
            $this->jawaban = $this->faq->jawaban;
        }
    }
}
