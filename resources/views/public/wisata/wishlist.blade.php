@extends('layouts.public')
@section('title', 'Wisata Disukai — Jelajah Magetan')

@push('styles')
<style>
/* =============================================
   21st.dev WISATA CARD SYSTEM
============================================= */
.wisata-card-21st {
    position: relative;
    height: 380px;
    border-radius: 22px;
    overflow: hidden;
    background: #0f221a;
    border: 1px solid rgba(255, 255, 255, 0.12);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    transition: transform 0.4s cubic-bezier(0.2, 0.6, 0.2, 1),
                box-shadow 0.4s cubic-bezier(0.2, 0.6, 0.2, 1),
                border-color 0.4s ease;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.wisata-card-21st:hover {
    transform: translateY(-8px) scale(1.01);
    box-shadow: 0 24px 50px rgba(10, 26, 18, 0.45), 0 0 0 1px rgba(200, 155, 60, 0.35);
    border-color: rgba(200, 155, 60, 0.4);
}

.wc-img-wrapper {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
    overflow: hidden;
}

.wc-bg-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.7s cubic-bezier(0.2, 0.6, 0.2, 1);
}

.wisata-card-21st:hover .wc-bg-img {
    transform: scale(1.09);
}

.wc-no-img {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #142e20, #0a1b13);
    color: rgba(255, 255, 255, 0.2);
    font-size: 3.5rem;
}

.wc-gradient-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(
        180deg,
        rgba(10, 22, 18, 0.65) 0%,
        rgba(10, 22, 18, 0.1) 32%,
        rgba(10, 22, 18, 0.4) 60%,
        rgba(8, 18, 14, 0.95) 100%
    );
    transition: opacity 0.3s ease;
}

.wc-top-bar {
    position: relative;
    z-index: 5;
    padding: 16px 18px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.wc-badge-category {
    background: rgba(15, 34, 26, 0.75);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    color: #fff;
    font-size: 0.75rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.6px;
    padding: 5px 12px;
    border-radius: 100px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
}

.wc-bottom-content {
    position: relative;
    z-index: 5;
    padding: 18px 20px 20px;
    margin-top: auto;
}

.wc-meta-row {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 8px;
    flex-wrap: wrap;
}

.wc-rating-pill, .wc-hours-pill {
    background: rgba(0, 0, 0, 0.45);
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    border: 1px solid rgba(255, 255, 255, 0.15);
    padding: 3px 9px;
    border-radius: 100px;
    font-size: 0.72rem;
    font-weight: 600;
    color: rgba(255, 255, 255, 0.9);
    display: inline-flex;
    align-items: center;
    gap: 4px;
}

.wc-title,
.wc-title a,
.wc-title span {
    font-family: 'Fraunces', serif;
    font-size: 1.3rem;
    font-weight: 700;
    line-height: 1.3;
    margin-bottom: 6px;
    color: #ffffff !important;
    text-decoration: none !important;
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.7);
}

.wc-title a:hover {
    color: var(--accent) !important;
}

.wc-location {
    font-size: 0.82rem;
    color: rgba(255, 255, 255, 0.82);
    display: flex;
    align-items: center;
    gap: 6px;
    margin-bottom: 14px;
    font-weight: 500;
}

.wc-location i {
    color: var(--accent);
}

.wc-footer-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 12px;
    border-top: 1px solid rgba(255, 255, 255, 0.12);
}

.wc-price-tag {
    display: flex;
    flex-direction: column;
}

.wc-price-label {
    font-size: 0.68rem;
    color: rgba(255, 255, 255, 0.6);
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-weight: 600;
}

