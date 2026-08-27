@extends('layouts.public')
@section('title', $wisata->nama.' — Pesona Magetan')

@push('styles')
<style>
    /* Star rating input — pengganti <select> angka, bisa diklik langsung */
    .star-rating-input {
        display: flex;
        flex-direction: row-reverse; /* trik CSS: DOM 5..1, tampil 1..5 kiri ke kanan */
        gap: 4px;
    }
    .star-rating-input input {
        display: none;
    }
    .star-rating-input label {
        cursor: pointer;
        font-size: 1.35rem;
        color: var(--border);
        transition: color 0.15s ease, transform 0.1s ease;
    }
    .star-rating-input label:hover {
        transform: scale(1.15);
    }
    .star-rating-input input:checked ~ label,
    .star-rating-input label:hover,
    .star-rating-input label:hover ~ label {
        color: var(--accent);
    }

    /* ===== PHOTO GRID (Klook Style: 1 besar kiri + 4 thumb kanan 2x2) ===== */
    .photo-grid-outer {
        padding-left: 12px;
        padding-right: 12px;
    }
    .photo-grid-wrapper {
        position: relative;
        overflow: hidden;
        border-radius: 12px;
        margin-top: 12px;
    }
    .photo-grid {
        display: grid;
        grid-template-columns: 1.2fr 1fr 1fr;
        grid-template-rows: 240px 240px;
        gap: 4px;
        height: 484px;
    }
    /* Gambar utama: kolom 1, span 2 baris */
    .photo-grid .photo-main {
        grid-column: 1;
        grid-row: 1 / 3;
    }
    /* 4 thumbnail: kolom 2-3, masing-masing 1 baris */
    .photo-grid .photo-thumb {
        grid-column: auto;
        grid-row: auto;
    }
    .photo-grid-item {
        position: relative;
        overflow: hidden;
        cursor: pointer;
        background: #0d1f1a;
    }
    .photo-grid-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.35s ease, opacity 0.25s ease;
    }
    .photo-grid-item:hover img {
        transform: scale(1.05);
        opacity: 0.88;
    }
    /* Overlay gelap pada thumb terakhir jika ada lebih dari 5 foto */
    .photo-thumb-overlay {
        position: absolute;
        inset: 0;
        background: rgba(0,0,0,0.52);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        gap: 4px;
        color: #fff;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 700;
        font-size: 1.1rem;
        pointer-events: none;
        transition: background 0.2s;
    }
    .photo-grid-item:hover .photo-thumb-overlay {
        background: rgba(0,0,0,0.62);
    }
    /* Wishlist button */
    .photo-grid-wishlist {
        position: absolute;
        top: 14px;
        right: 14px;
        z-index: 20;
    }
    /* Badge jumlah foto (pojok kanan bawah) */
    .photo-count-badge {
        position: absolute;
        bottom: 14px;
        right: 14px;
        z-index: 20;
        background: rgba(0,0,0,0.65);
        color: #fff;
        border: 2px solid rgba(255,255,255,0.85);
        border-radius: 8px;
        padding: 5px 12px;
        font-size: 0.8rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 6px;
        pointer-events: none;
        letter-spacing: 0.3px;
    }
    /* ===== LIGHTBOX ===== */
    .lbox-backdrop {
        display: none;
        position: fixed;
        inset: 0;
        z-index: 9999;
        background: rgba(0,0,0,0.92);
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }
    .lbox-backdrop.open {
        display: flex;
    }
    .lbox-main-img {
        max-width: 88vw;
        max-height: 72vh;
        border-radius: 10px;
        object-fit: contain;
        box-shadow: 0 8px 40px rgba(0,0,0,0.5);
        transition: opacity 0.2s;
    }
    .lbox-thumbs {
        display: flex;
        gap: 8px;
        margin-top: 16px;
        overflow-x: auto;
        padding-bottom: 4px;
        max-width: 88vw;
    }
    .lbox-thumb {
        width: 68px;
        height: 52px;
        border-radius: 6px;
        object-fit: cover;
        cursor: pointer;
        opacity: 0.55;
        border: 2px solid transparent;
        transition: opacity 0.2s, border-color 0.2s;
        flex-shrink: 0;
    }
    .lbox-thumb.active, .lbox-thumb:hover {
        opacity: 1;
        border-color: #fff;
    }
    .lbox-nav {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(255,255,255,0.13);
        border: none;
        color: #fff;
        width: 46px;
        height: 46px;
        border-radius: 50%;
        font-size: 1.2rem;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background 0.2s;
        z-index: 10;
    }
    .lbox-nav:hover { background: rgba(255,255,255,0.28); }
    .lbox-nav-left  { left: 18px; }
    .lbox-nav-right { right: 18px; }
    .lbox-close {
        position: absolute;
        top: 16px;
        right: 20px;
        background: rgba(255,255,255,0.13);
        border: none;
        color: #fff;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        font-size: 1.1rem;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background 0.2s;
        z-index: 11;
    }
    .lbox-close:hover { background: rgba(255,255,255,0.28); }
    .lbox-counter {
        color: rgba(255,255,255,0.7);
        font-size: 0.82rem;
        margin-top: 10px;
        letter-spacing: 1px;
    }

    /* Fallback: hanya 1 foto (banner penuh) */
    .photo-banner-single {
        height: 420px;
        overflow: hidden;
        position: relative;
        border-radius: 12px;
        margin-top: 12px;
    }
    .photo-banner-single img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* Responsive */
    @media (max-width: 900px) {
        .photo-grid {
            grid-template-columns: 1.2fr 1fr 1fr;
            grid-template-rows: 170px 170px;
            height: 344px;
        }
    }
    @media (max-width: 640px) {
        .photo-grid {
            grid-template-columns: 1fr 1fr;
            grid-template-rows: 150px 150px;
            height: 304px;
        }
        .photo-grid .photo-main { grid-column: 1; grid-row: 1 / 3; }
        /* Sembunyikan thumb ke-4 di layar kecil */
        .photo-grid .photo-thumb:nth-child(5) { display: none; }
        .photo-banner-single { height: 260px; }
        .lbox-main-img { max-width: 97vw; max-height: 60vh; }
    }
    @media (max-width: 420px) {
        .photo-grid {
            grid-template-columns: 1fr 1fr;
            grid-template-rows: 130px 130px;
            height: 264px;
        }
    }
