<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'berita';

    protected $primaryKey = 'id_berita';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'id_berita',
        'judul',
        'isi',
        'slug',
        'tanggal',
        'gambar',
        'status',
        'id_user',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}
