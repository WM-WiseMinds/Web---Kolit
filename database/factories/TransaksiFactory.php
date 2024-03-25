<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaksi>
 */
class TransaksiFactory extends Factory
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

        Storage::makeDirectory('public/gambar-transaksi');
        File::copy($randomImage->getPathname(), storage_path('app/public/gambar-transaksi/' . $imageName));

        return [
            'user_id' => User::factory(),
            'total_harga' => 100000,
            'status' => 'Pesanan Diproses',
            'bukti_pembayaran' => 'gambar-transaksi/' . $imageName,
        ];
    }
}
