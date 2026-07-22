@extends('layouts.admin')
@section('title', 'Event')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">Data Event</h5>
    <a href="{{ route('admin.event.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus me-1"></i> Tambah</a>
</div>
<div class="card border-0 shadow-sm" style="border-radius:12px;">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr><th>#</th><th>Poster</th><th>Judul</th><th>Lokasi</th><th>Tanggal</th><th>Status</th><th>Aksi</th></tr>
                </thead>
                <tbody>
                @forelse($events as $i => $e)
                <tr>
                    <td>{{ $events->firstItem() + $i }}</td>
                    <td>
                        @if($e->poster)
                            <img src="{{ Storage::url($e->poster) }}" width="60" height="45" class="rounded object-fit-cover">
                        @else <span class="text-muted">-</span> @endif
                    </td>
                    <td class="fw-semibold">{{ $e->judul }}</td>
                    <td>{{ $e->lokasi }}</td>
                    <td>{{ $e->tanggal->format('d M Y') }}</td>
                    <td><span class="badge {{ $e->status ? 'bg-success' : 'bg-secondary' }}">{{ $e->status ? 'Publish' : 'Draft' }}</span></td>
                    <td>
                        <a href="{{ route('admin.event.edit', $e) }}" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-pen"></i></a>
                        <form action="{{ route('admin.event.destroy', $e) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" class="text-center text-muted py-4">Belum ada data event.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer bg-transparent">{{ $events->links() }}</div>
</div>
@endsection