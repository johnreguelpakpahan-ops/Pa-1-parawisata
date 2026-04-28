@extends('layouts.admin')

@section('title', 'Edit Berita')

@section('content')

<div class="card">
    <div class="card-header">
        <h5>Edit Berita</h5>
    </div>

    <div class="card-body">

        {{-- ERROR VALIDATION --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- JUDUL --}}
            <div class="mb-3">
                <label>Judul</label>
                <input type="text" name="judul" class="form-control" value="{{ $berita->judul }}" required>
            </div>

            {{-- ENUM KATEGORI --}}
            <div class="mb-3">
                <label>Kategori</label>
                <select name="kategori" class="form-control" required>
                    <option value="event" {{ $berita->kategori == 'event' ? 'selected' : '' }}>Event</option>
                    <option value="prestasi" {{ $berita->kategori == 'prestasi' ? 'selected' : '' }}>Prestasi</option>
                    <option value="infrastruktur" {{ $berita->kategori == 'infrastruktur' ? 'selected' : '' }}>Infrastruktur</option>
                    <option value="edukasi" {{ $berita->kategori == 'edukasi' ? 'selected' : '' }}>Edukasi</option>
                    <option value="promosi" {{ $berita->kategori == 'promosi' ? 'selected' : '' }}>Promosi</option>
                </select>
            </div>

            {{-- PENULIS --}}
            <div class="mb-3">
                <label>Penulis</label>
                <input type="text" name="penulis" class="form-control" value="{{ $berita->penulis }}">
            </div>

            {{-- TANGGAL TERBIT --}}
            <div class="mb-3">
                <label>Tanggal Terbit</label>
                <input type="date" name="tanggal_terbit" class="form-control"
                       value="{{ \Carbon\Carbon::parse($berita->tanggal_terbit)->format('Y-m-d') }}" required>
            </div>

            {{-- KONTEN --}}
            <div class="mb-3">
                <label>Konten</label>
                <textarea name="konten" class="form-control" rows="8" required>{{ $berita->konten }}</textarea>
            </div>

            {{-- GAMBAR --}}
            <div class="mb-3">
                <label>Gambar Saat Ini</label><br>

                @if($berita->gambar)
                    <img src="{{ asset($berita->gambar) }}" width="120" class="mb-2">
                @endif

                <input type="file" name="gambar" class="form-control" accept="image/*">
            </div>

            {{-- STATUS --}}
            <div class="mb-3 form-check">
                <input type="hidden" name="status" value="0">
                <input class="form-check-input" type="checkbox" name="status" value="1"
                       {{ $berita->status ? 'checked' : '' }}>
                <label class="form-check-label">Publish</label>
            </div>

            {{-- BUTTON --}}
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">Batal</a>

        </form>
    </div>
</div>

@endsection