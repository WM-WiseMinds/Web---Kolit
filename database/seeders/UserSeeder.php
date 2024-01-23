<?php

namespace Database\Seeders;
use Illuminate\Database\QueryException;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(50)->create();

        $user = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('Password'),
            'role_id' => 1,
        ]);
    }
}
