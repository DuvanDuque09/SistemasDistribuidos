<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = "Administrador";
        $user->email = "admin@scotia.com";
        $user->password = Hash::make('1234567890');
        $user->person_id = 0;
        $user->profile_photo_path = 'public/profile/Admin.png';
        $user->assignRole(1);
        $user->save();
    }
}
