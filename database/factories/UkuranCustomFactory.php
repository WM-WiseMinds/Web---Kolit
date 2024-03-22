<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UkuranCustom>
 */
class UkuranCustomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'barang_id' => \App\Models\Barang::factory(),
            'panjang' => $this->faker->randomFloat(2, 1, 100),
            'lebar' => $this->faker->randomFloat(2, 1, 100),
            'tinggi' => $this->faker->randomFloat(2, 1, 100),
            'harga' => $this->faker->randomNumber(5),
        ];
    }
}
