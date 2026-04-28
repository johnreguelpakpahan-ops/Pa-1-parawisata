<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    
   protected $table = 'berita';

protected $fillable = [
    'judul',
    'slug', // ✅ TAMBAH INI
    'konten',
    'gambar',
    'kategori',
    'penulis',
    'tanggal_terbit',
    'status',
];
    
    protected $casts = [
        'tanggal_terbit' => 'date',
        'status' => 'boolean'
    ];
    
public function user()
{
    return $this->belongsTo(User::class);
}
}