@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="row g-4">
    <!-- Wisata -->
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm h-100" style="border-radius:14px; border-left: 5px solid #0d6efd !important;">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="rounded-3 p-3 bg-primary bg-opacity-10">
                    <i class="fa-solid fa-map-location-dot fa-2x text-primary"></i>
                </div>
                <div>
                    <p class="text-muted mb-1 small">Destinasi Wisata</p>
                    <h3 class="fw-bold mb-0">{{ $stats['wisata'] }}</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- UMKM -->
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm h-100" style="border-radius:14px; border-left: 5px solid #198754 !important;">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="rounded-3 p-3 bg-success bg-opacity-10">
                    <i class="fa-solid fa-shop fa-2x text-success"></i>
                </div>
                <div>
                    <p class="text-muted mb-1 small">Total UMKM</p>
                    <h3 class="fw-bold mb-0">{{ $stats['umkm'] }}</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- Produk -->
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm h-100" style="border-radius:14px; border-left: 5px solid #0dcaf0 !important;">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="rounded-3 p-3 bg-info bg-opacity-10">
                    <i class="fa-solid fa-box fa-2x text-info"></i>
                </div>
                <div>
                    <p class="text-muted mb-1 small">Produk UMKM</p>
                    <h3 class="fw-bold mb-0">{{ $stats['produk'] }}</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- Event -->
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm h-100" style="border-radius:14px; border-left: 5px solid #ffc107 !important;">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="rounded-3 p-3 bg-warning bg-opacity-10">
                    <i class="fa-solid fa-calendar-days fa-2x text-warning"></i>
                </div>
                <div>
                    <p class="text-muted mb-1 small">Event Mendatang</p>
                    <h3 class="fw-bold mb-0">{{ $stats['event'] }}</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- Berita -->
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm h-100" style="border-radius:14px; border-left: 5px solid #dc3545 !important;">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="rounded-3 p-3 bg-danger bg-opacity-10">
                    <i class="fa-regular fa-newspaper fa-2x text-danger"></i>
                </div>
                <div>
                    <p class="text-muted mb-1 small">Berita Publikasi</p>
                    <h3 class="fw-bold mb-0">{{ $stats['berita'] }}</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- Kuliner -->
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm h-100" style="border-radius:14px; border-left: 5px solid #fd7e14 !important;">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="rounded-3 p-3" style="background:rgba(253,126,20,0.1)">
                    <i class="fa-solid fa-utensils fa-2x" style="color:#fd7e14"></i>
                </div>
                <div>
                    <p class="text-muted mb-1 small">Kuliner</p>
                    <h3 class="fw-bold mb-0">{{ $stats['kuliner'] }}</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- Penginapan -->
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm h-100" style="border-radius:14px; border-left: 5px solid #6f42c1 !important;">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="rounded-3 p-3 bg-purple" style="background:rgba(111,66,193,0.1)">
                    <i class="fa-solid fa-bed fa-2x" style="color:#6f42c1"></i>
                </div>
                <div>
                    <p class="text-muted mb-1 small">Penginapan</p>
                    <h3 class="fw-bold mb-0">{{ $stats['penginapan'] }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-12">
        <div class="card border-0 shadow-sm p-4" style="border-radius:14px;">
            <h5 class="fw-bold mb-1">Selamat Datang, {{ Auth::user()->name }}! 👋</h5>
            <p class="text-muted mb-0">Panel Kontrol <strong>E-Catalog Pariwisata & UMKM Kabupaten Magetan</strong> — Bidang Pemasaran Dinas Pariwisata dan Kebudayaan.</p>
        </div>
    </div>
</div>

<div class="row mt-4 g-4">
    <!-- Chart: Wisata per Kecamatan -->
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm h-100" style="border-radius:14px;">
            <div class="card-body p-4">
                <h6 class="fw-bold mb-4">Wisata per Kecamatan</h6>
                <div style="position: relative; height:250px;">
                    <canvas id="chartWisata"></canvas>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Chart: Produk per Kategori -->
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm h-100" style="border-radius:14px;">
            <div class="card-body p-4">
                <h6 class="fw-bold mb-4">Produk per Kategori</h6>
                <div style="position: relative; height:250px;">
                    <canvas id="chartProduk"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart: Event per Bulan -->
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm h-100" style="border-radius:14px;">
            <div class="card-body p-4">
                <h6 class="fw-bold mb-4">Event per Bulan ({{ date('Y') }})</h6>
                <div style="position: relative; height:250px;">
                    <canvas id="chartEvent"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Colors
    const colors = ['#0d6efd', '#198754', '#0dcaf0', '#ffc107', '#dc3545', '#fd7e14', '#6f42c1', '#20c997', '#e83e8c', '#6610f2'];

    // Chart Wisata
    const ctxWisata = document.getElementById('chartWisata').getContext('2d');
    new Chart(ctxWisata, {
        type: 'doughnut',
        data: {
            labels: {!! json_encode(array_keys($wisataPerKecamatan)) !!},
            datasets: [{
                data: {!! json_encode(array_values($wisataPerKecamatan)) !!},
                backgroundColor: colors,
                borderWidth: 0
            }]
        },
        options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { position: 'right', labels: { boxWidth: 12 } } } }
    });

    // Chart Produk
    const ctxProduk = document.getElementById('chartProduk').getContext('2d');
    new Chart(ctxProduk, {
        type: 'pie',
        data: {
            labels: {!! json_encode(array_keys($produkPerKategori)) !!},
            datasets: [{
                data: {!! json_encode(array_values($produkPerKategori)) !!},
                backgroundColor: colors,
                borderWidth: 0
            }]
        },
        options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { position: 'right', labels: { boxWidth: 12 } } } }
    });

    // Chart Event
    const ctxEvent = document.getElementById('chartEvent').getContext('2d');
    new Chart(ctxEvent, {
        type: 'bar',
        data: {
            labels: {!! json_encode(array_values($bulanLabels)) !!},
            datasets: [{
                label: 'Jumlah Event',
                data: {!! json_encode($eventBulanData) !!},
                backgroundColor: '#ffc107',
                borderRadius: 4
            }]
        },
        options: { 
            responsive: true, 
            maintainAspectRatio: false,
            scales: { y: { beginAtZero: true, ticks: { stepSize: 1 } } },
            plugins: { legend: { display: false } }
        }
    });
});
</script>
@endpush

