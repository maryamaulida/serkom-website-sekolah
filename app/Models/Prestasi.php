<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prestasi extends Model
{
    use HasFactory;
    use HasUuids;
    protected $keyType = 'string';
    protected $primaryKey = 'id_prestasi';
    public $incrementing = false;
    protected $table = 'prestasi';

    protected $fillable = [
        'nama_prestasi',
        'deskripsi',
        'foto',
        'tahun_ajaran',
    ];
}
