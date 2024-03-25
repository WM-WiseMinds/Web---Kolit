<?php

namespace Tests\Unit;

use App\Livewire\KeranjangForm;
use App\Models\Barang;
use App\Models\Keranjang;
use App\Models\Ukuran;
use App\Models\UkuranCustom;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Livewire\Livewire;
use Tests\TestCase;

class KeranjangFormTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function keranjang_form_component_renders_correctly()
    {
        $user = User::factory()->create();
        Auth::login($user);

        Livewire::test(KeranjangForm::class)
            ->assertStatus(200); // Memastikan komponen bisa dirender dengan status HTTP 200.
    }

    /** @test */
    /** @test */
    public function can_create_a_new_keranjang_item_with_standard_size()
    {
        $user = User::factory()->create();
        $barang = Barang::factory()->create();
        $ukuran = Ukuran::factory()->create(['barang_id' => $barang->id, 'stock' => 10]);

        Livewire::actingAs($user)
            ->test(KeranjangForm::class)
            ->set('keranjang', new Keranjang()) // Hanya contoh, sesuaikan dengan kebutuhan
            ->set('barang_id', $barang->id)
            ->set('user_id', $user->id)
            ->set('ukuran_id', $ukuran->id)
            ->set('jumlah', 1)
            ->set('tipe_ukuran', 'standar')
            ->call('store');

        $this->assertTrue(Keranjang::where('barang_id', $barang->id)->exists());
    }


    /** @test */
    public function can_create_a_new_keranjang_item_with_custom_size()
    {
        $user = User::factory()->create();
        $barang = Barang::factory()->create();
        // Tidak perlu membuat instance Ukuran karena ini ukuran custom.

        // Menginisialisasi komponen dan properti yang diperlukan secara manual
        Livewire::actingAs($user)
            ->test(KeranjangForm::class)
            ->set('keranjang', new Keranjang()) // Menginisialisasi properti `$keranjang`
            ->set('user_id', $user->id)
            ->set('barang_id', $barang->id)
            ->set('panjang', 100)
            ->set('lebar', 50)
            ->set('tinggi', 20)
            ->set('hargaCustom', 150000) // Asumsi ini adalah harga yang dihitung berdasarkan ukuran custom.
            ->set('tipe_ukuran', 'custom')
            ->set('jumlah', 1)
            ->call('store');

        $this->assertTrue(Keranjang::where('barang_id', $barang->id)->exists());
        // Tambahan, verifikasi bahwa ukuran custom telah disimpan dengan benar.
        $this->assertDatabaseHas('ukuran_custom', [
            'panjang' => 100,
            'lebar' => 50,
            'tinggi' => 20,
            'harga' => 150000
        ]);
    }
}
