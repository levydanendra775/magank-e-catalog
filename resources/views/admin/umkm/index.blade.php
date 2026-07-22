@extends('layouts.admin')
@section('title', 'UMKM')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">Data UMKM</h5>
    <a href="{{ route('admin.umkm.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus me-1"></i> Tambah</a>
</div>
<div class="card border-0 shadow-sm" style="border-radius:12px;">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr><th>#</th><th>Logo</th><th>Nama UMKM</th><th>Pemilik</th><th>Kecamatan</th><th>No. HP</th><th>Aksi</th></tr>
                </thead>
                <tbody>
                @forelse($umkm as $i => $u)
                <tr>
                    <td>{{ $umkm->firstItem() + $i }}</td>
                    <td>
                        @if($u->logo)
                            <img src="{{ Storage::url($u->logo) }}" width="45" height="45" class="rounded-circle object-fit-cover">
                        @else
                            <div class="rounded-circle bg-secondary d-inline-flex align-items-center justify-content-center" style="width:45px;height:45px">
                                <i class="fa-solid fa-shop text-white"></i>
                            </div>
                        @endif
                    </td>
                    <td class="fw-semibold">{{ $u->nama }}</td>
                    <td>{{ $u->pemilik }}</td>
                    <td>{{ $u->kecamatan }}</td>
                    <td>{{ $u->no_hp }}</td>
                    <td>
                        <a href="{{ route('admin.umkm.edit', $u) }}" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-pen"></i></a>
                        <form action="{{ route('admin.umkm.destroy', $u) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" class="text-center text-muted py-4">Belum ada data UMKM.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer bg-transparent">{{ $umkm->links() }}</div>
</div>
@endsection