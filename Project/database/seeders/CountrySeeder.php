<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement("
            INSERT INTO `countries` (`id`, `code`, `country`) VALUES
            (1, 'COL', 'Colombia'),
            (2, 'CRI', 'Costa Rica'),
            (3, 'PAN', 'Panamá'),
            (4, 'PER', 'Perú'),
            (5, 'CAN', 'Canadá');
        ");
    }
}
