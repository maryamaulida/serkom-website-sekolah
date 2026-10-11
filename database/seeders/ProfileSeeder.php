<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profile;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Profile::create([
            'nama_sekolah' => 'SMP Negeri 1 Puspahiang',
            'kepala_sekolah' => 'Anjani Seira',
            'alamat' => 'Puspahiang, Kabupaten Tasikmalaya, Jawa Barat',
            'visi' => 'Mewujudkan siswa yang berkarakter, unggul, dan berprestasi.',
            'misi' => 'Meningkatkan kualitas pendidikan, kedisiplinan, dan kreativitas siswa.',
            'deskripsi' => 'SMP Negeri 1 Puspahiang merupakan sekolah yang mengutamakan pendidikan berkualitas dan pembentukan karakter siswa.',
            'tahun_berdiri' => 1985,
            'foto' => 'foto.png',
            'logo' => 'logo.png',
            'npsn' => '20210701',
        ]);
    }
}
