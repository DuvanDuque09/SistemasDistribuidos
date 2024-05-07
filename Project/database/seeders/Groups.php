<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Groups extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement("
            INSERT INTO `groups` (`id`, `group`, `country_id`) VALUES
            (1, 'Grupo 1', 1),
            (2, 'Grupo 2', 1),
            (3, 'Grupo 1', 2),
            (4, 'Grupo 1', 3),
            (5, 'Grupo 1', 4),
            (6, 'Grupo 2', 4),
            (7, 'Grupo 1', 5),
            (8, 'Grupo 2', 5),
            (9, 'Grupo 3', 5),
            (10, 'Grupo 4', 5);
        ");
    }
}