</style>
@endpush

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

@php
    $backUrl = route('public.wisata');
    if (request()->has('page') || request()->has('q') || request()->has('kategori') || request()->has('kecamatan')) {
        $backUrl = route('public.wisata', request()->query());
    } elseif (url()->previous() && url()->previous() !== url()->current() && str_contains(url()->previous(), '/wisata')) {
        $backUrl = url()->previous();
    }
@endphp

<div class="container mt-4 mb-3">
    {{-- Breadcrumb --}}
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none" style="color:#1F3A34;">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ $backUrl }}" class="text-decoration-none" style="color:#1F3A34;">Wisata</a></li>
            <li class="breadcrumb-item active text-muted">{{ $wisata->nama }}</li>
        </ol>
    </nav>
</div>

{{-- ===== PHOTO GRID (Klook Style) ===== --}}
@php
    // Kumpulkan semua foto: thumbnail + galeri
    $allPhotos = collect();
    if ($wisata->thumbnail) {
        $allPhotos->push(\Storage::url($wisata->thumbnail));
    }
    foreach ($wisata->galleries as $g) {
        $allPhotos->push(\Storage::url($g->foto));
    }
    $totalPhotos = $allPhotos->count();
    $isWishlisted = auth()->check() && auth()->user()->wishlist->contains($wisata->id);
@endphp

