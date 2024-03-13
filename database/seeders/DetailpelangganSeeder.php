<?php

namespace Database\Seeders;

use App\Models\Detailpelanggan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailpelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Detailpelanggan::factory()->count(20)->create();
    }
}
