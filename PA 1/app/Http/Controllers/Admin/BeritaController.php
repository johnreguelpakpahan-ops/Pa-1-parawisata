<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::latest()->paginate(10);
        return view('admin.berita.index', compact('berita'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'konten' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'kategori' => 'required',
            'tanggal_terbit' => 'required|date',
        ]);

        // Upload gambar
        $gambar = $request->file('gambar');
        $namaGambar = time() . '_' . $gambar->getClientOriginalName();
        $gambar->move(public_path('uploads/berita'), $namaGambar);

        // Simpan ke database
        Berita::create([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul), // ⚠️ pastikan kolom ada
            'konten' => $request->konten,
            'gambar' => 'uploads/berita/' . $namaGambar,
            'kategori' => $request->kategori,
            'penulis' => $request->penulis ?? 'Admin',
            'tanggal_terbit' => $request->tanggal_terbit,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $request->validate([
            'judul' => 'required',
            'konten' => 'required',
            'kategori' => 'required',
            'tanggal_terbit' => 'required|date',
        ]);

        $data = [
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul), // ⚠️ pastikan kolom ada
            'konten' => $request->konten,
            'kategori' => $request->kategori,
            'penulis' => $request->penulis ?? 'Admin',
            'tanggal_terbit' => $request->tanggal_terbit,
            'status' => $request->has('status') ? 1 : 0,
        ];

        // Jika upload gambar baru
        if ($request->hasFile('gambar')) {

            // Hapus gambar lama
            if ($berita->gambar && file_exists(public_path($berita->gambar))) {
                unlink(public_path($berita->gambar));
            }

            $gambar = $request->file('gambar');
            $namaGambar = time() . '_' . $gambar->getClientOriginalName();
            $gambar->move(public_path('uploads/berita'), $namaGambar);

            $data['gambar'] = 'uploads/berita/' . $namaGambar;
        }

        $berita->update($data);

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil diupdate!');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);

        // Hapus gambar
        if ($berita->gambar && file_exists(public_path($berita->gambar))) {
            unlink(public_path($berita->gambar));
        }

        $berita->delete();

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil dihapus!');
    }
}