@if($totalPhotos >= 2)
{{-- Grid Mode: gambar besar kiri + 4 thumbnail kanan (2×2) --}}
<div class="container photo-grid-outer">
<div class="photo-grid-wrapper">
    <div class="photo-grid">
        {{-- Gambar utama (kiri, full tinggi) --}}
        <div class="photo-grid-item photo-main" onclick="lboxOpen(0)" role="button" aria-label="Lihat foto 1">
            <img src="{{ $allPhotos->get(0) }}" alt="{{ $wisata->nama }} - Foto 1" loading="eager">
        </div>

        {{-- Thumbnail kanan atas-kiri (index 1) --}}
        @if($allPhotos->get(1))
        <div class="photo-grid-item photo-thumb" onclick="lboxOpen(1)" role="button" aria-label="Lihat foto 2">
            <img src="{{ $allPhotos->get(1) }}" alt="{{ $wisata->nama }} - Foto 2" loading="lazy">
        </div>
        @endif

        {{-- Thumbnail kanan atas-kanan (index 2) --}}
        @if($allPhotos->get(2))
        <div class="photo-grid-item photo-thumb" onclick="lboxOpen(2)" role="button" aria-label="Lihat foto 3">
            <img src="{{ $allPhotos->get(2) }}" alt="{{ $wisata->nama }} - Foto 3" loading="lazy">
        </div>
        @endif

        {{-- Thumbnail kanan bawah-kiri (index 3) --}}
        @if($allPhotos->get(3))
        <div class="photo-grid-item photo-thumb" onclick="lboxOpen(3)" role="button" aria-label="Lihat foto 4">
            <img src="{{ $allPhotos->get(3) }}" alt="{{ $wisata->nama }} - Foto 4" loading="lazy">
        </div>
        @endif

        {{-- Thumbnail kanan bawah-kanan (index 4) — overlay jika ada lebih dari 5 foto --}}
        @if($allPhotos->get(4))
        <div class="photo-grid-item photo-thumb" onclick="lboxOpen(4)" role="button" aria-label="Lihat foto 5">
            <img src="{{ $allPhotos->get(4) }}" alt="{{ $wisata->nama }} - Foto 5" loading="lazy">
            @if($totalPhotos > 5)
            <div class="photo-thumb-overlay">
                <i class="fa-regular fa-images fa-lg"></i>
                <span>+{{ $totalPhotos - 5 }} foto</span>
            </div>
            @endif
        </div>
        @endif
    </div>

    {{-- Wishlist button --}}
    <div class="photo-grid-wishlist">
        @auth
        <button type="button" class="wishlist-btn {{ $isWishlisted ? 'active' : '' }}"
            data-id="{{ $wisata->id }}"
            data-active="{{ $isWishlisted ? 'true' : 'false' }}"
            title="{{ $isWishlisted ? 'Hapus dari Wisata Disukai' : 'Sukai Wisata Ini' }}">
            <i class="fa-heart {{ $isWishlisted ? 'fa-solid' : 'fa-regular' }}"></i>
        </button>
        @else
        <a href="{{ route('login') }}" class="wishlist-btn wishlist-btn-guest" title="Login untuk menyukai wisata">
            <i class="fa-regular fa-heart"></i>
        </a>
        @endauth
    </div>

    {{-- Badge jumlah foto (pojok kanan bawah, klik buka lightbox) --}}
    @if($totalPhotos > 1)
    <div class="photo-count-badge" onclick="lboxOpen(0)" style="cursor:pointer;pointer-events:auto;">
        <i class="fa-regular fa-images"></i>
        {{ $totalPhotos }} foto
    </div>
    @endif
</div>{{-- /photo-grid-wrapper --}}
</div>{{-- /container photo-grid-outer --}}

@elseif($totalPhotos == 1)
{{-- Single banner mode --}}
<div class="container photo-grid-outer">
<div class="photo-banner-single">
    <img src="{{ $allPhotos->get(0) }}" alt="{{ $wisata->nama }}">
    <div style="position:absolute;inset:0;background:linear-gradient(to top,rgba(0,0,0,0.6) 0%,transparent 55%);"></div>

    <div class="photo-grid-wishlist">
        @auth
        <button type="button" class="wishlist-btn {{ $isWishlisted ? 'active' : '' }}"
            data-id="{{ $wisata->id }}"
            data-active="{{ $isWishlisted ? 'true' : 'false' }}"
            title="{{ $isWishlisted ? 'Hapus dari Wisata Disukai' : 'Sukai Wisata Ini' }}">
            <i class="fa-heart {{ $isWishlisted ? 'fa-solid' : 'fa-regular' }}"></i>
        </button>
        @else
        <a href="{{ route('login') }}" class="wishlist-btn wishlist-btn-guest" title="Login untuk menyukai wisata">
            <i class="fa-regular fa-heart"></i>
        </a>
        @endauth
    </div>
