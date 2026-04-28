<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Berita;

class HomeController extends Controller
{
    public function index()
    {
        $galeri = Galeri::where('status', true)
            ->latest()
            ->take(6)
            ->get();

        // FIX: hapus with('kategori') karena pakai ENUM
        $berita = Berita::where('status', true)
            ->latest()
            ->take(3)
            ->get();

        $destinasi = [
            (object)[
                'slug' => 'meat',
                'nama' => 'Meat',
                'gambar' => '/image/meat/thumbnail.jpg',
                'deskripsi' => 'Desa adat dengan makam Raja Hunsa dan budaya Batak'
            ],
            (object)[
                'slug' => 'batu-bahisan',
                'nama' => 'Batu Bahisan',
                'gambar' => '/image/batu-bahisan/thumbnail.jpg',
                'deskripsi' => 'Formasi batuan unik dengan spot foto Instagramable'
            ],
            (object)[
                'slug' => 'liang-sipege',
                'nama' => 'Liang Sipege',
                'gambar' => '/image/liang-sipege/thumbnail.jpg',
                'deskripsi' => 'Goa alami dengan stalaktit dan stalakmit'
            ]
        ];

        return view('pages.home', compact('galeri', 'berita', 'destinasi'));
    }
}