@php use Illuminate\Support\Str; @endphp

@extends('layouts.admin')

@section('title', 'Manajemen Berita')

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4">
    <h5 class="mb-0">
        <i class="fas fa-newspaper me-2 text-primary"></i> Daftar Berita
    </h5>

    <a href="{{ route('admin.berita.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i> Tambah Berita
    </a>
</div>

<div class="card">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($berita as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>

                    <td>
                        <img src="{{ asset($item->gambar) }}" width="80">
                    </td>

                    <td>
                        <strong>{{ Str::limit($item->judul, 35) }}</strong>
                    </td>

                    <td>
                        <span class="badge bg-info text-dark">
                            {{ ucfirst($item->kategori) }}
                        </span>
                    </td>

                    <td>
                        {{ $item->tanggal_terbit?->format('d/m/Y') }}
                    </td>

                    <td>
                        @if($item->status)
                            <span class="badge bg-success">Publish</span>
                        @else
                            <span class="badge bg-danger">Draft</span>
                        @endif
                    </td>

                    <td>
                        <a href="{{ route('admin.berita.edit', $item->id) }}" class="btn btn-sm btn-warning">
                            Edit
                        </a>

                        <form action="{{ route('admin.berita.destroy', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin hapus?')" class="btn btn-sm btn-danger">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">Belum ada data berita</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $berita->links() }}
    </div>
</div>
@endsection