</div>{{-- /photo-banner-single --}}
</div>{{-- /container photo-grid-outer --}}

@else
{{-- Tidak ada foto sama sekali --}}
<div style="background:#f8f9fa;height:120px;position:relative;border-radius:12px;margin-top:12px;" class="container photo-grid-outer d-flex align-items-center justify-content-center">
    <div class="text-muted"><i class="fa-regular fa-image me-2"></i>Belum ada foto</div>
    <div class="photo-grid-wishlist" style="top:14px;right:14px;position:absolute;">
        @auth
        <button type="button" class="wishlist-btn {{ $isWishlisted ? 'active' : '' }}"
            data-id="{{ $wisata->id }}"
            data-active="{{ $isWishlisted ? 'true' : 'false' }}"
            title="{{ $isWishlisted ? 'Hapus dari Wisata Disukai' : 'Sukai Wisata Ini' }}">
            <i class="fa-heart {{ $isWishlisted ? 'fa-solid' : 'fa-regular' }}"></i>
        </button>
        @else
        <a href="{{ route('login') }}" class="wishlist-btn wishlist-btn-guest" title="Login untuk menyukai wisata">
            <i class="fa-regular fa-heart"></i>
        </a>
        @endauth
    </div>
</div>
@endif

{{-- ===== LIGHTBOX MODAL ===== --}}
@if($totalPhotos > 0)
<div class="lbox-backdrop" id="lbox" role="dialog" aria-modal="true" aria-label="Galeri foto {{ $wisata->nama }}">
    <button class="lbox-close" onclick="lboxClose()" aria-label="Tutup"><i class="fa-solid fa-xmark"></i></button>
    <button class="lbox-nav lbox-nav-left" onclick="lboxPrev()" aria-label="Foto sebelumnya"><i class="fa-solid fa-chevron-left"></i></button>
    <button class="lbox-nav lbox-nav-right" onclick="lboxNext()" aria-label="Foto berikutnya"><i class="fa-solid fa-chevron-right"></i></button>

    <img class="lbox-main-img" id="lbox-img" src="" alt="Foto wisata">
    <div class="lbox-counter" id="lbox-counter"></div>

    <div class="lbox-thumbs" id="lbox-thumbs">
        @foreach($allPhotos as $idx => $photo)
        <img src="{{ $photo }}" alt="Foto {{ $idx + 1 }}" class="lbox-thumb" onclick="lboxGoto({{ $idx }})" data-idx="{{ $idx }}">
        @endforeach
    </div>
</div>

<script>
    const lboxPhotos = @json($allPhotos->values());
    let lboxCurrent = 0;
    function lboxOpen(idx) {
        lboxCurrent = idx;
        document.getElementById('lbox').classList.add('open');
        document.body.style.overflow = 'hidden';
        lboxRender();
    }
    function lboxClose() {
        document.getElementById('lbox').classList.remove('open');
        document.body.style.overflow = '';
    }
    function lboxPrev() {
        lboxCurrent = (lboxCurrent - 1 + lboxPhotos.length) % lboxPhotos.length;
        lboxRender();
    }
    function lboxNext() {
        lboxCurrent = (lboxCurrent + 1) % lboxPhotos.length;
        lboxRender();
    }
    function lboxGoto(idx) {
        lboxCurrent = idx;
        lboxRender();
    }
    function lboxRender() {
        const img = document.getElementById('lbox-img');
        img.style.opacity = '0';
        setTimeout(() => {
            img.src = lboxPhotos[lboxCurrent];
            img.alt = 'Foto ' + (lboxCurrent + 1);
            img.style.opacity = '1';
        }, 100);
        document.getElementById('lbox-counter').textContent = (lboxCurrent + 1) + ' / ' + lboxPhotos.length;
        document.querySelectorAll('.lbox-thumb').forEach((t, i) => {
            t.classList.toggle('active', i === lboxCurrent);
            if (i === lboxCurrent) t.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
        });
    }
    // Keyboard nav
    document.addEventListener('keydown', function(e) {
        if (!document.getElementById('lbox').classList.contains('open')) return;
        if (e.key === 'ArrowLeft')  lboxPrev();
        if (e.key === 'ArrowRight') lboxNext();
        if (e.key === 'Escape')     lboxClose();
    });
    // Click backdrop to close
    document.getElementById('lbox').addEventListener('click', function(e) {
        if (e.target === this) lboxClose();
    });
