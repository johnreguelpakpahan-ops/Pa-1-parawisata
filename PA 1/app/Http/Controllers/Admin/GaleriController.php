<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        $galeri = Galeri::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.galeri.index', compact('galeri'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'destinasi' => 'required|in:balige,meat,batu_bahisan',
            'deskripsi' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'lokasi' => 'nullable|string',
            'tanggal_foto' => 'nullable|date',
            'status' => 'nullable|boolean',
        ]);

        // upload gambar
        $gambar = $request->file('gambar');
        $filename = time() . '_' . Str::slug($request->judul) . '.' . $gambar->getClientOriginalExtension();
        $path = $gambar->storeAs('galeri', $filename, 'public');

        $tanggal_foto = $request->tanggal_foto
            ? Carbon::parse($request->tanggal_foto)->format('Y-m-d')
            : null;

        Galeri::create([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'destinasi' => $request->destinasi,
            'deskripsi' => $request->deskripsi,
            'gambar' => 'storage/' . $path,
            'lokasi' => $request->lokasi,
            'tanggal_foto' => $tanggal_foto,
            'status' => $request->has('status') ? 1 : 0,
            'views' => 0,
            'user_id' => 1,
        ]);

        return redirect()->route('admin.galeri.index')
            ->with('success', 'Galeri berhasil ditambahkan');
    }

    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('admin.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, $id)
    {
        $galeri = Galeri::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'destinasi' => 'required|in:balige,meat,batu_bahisan',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'lokasi' => 'nullable|string',
            'tanggal_foto' => 'nullable|date',
            'status' => 'nullable|boolean',
        ]);

        $data = [
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'destinasi' => $request->destinasi,
            'deskripsi' => $request->deskripsi,
            'lokasi' => $request->lokasi,
            'tanggal_foto' => $request->tanggal_foto
                ? Carbon::parse($request->tanggal_foto)->format('Y-m-d')
                : null,
            'status' => $request->has('status') ? 1 : 0,
        ];

        // jika ada gambar baru
        if ($request->hasFile('gambar')) {

            // hapus gambar lama
            $oldPath = str_replace('storage/', 'public/', $galeri->gambar);
            if (Storage::exists($oldPath)) {
                Storage::delete($oldPath);
            }

            // upload baru
            $gambar = $request->file('gambar');
            $filename = time() . '_' . Str::slug($request->judul) . '.' . $gambar->getClientOriginalExtension();
            $path = $gambar->storeAs('galeri', $filename, 'public');

            $data['gambar'] = 'storage/' . $path;
        }

        $galeri->update($data);

        return redirect()->route('admin.galeri.index')
            ->with('success', 'Galeri berhasil diupdate');
    }

    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);

        // hapus file gambar
        $gambarPath = str_replace('storage/', 'public/', $galeri->gambar);
        if (Storage::exists($gambarPath)) {
            Storage::delete($gambarPath);
        }

        $galeri->delete();

        return redirect()->route('admin.galeri.index')
            ->with('success', 'Galeri berhasil dihapus');
    }
}