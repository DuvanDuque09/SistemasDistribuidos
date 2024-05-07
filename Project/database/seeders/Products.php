<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Products extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement("INSERT INTO `products` (`id`, `product`, `type_product_id`) VALUES
            (1, 'Cuenta de Ahorros', 1),
            (2, 'Cuenta de Nómina', 1),
            (3, 'Cuenta Corriente', 1),
            (4, 'One Rewards Metal', 2),
            (5, 'One Rewards Classic', 2),
            (6, 'One Rewards Gold', 2),
            (7, 'One Rewards Black', 2),
            (8, 'One Rewards Platinum', 2),
            (9, 'One Rewards Signature', 2),
            (10, 'One Rewards Infinite', 2),
            (11, 'One Light', 2),
            (12, 'One Cashback', 2);
        ");
    }
}
