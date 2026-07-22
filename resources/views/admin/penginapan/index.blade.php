@extends('layouts.admin')
@section('title', 'Penginapan')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">Data Penginapan</h5>
    <a href="{{ route('admin.penginapan.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus me-1"></i> Tambah</a>
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
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Jenis</th>
                        <th>Harga Mulai</th>
                        <th>Alamat</th>
                        <th>No. HP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($penginapan as $i => $p)
                <tr>
                    <td>{{ $penginapan->firstItem() + $i }}</td>
                    <td>
                        @if($p->foto)
                            <img src="{{ Storage::url($p->foto) }}" width="60" height="45" class="rounded object-fit-cover">
                        @else
                            <span class="text-muted small">-</span>
                        @endif
                    </td>
                    <td class="fw-semibold">{{ $p->nama }}</td>
                    <td>{{ $p->jenis }}</td>
                    <td>{{ $p->harga_mulai ? 'Rp ' . number_format($p->harga_mulai, 0, ',', '.') : '-' }}</td>
                    <td>{{ Str::limit($p->alamat, 40) }}</td>
                    <td>{{ $p->no_hp ?? '-' }}</td>
                    <td>
                        <a href="{{ route('admin.penginapan.edit', $p) }}" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-pen"></i></a>
                        <form action="{{ route('admin.penginapan.destroy', $p) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="8" class="text-center text-muted py-4">Belum ada data penginapan.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer bg-transparent">{{ $penginapan->links() }}</div>
</div>
@endsection
