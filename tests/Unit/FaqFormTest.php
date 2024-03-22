<?php

namespace Tests\Feature\Livewire;

use App\Livewire\FaqForm;
use App\Models\Faq;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class FaqFormTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_renders_the_faq_form()
    {
        $user = User::factory()->create();

        Livewire::actingAs($user)
            ->test(FaqForm::class)
            ->assertViewIs('livewire.faq-form');
    }

    /** @test */
    public function it_resets_the_form()
    {
        $user = User::factory()->create();

        Livewire::actingAs($user)
            ->test(FaqForm::class)
            ->set('pertanyaan', 'What is PHP?')
            ->set('jawaban', 'PHP is a server-side scripting language.')
            ->call('resetCreateForm')
            ->assertSet('pertanyaan', null)
            ->assertSet('jawaban', null);
    }

    /** @test */
    public function it_stores_a_faq_when_bertanyaOnlyMode_is_true()
    {
        $user = User::factory()->create();

        Livewire::actingAs($user)
            ->test(FaqForm::class)
            ->set('bertanyaOnlyMode', true)
            ->set('penanya_id', $user->id)
            ->set('pertanyaan', 'What is PHP?')
            ->call('store')
            ->assertHasNoErrors();

        $this->assertDatabaseHas('faq', [
            'penanya_id' => $user->id,
            'pertanyaan' => 'What is PHP?',
        ]);
    }

    /** @test */
    public function it_stores_a_faq_when_bertanyaOnlyMode_is_false()
    {
        $user = User::factory()->create();
        $faq = Faq::factory()->create();

        Livewire::actingAs($user)
            ->test(FaqForm::class)
            ->set('bertanyaOnlyMode', false)
            ->set('faq.id', $faq->id)
            ->set('penjawab_id', $user->id)
            ->set('jawaban', 'PHP is a server-side scripting language.')
            ->call('store')
            ->assertHasNoErrors();

        $this->assertDatabaseHas('faq', [
            'id' => $faq->id,
            'penjawab_id' => $user->id,
            'jawaban' => 'PHP is a server-side scripting language.',
        ]);
    }

    /** @test */
    public function it_mounts_the_faq_form()
    {
        $user = User::factory()->create();
        $faq = Faq::factory()->create();

        Livewire::actingAs($user)
            ->test(FaqForm::class)
            ->call('mount', $faq)
            ->assertSet('faq', $faq);
    }
}
