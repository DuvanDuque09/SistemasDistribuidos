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
            INSERT INTO `countries` (`id`, `code`, `city`, `department_id`) VALUES
            (1, '169', 'Colombia', 1),
            (2, '002', 'Costa Rica', 1),
            (3, '004', 'Panamá', 1),
            (4, '021', 'Perú', 1),
            (4, '021', 'Canadá', 1),
        ");
    }
}
