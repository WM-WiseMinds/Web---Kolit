<?php

namespace Tests\Unit;

use App\Livewire\PortfolioForm;
use App\Models\Barang;
use App\Models\Portfolio;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Tests\TestCase;

class PortflioFormTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_renders_component_succesfully()
    {
        // Test PortfolioForm render method
        Livewire::test(PortfolioForm::class)
            ->assertStatus(200);
    }

    /** @test */
    public function it_mounts_with_an_existing_portfolio()
    {
        // Create a barang
        $barang = Barang::factory()->create();

        // Create a portfolio with the created barang's id
        $portfolio = Portfolio::factory()->create(['barang_id' => $barang->id, 'gambar' => 'test.jpg']);

        // Test PortfolioForm mount method
        $component = Livewire::test(PortfolioForm::class, ['rowId' => $portfolio->id]);

        // Assert the component has the correct portfolio data
        $this->assertEquals($portfolio->id, $component->get('portfolio')->id);
        $this->assertEquals($portfolio->judul, $component->get('judul'));
        $this->assertEquals($portfolio->tanggal_pengerjaan->format('Y-m-d'), $component->get('tanggal_pengerjaan'));
        $this->assertEquals($portfolio->deskripsi, $component->get('deskripsi'));

        // Assert the correct image URL is set
        if ($portfolio->gambar) {
            $this->assertEquals(Storage::disk('public')->url($portfolio->gambar), $component->get('gambar_url'));
        }
    }

    /** @test */
    public function it_saves_a_new_portfolio()
    {
        // Create a barang
        $barang = Barang::factory()->create();

        $gambar = UploadedFile::fake()->image('gambar.jpg');

        // Test PortfolioForm save method
        $component = Livewire::test(PortfolioForm::class)
            ->set('barang_id', $barang->id)
            ->set('judul', 'Test Judul')
            ->set('tanggal_pengerjaan', now()->format('Y-m-d'))
            ->set('deskripsi', 'Test Deskripsi')
            ->set('gambar', $gambar) // Set a test gambar
            ->call('store');

        // Assert a new portfolio was saved
        $this->assertDatabaseHas('portfolio', [
            'barang_id' => $barang->id,
            'judul' => 'Test Judul',
            'tanggal_pengerjaan' => now()->format('Y-m-d'),
            'deskripsi' => 'Test Deskripsi',
        ]);
    }

    /** @test */
    /** @test */
    public function it_updates_an_existing_portfolio()
    {
        // Create a barang
        $barang = Barang::factory()->create();

        // Create a fake image file
        $gambar = UploadedFile::fake()->image('gambar.jpg');

        // Create a portfolio with the created barang's id
        $portfolio = Portfolio::factory()->create(['barang_id' => $barang->id, 'gambar' => 'test.jpg']);

        // Test PortfolioForm save method
        $component = Livewire::test(PortfolioForm::class, ['rowId' => $portfolio->id])
            ->set('barang_id', $barang->id)
            ->set('judul', 'Updated Judul')
            ->set('tanggal_pengerjaan', now()->format('Y-m-d'))
            ->set('deskripsi', 'Updated Deskripsi')
            ->set('gambar', $gambar) // Set the fake image file
            ->call('store');

        // Assert the portfolio was updated
        $this->assertDatabaseHas('portfolio', [
            'id' => $portfolio->id,
            'barang_id' => $barang->id,
            'judul' => 'Updated Judul',
            'tanggal_pengerjaan' => now()->format('Y-m-d'),
            'deskripsi' => 'Updated Deskripsi',
        ]);
    }
}
