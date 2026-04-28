<?php

namespace Database\Seeders;

use App\Models\Berita;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BeritaSeeder extends Seeder
{
    public function run()
    {
        $berita = [
            [
                'judul' => 'Festival Danau Toba 2024 Siap Digelar',
                'konten' => '<p>Festival Danau Toba tahun 2024 akan digelar pada bulan Juni mendatang...</p>',
                'gambar' => '/image/toba.jpg',
                'kategori' => 'event',
                'penulis' => 'Admin GeoToba',
                'user_id' => 1,
                'tanggal_terbit' => now(),
                'status' => true,
                'views' => 0,
                'komentar' => 0
            ],
            [
                'judul' => 'Geopark Danau Toba Resmi Diakui UNESCO',
                'konten' => '<p>UNESCO secara resmi mengakui Danau Toba sebagai Global Geopark...</p>',
                'gambar' => '/image/balige.jpg',
                'kategori' => 'prestasi',
                'penulis' => 'Admin GeoToba',
                'user_id' => 1,
                'tanggal_terbit' => now(),
                'status' => true,
                'views' => 0,
                'komentar' => 0
            ],
            [
                'judul' => 'Pembukaan Jalur Tracking Baru di Batu Bahisan',
                'konten' => '<p>Jalur tracking baru dibuka untuk wisatawan...</p>',
                'gambar' => '/image/batu.jpg',
                'kategori' => 'infrastruktur',
                'penulis' => 'Admin GeoToba',
                'user_id' => 1,
                'tanggal_terbit' => now(),
                'status' => true,
                'views' => 0,
                'komentar' => 0
            ],
        ];

        foreach ($berita as $item) {

            $item['slug'] = Str::slug($item['judul']);

            Berita::create($item);
        }
    }
}