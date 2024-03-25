<?php

namespace Tests\Unit;

use App\Livewire\UkuranForm;
use App\Models\Barang;
use App\Models\Ukuran;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class UkuranFormTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_renders_component_succesfully()
    {
        // Test UkuranForm render method
        Livewire::test(UkuranForm::class)
            ->assertStatus(200);
    }

    /** @test */
    public function it_resets_form()
    {
        // Test UkuranForm resetForm method
        $component = Livewire::test(UkuranForm::class)
            ->set('barang_id', 1)
            ->set('ukuranItems', [
                [
                    'ukuran' => 'Test Ukuran',
                    'panjang' => 10,
                    'lebar' => 10,
                    'tinggi' => 10,
                    'stock' => 10,
                    'harga' => 1000,
                ]
            ])
            ->call('resetForm');

        // Assert the form fields are reset
        $this->assertNull($component->get('barang_id'));
        $this->assertCount(0, $component->get('ukuranItems'));
    }

    /** @test */
    public function it_creates_a_new_ukuran()
    {
        // Create a barang
        $barang = Barang::factory()->create();

        // Test UkuranForm store method for creating a new ukuran
        Livewire::test(UkuranForm::class)
            ->set('barang_id', $barang->id)
            ->set('ukuranItems', [
                [
                    'ukuran' => 'Test Ukuran',
                    'panjang' => 10,
                    'lebar' => 10,
                    'tinggi' => 10,
                    'stock' => 10,
                    'harga' => 1000,
                ]
            ])
            ->call('store');

        // Assert a new ukuran was stored
        $this->assertDatabaseHas('ukuran', [
            'barang_id' => $barang->id,
            'ukuran' => 'Test Ukuran',
            'panjang' => 10,
            'lebar' => 10,
            'tinggi' => 10,
            'stock' => 10,
            'harga' => 1000,
        ]);
    }

    /** @test */
    public function it_updates_an_existing_ukuran()
    {
        // Create a ukuran
        $ukuran = Ukuran::factory()->create();

        // Test UkuranForm store method for updating an existing ukuran
        Livewire::test(UkuranForm::class, ['ukuran_id' => $ukuran->id])
            ->set('barang_id', $ukuran->barang_id)
            ->set('ukuranItems', [
                [
                    'ukuran' => 'Updated Ukuran',
                    'panjang' => 20,
                    'lebar' => 20,
                    'tinggi' => 20,
                    'stock' => 20,
                    'harga' => 2000,
                ]
            ])
            ->call('store');

        // Assert the ukuran was updated
        $this->assertDatabaseHas('ukuran', [
            'id' => $ukuran->id,
            'barang_id' => $ukuran->barang_id,
            'ukuran' => 'Updated Ukuran',
            'panjang' => 20,
            'lebar' => 20,
            'tinggi' => 20,
            'stock' => 20,
            'harga' => 2000,
        ]);
    }

    /** @test */
    public function it_mounts_with_an_existing_ukuran()
    {
        // Create a ukuran
        $ukuran = Ukuran::factory()->create();

        // Test UkuranForm mount method
        $component = Livewire::test(UkuranForm::class, ['ukuran_id' => $ukuran->id]);

        // Assert the component has the correct ukuran data
        $this->assertEquals($ukuran->id, $component->get('ukuran')->id);
        $this->assertEquals($ukuran->barang_id, $component->get('barang_id'));
        $this->assertEquals($ukuran->ukuran, $component->get('ukuranItems')[0]['ukuran']);
        $this->assertEquals($ukuran->panjang, $component->get('ukuranItems')[0]['panjang']);
        $this->assertEquals($ukuran->lebar, $component->get('ukuranItems')[0]['lebar']);
        $this->assertEquals($ukuran->tinggi, $component->get('ukuranItems')[0]['tinggi']);
        $this->assertEquals($ukuran->stock, $component->get('ukuranItems')[0]['stock']);
        $this->assertEquals($ukuran->harga, $component->get('ukuranItems')[0]['harga']);
    }
}
