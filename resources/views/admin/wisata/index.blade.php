@extends('layouts.admin')
@section('title', 'Destinasi Wisata')
@section('content')

<!-- Top Metric Stats Header (Inspired by 21st.dev Dashboard) -->
<div class="row g-4 mb-4">
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div class="stat-icon-wrapper" style="background:#EAF0EC; color:#1F3A34;">
                    <i class="fa-solid fa-map-location-dot"></i>
                </div>
                <span class="badge rounded-pill" style="background:rgba(200, 155, 60, 0.15); color:var(--accent-dark); font-weight:700;">
                    Total Data
                </span>
            </div>
            <div class="text-muted small font-mono uppercase">Total Destinasi</div>
            <h3 class="fw-bold mb-0 mt-1" style="color:var(--primary);">{{ $wisata->total() }}</h3>
            <div class="text-muted small mt-2"><i class="fa-solid fa-layer-group text-success me-1"></i> Terdaftar di E-Catalog</div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div class="stat-icon-wrapper" style="background:rgba(25, 135, 84, 0.12); color:#198754;">
                    <i class="fa-solid fa-circle-check"></i>
                </div>
                <span class="badge bg-success-subtle text-success fw-bold rounded-pill">Aktif</span>
            </div>
            <div class="text-muted small font-mono uppercase">Status Publish</div>
            <h3 class="fw-bold mb-0 mt-1" style="color:#198754;">
                {{ $wisata->where('status_publish', 1)->count() }}
            </h3>
            <div class="text-muted small mt-2"><i class="fa-solid fa-globe me-1"></i> Tampil di Website Publik</div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div class="stat-icon-wrapper" style="background:rgba(108, 117, 125, 0.12); color:#6c757d;">
                    <i class="fa-solid fa-pen-ruler"></i>
                </div>
                <span class="badge bg-secondary-subtle text-secondary fw-bold rounded-pill">Draft</span>
            </div>
            <div class="text-muted small font-mono uppercase">Status Draft</div>
            <h3 class="fw-bold mb-0 mt-1 text-secondary">
                {{ $wisata->where('status_publish', 0)->count() }}
            </h3>
            <div class="text-muted small mt-2"><i class="fa-solid fa-eye-slash me-1"></i> Disembunyikan</div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div class="stat-icon-wrapper" style="background:rgba(200, 155, 60, 0.15); color:var(--accent);">
                    <i class="fa-solid fa-mountain-sun"></i>
                </div>
                <span class="badge rounded-pill" style="background:var(--primary-light); color:var(--primary); font-weight:700;">Magetan</span>
            </div>
            <div class="text-muted small font-mono uppercase">Wilayah</div>
            <h3 class="fw-bold mb-0 mt-1" style="color:var(--primary);">18 Kecamatan</h3>
            <div class="text-muted small mt-2"><i class="fa-solid fa-location-dot me-1" style="color:var(--accent);"></i> Pariwisata Daerah</div>
        </div>
    </div>
</div>

