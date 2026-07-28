@extends('layouts.public')

@section('title', 'Beranda — E-Catalog Pariwisata Kabupaten Magetan')
@section('meta_description', 'Jelajahi destinasi wisata, event, dan berita terbaik di Kabupaten Magetan.')

@push('styles')
<style>
    /* ===== HERO ===== */
    .hero-section {
        min-height: 88vh;
        background: linear-gradient(135deg, #0a3d1f 0%, #1a6b3a 50%, #2d8a55 100%);
        display: flex;
        align-items: center;
        position: relative;
        overflow: hidden;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        inset: 0;
        background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 800 800'%3E%3Cg fill='none' stroke='%23fff' stroke-width='1' opacity='0.05'%3E%3Ccircle cx='400' cy='400' r='200'/%3E%3Ccircle cx='400' cy='400' r='300'/%3E%3Ccircle cx='400' cy='400' r='400'/%3E%3C/g%3E%3C/svg%3E") center/cover;
    }

    .hero-dots {
        position: absolute;
        inset: 0;
        background-image: radial-gradient(circle, rgba(255,255,255,0.06) 1px, transparent 1px);
        background-size: 32px 32px;
    }

    .hero-badge {
        display: inline-block;
        background: rgba(255,255,255,0.15);
        border: 1px solid rgba(255,255,255,0.3);
        color: #fff;
        font-size: 0.8rem;
        font-weight: 600;
        padding: 6px 18px;
        border-radius: 100px;
        margin-bottom: 20px;
        backdrop-filter: blur(8px);
    }

    .hero-title {
        font-size: clamp(2.2rem, 5vw, 3.8rem);
        color: #fff;
        line-height: 1.15;
        font-weight: 800;
    }

    .hero-title .highlight {
        color: #f5a623;
    }

    .hero-subtitle {
        color: rgba(255,255,255,0.8);
        font-size: 1.05rem;
        line-height: 1.7;
        max-width: 540px;
    }

    .hero-card {
        background: rgba(255,255,255,0.1);
        border: 1px solid rgba(255,255,255,0.2);
        border-radius: 16px;
        padding: 20px;
        backdrop-filter: blur(8px);
        text-align: center;
        color: #fff;
        transition: all 0.3s;
    }

    .hero-card:hover {
        background: rgba(255,255,255,0.18);
        transform: translateY(-4px);
    }

    .hero-card .icon {
        font-size: 2rem;
        margin-bottom: 8px;
    }

    .hero-card .num {
        font-size: 1.6rem;
        font-weight: 800;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    .hero-card .label {
        font-size: 0.8rem;
        opacity: 0.8;
    }

    /* ===== CAROUSEL ===== */
    .carousel-hero .carousel-item img {
        max-height: 420px;
        object-fit: cover;
        border-radius: 20px;
    }

    /* ===== SECTIONS ===== */
    .section-title {
        font-size: clamp(1.5rem, 3vw, 2rem);
        font-weight: 800;
    }

    .section-py {
        padding: 80px 0;
    }

    .bg-section-alt {
        background: #f8faf9;
    }

    /* ===== WISATA CARD ===== */
    .wisata-card {
        border-radius: 16px;
        overflow: hidden;
        border: 1px solid #e2e8f0;
        background: #fff;
        transition: all 0.3s ease;
        height: 100%;
    }

    .wisata-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 48px rgba(26,107,58,0.12);
        border-color: #1a6b3a;
    }

    .wisata-card .img-wrap {
        position: relative;
        height: 200px;
        overflow: hidden;
    }

    .wisata-card .img-wrap img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s;
    }

    .wisata-card:hover .img-wrap img {
        transform: scale(1.08);
    }

    .wisata-card .cat-badge {
        position: absolute;
        top: 12px;
        left: 12px;
        background: #1a6b3a;
        color: #fff;
        font-size: 0.72rem;
        font-weight: 600;
        padding: 4px 12px;
        border-radius: 100px;
    }

    .wisata-card .harga-badge {
        position: absolute;
        bottom: 12px;
        right: 12px;
        background: rgba(0,0,0,0.65);
        color: #fff;
        font-size: 0.75rem;
        font-weight: 600;
        padding: 4px 12px;
        border-radius: 100px;
        backdrop-filter: blur(6px);
    }

    /* ===== UMKM CARD ===== */
    .umkm-card {
        border-radius: 14px;
        border: 1px solid #e2e8f0;
        background: #fff;
        padding: 20px;
        display: flex;
        gap: 16px;
        align-items: center;
        transition: all 0.3s;
        height: 100%;
    }

    .umkm-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 32px rgba(26,107,58,0.1);
        border-color: #1a6b3a;
    }

    .umkm-logo {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        object-fit: cover;
        flex-shrink: 0;
    }

    .umkm-logo-placeholder {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        background: #e9f7ef;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #1a6b3a;
        font-size: 1.4rem;
        flex-shrink: 0;
    }

    /* ===== EVENT CARD ===== */
    .event-card {
        border-radius: 16px;
        overflow: hidden;
        border: 1px solid #e2e8f0;
        background: #fff;
        transition: all 0.3s;
        height: 100%;
    }

    .event-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 16px 40px rgba(0,0,0,0.1);
    }

    .event-date-badge {
        position: absolute;
        top: 12px;
        right: 12px;
        background: #f5a623;
        color: #fff;
        border-radius: 10px;
        padding: 6px 12px;
        text-align: center;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 700;
        min-width: 54px;
    }

    /* ===== BERITA CARD ===== */
    .berita-card {
        border-radius: 16px;
        overflow: hidden;
        border: 1px solid #e2e8f0;
        background: #fff;
        transition: all 0.3s;
    }

    .berita-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 32px rgba(0,0,0,0.08);
    }

    /* ===== CTA Section ===== */
    .cta-section {
        background: linear-gradient(135deg, #1a6b3a, #2d8a55);
        border-radius: 24px;
        padding: 60px 40px;
        color: #fff;
        text-align: center;
    }
</style>
@endpush

@section('content')

<!-- ===== HERO ===== -->
<section class="hero-section">
    <div class="hero-dots"></div>
    <div class="container position-relative">
        <div class="row align-items-center gy-5">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="hero-badge"><i class="fa-solid fa-mountain-sun me-2"></i>Kabupaten Magetan, Jawa Timur</div>
                <h1 class="hero-title mb-4">
                    Jelajahi Keindahan<br>
                    <span class="highlight">Wisata & Event</span><br>
                    Magetan
                </h1>
                <p class="hero-subtitle mb-5">
                    Temukan destinasi wisata menakjubkan, event menarik, dan informasi pariwisata lengkap Kabupaten Magetan dalam satu platform.
                </p>
                <div class="d-flex gap-3 flex-wrap">
                    <a href="{{ route('public.wisata') }}" class="btn btn-warning fw-bold px-4 py-2" style="border-radius:10px; font-size:0.95rem;">
                        <i class="fa-solid fa-map-location-dot me-2"></i>Jelajahi Wisata
                    </a>

                </div>
            </div>

            <!-- Stats cards -->
            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                <div class="row g-3">
                    @php
                        $heroStats = [
                            ['icon'=>'fa-map-location-dot','num'=>App\Models\Wisata::count(),'label'=>'Destinasi Wisata'],
                            ['icon'=>'fa-calendar-days','num'=>App\Models\Event::count(),'label'=>'Event Tahunan'],
                        ];
                    @endphp
                    @foreach($heroStats as $stat)
                    <div class="col-6">
                        <div class="hero-card">
                            <div class="icon"><i class="fa-solid {{ $stat['icon'] }}"></i></div>
                            <div class="num">{{ $stat['num'] }}+</div>
                            <div class="label">{{ $stat['label'] }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== DESTINASI WISATA ===== -->
<section class="section-py">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-5">
            <div data-aos="fade-up">
                <div class="section-badge"><i class="fa-solid fa-map-location-dot me-2"></i>Destinasi Wisata</div>
                <h2 class="section-title mb-2">Tempat Wisata Unggulan</h2>
                <p class="text-muted mb-0">Keindahan alam dan budaya Kabupaten Magetan yang memukau</p>
            </div>
            <a href="{{ route('public.wisata') }}" class="btn-outline-custom d-none d-md-inline-block" data-aos="fade-left">Lihat Semua <i class="fa-solid fa-arrow-right ms-1"></i></a>
        </div>

        @if($wisata->count())
        <div class="row g-4">
            @foreach($wisata as $w)
            <div class="col-md-6 col-xl-4" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                <a href="{{ route('public.wisata.detail', $w->slug) }}" class="text-decoration-none text-dark">
                    <div class="wisata-card">
                        <div class="img-wrap">
                            @if($w->thumbnail)
                                <img src="{{ Storage::url($w->thumbnail) }}" alt="{{ $w->nama }}" loading="lazy">
                            @else
                                <div class="d-flex align-items-center justify-content-center h-100 bg-light">
                                    <i class="fa-solid fa-image fa-3x text-muted opacity-25"></i>
                                </div>
                            @endif
                            <span class="cat-badge">{{ $w->kategori }}</span>
                            @if($w->harga_tiket > 0)
                                <span class="harga-badge">Rp {{ number_format($w->harga_tiket, 0, ',', '.') }}</span>
                            @else
                                <span class="harga-badge">Gratis</span>
                            @endif
                        </div>
                        <div class="p-4">
                            <h6 class="fw-bold mb-1" style="font-family:'Plus Jakarta Sans',sans-serif">{{ $w->nama }}</h6>
                            <p class="text-muted small mb-0"><i class="fa-solid fa-location-dot me-1" style="color:#1a6b3a"></i>{{ $w->kecamatan }}, Magetan</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-5 text-muted">
            <i class="fa-regular fa-map fa-3x mb-3 opacity-25"></i>
            <p>Belum ada destinasi wisata yang tersedia.</p>
        </div>
        @endif

        <div class="text-center mt-4 d-md-none">
            <a href="{{ route('public.wisata') }}" class="btn-outline-custom">Lihat Semua Wisata</a>
        </div>
    </div>
</section>


<!-- ===== EVENT ===== -->
@if($events->count())
<section class="section-py bg-section-alt">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-5">
            <div data-aos="fade-up">
                <div class="section-badge"><i class="fa-solid fa-calendar-days me-2"></i>Event & Agenda</div>
                <h2 class="section-title mb-2">Event Mendatang</h2>
                <p class="text-muted mb-0">Jangan lewatkan event seru di Kabupaten Magetan</p>
            </div>
            <a href="{{ route('public.event') }}" class="btn-outline-custom d-none d-md-inline-block" data-aos="fade-left">Lihat Semua <i class="fa-solid fa-arrow-right ms-1"></i></a>
        </div>

        <div class="row g-4">
            @foreach($events as $event)
            <div class="col-md-6 col-xl-3" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                <div class="event-card">
                    <div class="position-relative" style="height:180px; overflow:hidden;">
                        @if($event->poster)
                            <img src="{{ Storage::url($event->poster) }}" alt="{{ $event->judul }}" class="w-100 h-100" style="object-fit:cover; transition:transform 0.4s">
                        @else
                            <div class="w-100 h-100 d-flex align-items-center justify-content-center" style="background:linear-gradient(135deg,#1a6b3a,#2d8a55)">
                                <i class="fa-solid fa-calendar-star fa-3x text-white opacity-50"></i>
                            </div>
                        @endif
                        <div class="event-date-badge">
                            <div style="font-size:1.1rem">{{ $event->tanggal->format('d') }}</div>
                            <div style="font-size:0.7rem; opacity:0.9">{{ $event->tanggal->format('M') }}</div>
                        </div>
                    </div>
                    <div class="p-3">
                        <h6 class="fw-bold mb-1" style="font-family:'Plus Jakarta Sans',sans-serif; font-size:0.9rem;">{{ Str::limit($event->judul, 50) }}</h6>
                        <p class="text-muted small mb-0"><i class="fa-solid fa-location-dot me-1"></i>{{ Str::limit($event->lokasi, 35) }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- ===== BERITA ===== -->
@if($berita->count())
<section class="section-py">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-5">
            <div data-aos="fade-up">
                <div class="section-badge"><i class="fa-regular fa-newspaper me-2"></i>Berita Terkini</div>
                <h2 class="section-title mb-2">Kabar Pariwisata Magetan</h2>
                <p class="text-muted mb-0">Informasi terbaru seputar wisata dan UMKM Magetan</p>
            </div>
            <a href="{{ route('public.berita') }}" class="btn-outline-custom d-none d-md-inline-block" data-aos="fade-left">Lihat Semua <i class="fa-solid fa-arrow-right ms-1"></i></a>
        </div>

        <div class="row g-4">
            @foreach($berita as $b)
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                <div class="berita-card h-100">
                    @if($b->thumbnail)
                        <img src="{{ Storage::url($b->thumbnail) }}" alt="{{ $b->judul }}" class="w-100" style="height:200px; object-fit:cover;">
                    @else
                        <div class="w-100 d-flex align-items-center justify-content-center" style="height:200px; background:#e9f7ef;">
                            <i class="fa-regular fa-newspaper fa-3x" style="color:#1a6b3a; opacity:0.3;"></i>
                        </div>
                    @endif
                    <div class="p-4">
                        <p class="text-muted small mb-2"><i class="fa-regular fa-calendar me-1"></i>{{ $b->created_at->format('d M Y') }}</p>
                        <h6 class="fw-bold" style="font-family:'Plus Jakarta Sans',sans-serif;">{{ Str::limit($b->judul, 60) }}</h6>
                        <p class="text-muted small mb-0">{{ Str::limit(strip_tags($b->isi), 100) }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- ===== CTA ===== -->
<section class="section-py">
    <div class="container">
        <div class="cta-section" data-aos="zoom-in" data-aos-duration="1000">
            <div class="section-badge" style="background:rgba(255,255,255,0.2); color:#fff; border-color:rgba(255,255,255,0.4);">Informasi Lebih Lanjut</div>
            <h2 class="text-white mb-3">Siap Berwisata ke Magetan?</h2>
            <p class="mb-4" style="opacity:0.85; max-width:500px; margin:0 auto 2rem;">Hubungi Dinas Pariwisata dan Kebudayaan Kabupaten Magetan untuk informasi lebih lengkap seputar destinasi dan paket wisata.</p>
            <div class="d-flex gap-3 justify-content-center flex-wrap">
                <a href="{{ route('public.wisata') }}" class="btn btn-warning fw-bold px-4 py-2" style="border-radius:10px;">
                    <i class="fa-solid fa-map-location-dot me-2"></i>Jelajahi Sekarang
                </a>
                <a href="{{ route('public.tentang') }}" class="btn btn-outline-light fw-bold px-4 py-2" style="border-radius:10px;">
                    <i class="fa-solid fa-circle-info me-2"></i>Tentang Kami
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
