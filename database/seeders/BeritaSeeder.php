<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Berita;
use App\Models\User;

use Illuminate\Support\Str;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        $idUser = User::firstOrFail()->id_user;

        Berita::create([
            'id_berita' => Str::uuid(),
            'judul' => 'Pelaksanaan ANBK Berjalan Lancar',
            'slug' => 'pelaksanaan-anbk-berjalan-lancar',
            'isi' => 'Seluruh siswa mengikuti kegiatan Asesmen Nasional Berbasis Komputer (ANBK) dengan tertib dan lancar. Kegiatan ini dilaksanakan untuk mengevaluasi kualitas pembelajaran serta meningkatkan mutu pendidikan di sekolah.',
            'tanggal' => '2026-10-05',
            'gambar' => null,
            'status' => 'Publish',
            'id_user' => $idUser,
        ]);

        Berita::create([
            'id_berita' => Str::uuid(),
            'judul' => 'Siswa Raih Prestasi Membanggakan',
            'slug' => 'siswa-raih-prestasi-membanggakan',
            'isi' => 'Sejumlah siswa berhasil meraih prestasi membanggakan dalam perlombaan akademik. Prestasi tersebut menjadi hasil dari kerja keras, semangat belajar, serta dukungan para guru dan orang tua.',
            'tanggal' => '2026-10-03',
            'gambar' => null,
            'status' => 'Publish',
            'id_user' => $idUser,
        ]);

        Berita::create([
            'id_berita' => Str::uuid(),
            'judul' => 'Peringatan Hari Sumpah Pemuda',
            'slug' => 'peringatan-hari-sumpah-pemuda',
            'isi' => 'Sekolah mengadakan kegiatan peringatan Hari Sumpah Pemuda yang diikuti oleh siswa dan guru. Kegiatan ini bertujuan menumbuhkan rasa cinta tanah air, persatuan, dan semangat kebangsaan di kalangan generasi muda.',
            'tanggal' => '2026-10-01',
            'gambar' => null,
            'status' => 'Publish',
            'id_user' => $idUser,
        ]);

        Berita::create([
            'id_berita' => Str::uuid(),
            'judul' => 'Informasi Penerimaan Peserta Didik Baru',
            'slug' => 'informasi-penerimaan-peserta-didik-baru',
            'isi' => 'Penerimaan peserta didik baru untuk tahun ajaran mendatang akan segera dibuka. Calon peserta didik dan orang tua diharapkan mempersiapkan dokumen yang diperlukan serta mengikuti informasi pendaftaran melalui saluran resmi sekolah.',
            'tanggal' => '2026-09-28',
            'gambar' => null,
            'status' => 'Publish',
            'id_user' => $idUser,
        ]);

        Berita::create([
            'id_berita' => Str::uuid(),
            'judul' => 'Kegiatan Ekstrakurikuler Kembangkan Bakat Siswa',
            'slug' => 'kegiatan-ekstrakurikuler-kembangkan-bakat-siswa',
            'isi' => 'Kegiatan ekstrakurikuler kembali dilaksanakan untuk memberikan kesempatan kepada siswa dalam mengembangkan minat dan bakat. Berbagai kegiatan tersedia untuk melatih kreativitas, kerja sama, dan rasa percaya diri.',
            'tanggal' => '2026-09-25',
            'gambar' => null,
            'status' => 'Publish',
            'id_user' => $idUser,
        ]);
    }
}
