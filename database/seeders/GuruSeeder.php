<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class GuruSeeder extends Seeder
{
    public function run(): void
    {
        $gurus = [
            [
                'id_guru' => Str::uuid(),
                'nama_guru' => 'Aulia Rahmawati, S.Pd.',
                'nip' => '198705122010012001',
                'mapel' => 'Matematika',
                'jabatan' => 'Guru Mapel',
                'foto' => null,
            ],
            [
                'id_guru' => Str::uuid(),
                'nama_guru' => 'Dimas Pratama, S.Pd.',
                'nip' => '199003152015031002',
                'mapel' => 'Bahasa Indonesia',
                'jabatan' => 'Guru Mapel',
                'foto' => null,
            ],
            [
                'id_guru' => Str::uuid(),
                'nama_guru' => 'Siti Nurhaliza, S.Pd.',
                'nip' => '198912202014022003',
                'mapel' => 'Bahasa Inggris',
                'jabatan' => 'Guru Mapel',
                'foto' => null,
            ],
            [
                'id_guru' => Str::uuid(),
                'nama_guru' => 'Rizky Maulana, S.Kom.',
                'nip' => '199105182016041004',
                'mapel' => 'Informatika',
                'jabatan' => 'Guru Mapel',
                'foto' => null,
            ],
            [
                'id_guru' => Str::uuid(),
                'nama_guru' => 'Nadia Permatasari, S.Pd.',
                'nip' => '199208102018062005',
                'mapel' => 'IPA',
                'jabatan' => 'Guru Mapel',
                'foto' => null,
            ],
            [
                'id_guru' => Str::uuid(),
                'nama_guru' => 'Fajar Hidayat, S.Pd.',
                'nip' => '198811252013011006',
                'mapel' => 'Pendidikan Jasmani',
                'jabatan' => 'Guru Mapel',
                'foto' => null,
            ],
            [
                'id_guru' => Str::uuid(),
                'nama_guru' => 'Rina Marlina, S.Pd.',
                'nip' => '198906142014032007',
                'mapel' => 'IPS',
                'jabatan' => 'Guru Mapel',
                'foto' => null,
            ],
            [
                'id_guru' => Str::uuid(),
                'nama_guru' => 'Agus Setiawan, S.Pd.',
                'nip' => '198710202012011008',
                'mapel' => 'Pendidikan Pancasila',
                'jabatan' => 'Guru Mapel',
                'foto' => null,
            ],
            [
                'id_guru' => Str::uuid(),
                'nama_guru' => 'Dewi Anggraini, S.Pd.',
                'nip' => '199104252016042009',
                'mapel' => 'Seni Budaya',
                'jabatan' => 'Guru Mapel',
                'foto' => null,
            ],
            [
                'id_guru' => Str::uuid(),
                'nama_guru' => 'Andi Firmansyah, S.Pd.',
                'nip' => '198808152013021010',
                'mapel' => 'Pendidikan Agama Islam',
                'jabatan' => 'Guru Mapel',
                'foto' => null,
            ],
        ];

        foreach ($gurus as $guru) {
            Guru::create($guru);
        }
    }
}
