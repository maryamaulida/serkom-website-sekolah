<?php

namespace Database\Seeders;

use App\Models\Ekskul;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EkskulSeeder extends Seeder
{
    public function run(): void
    {
        $ekskuls = [
            [
                'id_ekskul' => Str::uuid(),
                'nama_eskul' => 'Pramuka',
                'nama_pembina' => 'Budi Santoso, S.Pd.',
                'jadwal_latihan' => 'Jumat, 14.00 - 16.00',
                'deskripsi' => 'Kegiatan untuk membentuk karakter, kedisiplinan, kemandirian, dan kerja sama siswa.',
                'gambar' => null,
            ],
            [
                'id_ekskul' => Str::uuid(),
                'nama_eskul' => 'Futsal',
                'nama_pembina' => 'Rizky Maulana, S.Pd.',
                'jadwal_latihan' => 'Selasa, 15.30 - 17.00',
                'deskripsi' => 'Kegiatan olahraga yang melatih kemampuan bermain futsal, kerja sama tim, dan sportivitas.',
                'gambar' => null,
            ],
            [
                'id_ekskul' => Str::uuid(),
                'nama_eskul' => 'English Club',
                'nama_pembina' => 'Dimas Pratama, S.Pd.',
                'jadwal_latihan' => 'Kamis, 15.00 - 16.30',
                'deskripsi' => 'Kegiatan untuk meningkatkan kemampuan berbahasa Inggris melalui diskusi dan praktik.',
                'gambar' => null,
            ],
        [
            'id_ekskul' => Str::uuid(),
            'nama_eskul' => 'PMR',
            'nama_pembina' => 'Dewi Anggraini, S.Pd.',
            'jadwal_latihan' => 'Sabtu, 09.00 - 11.00',
            'deskripsi' => 'Kegiatan Palang Merah Remaja yang melatih kepedulian sosial, pertolongan pertama, dan kesiapsiagaan dalam membantu sesama.',
            'gambar' => null,
        ],
        [
            'id_ekskul' => Str::uuid(),
            'nama_eskul' => 'Kesenian',
            'nama_pembina' => 'Rina Marlina, S.Pd.',
            'jadwal_latihan' => 'Rabu, 14.00 - 16.00',
            'deskripsi' => 'Kegiatan untuk mengembangkan kreativitas dan bakat siswa dalam bidang seni, seperti tari, musik, dan pertunjukan.',
            'gambar' => null,
        ],
        [
            'id_ekskul' => Str::uuid(),
            'nama_eskul' => 'Bulutangkis',
            'nama_pembina' => 'Agus Setiawan, S.Pd.',
            'jadwal_latihan' => 'Selasa, 15.30 - 17.00',
            'deskripsi' => 'Kegiatan olahraga bulutangkis untuk meningkatkan kebugaran, ketangkasan, konsentrasi, dan sportivitas siswa.',
            'gambar' => null,
        ],
        [
            'id_ekskul' => Str::uuid(),
            'nama_eskul' => 'Renang',
            'nama_pembina' => 'Andi Firmansyah, S.Pd.',
            'jadwal_latihan' => 'Sabtu, 08.00 - 10.00',
            'deskripsi' => 'Kegiatan olahraga renang untuk melatih kebugaran tubuh, keterampilan berenang, dan kesadaran terhadap keselamatan di air.',
            'gambar' => null,
        ],

        ];

        foreach ($ekskuls as $ekskul) {
            Ekskul::create($ekskul);
        }
    }
}
