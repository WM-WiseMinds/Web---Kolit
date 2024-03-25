<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Portfolio>
 */
class PortfolioFactory extends Factory
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

        Storage::makeDirectory('public/gambar-portfolio');
        File::copy($randomImage->getPathname(), storage_path('app/public/gambar-portfolio/' . $imageName));

        return [
            'barang_id' => $this->faker->numberBetween(1, 10),
            'judul' => $this->faker->word,
            'deskripsi' => $this->faker->sentence,
            'gambar' => 'gambar-portfolio/' . $imageName,
            'tanggal_pengerjaan' => $this->faker->dateTimeThisYear(),
        ];
    }
}