</script>
@endif

<div class="container mt-4 mb-5">
    <div class="row g-4">

        {{-- Kolom Kiri: Informasi Utama --}}
        <div class="col-lg-8">

            {{-- Judul Utama (Di bawah foto) --}}
            <div class="mb-4">
                <h1 style="font-family:'Plus Jakarta Sans',sans-serif;font-weight:800;font-size:2.2rem;margin-bottom:10px;color:#14261F;">{{ $wisata->nama }}</h1>
                <p class="text-muted mb-0" style="font-size:1.05rem;">
                    <span class="badge me-2" style="background:#1F3A34;font-size:0.85rem;padding:6px 12px;border-radius:6px;vertical-align:middle;">{{ $wisata->kategori }}</span>
                    <i class="fa-solid fa-location-dot me-1" style="color:#C89B3C;"></i> {{ $wisata->alamat }}, Kec. {{ $wisata->kecamatan }}, Kab. Magetan
                </p>
            </div>

            {{-- Info Cards --}}
            <div class="row g-3 mb-4">
                <div class="col-sm-6">
                    <div class="d-flex align-items-start gap-3 p-3 rounded-3" style="background:#F5F7F1;border:1px solid #DCE4DD;">
                        <div style="width:38px;height:38px;background:#1F3A34;border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <i class="fa-solid fa-ticket text-white" style="font-size:0.9rem;"></i>
                        </div>
                        <div>
                            <div class="fw-semibold small text-muted mb-1">Harga Tiket</div>
                            <div class="fw-bold font-mono" style="color:#24302B;">{{ $wisata->harga_tiket > 0 ? 'Rp '.number_format($wisata->harga_tiket,0,',','.') : 'Gratis' }}</div>
                        </div>
                    </div>
                </div>

                @if($wisata->jam_operasional)
                <div class="col-sm-6">
                    <div class="d-flex align-items-start gap-3 p-3 rounded-3" style="background:#F5F7F1;border:1px solid #DCE4DD;">
                        <div style="width:38px;height:38px;background:#1F3A34;border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <i class="fa-regular fa-clock text-white" style="font-size:0.9rem;"></i>
                        </div>
                        <div>
                            <div class="fw-semibold small text-muted mb-1">Jam Operasional</div>
                            <div class="fw-bold font-mono" style="color:#24302B;">{{ $wisata->jam_operasional }}</div>
                        </div>
                    </div>
                </div>
                @endif

                @if($wisata->kecamatan)
                <div class="col-sm-6">
                    <div class="d-flex align-items-start gap-3 p-3 rounded-3" style="background:#F5F7F1;border:1px solid #DCE4DD;">
                        <div style="width:38px;height:38px;background:#1F3A34;border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <i class="fa-solid fa-location-dot text-white" style="font-size:0.9rem;"></i>
                        </div>
                        <div>
                            <div class="fw-semibold small text-muted mb-1">Kecamatan</div>
                            <div class="fw-bold" style="color:#24302B;">{{ $wisata->kecamatan }}</div>
                        </div>
                    </div>
                </div>
                @endif

                @if($wisata->fasilitas)
                <div class="col-sm-6">
                    <div class="d-flex align-items-start gap-3 p-3 rounded-3" style="background:#F5F7F1;border:1px solid #DCE4DD;">
                        <div style="width:38px;height:38px;background:#1F3A34;border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <i class="fa-solid fa-star text-white" style="font-size:0.9rem;"></i>
                        </div>
                        <div>
                            <div class="fw-semibold small text-muted mb-1">Fasilitas</div>
                            <div style="color:#24302B;font-size:0.92rem;">{{ $wisata->fasilitas }}</div>
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

            {{-- Rating & Ulasan --}}
            <div class="mb-5" id="ulasan">
                {{-- Header --}}
                <div class="d-flex align-items-center gap-3 mb-4">
                    <h5 class="fw-bold mb-0" style="font-family:'Plus Jakarta Sans',sans-serif;">
                        Ulasan & Rating
                    </h5>
                    <div class="d-flex align-items-center gap-1 px-3 py-1 rounded-pill" style="background:#fff8e1;">
                        <i class="fa-solid fa-star" style="color:#C89B3C; font-size:0.9rem;"></i>
                        <strong style="color:#C89B3C;">{{ number_format($wisata->ratings_avg_rating ?? 0, 1) }}</strong>
                        <span class="text-muted" style="font-size:0.8rem;">({{ $wisata->ratings_count ?? 0 }} ulasan)</span>
                    </div>
                </div>

                {{-- Alert status --}}
                @if(session('status'))
                <div class="alert alert-success alert-dismissible fade show py-2 mb-3" role="alert" style="border-radius:10px;">
                    <i class="fa-solid fa-circle-check me-2"></i>{{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif

                @auth
                @php $myRating = $wisata->ratings->firstWhere('user_id', auth()->id()); @endphp

                @if($myRating)
                {{-- User sudah punya ulasan: tampilkan ulasan dengan tombol hapus saja --}}
                <div class="mb-4 p-3 rounded-3" style="background:var(--bg-light); border:1px solid var(--border);">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <p class="fw-semibold small mb-0" style="color:var(--primary);"><i class="fa-solid fa-circle-check me-1"></i>Ulasan Anda Sudah Terkirim</p>
                        <form action="{{ route('rating.destroy', $wisata) }}" method="POST"
                              onsubmit="return confirm('Hapus ulasan Anda?');">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger" style="font-size:0.78rem; padding:2px 10px;">
                                <i class="fa-solid fa-trash me-1"></i>Hapus Ulasan
                            </button>
                        </form>
                    </div>
                    <div class="d-flex align-items-center gap-1 mb-2">
                        @for($i = 1; $i <= 5; $i++)
                            <i class="fa-{{ $i <= $myRating->rating ? 'solid' : 'regular' }} fa-star" style="color:var(--accent); font-size:0.85rem;"></i>
                        @endfor
                        <span class="text-muted ms-1" style="font-size:0.78rem;">({{ $myRating->rating }}/5)</span>
                    </div>
                    @if($myRating->komentar)
                    <p class="mb-0" style="font-size:0.9rem; color:#444; line-height:1.7;">{{ $myRating->komentar }}</p>
                    @else
                    <p class="mb-0 text-muted fst-italic" style="font-size:0.85rem;">— tidak ada komentar —</p>
                    @endif
                </div>
                @else
                {{-- Belum ada ulasan: form kirim baru --}}
                <form action="{{ route('rating.store', $wisata) }}" method="POST" class="mb-4 p-3 rounded-3" style="background:var(--bg-light); border:1px solid var(--border);">
                    @csrf
                    <p class="fw-semibold small mb-2" style="color:var(--primary);"><i class="fa-solid fa-pen-to-square me-1"></i>Tulis Ulasan Anda</p>
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <label class="small fw-semibold mb-0 text-muted">Rating:</label>
                        <div class="star-rating-input" role="radiogroup" aria-label="Pilih rating">
                            @for ($i = 5; $i >= 1; $i--)
                                <input type="radio" name="rating" id="star{{ $i }}" value="{{ $i }}" required>
                                <label for="star{{ $i }}" title="{{ $i }} bintang"><i class="fa-solid fa-star"></i></label>
                            @endfor
                        </div>
                    </div>
                    <textarea name="komentar" class="form-control mb-2" rows="3" placeholder="Tulis ulasanmu..." style="font-size:0.9rem;"></textarea>
                    <button type="submit" class="btn btn-sm" style="background:var(--primary);color:#fff;font-size:0.85rem;border-radius:8px;">
                        <i class="fa-solid fa-paper-plane me-1"></i>Kirim Ulasan
                    </button>
                </form>
                @endif

                @else
                <div class="mb-4 p-3 rounded-3 text-center" style="background:var(--bg-light); border:1px dashed var(--border);">
                    <p class="text-muted mb-0 small">
                        <a href="{{ route('login') }}" style="color:var(--primary); font-weight:600;">Login</a> terlebih dahulu untuk memberikan ulasan.
                    </p>
                </div>
                @endauth

                {{-- Daftar Semua Ulasan --}}
                <div id="daftar-ulasan">
                    @forelse ($wisata->ratings as $r)
                    <div class="py-3" style="border-bottom:1px solid #f0f0f0;">
                        {{-- Header Ulasan --}}
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="d-flex align-items-center gap-2">
                                <div style="width:38px;height:38px;border-radius:50%;background:#1F3A34;display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;font-size:0.9rem;flex-shrink:0;">
                                    {{ strtoupper(substr($r->user->name, 0, 1)) }}
                                </div>
                                <div>
                                    <strong style="font-size:0.9rem;">{{ $r->user->name }}</strong>
                                    <div class="text-muted" style="font-size:0.73rem;">
                                        <i class="fa-regular fa-clock me-1"></i>{{ $r->created_at->translatedFormat('d F Y, H:i') }}
                                        @if($r->updated_at->gt($r->created_at->addSeconds(5)))
                                            <span class="ms-1">(diedit)</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="text-warning" style="font-size:0.85rem; letter-spacing:1px; flex-shrink:0;">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fa-{{ $i <= $r->rating ? 'solid' : 'regular' }} fa-star"></i>
                                @endfor
                                <span class="text-muted ms-1" style="font-size:0.75rem;">({{ $r->rating }}/5)</span>
                            </div>
                        </div>

                        {{-- Komentar --}}
                        @if($r->komentar)
                        <p class="mt-2 mb-2" style="font-size:0.9rem; color:#444; line-height:1.7;">{{ $r->komentar }}</p>
                        @else
                        <p class="mt-2 mb-2 text-muted fst-italic" style="font-size:0.85rem;">— tidak ada komentar —</p>
                        @endif

                        {{-- Balasan Admin --}}
                        @if($r->admin_reply)
                        <div class="mt-2 p-3 rounded-3" style="background:#F5F7F1; border-left:3px solid #1F3A34; margin-left:10px;">
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <i class="fa-solid fa-shield-halved" style="color:#1F3A34; font-size:0.8rem;"></i>
                                <strong style="color:#1F3A34; font-size:0.82rem;">Dinas Pariwisata & Kebudayaan</strong>
                                <span class="text-muted" style="font-size:0.72rem;">
                                    · <i class="fa-regular fa-clock me-1"></i>{{ $r->admin_replied_at?->translatedFormat('d F Y, H:i') }}
                                </span>
                            </div>
                            <p class="mb-0" style="font-size:0.88rem; color:#2d6a4f; line-height:1.65;">{{ $r->admin_reply }}</p>
                        </div>
                        @endif

                        {{-- Tombol Like --}}
                        <div class="mt-2 d-flex align-items-center gap-1">
                            @auth
                            <button
                                class="btn-like d-flex align-items-center gap-1"
                                data-rating-id="{{ $r->id }}"
                                data-liked="{{ session()->has('liked_rating_'.$r->id.'_'.auth()->id()) ? 'true' : 'false' }}"
                                style="border:1px solid #dee2e6; background:transparent; border-radius:20px; padding:3px 10px; font-size:0.8rem; cursor:pointer; transition:all 0.2s; color:#6c757d;"
                            >
                                <i class="fa-{{ session()->has('liked_rating_'.$r->id.'_'.auth()->id()) ? 'solid' : 'regular' }} fa-thumbs-up" style="font-size:0.85rem;"></i>
                                <span class="like-count">{{ $r->likes }}</span>
                            </button>
                            @else
                            <span class="d-flex align-items-center gap-1" style="border:1px solid #dee2e6; border-radius:20px; padding:3px 10px; font-size:0.8rem; color:#6c757d;">
                                <i class="fa-regular fa-thumbs-up" style="font-size:0.85rem;"></i>
                                <span>{{ $r->likes }}</span>
                            </span>
                            @endauth
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-4 text-muted">
                        <i class="fa-regular fa-comment-dots fa-2x mb-2 d-block opacity-25"></i>
                        <p class="mb-0 small">Belum ada ulasan. Jadilah yang pertama memberi ulasan!</p>
                    </div>
                    @endforelse
                </div>
            </div>

            {{-- Tombol Aksi --}}
            <div class="d-flex flex-wrap gap-2">
                <a href="{{ $finalMapsUrl }}" target="_blank" rel="noopener noreferrer"
                   class="btn btn-danger px-4 py-2"
                   style="border-radius:10px;font-weight:600;background:#7A3B2E;border-color:#7A3B2E;">
                    <i class="fa-solid fa-map-location-dot me-2"></i>Buka di Google Maps
                </a>
                <a href="{{ $backUrl }}" onclick="if(document.referrer && document.referrer.includes('/wisata')){ history.back(); return false; }" class="btn-interactive btn-interactive-forest btn-interactive-md">
                    <span class="btn-text-initial">Kembali</span>
                    <div class="btn-text-hover">
                        <i class="fa-solid fa-arrow-left"></i>
                        <span>Kembali</span>
                    </div>
                    <div class="btn-bubble"></div>
                </a>
            </div>
        </div>

        {{-- Kolom Kanan: Peta --}}
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm" style="border-radius:16px;overflow:hidden;position:sticky;top:80px;">
                <div class="card-header py-3 px-4 border-0" style="background:#f8f9fa;">
                    <h6 class="fw-bold mb-0" style="font-family:'Plus Jakarta Sans',sans-serif;">
                        <i class="fa-solid fa-map-location-dot me-2" style="color:#7A3B2E;"></i>Lokasi
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
                       style="border-radius:10px;font-weight:600;background:#7A3B2E;border-color:#7A3B2E;">
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

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

    document.querySelectorAll('.btn-like').forEach(function (btn) {
        // Set initial visual state
        updateLikeBtn(btn, btn.dataset.liked === 'true');

        btn.addEventListener('click', function () {
            const ratingId = this.dataset.ratingId;

            fetch('/rating/' + ratingId + '/like', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                },
            })
            .then(res => res.json())
            .then(data => {
                this.dataset.liked = data.liked ? 'true' : 'false';
                this.querySelector('.like-count').textContent = data.likes;
                updateLikeBtn(this, data.liked);

                // Bounce animation
                this.style.transform = 'scale(1.2)';
                setTimeout(() => { this.style.transform = 'scale(1)'; }, 200);
            })
            .catch(() => {});
        });
    });

    function updateLikeBtn(btn, liked) {
        const icon = btn.querySelector('i');
        if (liked) {
            btn.style.color = '#1F3A34';
            btn.style.borderColor = '#1F3A34';
            btn.style.background = '#f0fff4';
            icon.className = 'fa-solid fa-thumbs-up';
            icon.style.fontSize = '0.85rem';
        } else {
            btn.style.color = '#6c757d';
            btn.style.borderColor = '#dee2e6';
            btn.style.background = 'transparent';
            icon.className = 'fa-regular fa-thumbs-up';
            icon.style.fontSize = '0.85rem';
        }
    }
});
</script>
@endpush