<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $sourceImages = File::files(storage_path('app/public/source'));
        $randomImage = $this->faker->randomElement($sourceImages);
        $imageName = $randomImage->getFilename();

        Storage::makeDirectory('public/gambar-barang');
        File::copy($randomImage->getPathname(), storage_path('app/public/gambar-barang/' . $imageName));

        return [
            'nama_barang' => $this->faker->word,
            'keterangan' => $this->faker->sentence,
            'gambar' => 'gambar-barang/' . $imageName,
            'status' => $this->faker->randomElement(['Aktif', 'Tidak Aktif']),
        ];
    }
}
