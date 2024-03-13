<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $this->call(UserSeeder::class);
        // $this->call(RoleSeeder::class);
        $this->call([
            RolesAndPermissionsSeeder::class,
            UserSeeder::class,
            DetailpelangganSeeder::class,
            BarangSeeder::class,
            UkuranSeeder::class,
        ]);
    }
}
