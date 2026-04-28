@extends('layouts.admin')

@section('title', 'Edit Informasi')

@section('content')

<div class="card">
    <div class="card-header">
        <h5>Edit Informasi</h5>
    </div>

    <div class="card-body">

        <form action="{{ route('admin.informasi.update', $informasi->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            {{-- JUDUL --}}
            <div class="mb-3">
                <label>Judul</label>
                <input type="text"
                       name="judul"
                       class="form-control"
                       value="{{ old('judul', $informasi->judul) }}"
                       required>
            </div>

            {{-- KATEGORI (ENUM FIX) --}}
            <div class="mb-3">
                <label>Kategori</label>

              <select name="destinasi" class="form-control" required>

    @foreach(\App\Enums\KategoriInformasi::cases() as $kategori)
        <option value="{{ $kategori->value }}"
            {{ old('destinasi', $galeri->destinasi) == $kategori->value ? 'selected' : '' }}>
            
            {{ ucfirst(str_replace('_', ' ', $kategori->value)) }}

        </option>
    @endforeach

</select>

                </select>
            </div>

            {{-- PENULIS --}}
            <div class="mb-3">
                <label>Penulis</label>
                <input type="text"
                       name="penulis"
                       class="form-control"
                       value="{{ old('penulis', $informasi->penulis) }}">
            </div>

            {{-- KONTEN --}}
            <div class="mb-3">
                <label>Konten</label>
                <textarea name="konten"
                          class="form-control"
                          rows="8"
                          required>{{ old('konten', $informasi->konten) }}</textarea>
            </div>

            {{-- GAMBAR --}}
            <div class="mb-3">
                <label>Gambar Saat Ini</label>
                <br>

                @if($informasi->gambar)
                    <img src="{{ asset($informasi->gambar) }}"
                         width="120"
                         class="mb-2 rounded">
                @endif

                <input type="file"
                       name="gambar"
                       class="form-control"
                       accept="image/*">

                <small class="text-muted">
                    Kosongkan jika tidak ingin mengganti gambar
                </small>
            </div>

            {{-- STATUS --}}
            <div class="mb-3 form-check">
                <input class="form-check-input"
                       type="checkbox"
                       name="status"
                       value="1"
                       {{ old('status', $informasi->status) ? 'checked' : '' }}>

                <label class="form-check-label">
                    Aktifkan
                </label>
            </div>

            {{-- BUTTON --}}
            <button type="submit" class="btn btn-primary">
                Update
            </button>

            <a href="{{ route('admin.informasi.index') }}"
               class="btn btn-secondary">
                Batal
            </a>

        </form>

    </div>
</div>

@endsection