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

    public function test_barang_form_rules(): void
    {
        $barangForm = new BarangForm();

        $expectedRules = [
            'nama_barang' => 'required',
            'keterangan' => 'required',
            'gambar' => 'image|max:2048|mimes:jpg,jpeg,png,gif',
            'status' => 'required',
        ];

        $this->assertEquals($expectedRules, $barangForm->getRules());
    }

    public function test_barang_form_render(): void
    {
        $barangForm = Livewire::test(BarangForm::class);

        $barangForm->assertViewIs('livewire.barang-form');
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
}
