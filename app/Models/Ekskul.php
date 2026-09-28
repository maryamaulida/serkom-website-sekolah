<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ekskul extends Model
{
    protected $fillable = [
        'nama_eskul',
        'nama_pembina',
        'jadwal_latihan',
        'deskripsi',
        'gambar',
    ];
}
