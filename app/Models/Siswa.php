<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    /** @use HasFactory<\Database\Factories\SiswaFactory> */
    use HasFactory;
    use HasUuids;
    protected $keyType = 'string';
    protected $primaryKey = 'id_siswa';
    public $incrementing = false;
    protected $table = 'siswa';

    protected $fillable = [
        'nisn',
        'nama',
        'jenis_kelamin',
        'tahun_masuk',
        'foto',
    ];
}
