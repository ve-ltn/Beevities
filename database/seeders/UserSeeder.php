<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name'     => 'User Example',
            'email'    => 'user@gmail.com',
            'password' => Hash::make('password'),
            'number'   => '081234567890',
            'role'     => 0, // 0 = User
        ]);

        User::create([
            'name'     => 'Admin Example',
            'email'    => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'number'   => '081234567891',
            'role'     => 1, // 1 = Admin
        ]);
    }
}
