<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Detailpelanggan>
 */
class DetailpelangganFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::whereHas('roles', function ($query) {
                $query->where('name', 'Pelanggan');
            })->inRandomOrder()->first()->id,
            'no_wa' => $this->faker->unique()->phoneNumber,
            'alamat' => $this->faker->address,
        ];
    }
}
