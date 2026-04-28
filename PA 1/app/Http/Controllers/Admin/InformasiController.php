<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InformasiController extends Controller
{
    public function index()
    {
        $informasi = Informasi::latest()->paginate(10);
        return view('admin.informasi.index', compact('informasi'));
    }

    public function create()
    {
        return view('admin.informasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'konten' => 'required',
            'jenis' => 'required|in:Geologi,Budaya,Sejarah,UMKM,Transportasi',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = [
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'konten' => $request->konten,
            'jenis' => $request->jenis,
            'penulis' => $request->penulis ?? 'Admin',
            'status' => $request->has('status') ? 1 : 0,
            'views' => 0,
            'user_id' => 1,
        ];

        // upload gambar
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $namaGambar = time() . '_' . Str::slug($request->judul) . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('uploads/informasi'), $namaGambar);
            $data['gambar'] = 'uploads/informasi/' . $namaGambar;
        }

        Informasi::create($data);

        return redirect()->route('admin.informasi.index')
            ->with('success', 'Informasi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $informasi = Informasi::findOrFail($id);
        return view('admin.informasi.edit', compact('informasi'));
    }

    public function update(Request $request, $id)
    {
        $informasi = Informasi::findOrFail($id);

        $request->validate([
            'judul' => 'required',
            'konten' => 'required',
            'jenis' => 'required|in:Geologi,Budaya,Sejarah,UMKM,Transportasi',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = [
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'konten' => $request->konten,
            'jenis' => $request->jenis,
            'penulis' => $request->penulis ?? 'Admin',
            'status' => $request->has('status') ? 1 : 0,
        ];

        if ($request->hasFile('gambar')) {
            if ($informasi->gambar && file_exists(public_path($informasi->gambar))) {
                unlink(public_path($informasi->gambar));
            }

            $gambar = $request->file('gambar');
            $namaGambar = time() . '_' . Str::slug($request->judul) . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('uploads/informasi'), $namaGambar);

            $data['gambar'] = 'uploads/informasi/' . $namaGambar;
        }

        $informasi->update($data);

        return redirect()->route('admin.informasi.index')
            ->with('success', 'Informasi berhasil diupdate!');
    }

    public function destroy($id)
    {
        $informasi = Informasi::findOrFail($id);

        if ($informasi->gambar && file_exists(public_path($informasi->gambar))) {
            unlink(public_path($informasi->gambar));
        }

        $informasi->delete();

        return redirect()->route('admin.informasi.index')
            ->with('success', 'Informasi berhasil dihapus!');
    }
}