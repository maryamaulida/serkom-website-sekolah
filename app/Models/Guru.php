<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    /** @use HasFactory<\Database\Factories\GuruFactory> */
    use HasFactory;
    use HasUuids;
    protected $keyType = 'string';
    protected $primaryKey = 'id_guru';
    public $incrementing = false;
    protected $table = 'guru';
    protected $fillable = [
        'nama_guru',
        'nip',
        'mapel',
        'jabatan',
        'foto',
    ];
}
