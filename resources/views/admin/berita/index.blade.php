@extends('layouts.admin')
@section('title', 'Berita')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">Data Berita</h5>
    <a href="{{ route('admin.berita.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus me-1"></i> Tambah</a>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<div class="card border-0 shadow-sm" style="border-radius:12px;">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Thumbnail</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($berita as $i => $b)
                <tr>
                    <td>{{ $berita->firstItem() + $i }}</td>
                    <td>
                        @if($b->thumbnail)
                            <img src="{{ Storage::url($b->thumbnail) }}" width="60" height="45" class="rounded object-fit-cover">
                        @else
                            <span class="text-muted small">-</span>
                        @endif
                    </td>
                    <td class="fw-semibold">{{ Str::limit($b->judul, 50) }}</td>
                    <td>{{ $b->penulis?->name ?? 'Unknown' }}</td>
                    <td>
                        @if($b->status)
                            <span class="badge bg-success">Publish</span>
                        @else
                            <span class="badge bg-secondary">Draft</span>
                        @endif
                    </td>
                    <td>{{ $b->created_at->format('d M Y') }}</td>
                    <td>
                        <a href="{{ route('admin.berita.edit', $b) }}" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-pen"></i></a>
                        <form action="{{ route('admin.berita.destroy', $b) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus berita ini?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" class="text-center text-muted py-4">Belum ada data berita.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer bg-transparent">{{ $berita->links() }}</div>
</div>
@endsection
