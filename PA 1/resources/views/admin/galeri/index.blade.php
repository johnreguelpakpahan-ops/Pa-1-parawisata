@extends('layouts.admin')

@section('title', 'Manajemen Galeri')

@section('content')

<div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4">
    <h5 class="mb-0">
        <i class="fas fa-images me-2 text-primary"></i>
        Daftar Galeri
    </h5>

    <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary-custom">
        <i class="fas fa-plus me-2"></i> Tambah Galeri
    </a>
</div>

<div class="card-premium">

    {{-- ALERT SUCCESS --}}
    @if(session('success'))
        <div class="alert alert-success mb-3">
            {{ session('success') }}
        </div>
    @endif

    {{-- TABLE --}}
    <div class="table-responsive">
        <table class="table table-custom align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th>Destinasi</th>
                    <th>Status</th>
                    <th width="120">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($galeri as $item)
                <tr>

                    {{-- NO PAGINATION FIX --}}
                    <td>
                        {{ $galeri->firstItem() + $loop->index }}
                    </td>

                    {{-- GAMBAR --}}
                    <td>
                        <img src="{{ asset($item->gambar) }}"
                             class="preview-img"
                             style="width:70px; height:60px; object-fit:cover; border-radius:8px;">
                    </td>

                    {{-- JUDUL --}}
                    <td>
                        <strong>{{ \Illuminate\Support\Str::limit($item->judul, 30) }}</strong>
                    </td>

                    {{-- KATEGORI (ENUM SAFE) --}}
                    <td>
                        <span class="badge bg-info text-dark">
                            {{ $item->destinasi }}
                        </span>
                    </td>

                    {{-- STATUS --}}
                    <td>
                        @if($item->status)
                            <span class="badge bg-success">Aktif</span>
                        @else
                            <span class="badge bg-danger">Nonaktif</span>
                        @endif
                    </td>

                    {{-- ACTION --}}
                    <td>
                        <div class="d-flex gap-1">

                            {{-- EDIT --}}
                            <a href="{{ route('admin.galeri.edit', $item->id) }}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-edit"></i>
                            </a>

                            {{-- DELETE --}}
                            <form action="{{ route('admin.galeri.destroy', $item->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin hapus data ini?')">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-sm btn-outline-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>

                        </div>
                    </td>

                </tr>
                @empty

                {{-- EMPTY STATE --}}
                <tr>
                    <td colspan="6" class="text-center py-5">
                        <i class="fas fa-image fa-2x text-muted mb-2"></i>
                        <br>
                        Belum ada data galeri
                    </td>
                </tr>

                @endforelse
            </tbody>
        </table>
    </div>

    {{-- PAGINATION --}}
    <div class="mt-3">
        {{ $galeri->links() }}
    </div>

</div>

@endsection