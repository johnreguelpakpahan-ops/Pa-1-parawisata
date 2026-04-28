<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;


use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Berita;
use App\Models\Informasi;
use App\Models\Galeri;
class User extends Authenticatable
{
    
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public function galeri()
    {
        return $this->hasMany(Galeri::class);
    }

    public function informasi()
    {
        return $this->hasMany(Informasi::class);
    }

    public function berita()
    {
        return $this->hasMany(Berita::class);
    }
}
