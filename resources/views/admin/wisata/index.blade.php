@extends('layouts.admin')
@section('title', 'Destinasi Wisata')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">Data Destinasi Wisata</h5>
    <a href="{{ route('admin.wisata.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus me-1"></i> Tambah</a>
</div>
<div class="card border-0 shadow-sm" style="border-radius:12px;">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr><th>#</th><th>Thumbnail</th><th>Nama</th><th>Kategori</th><th>Kecamatan</th><th>Status</th><th>Aksi</th></tr>
                </thead>
                <tbody>
                @forelse($wisata as $i => $w)
                <tr>
                    <td>{{ $wisata->firstItem() + $i }}</td>
                    <td>
                        @if($w->thumbnail)
                            <img src="{{ Storage::url($w->thumbnail) }}" width="60" height="45" class="rounded object-fit-cover">
                        @else
                            <span class="text-muted small">-</span>
                        @endif
                    </td>
                    <td class="fw-semibold">{{ $w->nama }}</td>
                    <td>{{ $w->kategori }}</td>
                    <td>{{ $w->kecamatan }}</td>
                    <td>
                        @if($w->status_publish)
                            <span class="badge bg-success">Publish</span>
                        @else
                            <span class="badge bg-secondary">Draft</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.wisata.edit', $w) }}" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-pen"></i></a>
                        <form action="{{ route('admin.wisata.destroy', $w) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" class="text-center text-muted py-4">Belum ada data wisata.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer bg-transparent">{{ $wisata->links() }}</div>
</div>
@endsection