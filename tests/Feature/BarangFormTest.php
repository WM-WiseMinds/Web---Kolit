<?php

namespace Tests\Unit;

use App\Livewire\BarangForm;
use App\Models\Barang;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Tests\TestCase;

class BarangFormTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_renders_barang_form()
    {
        // Arrange
        Barang::factory()->create();

        // Act
        $component = Livewire::test(BarangForm::class);

        // Assert
        $component->assertViewHas('barang');
    }

    /** @test */
    public function it_resets_create_form()
    {
        // Arrange
        $component = Livewire::test(BarangForm::class);

        // Act
        $component->set('nama_barang', 'Test Name');
        $component->set('keterangan', 'Test Keterangan');
        $component->set('gambar', 'Test Gambar');
        $component->set('status', 'Test Status');
        $component->call('resetCreateForm');

        // Assert
        $component->assertSet('nama_barang', '');
        $component->assertSet('keterangan', '');
        $component->assertSet('gambar', '');
        $component->assertSet('status', '');
    }

    /** @test */
    public function it_stores_barang()
    {
        // Arrange
        Storage::fake('public');
        $file = UploadedFile::fake()->image('gambar.jpg');
        $component = Livewire::test(BarangForm::class);

        /// Act
        $component->set('nama_barang', 'Test Name');
        $component->set('keterangan', 'Test Keterangan');
        $component->set('gambar', $file);
        $component->set('status', 'Aktif');
        $component->call('store');

        // Assert
        $this->assertDatabaseHas('barang', [
            'nama_barang' => 'Test Name',
            'keterangan' => 'Test Keterangan',
            'status' => 'Aktif',
        ]);
        Storage::disk('public')->assertExists($file->hashName('gambar-barang'));
    }

    /** @test */
    public function it_mounts_barang()
    {
        // Arrange
        $barang = Barang::factory()->create();

        // Act
        $component = Livewire::test(BarangForm::class, ['rowId' => $barang->id]);

        // Assert
        $component->assertSet('nama_barang', $barang->nama_barang);
        $component->assertSet('keterangan', $barang->keterangan);
        $component->assertSet('status', $barang->status);
    }
}
