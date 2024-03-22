<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Faq>
 */
class FaqFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'penanya_id' => User::factory(),
            'penjawab_id' => User::factory(),
            'pertanyaan' => $this->faker->sentence,
            'jawaban' => $this->faker->paragraph,
        ];
    }
}
