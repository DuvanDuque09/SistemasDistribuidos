<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypesProducts extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement("INSERT INTO `types_products` (`id`, `type_product`) VALUES
        (1, 'Cuentas e Inversión'),
        (2, 'Tarjetas de Crédito');
    ");
    }
}