.wc-price-val {
    font-family: 'IBM Plex Mono', monospace;
    font-size: 0.95rem;
    font-weight: 700;
    color: var(--accent-light, #ffd166);
}

.wc-explore-btn {
    position: relative;
    z-index: 6;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    border: 1px solid rgba(255, 255, 255, 0.25);
    color: #ffffff;
    font-size: 0.8rem;
    font-weight: 600;
    padding: 6px 14px;
    border-radius: 100px;
    text-decoration: none;
    transition: all 0.3s ease;
}

.wisata-card-21st:hover .wc-explore-btn {
    background: var(--accent);
    color: #14261F;
    border-color: var(--accent);
    transform: translateX(2px);
}

.wc-hitbox {
    position: absolute;
    inset: 0;
    z-index: 4;
    text-decoration: none;
}
</style>
@endpush

@section('content')
{{-- Page Hero Header --}}
<div style="background:linear-gradient(135deg,#0a3d1f,#1a6b3a);padding:70px 0 60px;" data-aos="fade-down">
    <div class="container text-white">
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb" style="--bs-breadcrumb-divider-color:rgba(255,255,255,0.5);">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white text-decoration-none opacity-75">Beranda</a></li>
                <li class="breadcrumb-item active text-white">Wisata Disukai</li>
            </ol>
        </nav>
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
            <div>
                <span class="badge mb-2 px-3 py-2" style="background:rgba(255,255,255,0.15);backdrop-filter:blur(8px);border:1px solid rgba(255,255,255,0.25);border-radius:100px;font-size:0.75rem;letter-spacing:1px;font-weight:700;">
                    <i class="fa-solid fa-heart me-1 text-danger"></i> KOLEKSI FAVORIT
                </span>
                <h1 class="fw-bold mb-2" style="font-family:'Plus Jakarta Sans',sans-serif;">Wisata yang Anda Sukai</h1>
                <p class="mb-0 text-white-50">Daftar destinasi wisata Magetan yang telah Anda simpan untuk dikunjungi</p>
            </div>
            <div>
                <a href="{{ route('public.wisata') }}" class="btn btn-outline-light px-4 py-2" style="border-radius:10px;font-weight:600;backdrop-filter:blur(8px);">
                    <i class="fa-solid fa-compass me-2"></i>Jelajahi Wisata Lainnya
                </a>
            </div>
        </div>
    </div>
</div>

<div class="container py-5">
    @if($wishlist->count())
    <div class="row g-4" id="wishlist-grid">
        @foreach($wishlist as $w)
        <div class="col-md-6 col-xl-4 wishlist-item-col" id="wishlist-col-{{ $w->id }}" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 80 }}">
            <div class="wisata-card-21st" data-tilt>
                {{-- Image background --}}
                <div class="wc-img-wrapper">
                    @if($w->thumbnail)
                        <img src="{{ Storage::url($w->thumbnail) }}" alt="{{ $w->nama }}" class="wc-bg-img" loading="lazy">
                    @else
                        <div class="wc-no-img">
                            <i class="fa-solid fa-mountain-sun"></i>
                        </div>
                    @endif
                    <div class="wc-gradient-overlay"></div>
                </div>

                {{-- Top Floating Bar --}}
                <div class="wc-top-bar">
                    <span class="wc-badge-category">
                        {{ $w->kategori }}
                    </span>

                    {{-- Like Button (Active) --}}
                    <button type="button"
                            class="wishlist-btn active"
                            data-id="{{ $w->id }}"
                            data-active="true"
                            data-is-wishlist-page="true"
                            title="Hapus dari Wisata Disukai"
                            aria-label="Hapus dari Disukai">
                        <i class="fa-solid fa-heart"></i>
                    </button>
                </div>

                {{-- Bottom Floating Content --}}
                <div class="wc-bottom-content">
                    <div class="wc-meta-row">
                        @if($w->ratings_avg_rating)
                        <span class="wc-rating-pill">
                            <i class="fa-solid fa-star text-warning"></i>
                            {{ number_format($w->ratings_avg_rating, 1) }}
                            @if($w->ratings_count)
                                <small>({{ $w->ratings_count }})</small>
                            @endif
                        </span>
                        @endif

                        @if($w->jam_operasional)
                        <span class="wc-hours-pill" title="Jam Operasional">
                            <i class="fa-regular fa-clock"></i>
                            {{ Str::limit($w->jam_operasional, 18) }}
                        </span>
                        @endif
                    </div>

                    <h3 class="wc-title text-white">
                        <span class="text-white">{{ $w->nama }}</span>
                    </h3>

                    <p class="wc-location">
                        <i class="fa-solid fa-location-dot"></i>
                        <span>{{ $w->kecamatan }}, Magetan</span>
                    </p>

                    <div class="wc-footer-row">
                        <div class="wc-price-tag">
                            <span class="wc-price-label">Tiket Masuk</span>
                            <span class="wc-price-val">
                                {{ $w->harga_tiket > 0 ? 'Rp ' . number_format($w->harga_tiket, 0, ',', '.') : 'Gratis' }}
                            </span>
                        </div>

                        <a href="{{ route('public.wisata.detail', $w->slug) }}" class="btn-interactive btn-interactive-card btn-interactive-sm">
                            <span class="btn-text-initial">Detail</span>
                            <div class="btn-text-hover">
                                <span>Detail</span>
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>
                            <div class="btn-bubble"></div>
                        </a>
                    </div>
                </div>

                {{-- Hitbox for entire card navigation --}}
                <a href="{{ route('public.wisata.detail', $w->slug) }}" class="wc-hitbox" aria-label="{{ $w->nama }}"></a>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-4">{{ $wishlist->links() }}</div>
    @endif

    {{-- Empty State (visible when empty or all un-favorited) --}}
    <div id="wishlist-empty-state" class="text-center py-5 {{ $wishlist->count() ? 'd-none' : '' }}" data-aos="fade-up">
        <div style="width:90px;height:90px;background:rgba(230,57,70,0.1);color:#e63946;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:2.5rem;margin-bottom:24px;border:2px dashed rgba(230,57,70,0.3);">
            <i class="fa-regular fa-heart"></i>
        </div>
        <h3 class="fw-bold mb-2" style="font-family:'Plus Jakarta Sans',sans-serif;">Belum Ada Wisata yang Disukai</h3>
        <p class="text-muted mb-4" style="max-width:480px;margin:0 auto;">
            Anda belum menambahkan tempat wisata ke dalam daftar favorit. Tekan tombol hati pada kartu wisata untuk menyimpannya di sini.
        </p>
        <a href="{{ route('public.wisata') }}" class="btn btn-warning fw-bold px-4 py-2" style="border-radius:12px;">
            <i class="fa-solid fa-compass me-2"></i>Jelajahi Destinasi Wisata
        </a>
    </div>
</div>
@endsection
