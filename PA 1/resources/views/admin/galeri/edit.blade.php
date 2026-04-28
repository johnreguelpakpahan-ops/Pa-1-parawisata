{{-- resources/views/admin/galeri/edit.blade.php --}}
@extends('layouts.admin')

@section('title', 'Edit Galeri')

@section('content')

<style>
    .preview-image {
        max-width: 200px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .current-image {
        border: 2px solid #c6a43b;
        padding: 5px;
        border-radius: 8px;
        display: inline-block;
    }

    .preview-container {
        display: none;
        margin-top: 10px;
    }

    .required:after {
        content: " *";
        color: red;
    }
</style>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">
            <i class="fas fa-edit me-2" style="color:#c6a43b;"></i>
            Edit Galeri
        </h5>
    </div>

    <div class="card-body">

        <form action="{{ route('admin.galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">

                {{-- JUDUL --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label required">Judul</label>
                    <input type="text"
                           name="judul"
                           class="form-control @error('judul') is-invalid @enderror"
                           value="{{ old('judul', $galeri->judul) }}"
                           required>
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- KATEGORI --}}
              <div class="col-md-6 mb-3">
    <label class="form-label required">Destinasi</label>

    <select name="destinasi"
        class="form-control @error('destinasi') is-invalid @enderror"
        required>

        <option value="">-- Pilih Destinasi --</option>

        <option value="balige"
            {{ old('destinasi', $galeri->destinasi) == 'balige' ? 'selected' : '' }}>
            Balige
        </option>

        <option value="meat"
            {{ old('destinasi', $galeri->destinasi) == 'meat' ? 'selected' : '' }}>
            Meat
        </option>

        <option value="batu_bahisan"
            {{ old('destinasi', $galeri->destinasi) == 'batu_bahisan' ? 'selected' : '' }}>
            Batu Bahisan
        </option>

    </select>

    @error('destinasi')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
                </div>

                {{-- DESKRIPSI --}}
                <div class="col-12 mb-3">
                    <label class="form-label required">Deskripsi</label>

                    <textarea name="deskripsi"
                              rows="4"
                              class="form-control @error('deskripsi') is-invalid @enderror"
                              required>{{ old('deskripsi', $galeri->deskripsi) }}</textarea>

                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- GAMBAR --}}
                <div class="col-md-6 mb-3">

                    <label class="form-label">Gambar Saat Ini</label>
                    <div class="current-image mb-2">
                        <img src="{{ asset($galeri->gambar) }}" class="preview-image">
                    </div>

                    <label class="form-label">Ganti Gambar (opsional)</label>

                    <input type="file"
                           name="gambar"
                           id="inputGambar"
                           class="form-control @error('gambar') is-invalid @enderror"
                           accept="image/*">

                    <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar</small>

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
                           class="form-control"
                           value="{{ old('lokasi', $galeri->lokasi) }}">
                </div>

             {{-- TANGGAL --}}
<div class="col-md-6 mb-3">
    <label class="form-label">Tanggal Foto</label>

    <input type="date"
           name="tanggal_foto"
           class="form-control"
           value="{{ old('tanggal_foto', $galeri->tanggal_foto ? \Carbon\Carbon::parse($galeri->tanggal_foto)->format('Y-m-d') : '') }}">
</div>

                {{-- STATUS --}}
                <div class="col-md-6 mb-3">
                    <div class="form-check mt-4">

                        <input class="form-check-input"
                               type="checkbox"
                               name="status"
                               value="1"
                               {{ old('status', $galeri->status) ? 'checked' : '' }}>

                        <label class="form-check-label">
                            Aktifkan Galeri
                        </label>

                    </div>
                </div>

            </div>

            <hr>

            <button type="submit" class="btn text-white" style="background:#c6a43b;">
                <i class="fas fa-save me-2"></i> Update
            </button>

            <a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary">
                Batal
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