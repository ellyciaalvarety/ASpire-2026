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
        'stock',
        'sinopsis',
        'cover'
    ];

    public function getCoverUrlAttribute()
    {
        if (!$this->cover) {
            return null;
        }

        $coverName = basename($this->cover);
        $publicImagePath = public_path('images/' . $coverName);
        if (file_exists($publicImagePath)) {
            return asset('images/' . $coverName);
        }

        $publicCoverPath = public_path($this->cover);
        if (file_exists($publicCoverPath)) {
            return asset($this->cover);
        }

        $storageCoverPath = public_path('storage/' . $this->cover);
        if (file_exists($storageCoverPath)) {
            return asset('storage/' . $this->cover);
        }

        return null;
    }
    
    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}

