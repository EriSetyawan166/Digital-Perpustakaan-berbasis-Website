<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku';
    protected $fillable = [
        'judul', 
        'pengguna_id',
        'kategori_id',
        'deskripsi',
        'jumlah',
        'file_path',
        'cover_image_path',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(KategoriBuku::class);
    }
}
