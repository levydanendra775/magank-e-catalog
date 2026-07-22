@extends('layouts.public')
@section('title', $wisata->nama.' — E-Catalog Magetan')
@section('content')
@php
    // Siapkan URL Google Maps yang selalu valid berdasarkan nama + alamat + kecamatan
    $query = $wisata->nama . ' ' . $wisata->alamat . ' ' . $wisata->kecamatan . ' Magetan';
    $mapsSearchUrl = 'https://www.google.com/maps/search/?api=1&query=' . urlencode($query);

    // Embed URL dari koordinat jika tersedia, fallback ke pencarian nama
    if ($wisata->latitude && $wisata->longitude) {
        $embedUrl = 'https://maps.google.com/maps?q=' . $wisata->latitude . ',' . $wisata->longitude . '&output=embed&z=16';
        $mapsSearchUrl = 'https://www.google.com/maps/search/?api=1&query=' . $wisata->latitude . ',' . $wisata->longitude;
    } else {
        $embedUrl = 'https://maps.google.com/maps?q=' . urlencode($query) . '&output=embed&z=16';
    }

    // Jika ada link maps dari DB dan valid (punya path), gunakan itu sebagai link tombol
    $storedMaps = $wisata->maps;
    $parsedUrl = $storedMaps ? parse_url($storedMaps) : null;
    $hasValidPath = $parsedUrl && isset($parsedUrl['path']) && strlen(trim($parsedUrl['path'], '/')) > 0;
    $finalMapsUrl = ($storedMaps && $hasValidPath) ? $storedMaps : $mapsSearchUrl;

    // Override embed jika link DB adalah format embed
    if ($storedMaps && str_contains($storedMaps, 'google.com/maps/embed')) {
        $embedUrl = $storedMaps;
    }
@endphp

{{-- Hero Banner --}}
@if($wisata->thumbnail)
    <div style="height:420px;overflow:hidden;position:relative;">
        <img src="{{ Storage::url($wisata->thumbnail) }}" alt="{{ $wisata->nama }}" style="width:100%;height:100%;object-fit:cover;">
        <div style="position:absolute;inset:0;background:linear-gradient(to top,rgba(0,0,0,0.6) 0%,transparent 55%);"></div>
        <div style="position:absolute;bottom:32px;left:0;right:0;" class="container">
            <span class="badge mb-2" style="background:#1a6b3a;font-size:0.8rem;padding:6px 14px;border-radius:100px;">{{ $wisata->kategori }}</span>
            <h1 class="text-white fw-bold mb-1" style="font-family:'Plus Jakarta Sans',sans-serif;text-shadow:0 2px 8px rgba(0,0,0,0.4);">{{ $wisata->nama }}</h1>
            <p class="text-white mb-0" style="opacity:0.85;"><i class="fa-solid fa-location-dot me-1"></i>{{ $wisata->alamat }}, {{ $wisata->kecamatan }}</p>
        </div>
    </div>
@else
    <div style="background:linear-gradient(135deg,#0a3d1f,#1a6b3a);padding:60px 0;">
        <div class="container text-white">
            <span class="badge mb-2" style="background:rgba(255,255,255,0.2);font-size:0.8rem;padding:6px 14px;border-radius:100px;">{{ $wisata->kategori }}</span>
            <h1 class="fw-bold mb-1" style="font-family:'Plus Jakarta Sans',sans-serif;">{{ $wisata->nama }}</h1>
            <p class="mb-0" style="opacity:0.8;"><i class="fa-solid fa-location-dot me-1"></i>{{ $wisata->alamat }}, {{ $wisata->kecamatan }}</p>
        </div>
    </div>
@endif

