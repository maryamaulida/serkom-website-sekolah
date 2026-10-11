<?php

namespace Database\Seeders;

use App\Models\Prestasi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PrestasiSeeder extends Seeder
{
    public function run(): void
    {
        $prestasis = [
            [
                'id_prestasi' => Str::uuid(),
                'nama_prestasi' => 'Juara 1 Olimpiade Matematika',
                'deskripsi' => 'Meraih juara pertama dalam kompetisi Olimpiade Matematika tingkat Kabupaten.',
                'foto' => 'prestasi-matematika.jpg',
                'tahun_ajaran' => 2026,
            ],
            [
                'id_prestasi' => Str::uuid(),
                'nama_prestasi' => 'Juara 2 Lomba Debat Bahasa Indonesia',
                'deskripsi' => 'Meraih juara kedua dalam lomba debat Bahasa Indonesia tingkat Kabupaten.',
                'foto' => 'prestasi-debat.jpg',
                'tahun_ajaran' => 2026,
            ],
            [
                'id_prestasi' => Str::uuid(),
                'nama_prestasi' => 'Juara 1 Futsal Pelajar',
                'deskripsi' => 'Tim futsal sekolah berhasil meraih juara pertama dalam turnamen futsal pelajar.',
                'foto' => 'prestasi-futsal.jpg',
                'tahun_ajaran' => 2025,
            ],
            [
                'id_prestasi' => Str::uuid(),
                'nama_prestasi' => 'Juara 3 Lomba Fotografi',
                'deskripsi' => 'Siswa berhasil meraih juara ketiga dalam lomba fotografi tingkat Provinsi.',
                'foto' => 'prestasi-fotografi.jpg',
                'tahun_ajaran' => 2025,
            ],
            [
                'id_prestasi' => Str::uuid(),
                'nama_prestasi' => 'Juara 1 Festival Seni Pelajar',
                'deskripsi' => 'Meraih juara pertama dalam festival seni dan kreativitas pelajar.',
                'foto' => 'prestasi-seni.jpg',
                'tahun_ajaran' => 2024,
            ],
        ];

        foreach ($prestasis as $prestasi) {
            Prestasi::create($prestasi);
        }
    }
}