<!-- Main Table Card -->
<div class="card border-0 shadow-sm">
    <!-- Card Header / Action Toolbar -->
    <div class="card-header bg-white border-bottom p-4 d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
        <div>
            <h5 class="fw-bold mb-1" style="color:var(--primary);">Data Destinasi Wisata</h5>
            <p class="text-muted small mb-0">Kelola informasi destinasi wisata Kabupaten Magetan</p>
        </div>

        <div class="d-flex align-items-center gap-3">
            <a href="{{ route('admin.wisata.create') }}" class="btn btn-primary shadow-sm">
                <i class="fa-solid fa-plus me-1.5"></i> Tambah Wisata
            </a>
        </div>
    </div>

    <!-- Table Body -->
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th style="width: 50px;">#</th>
                        <th style="width: 90px;">Thumbnail</th>
                        <th>Nama Destinasi</th>
                        <th>Kategori</th>
                        <th>Kecamatan</th>
                        <th>Status</th>
                        <th style="width: 100px;">Sematkan</th>
                        <th class="text-end" style="width: 140px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($wisata as $i => $w)
                <tr>
                    <td class="fw-bold text-muted small">{{ $wisata->firstItem() + $i }}</td>
                    <td>
                        @if($w->thumbnail)
                            <img src="{{ Storage::url($w->thumbnail) }}" width="64" height="48" class="rounded-3 object-fit-cover border shadow-sm">
                        @else
                            <div class="rounded-3 bg-light d-flex align-items-center justify-content-center border" style="width:64px; height:48px;">
                                <i class="fa-regular fa-image text-muted"></i>
                            </div>
                        @endif
                    </td>
                    <td>
                        <div class="fw-bold text-dark mb-0">
                            @if($w->is_pinned)
                                <i class="fa-solid fa-thumbtack me-1" style="color:#C89B3C;" title="Disematkan"></i>
                            @endif
                            {{ $w->nama }}
                        </div>
                        @if($w->harga_tiket)
                            <div class="small text-muted font-mono"><i class="fa-solid fa-tag me-1 text-warning"></i>Rp {{ number_format($w->harga_tiket, 0, ',', '.') }}</div>
                        @else
                            <div class="small text-muted">Gratis / Presensi</div>
                        @endif
                    </td>
                    <td>
                        <span class="badge px-2.5 py-1.5 rounded-pill font-mono" style="background:var(--primary-light); color:var(--primary); font-weight:600;">
                            {{ $w->kategori }}
                        </span>
                    </td>
                    <td>
                        <span class="text-secondary small fw-medium">
                            <i class="fa-solid fa-location-dot me-1 text-muted"></i>{{ $w->kecamatan }}
                        </span>
                    </td>
                    <td>
                        @if($w->status_publish)
                            <span class="badge bg-success-subtle text-success border border-success-subtle px-2.5 py-1.5 rounded-pill fw-semibold">
                                <i class="fa-solid fa-circle me-1 small"></i> Publish
                            </span>
                        @else
                            <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle px-2.5 py-1.5 rounded-pill fw-semibold">
                                <i class="fa-solid fa-circle-xmark me-1 small"></i> Draft
                            </span>
                        @endif
                    </td>
                    <td class="text-center">
                        <form action="{{ route('admin.wisata.pin', $w) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit"
                                class="btn btn-sm {{ $w->is_pinned ? 'btn-warning' : 'btn-outline-secondary' }}"
                                title="{{ $w->is_pinned ? 'Batal Sematkan' : 'Sematkan Wisata Ini' }}"
                                style="border-radius: 8px; transition: all 0.2s;">
                                <i class="fa-solid fa-thumbtack {{ $w->is_pinned ? '' : 'opacity-50' }}"></i>
                            </button>
                        </form>
                    </td>
                    <td class="text-end">
                        <div class="d-inline-flex gap-1">
                            <a href="{{ route('admin.wisata.edit', $w) }}" class="btn btn-sm btn-outline-primary" title="Edit Data">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $w->id }}" title="Hapus Data">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </div>

                        <!-- Modal Confirmation Delete -->
                        <div class="modal fade text-start" id="deleteModal{{ $w->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content border-0 shadow-lg rounded-4">
                                    <div class="modal-header border-0 pb-0">
                                        <h5 class="modal-title fw-bold text-danger">
                                            <i class="fa-solid fa-triangle-exclamation me-2"></i> Konfirmasi Hapus
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body py-4">
                                        Apakah Anda yakin ingin menghapus data destinasi wisata <strong class="text-dark">"{{ $w->nama }}"</strong>?
                                        <div class="p-3 bg-light rounded-3 mt-3 border text-muted small">
                                            <i class="fa-solid fa-circle-info me-1 text-warning"></i> Tindakan ini tidak dapat dibatalkan. Seluruh berkas thumbnail dan ulasan terkait akan ikut terpengaruh.
                                        </div>
                                    </div>
                                    <div class="modal-footer border-0 pt-0">
                                        <button type="button" class="btn btn-light rounded-3 px-4 fw-semibold" data-bs-dismiss="modal">Batal</button>
                                        <form action="{{ route('admin.wisata.destroy', $w) }}" method="POST" class="d-inline">
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
                    <td colspan="7" class="text-center text-muted py-5">
                        <i class="fa-solid fa-folder-open fa-2x mb-3 d-block opacity-50"></i>
                        Belum ada data destinasi wisata yang tersedia.
                    </td>
                </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination Footer -->
    <div class="card-footer bg-white border-top p-3">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
            <div class="text-muted small">
                Menampilkan <strong>{{ $wisata->firstItem() ?? 0 }}</strong> - <strong>{{ $wisata->lastItem() ?? 0 }}</strong> dari total <strong>{{ $wisata->total() }}</strong> data
            </div>
            <div>
                {{ $wisata->links() }}
            </div>
        </div>
    </div>
</div>
@endsection