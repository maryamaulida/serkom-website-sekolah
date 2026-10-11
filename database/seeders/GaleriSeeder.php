<?php

namespace Database\Seeders;

use App\Models\Galeri;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class GaleriSeeder extends Seeder
{
    public function run(): void
    {
        $galeris = [
            [
                'id_galeri' => Str::uuid(),
                'judul' => 'Upacara Bendera',
                'keterangan' => 'Kegiatan upacara bendera yang dilaksanakan oleh seluruh warga sekolah.',
                'file' => 'upacara.jpg',
                'kategori' => 'Foto',
                'tanggal' => '2026-07-20',
            ],
            [
                'id_galeri' => Str::uuid(),
                'judul' => 'Kegiatan Class Meeting',
                'keterangan' => 'Kegiatan class meeting setelah pelaksanaan ujian sekolah.',
                'file' => 'class-meeting.jpg',
                'kategori' => 'Foto',
                'tanggal' => '2026-08-15',
            ],
            [
                'id_galeri' => Str::uuid(),
                'judul' => 'Lomba Futsal Antar Kelas',
                'keterangan' => 'Dokumentasi pertandingan futsal antar kelas di lingkungan sekolah.',
                'file' => 'futsal.jpg',
                'kategori' => 'Foto',
                'tanggal' => '2026-08-20',
            ],
            [
                'id_galeri' => Str::uuid(),
                'judul' => 'Pentas Seni Sekolah',
                'keterangan' => 'Kegiatan pentas seni yang menampilkan kreativitas dan bakat siswa.',
                'file' => 'pentas-seni.jpg',
                'kategori' => 'Foto',
                'tanggal' => '2026-09-05',
            ],
            [
                'id_galeri' => Str::uuid(),
                'judul' => 'Kegiatan Pramuka',
                'keterangan' => 'Kegiatan latihan dan pembinaan anggota Pramuka SMPN 1 Puspahiang.',
                'file' => 'pramuka.jpg',
                'kategori' => 'Foto',
                'tanggal' => '2026-09-10',
            ],
        ];

        foreach ($galeris as $galeri) {
            Galeri::create($galeri);
        }
    }
}
