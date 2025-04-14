<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'bukus'; // Pastikan nama tabel sesuai dengan yang ada di database
    protected $fillable = [
        'judul',
        'tahun_terbit',
        'penulis',
        'deskripsi',
    ];
}
