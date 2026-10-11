<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'username' => 'admin',
            'password' => bcrypt('password'),
            'role' => 'Admin',
            'status' => 'Aktif',
        ]);

        $this->call([
            UserSeeder::class,
            ProfileSeeder::class,
            GuruSeeder::class,
            SiswaSeeder::class,
            BeritaSeeder::class,
            PengumumanSeeder::class,
            PrestasiSeeder::class,
            EkskulSeeder::class,
            GaleriSeeder::class,
            DashboardSeeder::class,
        ]);



    }
}
