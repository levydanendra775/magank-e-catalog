@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <!-- Wisata Card -->
    <div class="col-md-3 mb-4">
        <div class="card border-0 shadow-sm text-center py-4 bg-primary text-white" style="border-radius: 12px;">
            <i class="fa-solid fa-map-location-dot fa-3x mb-3"></i>
            <h2 class="fw-bold mb-0">12</h2>
            <p class="mb-0">Destinasi Wisata</p>
        </div>
    </div>
    
    <!-- UMKM Card -->
    <div class="col-md-3 mb-4">
        <div class="card border-0 shadow-sm text-center py-4 bg-success text-white" style="border-radius: 12px;">
            <i class="fa-solid fa-shop fa-3x mb-3"></i>
            <h2 class="fw-bold mb-0">45</h2>
            <p class="mb-0">Total UMKM</p>
        </div>
    </div>
    
    <!-- Event Card -->
    <div class="col-md-3 mb-4">
        <div class="card border-0 shadow-sm text-center py-4 bg-warning text-dark" style="border-radius: 12px;">
            <i class="fa-solid fa-calendar-days fa-3x mb-3"></i>
            <h2 class="fw-bold mb-0">8</h2>
            <p class="mb-0">Event Mendatang</p>
        </div>
    </div>

    <!-- Berita Card -->
    <div class="col-md-3 mb-4">
        <div class="card border-0 shadow-sm text-center py-4 bg-danger text-white" style="border-radius: 12px;">
            <i class="fa-solid fa-newspaper fa-3x mb-3"></i>
            <h2 class="fw-bold mb-0">24</h2>
            <p class="mb-0">Berita Publikasi</p>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-12">
        <div class="card border-0 shadow-sm" style="border-radius: 12px;">
            <div class="card-body">
                <h5 class="fw-bold">Selamat Datang, {{ Auth::user()->name }}!</h5>
                <p class="text-muted">Anda berada di halaman panel kontrol E-Catalog Pariwisata & UMKM Kabupaten Magetan.</p>
            </div>
        </div>
    </div>
</div>
@endsection
