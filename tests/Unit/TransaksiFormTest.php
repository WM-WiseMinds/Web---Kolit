<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use App\Models\Keranjang;
use App\Models\Transaksi;
use App\Livewire\TransaksiForm;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TransaksiFormTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function transaksi_form_component_renders_correctly()
    {
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
