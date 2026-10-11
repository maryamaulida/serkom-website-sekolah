<?php

namespace App\Models;

use App\Models\Berita;
use App\Models\Pengumuman;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $keyType = 'string';

    protected $primaryKey = 'id_user';

    protected $table = 'user';

    public $incrementing = false;

    protected $fillable = [
        'id_user',
        'name',
        'username',
        'password',
        'role',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    // =========================
    // RELASI BERITA
    // =========================
    public function berita()
    {
        return $this->hasMany(
            Berita::class,
            'id_user',
            'id_user'
        );
    }


    // =========================
    // RELASI PENGUMUMAN
    // =========================
    public function pengumuman()
    {
        return $this->hasMany(
            Pengumuman::class,
            'id_user',
            'id_user'
        );
    }
}
