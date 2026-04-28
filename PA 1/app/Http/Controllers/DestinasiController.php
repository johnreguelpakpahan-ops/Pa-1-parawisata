<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

class DestinasiController extends Controller
{
    public function index()
    {
        return view('destinasi.index');
    }

    private function getDestinasi()
    {
        return [
            'Alam' => [
                'deskripsi' => 'Destinasi wisata alam yang menampilkan keindahan geologi, pegunungan, air terjun, dan keunikan alam Danau Toba.',
                'data' => [
                    [
                        'id' => 1,
                        'nama' => 'Liang Sipege',
                        'lokasi' => 'Pulau Sibandang, Danau Toba',
                        'deskripsi' => 'Goa alami dengan stalaktit dan stalakmit yang indah.',
                        'gambar' => '/image/liang-sipege/hero.jpg',
                        'tags' => ['Goa', 'Geologi', 'Stalaktit'],
                        'url' => '/geosite/liang-sipege'
                    ],
                    [
                        'id' => 2,
                        'nama' => 'Batu Bahisan',
                        'lokasi' => 'Pulau Sibandang, Danau Toba',
                        'deskripsi' => 'Formasi batuan unik hasil erosi ribuan tahun.',
                        'gambar' => '/image/batu-bahisan/hero.jpg',
                        'tags' => ['Batuan', 'Sunrise', 'Fotografi'],
                        'url' => '/geosite/batu-bahisan'
                    ],
                ]
            ],

            'Buatan' => [
                'deskripsi' => 'Destinasi wisata buatan manusia di kawasan Danau Toba.',
                'data' => [
                    [
                        'id' => 1,
                        'nama' => 'Patung Yesus Memberkati',
                        'lokasi' => 'Balige',
                        'deskripsi' => 'Patung ikonik dengan pemandangan Danau Toba.',
                        'gambar' => '/image/destinasi/patung-yesus.jpg',
                        'tags' => ['Ikon', 'Religi'],
                        'url' => '/destinasi/patung-yesus'
                    ]
                ]
            ],

            'Budaya' => [
                'deskripsi' => 'Wisata budaya Batak Toba.',
                'data' => [
                    [
                        'id' => 1,
                        'nama' => 'Meat Village',
                        'lokasi' => 'Pulau Sibandang',
                        'deskripsi' => 'Desa adat Batak dengan budaya tradisional.',
                        'gambar' => '/image/meat/hero.jpg',
                        'tags' => ['Budaya', 'Adat', 'Ulos'],
                        'url' => '/geosite/meat'
                    ]
                ]
            ],
        ];
    }

    public function alam()
    {
        $data = $this->getDestinasi()['Alam'];
        return view('destinasi.kategori', [
            'kategori' => 'Alam',
            'deskripsi' => $data['deskripsi'],
            'destinasi' => $data['data']
        ]);
    }

    public function buatan()
    {
        $data = $this->getDestinasi()['Buatan'];
        return view('destinasi.kategori', [
            'kategori' => 'Buatan',
            'deskripsi' => $data['deskripsi'],
            'destinasi' => $data['data']
        ]);
    }

    public function budaya()
    {
        $data = $this->getDestinasi()['Budaya'];
        return view('destinasi.kategori', [
            'kategori' => 'Budaya',
            'deskripsi' => $data['deskripsi'],
            'destinasi' => $data['data']
        ]);
    }
}