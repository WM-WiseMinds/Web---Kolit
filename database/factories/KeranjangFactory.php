<?php

namespace Database\Factories;

use App\Models\Barang;
use App\Models\Ukuran;
use App\Models\UkuranCustom;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Keranjang>
 */
class KeranjangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'barang_id' => Barang::factory(),
            'ukuran_id' => Ukuran::factory(),
            'ukuran_custom_id' => UkuranCustom::factory(),
            'jumlah' => $this->faker->numberBetween(1, 10),
        ];
    }
}
