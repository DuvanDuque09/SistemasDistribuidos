<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IdentificationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement("INSERT INTO `identification_types` (`id`, `code`, `identification_type`) VALUES
            (1, 'CC','Cédula de Ciudadanía'),
            (2, 'CE','Cédula de Extranjería'),
            (3, 'NI','Número de Identificación Tributaria'),
            (4, 'PA','Pasaporte');
        ");
    }
}
