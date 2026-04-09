<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    public function getFotoUrlAttribute()
    {
        if ($this->foto) {
            if (file_exists(public_path($this->foto))) {
                return asset($this->foto);
            }

            if (file_exists(public_path('storage/' . $this->foto))) {
                return asset('storage/' . $this->foto);
            }
        }

        return asset('images/default.jpg');
    }

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }
}
