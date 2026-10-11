<?php

namespace App\Imports;

use App\Models\Siswa;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Lewati baris yang tidak memiliki data wajib
        if (
            empty($row['nama']) ||
            empty($row['nisn']) ||
            empty($row['jenis_kelamin']) ||
            empty($row['tahun_masuk'])
        ) {
            return null;
        }

        return new Siswa([
            'nama' => $row['nama'],
            'nisn' => (string) $row['nisn'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'tahun_masuk' => $row['tahun_masuk'],
            'foto' => null,
        ]);
    }
}
