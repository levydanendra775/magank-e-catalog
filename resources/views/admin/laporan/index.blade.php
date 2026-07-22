@extends('layouts.admin')
@section('title', 'Laporan Data')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">Ekspor Laporan Data</h5>
</div>

<div class="row g-4">
    <!-- Laporan Wisata -->
    <div class="col-md-6">
        <div class="card border-0 shadow-sm" style="border-radius:12px;">
            <div class="card-body p-4 text-center">
                <div class="mb-3">
                    <i class="fa-solid fa-map-location-dot fa-3x text-primary opacity-75"></i>
                </div>
                <h5 class="fw-bold">Laporan Destinasi Wisata</h5>
                <p class="text-muted small mb-4">Ekspor seluruh data destinasi wisata Kabupaten Magetan ke dalam format PDF atau Excel (CSV).</p>
                <div class="d-flex justify-content-center gap-2">
                    <a href="{{ route('admin.laporan.wisata.pdf') }}" class="btn btn-outline-danger"><i class="fa-solid fa-file-pdf me-2"></i>Cetak PDF</a>
                    <a href="{{ route('admin.laporan.wisata.excel') }}" class="btn btn-outline-success"><i class="fa-solid fa-file-excel me-2"></i>Cetak Excel</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Laporan UMKM -->
    <div class="col-md-6">
        <div class="card border-0 shadow-sm" style="border-radius:12px;">
            <div class="card-body p-4 text-center">
                <div class="mb-3">
                    <i class="fa-solid fa-shop fa-3x text-success opacity-75"></i>
                </div>
                <h5 class="fw-bold">Laporan Data UMKM</h5>
                <p class="text-muted small mb-4">Ekspor seluruh daftar pelaku UMKM lokal Kabupaten Magetan ke dalam format PDF atau Excel (CSV).</p>
                <div class="d-flex justify-content-center gap-2">
                    <a href="{{ route('admin.laporan.umkm.pdf') }}" class="btn btn-outline-danger"><i class="fa-solid fa-file-pdf me-2"></i>Cetak PDF</a>
                    <a href="{{ route('admin.laporan.umkm.excel') }}" class="btn btn-outline-success"><i class="fa-solid fa-file-excel me-2"></i>Cetak Excel</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection