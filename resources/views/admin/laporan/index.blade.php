@extends('layouts.admin')
@section('title', 'Laporan & Ekspor Data')
@section('content')

<!-- Header Section -->
<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
    <div>
        <h4 class="fw-bold mb-1" style="color:var(--primary);">Pusat Ekspor Laporan Data</h4>
        <p class="text-muted small mb-0">Unduh data keseluruhan sistem dalam format PDF atau Excel.</p>
    </div>
</div>

<div class="row g-4">
    <!-- Laporan Wisata -->
    <div class="col-md-6 col-lg-5">
        <div class="card border-0 shadow-sm h-100" style="border-radius:14px;">
            <div class="card-body p-5 text-center d-flex flex-column justify-content-center">
                <div class="mb-4 d-inline-flex justify-content-center align-items-center mx-auto" style="width: 80px; height: 80px; border-radius: 50%; background: rgba(33, 107, 72, 0.1);">
                    <i class="fa-solid fa-map-location-dot fa-2x" style="color:var(--primary);"></i>
                </div>
                <h5 class="fw-bold mb-2">Laporan Destinasi Wisata</h5>
                <p class="text-muted small mb-4 px-xl-3">Ekspor seluruh data destinasi wisata, jumlah pengunjung, fasilitas, dan detail lainnya dari Kabupaten Magetan.</p>
                <div class="d-flex justify-content-center gap-2 mt-auto flex-wrap">
                    <a href="{{ route('admin.laporan.wisata.pdf') }}" class="btn btn-outline-danger px-4 rounded-pill shadow-sm flex-fill">
                        <i class="fa-solid fa-file-pdf me-2"></i>Cetak PDF
                    </a>
                    <a href="{{ route('admin.laporan.wisata.excel') }}" class="btn btn-outline-success px-4 rounded-pill shadow-sm flex-fill">
                        <i class="fa-solid fa-file-excel me-2"></i>Cetak Excel
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Laporan UMKM -->
    <div class="col-md-6 col-lg-5">
        <div class="card border-0 shadow-sm h-100" style="border-radius:14px;">
            <div class="card-body p-5 text-center d-flex flex-column justify-content-center">
                <div class="mb-4 d-inline-flex justify-content-center align-items-center mx-auto" style="width: 80px; height: 80px; border-radius: 50%; background: rgba(200, 155, 60, 0.15);">
                    <i class="fa-solid fa-shop fa-2x" style="color:var(--accent);"></i>
                </div>
                <h5 class="fw-bold mb-2">Laporan Data UMKM</h5>
                <p class="text-muted small mb-4 px-xl-3">Ekspor seluruh daftar pelaku UMKM lokal, produk unggulan, dan detail kontak di sekitar Kabupaten Magetan.</p>
                <div class="d-flex justify-content-center gap-2 mt-auto flex-wrap">
                    <a href="{{ route('admin.laporan.umkm.pdf') }}" class="btn btn-outline-danger px-4 rounded-pill shadow-sm flex-fill">
                        <i class="fa-solid fa-file-pdf me-2"></i>Cetak PDF
                    </a>
                    <a href="{{ route('admin.laporan.umkm.excel') }}" class="btn btn-outline-success px-4 rounded-pill shadow-sm flex-fill">
                        <i class="fa-solid fa-file-excel me-2"></i>Cetak Excel
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection