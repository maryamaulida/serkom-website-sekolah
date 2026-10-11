<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SiswaSeeder extends Seeder
{
    public function run(): void
    {
        $siswas = [
            [
                'id_siswa' => Str::uuid(),
                'nisn' => '0012345678',
                'nama' => 'Andi Pratama',
                'jenis_kelamin' => 'Laki-Laki',
                'tahun_masuk' => 2024,
                'foto' => null,
            ],
            [
                'id_siswa' => Str::uuid(),
                'nisn' => '0012345679',
                'nama' => 'Siti Aisyah',
                'jenis_kelamin' => 'Perempuan',
                'tahun_masuk' => 2024,
                'foto' => null,
            ],
            [
                'id_siswa' => Str::uuid(),
                'nisn' => '0012345680',
                'nama' => 'Raka Saputra',
                'jenis_kelamin' => 'Laki-Laki',
                'tahun_masuk' => 2024,
                'foto' => null,
            ],
            [
                'id_siswa' => Str::uuid(),
                'nisn' => '0012345681',
                'nama' => 'Nabila Putri',
                'jenis_kelamin' => 'Perempuan',
                'tahun_masuk' => 2025,
                'foto' => null,
            ],
            [
                'id_siswa' => Str::uuid(),
                'nisn' => '0012345682',
                'nama' => 'Fajar Ramadhan',
                'jenis_kelamin' => 'Laki-Laki',
                'tahun_masuk' => 2025,
                'foto' => null,
            ],
            [
                'id_siswa' => Str::uuid(),
                'nisn' => '0012345683',
                'nama' => 'Dinda Maharani',
                'jenis_kelamin' => 'Perempuan',
                'tahun_masuk' => 2025,
                'foto' => null,
            ],
            [
                'id_siswa' => Str::uuid(),
                'nisn' => '0012345684',
                'nama' => 'Bagas Firmansyah',
                'jenis_kelamin' => 'Laki-Laki',
                'tahun_masuk' => 2026,
                'foto' => null,
            ],
            [
                'id_siswa' => Str::uuid(),
                'nisn' => '0012345685',
                'nama' => 'Aulia Rahma',
                'jenis_kelamin' => 'Perempuan',
                'tahun_masuk' => 2026,
                'foto' => null,
            ],
            [
                'id_siswa' => Str::uuid(),
                'nisn' => '0012345686',
                'nama' => 'Rizky Maulana',
                'jenis_kelamin' => 'Laki-Laki',
                'tahun_masuk' => 2026,
                'foto' => null,
            ],
            [
                'id_siswa' => Str::uuid(),
                'nisn' => '0012345687',
                'nama' => 'Citra Lestari',
                'jenis_kelamin' => 'Perempuan',
                'tahun_masuk' => 2026,
                'foto' => null,
            ],
        ];

        foreach ($siswas as $siswa) {
            Siswa::create($siswa);
        }
    }
}
