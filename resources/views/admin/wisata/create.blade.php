@extends('layouts.admin')
@section('title', 'Tambah Wisata')
@section('content')

<!-- Header Breadcrumb & Actions -->
<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
    <div>
        <div class="text-muted small mb-1">
            <a href="{{ route('admin.wisata.index') }}" class="text-decoration-none text-muted">
                <i class="fa-solid fa-map-location-dot me-1"></i> Data Wisata
            </a>
            <i class="fa-solid fa-chevron-right mx-2 text-muted small"></i>
            <span class="text-dark font-mono">Tambah Destinasi</span>
        </div>
        <h4 class="fw-bold mb-0" style="color:var(--primary);">Tambah Destinasi Wisata Baru</h4>
    </div>

    <div>
        <a href="{{ route('admin.wisata.index') }}" class="btn btn-outline-secondary px-4 me-2">
            <i class="fa-solid fa-arrow-left me-1"></i> Kembali
        </a>
    </div>
</div>

<form action="{{ route('admin.wisata.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('admin.wisata._form')

    <div class="mt-4 d-flex align-items-center justify-content-end gap-2 p-3 bg-white border rounded-4 shadow-sm">
        <a href="{{ route('admin.wisata.index') }}" class="btn btn-light border px-4 fw-semibold">Batal</a>
        <button type="submit" class="btn btn-primary px-5 fw-bold shadow-sm">
            <i class="fa-solid fa-floppy-disk me-1.5"></i> Simpan Destinasi Wisata
        </button>
    </div>
</form>

@endsection