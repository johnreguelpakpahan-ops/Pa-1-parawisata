<?php

namespace Database\Seeders;

use App\Models\Galeri;
use Illuminate\Database\Seeder;

class GaleriSeeder extends Seeder
{
    public function run()
    {
        $galeri = [
    [
        'judul' => 'Pemandangan Danau Toba',
        'slug' => 'pemandangan-danau-toba',
        'deskripsi' => 'Keindahan Danau Toba dari atas Bukit Holbung dengan pemandangan yang memukau',
        'gambar' => '/image/toba.jpg',
        'destinasi' => 'balige',
        'lokasi' => 'Balige, Toba Samosir',
        'status' => true,
        'views' => 0,
        'user_id' => 1,
        'tanggal_foto' => null
    ],
    [
        'judul' => 'Rumah Adat Batak',
        'slug' => 'rumah-adat-batak',
        'deskripsi' => 'Arsitektur tradisional rumah adat Batak Toba yang masih terjaga',
        'gambar' => '/image/meat.jpg',
        'destinasi' => 'meat',
        'lokasi' => 'Desa Meat, Toba Samosir',
        'status' => true,
        'views' => 0,
        'user_id' => 1,
        'tanggal_foto' => null
    ],
    [
        'judul' => 'Batu Bahisan',
        'slug' => 'batu-bahisan',
        'deskripsi' => 'Formasi batuan unik hasil proses geologi jutaan tahun',
        'gambar' => '/image/batu.jpg',
        'destinasi' => 'batu_bahisan',
        'lokasi' => 'Samosir',
        'status' => true,
        'views' => 0,
        'user_id' => 1,
        'tanggal_foto' => null
    ],
    [
        'judul' => 'Liang Sipege',
        'slug' => 'liang-sipege',
        'deskripsi' => 'Goa alami dengan stalaktit dan stalakmit yang indah',
        'gambar' => '/image/liang.jpg',
        'destinasi' => 'batu_bahisan',
        'lokasi' => 'Samosir',
        'status' => true,
        'views' => 0,
        'user_id' => 1,
        'tanggal_foto' => null
    ],
];

        foreach ($galeri as $item) {
            Galeri::create($item);
        }
    }
}