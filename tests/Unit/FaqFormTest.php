<?php

namespace Tests\Feature\Livewire;

use App\Livewire\FaqForm;
use App\Models\Faq;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Livewire\Livewire;
use Tests\TestCase;

class FaqFormTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_renders_the_faq_form_view()
    {
        $user = User::factory()->create();
        Auth::login($user);

        Livewire::test(FaqForm::class)
            ->assertViewIs('livewire.faq-form');
    }

    /** @test */
    public function it_resets_create_form()
    {
        $user = User::factory()->create();
        Auth::login($user);

        Livewire::test(FaqForm::class)
            ->set('pertanyaan', 'Test question')
            ->set('jawaban', 'Test answer')
            ->call('resetCreateForm')
            ->assertSet('pertanyaan', '')
            ->assertSet('jawaban', '');
    }

    /** @test */
    public function can_switch_to_bertanya_only_mode()
    {
        $user = User::factory()->create();

        Livewire::actingAs($user)
            ->test(FaqForm::class)
            ->call('switchToBertanyaOnlyMode')
            ->assertSet('bertanyaOnlyMode', true);
    }

    /** @test */
    public function can_switch_to_menjawab_only_mode()
    {
        $user = User::factory()->create();

        Livewire::actingAs($user)
            ->test(FaqForm::class)
            ->call('switchToMenjawabOnlyMode')
            ->assertSet('bertanyaOnlyMode', false);
    }

    /** @test */
    public function can_set_penanya_id()
    {
        $user = User::factory()->create();

        Livewire::actingAs($user)
            ->test(FaqForm::class)
            ->set('penanya_id', $user->id)
            ->assertSet('penanya_id', $user->id);
    }

    /** @test */
    public function can_set_penjawab_id()
    {
        $user = User::factory()->create();

        Livewire::actingAs($user)
            ->test(FaqForm::class)
            ->set('penjawab_id', $user->id)
            ->assertSet('penjawab_id', $user->id);
    }

    /** @test */
    public function can_set_pertanyaan()
    {
        $user = User::factory()->create();

        Livewire::actingAs($user)
            ->test(FaqForm::class)
            ->set('pertanyaan', 'What is PHP?')
            ->assertSet('pertanyaan', 'What is PHP?');
    }

    /** @test */
    public function can_set_jawaban()
    {
        $user = User::factory()->create();

        Livewire::actingAs($user)
            ->test(FaqForm::class)
            ->set('jawaban', 'PHP is a server-side scripting language.')
            ->assertSet('jawaban', 'PHP is a server-side scripting language.');
    }
}
