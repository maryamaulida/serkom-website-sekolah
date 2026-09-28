<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /** @use HasFactory<\Database\Factories\ProfileFactory> */
    use HasFactory;
    use HasUuids;
    protected $keyType = 'string';
    protected $primaryKey = 'id_profile';
    protected $table = 'profile';
    protected $fillable = [
        'nama_sekolah',
        'kepala_Sekolah',
        'foto',
        'logo',
        'npsn',
        'alamat',
        'visi',
        'misi',
        'tahun_berdiri',
        'deskripsi',
    ];
}
