<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'id_user' => Str::uuid(),
            'name' => 'Siti Maryam',
            'username' => 'admin',
            'password' => 'admin123',
            'role' => 'Admin',
            'status' => 'Aktif',
        ]);

        User::create([
            'id_user' => Str::uuid(),
            'name' => 'Sendok Garpu',
            'username' => 'operator',
            'password' => 'operator123',
            'role' => 'Operator',
            'status' => 'Aktif',
        ]);
    }
}
