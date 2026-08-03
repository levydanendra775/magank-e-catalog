@extends('layouts.admin')
@section('title', 'Galeri')
@section('content')

<!-- Top Metric Stats Header -->
<div class="row g-4 mb-4">
    <div class="col-12 col-sm-6 col-xl-4">
        <div class="stat-card">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div class="stat-icon-wrapper" style="background:rgba(200, 155, 60, 0.15); color:var(--accent);">
                    <i class="fa-solid fa-images"></i>
                </div>
                <span class="badge rounded-pill" style="background:var(--primary-light); color:var(--primary); font-weight:700;">Total Media</span>
            </div>
            <div class="text-muted small font-mono uppercase">Total Galeri</div>
            <h3 class="fw-bold mb-0 mt-1" style="color:var(--primary);">{{ $galeri->total() }}</h3>
            <div class="text-muted small mt-2"><i class="fa-solid fa-camera-retro me-1 text-warning"></i> Foto & Video Magetan</div>
        </div>
    </div>
</div>

<!-- Main Table Card -->
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white border-bottom p-4 d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
        <div>
            <h5 class="fw-bold mb-1" style="color:var(--primary);">Data Galeri</h5>
            <p class="text-muted small mb-0">Kelola dokumentasi foto dan video</p>
        </div>

        <div>
            <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary shadow-sm">
                <i class="fa-solid fa-plus me-1.5"></i> Tambah Galeri
            </a>
        </div>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th style="width: 50px;">#</th>
                        <th style="width: 80px;">Foto/Media</th>
                        <th>Judul Galeri</th>
                        <th>Kategori</th>
                        <th>Video (URL)</th>
                        <th class="text-end" style="width: 140px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($galeri as $i => $g)
                <tr>
                    <td class="fw-bold text-muted small">{{ $galeri->firstItem() + $i }}</td>
                    <td>
                        @if($g->foto)
                            <img src="{{ Storage::url($g->foto) }}" width="60" height="45" class="rounded-3 object-fit-cover border shadow-sm">
                        @else
                            <div class="rounded-3 bg-light d-flex align-items-center justify-content-center border" style="width:60px; height:45px;">
                                <i class="fa-regular fa-image text-muted"></i>
                            </div>
                        @endif
                    </td>
                    <td>
                        <div class="fw-bold text-dark mb-0">{{ $g->judul }}</div>
                    </td>
                    <td>
                        <span class="badge px-2.5 py-1.5 rounded-pill font-mono" style="background:var(--primary-light); color:var(--primary); font-weight:600;">
                            {{ $g->kategori }}
                        </span>
                    </td>
                    <td>
                        @if($g->video)
                            <a href="{{ $g->video }}" target="_blank" class="small text-danger text-decoration-none">
                                <i class="fa-brands fa-youtube me-1"></i>Lihat Video
                            </a>
                        @else
                            <span class="text-muted small">-</span>
                        @endif
                    </td>
                    <td class="text-end">
                        <div class="d-inline-flex gap-1">
                            <a href="{{ route('admin.galeri.edit', $g) }}" class="btn btn-sm btn-outline-primary" title="Edit Data">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $g->id }}" title="Hapus Data">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </div>

                        <!-- Modal Confirmation Delete -->
                        <div class="modal fade text-start" id="deleteModal{{ $g->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content border-0 shadow-lg rounded-4">
                                    <div class="modal-header border-0 pb-0">
                                        <h5 class="modal-title fw-bold text-danger">
                                            <i class="fa-solid fa-triangle-exclamation me-2"></i> Konfirmasi Hapus
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body py-4">
                                        Apakah Anda yakin ingin menghapus galeri <strong class="text-dark">"{{ $g->judul }}"</strong>?
                                    </div>
                                    <div class="modal-footer border-0 pt-0">
                                        <button type="button" class="btn btn-light rounded-3 px-4 fw-semibold" data-bs-dismiss="modal">Batal</button>
                                        <form action="{{ route('admin.galeri.destroy', $g) }}" method="POST" class="d-inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-danger rounded-3 px-4 fw-semibold shadow-sm">
                                                <i class="fa-solid fa-trash-can me-1"></i> Ya, Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted py-5">
                        <i class="fa-solid fa-images fa-2x mb-3 d-block opacity-50"></i>
                        Belum ada data galeri.
                    </td>
                </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-footer bg-white border-top p-3">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
            <div class="text-muted small">
                Menampilkan <strong>{{ $galeri->firstItem() ?? 0 }}</strong> - <strong>{{ $galeri->lastItem() ?? 0 }}</strong> dari total <strong>{{ $galeri->total() }}</strong> data
            </div>
            <div>
                {{ $galeri->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
