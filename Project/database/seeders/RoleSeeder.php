<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rol1 = Role::create(['name' => 'Administrador']);
        $rol2 = Role::create(['name' => 'Agente']);

        // Permission::create(['name' => 'dashboard'])->syncRoles([$rol1, $rol2, $rol3, $rol4, $rol5, $rol6, $rol7]);
        Permission::create(['name' => 'dashboard.admin'])->assignRole($rol1);
        Permission::create(['name' => 'users'])->assignRole($rol1);

        Permission::create(['name' => 'dashboard.agente'])->assignRole($rol2);
    }
}
