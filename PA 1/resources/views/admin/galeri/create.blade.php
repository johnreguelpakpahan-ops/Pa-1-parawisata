{{-- resources/views/admin/galeri/create.blade.php --}}
@extends('layouts.admin')

@section('title', 'Tambah Galeri')

@section('content')

<style>
    .preview-container {
        margin-top: 10px;
        display: none;
    }
    .preview-image {
        max-width: 200px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    .required:after {
        content: " *";
        color: red;
    }
</style>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">
            <i class="fas fa-plus-circle me-2" style="color:#c6a43b;"></i>
            Tambah Galeri Baru
        </h5>
    </div>

    <div class="card-body">
        <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">

                {{-- JUDUL --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label required">Judul</label>
                    <input type="text"
                           name="judul"
                           class="form-control @error('judul') is-invalid @enderror"
                           value="{{ old('judul') }}"
                           required>
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- KATEGORI --}}
               <div class="col-md-6 mb-3">
    <label class="form-label required">Kategori</label>

    <select name="destinasi"
        class="form-control @error('destinasi') is-invalid @enderror"
        required>

    <option value="">-- Pilih Kategori --</option>

    <option value="balige" {{ old('destinasi') == 'balige' ? 'selected' : '' }}>
        Balige
    </option>

    <option value="meat" {{ old('destinasi') == 'meat' ? 'selected' : '' }}>
        Meat
    </option>

    <option value="batu_bahisan" {{ old('destinasi') == 'batu_bahisan' ? 'selected' : '' }}>
        Batu Bahisan
    </option>

    <option value="liang_sipege" {{ old('destinasi') == 'liang_sipege' ? 'selected' : '' }}>
        Liang Sipege
    </option>

</select>

@error('destinasi')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>

                {{-- DESKRIPSI --}}
                <div class="col-md-12 mb-3">
                    <label class="form-label required">Deskripsi</label>
                    <textarea name="deskripsi"
                              rows="4"
                              class="form-control @error('deskripsi') is-invalid @enderror"
                              required>{{ old('deskripsi') }}</textarea>

                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- GAMBAR --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label required">Gambar</label>

                    <input type="file"
                           name="gambar"
                           id="inputGambar"
                           class="form-control @error('gambar') is-invalid @enderror"
                           accept="image/*"
                           required>

                    <small class="text-muted">JPG, PNG maksimal 2MB</small>

                    <div class="preview-container" id="previewContainer">
                        <img id="previewImage" class="preview-image">
                    </div>

                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- LOKASI --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Lokasi</label>
                    <input type="text"
                           name="lokasi"
                           class="form-control @error('lokasi') is-invalid @enderror"
                           value="{{ old('lokasi') }}"
                           placeholder="Contoh: Balige, Toba">
                </div>

                {{-- TANGGAL --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tanggal Foto</label>
                    <input type="date"
                           name="tanggal_foto"
                           class="form-control"
                           value="{{ old('tanggal_foto') }}">
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
                            Aktifkan Galeri
                        </label>

                        <small class="text-muted d-block">
                            Jika aktif, akan tampil di website
                        </small>
                    </div>
                </div>

            </div>

            <hr>

            <button type="submit" class="btn text-white" style="background:#c6a43b;">
                <i class="fas fa-save me-2"></i> Simpan
            </button>

            <a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary">
                Kembali
            </a>

        </form>
    </div>
</div>

<script>
document.getElementById('inputGambar').addEventListener('change', function (e) {
    const file = e.target.files[0];
    const preview = document.getElementById('previewImage');
    const container = document.getElementById('previewContainer');

    if (file) {
        const reader = new FileReader();

        reader.onload = function (event) {
            preview.src = event.target.result;
            container.style.display = 'block';
        }

        reader.readAsDataURL(file);
    } else {
        container.style.display = 'none';
    }
});
</script>

@endsection