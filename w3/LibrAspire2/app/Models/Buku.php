<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Buku extends Model
{
    protected $table = 'buku';
    public $timestamps = true;

    protected $fillable = [
        'judul',
        'isbn',
        'kategori_id',
        'pengarang',
        'penerbit',
        'tahun_terbit',
        'stok',
        'sinopsis',
        'cover'
    ];

    
    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}

