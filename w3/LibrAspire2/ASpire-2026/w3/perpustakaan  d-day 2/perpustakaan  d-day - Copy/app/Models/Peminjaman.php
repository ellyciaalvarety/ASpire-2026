<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


use App\Models\User; 
use App\Models\Buku;

class Peminjaman extends Model
{
 

    protected $table = 'peminjaman';
    

    public $timestamps = false;

    protected $fillable = [
        'tanggal_pinjam',
        'tanggal_kembali',
        'status',
        'user_id',
        'buku_id'
    ];

  
    protected $casts = [
        'tanggal_pinjam' => 'date',
        'tanggal_kembali' => 'date',
    ];

   
    public function user(): BelongsTo
    {
    
        return $this->belongsTo(User::class);
    }

    public function buku(): BelongsTo
    {
 
        return $this->belongsTo(Buku::class);
    }
}