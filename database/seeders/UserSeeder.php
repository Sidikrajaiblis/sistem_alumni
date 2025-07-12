<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'Alamat' => 'Jl. Bandung No. 123',
            'foto' => 'images/user/11.png',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
        ]);

        // Moderator
        User::create([
            'name' => 'Moderator',
            'email' => 'moderator@email.com',
            'Alamat' => 'Jl. Jakarta No. 123',
            'foto' => 'images/user/07.png',
            'password' => Hash::make('12345678'),
            'role' => 'moderator',
        ]);

        // User Alumni
        User::create([
            'name' => 'dikzz',
            'email' => 'dikzz@email.com',
            'Alamat' => 'Jl. Garut No. 123',
            'foto' => 'images/user/03.png',
            'password' => Hash::make('12345678'),
            'role' => 'user',
        ]);
    }
}

