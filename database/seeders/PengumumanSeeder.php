<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pengumuman;
use Illuminate\Support\Str;
use App\Models\User;

class PengumumanSeeder extends Seeder
{
    public function run(): void
    {
        $idUser = User::firstOrFail()->id_user;

        Pengumuman::create([
            'id_pengumuman' => Str::uuid(),
            'judul' => 'Jadwal Pembagian Kartu Ujian Tengah Semester',
            'isi' => 'Pembagian kartu Ujian Tengah Semester Ganjil Tahun Ajaran 2026/2027 akan dilaksanakan sesuai jadwal yang telah ditentukan oleh sekolah.',
            'tanggal' => '2026-10-10',
            'status' => 'Publish',
            'id_user' => $idUser,
        ]);

        Pengumuman::create([
            'id_pengumuman' => Str::uuid(),
            'judul' => 'Jadwal Pelaksanaan Ujian Tengah Semester',
            'isi' => 'Ujian Tengah Semester Ganjil akan dilaksanakan oleh seluruh siswa SMPN 1 Puspahiang sesuai jadwal akademik yang telah ditetapkan.',
            'tanggal' => '2026-10-13',
            'status' => 'Publish',
            'id_user' => $idUser,
        ]);

        Pengumuman::create([
            'id_pengumuman' => Str::uuid(),
            'judul' => 'Kegiatan Upacara Bendera',
            'isi' => 'Seluruh siswa dan guru diharapkan mengikuti kegiatan upacara bendera di lapangan sekolah pada hari Senin dengan tertib dan khidmat.',
            'tanggal' => '2026-10-12',
            'status' => 'Publish',
            'id_user' => $idUser,
        ]);

        Pengumuman::create([
            'id_pengumuman' => Str::uuid(),
            'judul' => 'Informasi Libur Sekolah',
            'isi' => 'Sekolah menyampaikan informasi mengenai jadwal libur dan kegiatan pembelajaran. Siswa diharapkan memperhatikan kalender akademik yang telah dibagikan.',
            'tanggal' => '2026-10-15',
            'status' => 'Publish',
            'id_user' => $idUser,
        ]);

        Pengumuman::create([
            'id_pengumuman' => Str::uuid(),
            'judul' => 'Rapat Orang Tua dan Wali Siswa',
            'isi' => 'SMPN 1 Puspahiang akan mengadakan pertemuan bersama orang tua dan wali siswa untuk membahas perkembangan belajar serta kegiatan pendidikan di sekolah.',
            'tanggal' => '2026-10-17',
            'status' => 'Publish',
            'id_user' => $idUser,
        ]);
    }
}
