<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypesManagements extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement("
            INSERT INTO `types_managements` (`id`, `type_management`) VALUES
            (1, 'Aclaración de Saldos'),
            (2, 'Reclamos por Cobros'),
            (3, 'Acuerdo de pago');
        ");
    }
}
