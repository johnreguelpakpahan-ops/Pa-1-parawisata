@extends('layouts.admin')

@section('title', 'Tambah Galeri')

@section('content')

<div class="d-flex align-items-center mb-3">
    <a href="{{ route('admin.galeri.index') }}" class="btn btn-sm btn-secondary me-2">
        <i class="fas fa-arrow-left"></i>
    </a>
    <h5 class="mb-0">Tambah Galeri</h5>
</div>

<div class="form-card">
    <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">

            {{-- JUDUL --}}
            <div class="col-md-6 mb-3">
                <label class="form-label">Judul</label>
                <input type="text"
                       name="judul"
                       class="form-control"
                       value="{{ old('judul') }}"
                       required>
            </div>

            {{-- jenis (ENUM VERSION FIX) --}}
            <div class="col-md-6 mb-3">
                <label class="form-label">jenis</label>

                <select name="jenis" class="form-select" required>
    <option value="">Pilih jenis</option>

    <option value="balige" {{ old('jenis') == 'balige' ? 'selected' : '' }}>Balige</option>
    <option value="meat" {{ old('jenis') == 'meat' ? 'selected' : '' }}>Meat</option>
    <option value="batu_bahisan" {{ old('jenis') == 'batu_bahisan' ? 'selected' : '' }}>Batu Bahisan</option>
</select>

            </div>

            {{-- DESKRIPSI --}}
            <div class="col-12 mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi"
                          class="form-control"
                          rows="3"
                          required>{{ old('deskripsi') }}</textarea>
            </div>

            {{-- GAMBAR --}}
            <div class="col-md-6 mb-3">
                <label class="form-label">Gambar</label>
                <input type="file"
                       name="gambar"
                       class="form-control"
                       accept="image/*"
                       required>
                <small class="text-muted">Format: JPG, PNG (max 2MB)</small>
            </div>

            {{-- STATUS --}}
            <div class="col-md-6 mb-3">
                <div class="form-check mt-4">
                    <input class="form-check-input"
                           type="checkbox"
                           name="status"
                           value="1"
                           checked>

                    <label class="form-check-label">
                        Aktifkan
                    </label>
                </div>
            </div>

        </div>

        <hr>

        <button type="submit" class="btn btn-primary">
            Simpan
        </button>

        <a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary">
            Batal
        </a>

    </form>
</div>

@endsection