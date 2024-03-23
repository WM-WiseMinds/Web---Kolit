<?php

namespace Tests\Unit;

use App\Livewire\TransaksiForm;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class TransaksiFormTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_renders_component_succesfully()
    {
        // Create a User instance
        User::factory()->create();

        // Test TransaksiForm render method
        Livewire::test(TransaksiForm::class)
            ->assertStatus(200);
    }

    // /** @test */
    // public function it_switches_to_status_only_mode()
    // {
    //     // Test TransaksiForm switchToStatusOnlyMode method
    //     Livewire::test(TransaksiForm::class)
    //         ->call('switchToStatusOnlyMode')
    //         ->assertSet('updatingStatusOnly', true);
    // }

    // /** @test */
    // public function it_switches_to_create_or_update_mode()
    // {
    //     // Test TransaksiForm switchToCreateOrUpdateMode method
    //     Livewire::test(TransaksiForm::class)
    //         ->call('switchToCreateOrUpdateMode')
    //         ->assertSet('updatingStatusOnly', false);
    // }

    // /** @test */
    // public function it_switches_to_pembayaran_only_mode()
    // {
    //     // Test TransaksiForm switchToPembayaranOnlyMode method
    //     Livewire::test(TransaksiForm::class)
    //         ->call('switchToPembayaranOnlyMode')
    //         ->assertSet('updatingPembayaranOnly', true);
    // }
}
