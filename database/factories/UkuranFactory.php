<?php

namespace Database\Factories;

use App\Models\Barang;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ukuran>
 */
class UkuranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'barang_id' => function () {
                return Barang::factory()->create()->id;
            },
            'ukuran' => $this->faker->randomElement(['Besar', 'Sedang', 'Kecil']),
            'panjang' => $this->faker->numberBetween(10, 100),
            'lebar' => $this->faker->numberBetween(10, 100),
            'tinggi' => $this->faker->numberBetween(10, 100),
            'stock' => $this->faker->numberBetween(0, 100),
            'harga' => $this->faker->numberBetween(10000, 1000000),
        ];
    }
}
