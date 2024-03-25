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

    public function test_barang_form_render(): void
    {
        $barangForm = Livewire::test(BarangForm::class);

        $barangForm->assertViewIs('livewire.barang-form');
    }

    public function test_barang_form_reset_create_form(): void
    {
        $barangForm = Livewire::test(BarangForm::class);

        $barangForm->set('nama_barang', 'Test Barang')
            ->set('keterangan', 'Test Keterangan')
            ->set('gambar', UploadedFile::fake()->image('gambar.jpg'))
            ->set('status', 'Aktif')
            ->call('resetCreateForm');

        $this->assertEquals('', $barangForm->get('nama_barang'));
        $this->assertEquals('', $barangForm->get('keterangan'));
        $this->assertEquals('', $barangForm->get('gambar'));
        $this->assertEquals('', $barangForm->get('status'));
    }

    public function test_barang_form_store(): void
    {
        Storage::fake('public');

        $barangForm = Livewire::test(BarangForm::class);

        $file = UploadedFile::fake()->image('gambar.jpg');

        $barangForm->set('nama_barang', 'Test Barang')
            ->set('keterangan', 'Test Keterangan')
            ->set('gambar', $file)
            ->set('status', 'Aktif')
            ->call('store');

        $this->assertCount(1, Barang::all());

        $barang = Barang::first();

        $this->assertEquals('Test Barang', $barang->nama_barang);
        $this->assertEquals('Test Keterangan', $barang->keterangan);
        $this->assertEquals('Aktif', $barang->status);
        Storage::disk('public')->assertExists($barang->gambar);
    }

    /** @test */
    public function test_barang_form_update(): void
    {
        Storage::fake('public');

        $barang = Barang::factory()->create();

        $barangForm = new BarangForm();
        $barangForm->barang = $barang;

        $file = UploadedFile::fake()->image('gambar.jpg');

        $barangForm->nama_barang = 'Updated Barang';
        $barangForm->keterangan = 'Updated Keterangan';
        $barangForm->gambar = $file;
        $barangForm->status = 'Tidak Aktif';
        $barangForm->store();

        $updatedBarang = Barang::first();

        $this->assertEquals('Updated Barang', $updatedBarang->nama_barang);
        $this->assertEquals('Updated Keterangan', $updatedBarang->keterangan);
        $this->assertEquals('Tidak Aktif', $updatedBarang->status);
        Storage::disk('public')->assertExists($updatedBarang->gambar);
    }

    /** @test */
    public function test_barang_form_mount(): void
    {
        $barang = Barang::factory()->create([
            'nama_barang' => 'Test Barang',
            'keterangan' => 'Test Keterangan',
            'gambar' => 'gambar.jpg',
            'status' => 'Aktif',
        ]);

        $barangForm = Livewire::test(BarangForm::class, ['rowId' => $barang->id]);

        $this->assertEquals($barang->nama_barang, $barangForm->get('nama_barang'));
        $this->assertEquals($barang->keterangan, $barangForm->get('keterangan'));
        $this->assertEquals($barang->status, $barangForm->get('status'));
    }
}
