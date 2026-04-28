<?php

namespace Database\Seeders;

use App\Models\Informasi;
use Illuminate\Database\Seeder;


class InformasiSeeder extends Seeder
{
    public function run()
    {
        $informasi = [
    [
        'judul' => 'Sejarah Danau Toba',
        'slug' => 'sejarah-danau-toba',
        'konten' => '<p>Danau Toba terbentuk dari letusan supervolcano...</p>',
        'gambar' => '/image/toba.jpg',
        'jenis' => 'Geologi',
        'penulis' => 'Admin GeoToba',
        'status' => true,
        'views' => 0,
        'user_id' => 1,
    ],
    [
        'judul' => 'Budaya Batak Toba',
        'slug' => 'budaya-batak-toba',
        'konten' => '<p>Masyarakat Batak Toba memiliki kekayaan budaya...</p>',
        'gambar' => '/image/meat.jpg',
        'jenis' => 'Budaya',
        'penulis' => 'Admin GeoToba',
        'status' => true,
        'views' => 0,
        'user_id' => 1,
    ],
    [
        'judul' => 'Transportasi Menuju Danau Toba',
        'slug' => 'transportasi-danau-toba',
        'konten' => '<p>Danau Toba dapat diakses melalui Bandara Silangit...</p>',
        'gambar' => null,
        'jenis' => 'Transportasi',
        'penulis' => 'Admin GeoToba',
        'status' => true,
        'views' => 0,
        'user_id' => 1,
    ],
];

        foreach ($informasi as $item) {
            Informasi::create($item);
        }
    }
}