<div class="container py-5">
    <div class="row g-4">

        {{-- Kolom Kiri: Informasi Utama --}}
        <div class="col-lg-8">

            {{-- Breadcrumb --}}
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none" style="color:#1a6b3a;">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('public.wisata') }}" class="text-decoration-none" style="color:#1a6b3a;">Wisata</a></li>
                    <li class="breadcrumb-item active text-muted">{{ $wisata->nama }}</li>
                </ol>
            </nav>

            {{-- Judul jika tidak ada thumbnail --}}
            @if(!$wisata->thumbnail)
            <span class="badge mb-3" style="background:#1a6b3a;font-size:0.8rem;padding:6px 14px;border-radius:100px;">{{ $wisata->kategori }}</span>
            <h1 style="font-family:'Plus Jakarta Sans',sans-serif;font-weight:800;">{{ $wisata->nama }}</h1>
            <p class="text-muted mb-4"><i class="fa-solid fa-location-dot me-1"></i>{{ $wisata->alamat }}, {{ $wisata->kecamatan }}</p>
            @endif

            {{-- Info Cards --}}
            <div class="row g-3 mb-4">
                <div class="col-sm-6">
                    <div class="d-flex align-items-start gap-3 p-3 rounded-3" style="background:#f0fff4;border:1px solid #b7ebc8;">
                        <div style="width:38px;height:38px;background:#1a6b3a;border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <i class="fa-solid fa-ticket text-white" style="font-size:0.9rem;"></i>
                        </div>
                        <div>
                            <div class="fw-semibold small text-muted mb-1">Harga Tiket</div>
                            <div class="fw-bold" style="color:#333;">{{ $wisata->harga_tiket > 0 ? 'Rp '.number_format($wisata->harga_tiket,0,',','.') : 'Gratis' }}</div>
                        </div>
                    </div>
                </div>

                @if($wisata->jam_operasional)
                <div class="col-sm-6">
                    <div class="d-flex align-items-start gap-3 p-3 rounded-3" style="background:#f0f4ff;border:1px solid #c7d4fb;">
                        <div style="width:38px;height:38px;background:#4361ee;border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <i class="fa-regular fa-clock text-white" style="font-size:0.9rem;"></i>
                        </div>
                        <div>
                            <div class="fw-semibold small text-muted mb-1">Jam Operasional</div>
                            <div class="fw-bold" style="color:#333;">{{ $wisata->jam_operasional }}</div>
                        </div>
                    </div>
                </div>
                @endif

                @if($wisata->kecamatan)
                <div class="col-sm-6">
                    <div class="d-flex align-items-start gap-3 p-3 rounded-3" style="background:#fff0f3;border:1px solid #fbc8d4;">
                        <div style="width:38px;height:38px;background:#e63946;border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <i class="fa-solid fa-location-dot text-white" style="font-size:0.9rem;"></i>
                        </div>
                        <div>
                            <div class="fw-semibold small text-muted mb-1">Kecamatan</div>
                            <div class="fw-bold" style="color:#333;">{{ $wisata->kecamatan }}</div>
                        </div>
                    </div>
                </div>
                @endif

                @if($wisata->fasilitas)
                <div class="col-sm-6">
                    <div class="d-flex align-items-start gap-3 p-3 rounded-3" style="background:#fff8f0;border:1px solid #fde8c8;">
                        <div style="width:38px;height:38px;background:#fd7e14;border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <i class="fa-solid fa-star text-white" style="font-size:0.9rem;"></i>
                        </div>
                        <div>
                            <div class="fw-semibold small text-muted mb-1">Fasilitas</div>
                            <div style="color:#333;font-size:0.92rem;">{{ $wisata->fasilitas }}</div>
                        </div>
                    </div>
                </div>
                @endif
            </div>

            {{-- Deskripsi --}}
            @if($wisata->deskripsi)
            <div class="mb-5">
                <h5 class="fw-bold mb-3" style="font-family:'Plus Jakarta Sans',sans-serif;">Tentang Tempat Ini</h5>
                <div style="line-height:1.9;color:#444;white-space:pre-line;text-align:justify;">{{ $wisata->deskripsi }}</div>
            </div>
            @endif

            {{-- Tombol Aksi --}}
            <div class="d-flex flex-wrap gap-2">
                <a href="{{ $finalMapsUrl }}" target="_blank" rel="noopener noreferrer"
                   class="btn btn-danger px-4 py-2"
                   style="border-radius:10px;font-weight:600;background:#e63946;border-color:#e63946;">
                    <i class="fa-solid fa-map-location-dot me-2"></i>Buka di Google Maps
                </a>
                <a href="{{ route('public.wisata') }}"
                   class="btn btn-outline-secondary px-4 py-2"
                   style="border-radius:10px;font-weight:600;">
                    <i class="fa-solid fa-arrow-left me-2"></i>Kembali
                </a>
            </div>
        </div>

        {{-- Kolom Kanan: Peta --}}
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm" style="border-radius:16px;overflow:hidden;position:sticky;top:80px;">
                <div class="card-header py-3 px-4 border-0" style="background:#f8f9fa;">
                    <h6 class="fw-bold mb-0" style="font-family:'Plus Jakarta Sans',sans-serif;">
                        <i class="fa-solid fa-map-location-dot me-2" style="color:#e63946;"></i>Lokasi
                    </h6>
                </div>
                <div class="card-body p-0">
                    <iframe
                        src="{{ $embedUrl }}"
                        width="100%"
                        height="300"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
                <div class="card-footer border-0 p-3" style="background:#f8f9fa;">
                    <a href="{{ $finalMapsUrl }}" target="_blank" rel="noopener noreferrer"
                       class="btn btn-danger w-100"
                       style="border-radius:10px;font-weight:600;background:#e63946;border-color:#e63946;">
                        <i class="fa-solid fa-diamond-turn-right me-2"></i>Petunjuk Arah
                    </a>
                </div>
            </div>

            {{-- Koordinat (jika ada) --}}
            @if($wisata->latitude && $wisata->longitude)
            <div class="mt-3 p-3 rounded-3" style="background:#f8f9fa;border:1px solid #e2e8f0;">
                <div class="small text-muted mb-1 fw-semibold">Koordinat GPS</div>
                <code style="font-size:0.8rem;color:#555;">{{ $wisata->latitude }}, {{ $wisata->longitude }}</code>
            </div>
            @endif
        </div>

    </div>
</div>
@endsection