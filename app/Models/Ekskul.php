<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ekskul extends Model
{
    use HasFactory;
    use HasUuids;
    protected $keyType = 'string';
    protected $primaryKey = 'id_ekskul';
    public $incrementing = false;
    protected $table = 'ekskul';
    protected $fillable = [
        'nama_eskul',
        'nama_pembina',
        'jadwal_latihan',
        'deskripsi',
        'gambar',
    ];
}
