@extends('layouts.admin')
@section('title', 'Event & Agenda')
@section('content')

<!-- Top Metric Stats Header -->
<div class="row g-4 mb-4">
    <div class="col-12 col-sm-6 col-xl-4">
        <div class="stat-card">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div class="stat-icon-wrapper" style="background:rgba(200, 155, 60, 0.15); color:var(--accent);">
                    <i class="fa-solid fa-calendar-days"></i>
                </div>
                <span class="badge rounded-pill" style="background:var(--primary-light); color:var(--primary); font-weight:700;">Total Agenda</span>
            </div>
            <div class="text-muted small font-mono uppercase">Total Event</div>
            <h3 class="fw-bold mb-0 mt-1" style="color:var(--primary);">{{ $events->total() }}</h3>
            <div class="text-muted small mt-2"><i class="fa-solid fa-bullhorn me-1 text-warning"></i> Event Pariwisata Magetan</div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-4">
        <div class="stat-card">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div class="stat-icon-wrapper" style="background:rgba(25, 135, 84, 0.12); color:#198754;">
                    <i class="fa-solid fa-circle-check"></i>
                </div>
                <span class="badge bg-success-subtle text-success fw-bold rounded-pill">Aktif</span>
            </div>
            <div class="text-muted small font-mono uppercase">Event Dipublikasi</div>
            <h3 class="fw-bold mb-0 mt-1 text-success">{{ $events->where('status', 1)->count() }}</h3>
            <div class="text-muted small mt-2"><i class="fa-solid fa-eye me-1"></i> Tampil Publik</div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-4">
        <div class="stat-card">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div class="stat-icon-wrapper" style="background:rgba(108, 117, 125, 0.12); color:#6c757d;">
                    <i class="fa-solid fa-calendar-minus"></i>
                </div>
                <span class="badge bg-secondary-subtle text-secondary fw-bold rounded-pill">Draft</span>
            </div>
            <div class="text-muted small font-mono uppercase">Event Draft</div>
            <h3 class="fw-bold mb-0 mt-1 text-secondary">{{ $events->where('status', 0)->count() }}</h3>
            <div class="text-muted small mt-2"><i class="fa-solid fa-eye-slash me-1"></i> Belum Diterbitkan</div>
        </div>
    </div>
</div>

<!-- Main Table Card -->
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white border-bottom p-4 d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
        <div>
            <h5 class="fw-bold mb-1" style="color:var(--primary);">Data Event & Agenda Pariwisata</h5>
            <p class="text-muted small mb-0">Kelola jadwal kegiatan, festival, dan event daerah</p>
        </div>

        <div>
            <a href="{{ route('admin.event.create') }}" class="btn btn-primary shadow-sm">
                <i class="fa-solid fa-plus me-1.5"></i> Tambah Event
            </a>
        </div>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th style="width: 50px;">#</th>
                        <th style="width: 80px;">Poster</th>
                        <th>Judul Event</th>
                        <th>Lokasi</th>
                        <th>Tanggal & Waktu</th>
                        <th>Status</th>
                        <th class="text-end" style="width: 140px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($events as $i => $e)
                <tr>
                    <td class="fw-bold text-muted small">{{ $events->firstItem() + $i }}</td>
                    <td>
                        @if($e->poster)
                            <img src="{{ Storage::url($e->poster) }}" width="60" height="45" class="rounded-3 object-fit-cover border shadow-sm">
                        @else
                            <div class="rounded-3 bg-light d-flex align-items-center justify-content-center border" style="width:60px; height:45px;">
                                <i class="fa-regular fa-image text-muted"></i>
                            </div>
                        @endif
                    </td>
                    <td>
                        <div class="fw-bold text-dark mb-0">{{ $e->judul }}</div>
                        @if($e->link_pendaftaran)
                            <a href="{{ $e->link_pendaftaran }}" target="_blank" class="small text-primary text-decoration-none"><i class="fa-solid fa-link me-1"></i>Link Pendaftaran</a>
                        @endif
                    </td>
                    <td>
                        <span class="text-secondary small fw-medium">
                            <i class="fa-solid fa-location-dot me-1 text-muted"></i>{{ $e->lokasi }}
                        </span>
                    </td>
                    <td>
                        <div class="small fw-semibold text-dark"><i class="fa-solid fa-calendar me-1 text-warning"></i>{{ $e->tanggal->format('d M Y') }}</div>
                        @if($e->jam)
                            <div class="small text-muted font-mono"><i class="fa-solid fa-clock me-1"></i>{{ $e->jam }}</div>
                        @endif
                    </td>
                    <td>
                        @if($e->status)
                            <span class="badge bg-success-subtle text-success border border-success-subtle px-2.5 py-1.5 rounded-pill fw-semibold">
                                <i class="fa-solid fa-circle me-1 small"></i> Publish
                            </span>
                        @else
                            <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle px-2.5 py-1.5 rounded-pill fw-semibold">
                                <i class="fa-solid fa-circle-xmark me-1 small"></i> Draft
                            </span>
                        @endif
                    </td>
                    <td class="text-end">
                        <div class="d-inline-flex gap-1">
                            <a href="{{ route('admin.event.edit', $e) }}" class="btn btn-sm btn-outline-primary" title="Edit Data">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $e->id }}" title="Hapus Data">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </div>

                        <!-- Modal Confirmation Delete -->
                        <div class="modal fade text-start" id="deleteModal{{ $e->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content border-0 shadow-lg rounded-4">
                                    <div class="modal-header border-0 pb-0">
                                        <h5 class="modal-title fw-bold text-danger">
                                            <i class="fa-solid fa-triangle-exclamation me-2"></i> Konfirmasi Hapus
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body py-4">
                                        Apakah Anda yakin ingin menghapus event <strong class="text-dark">"{{ $e->judul }}"</strong>?
                                        <div class="p-3 bg-light rounded-3 mt-3 border text-muted small">
                                            <i class="fa-solid fa-circle-info me-1 text-warning"></i> Tindakan ini bersifat permanen dan tidak dapat dibatalkan.
                                        </div>
                                    </div>
                                    <div class="modal-footer border-0 pt-0">
                                        <button type="button" class="btn btn-light rounded-3 px-4 fw-semibold" data-bs-dismiss="modal">Batal</button>
                                        <form action="{{ route('admin.event.destroy', $e) }}" method="POST" class="d-inline">
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
                        <i class="fa-solid fa-calendar-xmark fa-2x mb-3 d-block opacity-50"></i>
                        Belum ada data event yang terdaftar.
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
                Menampilkan <strong>{{ $events->firstItem() ?? 0 }}</strong> - <strong>{{ $events->lastItem() ?? 0 }}</strong> dari total <strong>{{ $events->total() }}</strong> data
            </div>
            <div>
                {{ $events->links() }}
            </div>
        </div>
    </div>
</div>
@endsection