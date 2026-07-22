@extends('layouts.admin')
@section('title', 'Produk UMKM')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">Data Produk UMKM</h5>
    <a href="{{ route('admin.produk.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus me-1"></i> Tambah</a>
</div>
<div class="card border-0 shadow-sm" style="border-radius:12px;">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr><th>#</th><th>Foto</th><th>Nama Produk</th><th>UMKM</th><th>Kategori</th><th>Harga</th><th>Status</th><th>Aksi</th></tr>
                </thead>
                <tbody>
                @forelse($produk as $i => $p)
                <tr>
                    <td>{{ $produk->firstItem() + $i }}</td>
                    <td>
                        @if($p->foto)
                            <img src="{{ Storage::url($p->foto) }}" width="50" height="45" class="rounded object-fit-cover">
                        @else <span class="text-muted">-</span> @endif
                    </td>
                    <td class="fw-semibold">{{ $p->nama }}</td>
                    <td>{{ $p->umkm?->nama }}</td>
                    <td>{{ $p->kategori }}</td>
                    <td>Rp {{ number_format($p->harga, 0, ',', '.') }}</td>
                    <td><span class="badge {{ $p->status ? 'bg-success' : 'bg-secondary' }}">{{ $p->status ? 'Aktif' : 'Nonaktif' }}</span></td>
                    <td>
                        <a href="{{ route('admin.produk.edit', $p) }}" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-pen"></i></a>
                        <form action="{{ route('admin.produk.destroy', $p) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="8" class="text-center text-muted py-4">Belum ada data produk.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer bg-transparent">{{ $produk->links() }}</div>
</div>
@endsection