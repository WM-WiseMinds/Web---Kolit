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

    /** @test */
    public function can_store_new_transaksi_data()
    {
        $user = User::factory()->create();
        $keranjangItems = Keranjang::factory()->count(3)->create(['user_id' => $user->id]);

        Livewire::actingAs($user)
            ->test(TransaksiForm::class, ['keranjangIds' => $keranjangItems->pluck('id')->toArray()])
            ->set('user_id', $user->id)
            ->set('total_harga', 100000)
            ->set('status', 'Pesanan Diproses')
            ->call('store')
            ->assertHasNoErrors();

        $this->assertTrue(Transaksi::where('user_id', $user->id)->exists());
    }

    /** @test */
    public function can_update_transaksi_status()
    {
        $transaksi = Transaksi::factory()->create(['status' => 'Pesanan Diproses']);

        Livewire::test(TransaksiForm::class, ['rowId' => $transaksi->id])
            ->call('switchToStatusOnlyMode')
            ->set('status', 'Pembayaran Diterima')
            ->call('store')
            ->assertHasNoErrors();

        $updatedTransaksi = Transaksi::find($transaksi->id);
        $this->assertEquals('Pembayaran Diterima', $updatedTransaksi->status);
    }

    /** @test */
    public function can_reset_create_form()
    {
        Livewire::test(TransaksiForm::class)
            ->set('total_harga', 100000)
            ->set('status', 'Pesanan Diproses')
            ->call('resetCreateForm')
            ->assertSet('total_harga', '')
            ->assertSet('status', '');
    }

    /** @test */
    public function component_mounts_with_existing_transaksi_data()
    {
        $transaksi = Transaksi::factory()->create();

        Livewire::test(TransaksiForm::class, ['rowId' => $transaksi->id])
            ->assertSet('user_id', $transaksi->user_id)
            ->assertSet('total_harga', $transaksi->total_harga)
            ->assertSet('status', $transaksi->status);
    }
}
