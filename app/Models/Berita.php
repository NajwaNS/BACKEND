<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    // Nama tabel, jika menggunakan nama berbeda dari default (dalam hal ini tidak perlu karena otomatis sesuai)
    protected $table = 'beritas';

    // Kolom yang boleh diisi massal (mass assignable)
    protected $fillable = [
        'title',
        'author',
        'description',
        'content',
        'url',
        'url_image',
        'published_at',
        'category'
    ];

    // Jika ingin custom tanggal format, tambahkan ini:
    protected $dates = ['published_at'];
}

