<?php

namespace Tests\Unit;

use App\Livewire\PelangganForm;
use App\Models\Detailpelanggan;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class PelangganFormTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_renders_the_pelanggan_form_view()
    {
        $user = User::factory()->create();

        Livewire::actingAs($user)
            ->test(PelangganForm::class)
            ->assertViewIs('livewire.pelanggan-form');
    }

    /** @test */
    public function it_resets_the_create_form()
    {
        $user = User::factory()->create();

        $component = Livewire::actingAs($user)
            ->test(PelangganForm::class)
            ->set('user_id', '1')
            ->set('alamat', 'Test Address')
            ->set('no_wa', '1234567890');

        $component->call('resetCreateForm');

        $this->assertEquals('', $component->get('user_id'));
        $this->assertEquals('', $component->get('alamat'));
        $this->assertEquals('', $component->get('no_wa'));
    }

    /** @test */
    public function it_stores_a_new_detail_pelanggan()
    {
        $user = User::factory()->create();

        $component = Livewire::actingAs($user)
            ->test(PelangganForm::class)
            ->set('user_id', $user->id) // Use the ID of the created user
            ->set('alamat', 'Test Address')
            ->set('no_wa', '1234567890');

        $component->call('store');

        $this->assertDatabaseHas('detailpelanggan', [
            'user_id' => $user->id, // Use the ID of the created user
            'alamat' => 'Test Address',
            'no_wa' => '1234567890',
        ]);
    }
}
