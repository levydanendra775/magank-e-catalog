@extends('layouts.public')
@section('title', $kuliner->nama.' — E-Catalog Magetan')
@section('content')
@php
    // Siapkan URL Google Maps yang selalu valid
    $mapsSearchUrl = 'https://www.google.com/maps/search/?api=1&query=' . urlencode($kuliner->nama . ' ' . $kuliner->alamat);
    $embedUrl = 'https://maps.google.com/maps?q=' . urlencode($kuliner->nama . ' ' . $kuliner->alamat) . '&output=embed&z=16';

    // Gunakan link dari DB hanya jika URL-nya valid dan punya path (bukan hanya domain kosong)
    $storedMaps = $kuliner->maps;
    $parsedUrl = $storedMaps ? parse_url($storedMaps) : null;
    $hasValidPath = $parsedUrl && isset($parsedUrl['path']) && strlen(trim($parsedUrl['path'], '/')) > 0;
    $finalMapsUrl = ($storedMaps && $hasValidPath) ? $storedMaps : $mapsSearchUrl;

    // Jika link DB punya embed khusus, pakai itu
    if ($storedMaps && str_contains($storedMaps, 'google.com/maps/embed')) {
        $embedUrl = $storedMaps;
    }
@endphp

{{-- Hero / Foto --}}
@if($kuliner->foto)
    <div style="height:420px;overflow:hidden;position:relative;">
        <img src="{{ Storage::url($kuliner->foto) }}" alt="{{ $kuliner->nama }}" style="width:100%;height:100%;object-fit:cover;">
        <div style="position:absolute;inset:0;background:linear-gradient(to top,rgba(0,0,0,0.55) 0%,transparent 60%);"></div>
        <div style="position:absolute;bottom:32px;left:0;right:0;" class="container">
            <h1 class="text-white fw-bold mb-0" style="font-family:'Plus Jakarta Sans',sans-serif;text-shadow:0 2px 8px rgba(0,0,0,0.4);">{{ $kuliner->nama }}</h1>
        </div>
    </div>
@else
    <div style="background:linear-gradient(135deg,#0a3d1f,#1a6b3a);padding:60px 0;">
        <div class="container text-white">
            <h1 class="fw-bold mb-0" style="font-family:'Plus Jakarta Sans',sans-serif;">{{ $kuliner->nama }}</h1>
        </div>
    </div>
@endif

<div class="container py-5">
    <div class="row g-4">

        {{-- Kolom Kiri: Info Utama --}}
        <div class="col-lg-8">
            {{-- Breadcrumb --}}
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none" style="color:#1a6b3a;">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('public.kuliner') }}" class="text-decoration-none" style="color:#1a6b3a;">Kuliner</a></li>
                    <li class="breadcrumb-item active text-muted">{{ $kuliner->nama }}</li>
                </ol>
            </nav>

            {{-- Nama (jika tidak ada foto hero) --}}
            @if(!$kuliner->foto)
            <h1 class="fw-bold mb-3" style="font-family:'Plus Jakarta Sans',sans-serif;">{{ $kuliner->nama }}</h1>
            @endif

            {{-- Detail Info Cards --}}
            <div class="row g-3 mb-4">
                @if($kuliner->menu_unggulan)
                <div class="col-sm-6">
                    <div class="d-flex align-items-start gap-3 p-3 rounded-3" style="background:#fff8f0;border:1px solid #fde8c8;">
                        <div style="width:38px;height:38px;background:#fd7e14;border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <i class="fa-solid fa-star text-white" style="font-size:0.9rem;"></i>
                        </div>
                        <div>
                            <div class="fw-semibold small text-muted mb-1">Menu Unggulan</div>
                            <div class="fw-bold" style="color:#333;">{{ $kuliner->menu_unggulan }}</div>
                        </div>
                    </div>
                </div>
                @endif

                @if($kuliner->jam_buka)
                <div class="col-sm-6">
                    <div class="d-flex align-items-start gap-3 p-3 rounded-3" style="background:#f0fff4;border:1px solid #b7ebc8;">
                        <div style="width:38px;height:38px;background:#1a6b3a;border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <i class="fa-regular fa-clock text-white" style="font-size:0.9rem;"></i>
                        </div>
                        <div>
                            <div class="fw-semibold small text-muted mb-1">Jam Buka</div>
                            <div class="fw-bold" style="color:#333;">{{ $kuliner->jam_buka }}</div>
                        </div>
                    </div>
                </div>
                @endif

                @if($kuliner->no_hp)
                <div class="col-sm-6">
                    <div class="d-flex align-items-start gap-3 p-3 rounded-3" style="background:#f0f4ff;border:1px solid #c7d4fb;">
                        <div style="width:38px;height:38px;background:#4361ee;border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <i class="fa-solid fa-phone text-white" style="font-size:0.9rem;"></i>
                        </div>
                        <div>
                            <div class="fw-semibold small text-muted mb-1">No. Telepon</div>
                            <div class="fw-bold" style="color:#333;">
                                <a href="tel:{{ $kuliner->no_hp }}" class="text-decoration-none" style="color:#4361ee;">{{ $kuliner->no_hp }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                @if($kuliner->alamat)
                <div class="col-sm-6">
                    <div class="d-flex align-items-start gap-3 p-3 rounded-3" style="background:#fff0f3;border:1px solid #fbc8d4;">
                        <div style="width:38px;height:38px;background:#e63946;border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <i class="fa-solid fa-location-dot text-white" style="font-size:0.9rem;"></i>
                        </div>
                        <div>
                            <div class="fw-semibold small text-muted mb-1">Alamat</div>
                            <div style="color:#333;font-size:0.92rem;">{{ $kuliner->alamat }}</div>
                        </div>
                    </div>
                </div>
                @endif
            </div>

            {{-- Tombol Aksi --}}
            <div class="d-flex flex-wrap gap-2 mt-2">
                <a href="{{ $finalMapsUrl }}" target="_blank" rel="noopener noreferrer"
                   class="btn btn-danger px-4 py-2"
                   style="border-radius:10px;font-weight:600;background:#e63946;border-color:#e63946;">
                    <i class="fa-solid fa-map-location-dot me-2"></i>Buka di Google Maps
                </a>
                @if($kuliner->no_hp)
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $kuliner->no_hp) }}" target="_blank" rel="noopener noreferrer"
                   class="btn px-4 py-2"
                   style="border-radius:10px;font-weight:600;background:#25D366;border-color:#25D366;color:#fff;">
                    <i class="fa-brands fa-whatsapp me-2"></i>WhatsApp
                </a>
                @endif
                <a href="{{ route('public.kuliner') }}"
                   class="btn btn-outline-secondary px-4 py-2"
                   style="border-radius:10px;font-weight:600;">
                    <i class="fa-solid fa-arrow-left me-2"></i>Kembali
                </a>
            </div>
        </div>

        {{-- Kolom Kanan: Peta / Embed Maps --}}
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
                        height="280"
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
        </div>

    </div>
</div>
@endsection
