@extends('layouts.admin')
@section('title', 'Background Hero Landing Page')
@section('content')

    <!-- Top Metric Stats Header & Info Alert -->
    <div class="row g-4 mb-4">
        <div class="col-12 col-sm-6 col-xl-4">
            <div class="stat-card">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div class="stat-icon-wrapper" style="background:rgba(200, 155, 60, 0.15); color:var(--accent);">
                        <i class="fa-solid fa-panorama"></i>
                    </div>
                    <span class="badge rounded-pill"
                        style="background:var(--primary-light); color:var(--primary); font-weight:700;">Total Foto</span>
                </div>
                <div class="text-muted small font-mono text-uppercase">Foto Background Aktif</div>
                <h3 class="fw-bold mb-0 mt-1" style="color:var(--primary);">{{ $banner->total() }}</h3>
                <div class="text-muted small mt-2"><i class="fa-solid fa-clock-rotate-left me-1 text-warning"></i> Berganti
                    Tiap 5 Detik di Hero</div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-8">
            <div class="card h-100 border-0 p-4 d-flex justify-content-center"
                style="background: linear-gradient(135deg, rgba(31,58,52,0.06) 0%, rgba(200,155,60,0.08) 100%);">
                <div class="d-flex align-items-start gap-3">
                    <div class="rounded-circle p-2 d-flex align-items-center justify-content-center"
                        style="background:var(--primary); color:#fff; width:36px; height:36px; flex-shrink:0;">
                        <i class="fa-solid fa-lightbulb"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-1" style="color:var(--primary);">Pengaturan Background Hero Landing Page</h6>
                        <p class="text-muted small mb-0" style="line-height:1.6;">
                            Foto yang ditambahkan di sini akan tampil secara otomatis sebagai gambar latar belakang pada
                            bagian utama (Hero Section) landing page dan berganti secara berputar (*slideshow*) setiap
                            <strong>5 detik</strong>. Urutkan prioritas tampilan melalui kolom <strong>Urutan</strong>.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Table Card -->
    <div class="card border-0 shadow-sm">
        <div
            class="card-header bg-white border-bottom p-4 d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
            <div>
                <h5 class="fw-bold mb-1" style="color:var(--primary);">Daftar Foto Background Hero</h5>
                <p class="text-muted small mb-0">Kelola foto yang akan ditampilkan pada slider hero landing page</p>
            </div>

            <div>
                <a href="{{ route('admin.banner.create') }}" class="btn btn-primary shadow-sm">
                    <i class="fa-solid fa-plus me-1.5"></i> Tambah Foto Baru
                </a>
            </div>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th style="width: 50px;">#</th>
                            <th style="width: 140px;">Preview</th>
                            <th>Judul / Keterangan</th>
                            <th style="width: 150px;">Urutan Tampil</th>
                            <th>Tautan (Opsional)</th>
                            <th class="text-end" style="width: 140px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($banner as $i => $b)
                            <tr>
                                <td class="fw-bold text-muted small">{{ $banner->firstItem() + $i }}</td>
                                <td>
                                    @if ($b->gambar)
                                        <img src="{{ Storage::url($b->gambar) }}" width="110" height="55"
                                            class="rounded-3 object-fit-cover border shadow-sm" alt="{{ $b->judul }}">
                                    @else
                                        <div class="rounded-3 bg-light d-flex align-items-center justify-content-center border"
                                            style="width:110px; height:55px;">
                                            <i class="fa-regular fa-image text-muted"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <div class="fw-bold text-dark mb-0">{{ $b->judul }}</div>
                                    <small class="text-muted font-mono">ID: #{{ $b->id }}</small>
                                </td>
                                <td>
                                    <span class="badge px-3 py-2 rounded-pill font-mono"
                                        style="background:var(--primary-light); color:var(--primary); font-weight:700;">
                                        Urutan ke-{{ $b->urutan }}
                                    </span>
                                </td>
                                <td>
                                    @if ($b->link)
                                        <a href="{{ $b->link }}" target="_blank"
                                            class="small text-primary text-decoration-none">
                                            <i class="fa-solid fa-arrow-up-right-from-square me-1"></i>Buka Link
                                        </a>
                                    @else
                                        <span class="text-muted small">-</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <div class="d-inline-flex gap-1">
                                        <a href="{{ route('admin.banner.edit', $b) }}"
                                            class="btn btn-sm btn-outline-primary" title="Edit Foto">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $b->id }}" title="Hapus Foto">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </div>

                                    <!-- Modal Confirmation Delete -->
                                    <div class="modal fade text-start" id="deleteModal{{ $b->id }}" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content border-0 shadow-lg rounded-4">
                                                <div class="modal-header border-0 pb-0">
                                                    <h5 class="modal-title fw-bold text-danger">
                                                        <i class="fa-solid fa-triangle-exclamation me-2"></i> Konfirmasi
                                                        Hapus
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body py-4">
                                                    Apakah Anda yakin ingin menghapus foto background <strong
                                                        class="text-dark">"{{ $b->judul }}"</strong>?
                                                </div>
                                                <div class="modal-footer border-0 pt-0">
                                                    <button type="button" class="btn btn-light rounded-3 px-4 fw-semibold"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <form action="{{ route('admin.banner.destroy', $b) }}" method="POST"
                                                        class="d-inline">
                                                        @csrf @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-danger rounded-3 px-4 fw-semibold shadow-sm">
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
                                    <i class="fa-solid fa-panorama fa-2x mb-3 d-block opacity-50"></i>
                                    Belum ada data foto background hero. Silakan klik tombol <strong>Tambah Foto
                                        Baru</strong> di atas.
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
                    Menampilkan <strong>{{ $banner->firstItem() ?? 0 }}</strong> -
                    <strong>{{ $banner->lastItem() ?? 0 }}</strong> dari total <strong>{{ $banner->total() }}</strong>
                    data
                </div>
                <div>
                    {{ $banner->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
