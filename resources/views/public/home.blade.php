@extends('layouts.public')

@section('title', 'Beranda — E-Catalog Pariwisata Kabupaten Magetan')
@section('meta_description', 'Jelajahi destinasi wisata, event, dan berita terbaik di Kabupaten Magetan.')

@push('styles')
<style>
    /* =============================================
       HERO PREMIUM — 21st.dev Inspired
    ============================================= */
    @keyframes hero-blur-in {
        from { opacity: 0; filter: blur(16px); transform: translateY(18px); }
        to   { opacity: 1; filter: blur(0);    transform: none; }
    }
    @keyframes hero-fade-up {
        from { opacity: 0; transform: translateY(22px); }
        to   { opacity: 1; transform: none; }
    }
    @keyframes glow-pulse {
        0%   { transform: translate(-50%,-50%) scale(1);    opacity: 1; }
        50%  { transform: translate(-49%,-51%) scale(1.07); opacity: 0.8; }
        100% { transform: translate(-50%,-50%) scale(1);    opacity: 1; }
    }
    @keyframes float-particle {
        0%,100% { transform: translateY(0px) translateX(0px); opacity: 0.4; }
        33%      { transform: translateY(-18px) translateX(8px); opacity: 0.7; }
        66%      { transform: translateY(-8px) translateX(-6px); opacity: 0.5; }
    }
    @keyframes scroll-bounce {
        0%,100% { transform: translateY(0); }
        50%      { transform: translateY(8px); }
    }
    @keyframes shimmer-line {
        0%   { background-position: -200% center; }
        100% { background-position: 200% center; }
    }
    @keyframes counter-in {
        from { opacity: 0; transform: scale(0.7) translateY(10px); }
        to   { opacity: 1; transform: scale(1) translateY(0); }
    }

    .hero-section {
        min-height: 80vh;
        background:
            linear-gradient(rgba(15, 26, 22, 0.60), rgba(15, 26, 22, 0.75)),
            url('/images/hero-telaga-sarangan.jpg') center/cover no-repeat;
        display: flex;
        align-items: center;
        position: relative;
        overflow: hidden;
    }

    /* Animated radial glow — main */
    .hero-glow-main {
        position: absolute;
        left: 50%; top: 60%;
        width: 160vw; height: 180vh;
        transform: translate(-50%, -50%);
        background:
            radial-gradient(50% 50% at 50% 50%, rgba(31,58,52,0.9) 0%, transparent 70%),
            radial-gradient(38% 44% at 30% 40%, rgba(200,155,60,0.28) 0%, transparent 65%),
            radial-gradient(30% 38% at 72% 30%, rgba(31,58,52,0.6) 0%, transparent 65%);
        filter: blur(52px);
        animation: glow-pulse 12s ease-in-out infinite;
        pointer-events: none;
        z-index: 0;
    }

    /* Subtle green accent glow top-left */
    .hero-glow-accent {
        position: absolute;
        top: -10%; left: -5%;
        width: 60vw; height: 60vh;
        background: radial-gradient(ellipse at center, rgba(200,155,60,0.10) 0%, transparent 70%);
        filter: blur(40px);
        pointer-events: none;
        z-index: 0;
    }

    /* Particles canvas */
    #hero-particles {
        position: absolute;
        inset: 0;
        z-index: 1;
        pointer-events: none;
    }

    /* Noise grain overlay */
    .hero-grain {
        position: absolute;
        inset: 0;
        z-index: 2;
        opacity: 0.03;
        background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
        pointer-events: none;
    }

    .hero-section .container { position: relative; z-index: 3; }

    /* ── Badge pill ── */
    .hero-badge-pill {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(200,155,60,0.12);
        border: 1px solid rgba(200,155,60,0.35);
        color: var(--accent);
        font-family: 'IBM Plex Mono', monospace;
        font-size: 0.75rem;
        font-weight: 500;
        letter-spacing: 0.5px;
        padding: 6px 16px;
        border-radius: 100px;
        margin-bottom: 28px;
        animation: hero-blur-in 0.9s cubic-bezier(0.2,0.6,0.2,1) 0.05s both;
    }

    .hero-badge-pill .dot {
        width: 6px; height: 6px;
        border-radius: 50%;
        background: var(--accent);
        box-shadow: 0 0 6px var(--accent);
        animation: glow-pulse 2s ease-in-out infinite;
    }

    /* ── Title ── */
    .hero-title {
        font-family: 'Fraunces', serif;
        font-size: clamp(2.4rem, 5.5vw, 4rem);
        color: #fff;
        line-height: 1.1;
        font-weight: 600;
        letter-spacing: -0.02em;
        animation: hero-blur-in 1s cubic-bezier(0.2,0.6,0.2,1) 0.2s both;
    }

    .hero-title .highlight {
        color: var(--accent);
        font-style: italic;
        /* shimmer on accent text */
        background: linear-gradient(90deg, #C89B3C 0%, #F5D08A 35%, #C89B3C 60%, #9C7726 100%);
        background-size: 200% auto;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        animation: shimmer-line 4s linear infinite;
    }

    /* ── Subtitle ── */
    .hero-subtitle {
        color: rgba(255,255,255,0.65);
        font-size: 1.08rem;
        line-height: 1.75;
        max-width: 500px;
        animation: hero-blur-in 1s cubic-bezier(0.2,0.6,0.2,1) 0.38s both;
    }

    /* ── CTA row ── */
    .hero-cta-row {
        animation: hero-fade-up 0.9s cubic-bezier(0.2,0.6,0.2,1) 0.55s both;
    }

    .btn-hero-primary {
        background: var(--accent);
        color: var(--primary-dark);
        border: none;
        padding: 13px 28px;
        border-radius: 10px;
        font-weight: 700;
        font-size: 0.95rem;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.25s ease;
        box-shadow: 0 4px 24px rgba(200,155,60,0.35);
        position: relative;
        overflow: hidden;
    }

    .btn-hero-primary::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(255,255,255,0.2) 0%, transparent 60%);
        opacity: 0;
        transition: opacity 0.2s;
    }

    .btn-hero-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 32px rgba(200,155,60,0.5);
        color: var(--primary-dark);
    }

    .btn-hero-primary:hover::before { opacity: 1; }

    .btn-hero-ghost {
        background: rgba(255,255,255,0.07);
        border: 1px solid rgba(255,255,255,0.18);
        color: rgba(255,255,255,0.85);
        padding: 12px 24px;
        border-radius: 10px;
        font-weight: 600;
        font-size: 0.95rem;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.25s ease;
        backdrop-filter: blur(8px);
    }

    .btn-hero-ghost:hover {
        background: rgba(255,255,255,0.13);
        border-color: rgba(255,255,255,0.35);
        color: #fff;
        transform: translateY(-2px);
    }

    /* ── Stat cards ── */
    .hero-stats-grid {
        animation: hero-fade-up 1s cubic-bezier(0.2,0.6,0.2,1) 0.4s both;
    }

    .hero-stat-card {
        background: rgba(255,255,255,0.04);
        border: 1px solid rgba(255,255,255,0.10);
        border-radius: 16px;
        padding: 28px 20px;
        text-align: center;
        color: #fff;
        transition: all 0.35s cubic-bezier(0.2,0.6,0.2,1);
        backdrop-filter: blur(16px);
        position: relative;
        overflow: hidden;
    }

    .hero-stat-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 1px;
        background: linear-gradient(90deg, transparent, rgba(200,155,60,0.5), transparent);
        opacity: 0;
        transition: opacity 0.3s;
    }

    .hero-stat-card:hover {
        background: rgba(255,255,255,0.08);
        border-color: rgba(200,155,60,0.4);
        transform: translateY(-6px);
        box-shadow: 0 20px 48px rgba(0,0,0,0.3);
    }

    .hero-stat-card:hover::before { opacity: 1; }

    .hero-stat-icon {
        width: 48px; height: 48px;
        border-radius: 12px;
        background: rgba(200,155,60,0.12);
        border: 1px solid rgba(200,155,60,0.2);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1.3rem;
        color: var(--accent);
        margin-bottom: 14px;
    }

    .hero-stat-num {
        font-size: 2rem;
        font-weight: 700;
        font-family: 'Fraunces', serif;
        color: #fff;
        line-height: 1;
        margin-bottom: 6px;
        animation: counter-in 0.6s cubic-bezier(0.2,0.6,0.2,1) 0.7s both;
    }

    .hero-stat-label {
        font-size: 0.78rem;
        color: rgba(255,255,255,0.5);
        letter-spacing: 0.3px;
    }

    /* ── Visual right side ── */
    .hero-visual {
        position: relative;
        animation: hero-fade-up 1s cubic-bezier(0.2,0.6,0.2,1) 0.3s both;
    }

    .hero-visual-card {
        background: rgba(255,255,255,0.04);
        border: 1px solid rgba(255,255,255,0.1);
        border-radius: 20px;
        overflow: hidden;
        backdrop-filter: blur(16px);
        position: relative;
    }

    .hero-visual-card-header {
        background: rgba(255,255,255,0.04);
        border-bottom: 1px solid rgba(255,255,255,0.07);
        padding: 14px 20px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .hero-dot { width: 10px; height: 10px; border-radius: 50%; }
    .hero-dot.red   { background: #ff5f57; }
    .hero-dot.yellow{ background: #febc2e; }
    .hero-dot.green { background: #28c840; }

    /* ── Scroll indicator ── */
    .hero-scroll-indicator {
        position: absolute;
        bottom: 36px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 6px;
        z-index: 10;
        animation: hero-fade-up 1s 1.2s both;
    }

    .hero-scroll-mouse {
        width: 24px; height: 38px;
        border: 1.5px solid rgba(255,255,255,0.3);
        border-radius: 12px;
        position: relative;
    }

    .hero-scroll-mouse::before {
        content: '';
        position: absolute;
        top: 6px;
        left: 50%; transform: translateX(-50%);
        width: 3px; height: 8px;
        background: rgba(255,255,255,0.6);
        border-radius: 2px;
        animation: scroll-bounce 1.6s ease-in-out infinite;
    }

    .hero-scroll-label {
        font-size: 0.65rem;
        color: rgba(255,255,255,0.35);
        letter-spacing: 1px;
        text-transform: uppercase;
        font-family: 'IBM Plex Mono', monospace;
    }

    /* ===== SECTIONS ===== */
    .section-title {
        font-size: clamp(1.5rem, 3vw, 2rem);
        font-weight: 800;
    }

    .section-py {
        padding: 88px 0;
    }

    .bg-section-alt {
        background: #f8faf9;
    }

    /* =============================================
       WISATA CARD — 21st.dev "3D Card" Style
    ============================================= */
    @keyframes card-reveal {
        from { opacity: 0; transform: translateY(24px) scale(0.97); }
        to   { opacity: 1; transform: none; }
    }

    .wisata-card-3d {
        border-radius: 20px;
        overflow: hidden;
        height: 340px;
        position: relative;
        cursor: pointer;
        transform-style: preserve-3d;
        transition: box-shadow 0.4s cubic-bezier(0.2,0.6,0.2,1), transform 0.1s ease-out;
        will-change: transform;
        display: block;
        text-decoration: none;
    }

    .wisata-card-3d:hover {
        box-shadow: 0 32px 72px rgba(0,0,0,0.35), 0 0 0 1px rgba(200,155,60,0.25);
    }

    /* Full-bleed image */
    .wisata-card-3d .wc-img {
        position: absolute;
        inset: 0;
        width: 100%; height: 100%;
        object-fit: cover;
        transition: transform 0.6s cubic-bezier(0.2,0.6,0.2,1);
    }

    .wisata-card-3d:hover .wc-img { transform: scale(1.08); }

    /* Multi-stop gradient overlay */
    .wisata-card-3d .wc-overlay {
        position: absolute;
        inset: 0;
        background:
            linear-gradient(to bottom,
                rgba(0,0,0,0.55) 0%,
                rgba(0,0,0,0.05) 40%,
                rgba(0,0,0,0.05) 55%,
                rgba(10,22,18,0.85) 100%);
        transition: opacity 0.3s;
    }

    /* No-image fallback */
    .wisata-card-3d .wc-nophoto {
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        display: flex; align-items: center; justify-content: center;
        font-size: 3rem; color: rgba(255,255,255,0.2);
    }

    /* Top-left: destination name */
    .wisata-card-3d .wc-top {
        position: absolute;
        top: 18px; left: 18px; right: 60px;
        z-index: 3;
    }

    .wisata-card-3d .wc-name {
        font-family: 'Fraunces', serif;
        font-size: 1.15rem;
        font-weight: 600;
        color: #fff;
        line-height: 1.25;
        text-shadow: 0 2px 12px rgba(0,0,0,0.4);
        margin: 0;
    }

    .wisata-card-3d .wc-loc {
        font-size: 0.72rem;
        color: rgba(255,255,255,0.75);
        margin-top: 4px;
        display: flex;
        align-items: center;
        gap: 4px;
    }

    /* Top-right: arrow button */
    .wisata-card-3d .wc-arrow {
        position: absolute;
        top: 16px; right: 16px;
        z-index: 3;
        width: 38px; height: 38px;
        border-radius: 50%;
        background: rgba(255,255,255,0.15);
        border: 1.5px solid rgba(255,255,255,0.35);
        backdrop-filter: blur(8px);
        display: flex; align-items: center; justify-content: center;
        color: #fff;
        font-size: 0.85rem;
        transition: all 0.25s cubic-bezier(0.2,0.6,0.2,1);
        transform: rotate(-45deg);
    }

    .wisata-card-3d:hover .wc-arrow {
        background: var(--accent);
        border-color: var(--accent);
        color: var(--primary-dark);
        transform: rotate(0deg);
        box-shadow: 0 4px 16px rgba(200,155,60,0.5);
    }

    /* Bottom: glassmorphism info strip */
    .wisata-card-3d .wc-bottom {
        position: absolute;
        bottom: 16px; left: 16px; right: 16px;
        z-index: 3;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 8px;
    }

    .wisata-card-3d .wc-cat {
        background: rgba(122,59,46,0.88);
        backdrop-filter: blur(8px);
        color: #fff;
        font-size: 0.68rem;
        font-weight: 700;
        padding: 4px 12px;
        border-radius: 100px;
        letter-spacing: 0.4px;
        text-transform: uppercase;
    }

    .wisata-card-3d .wc-price {
        background: rgba(10,22,18,0.75);
        backdrop-filter: blur(8px);
        border: 1px solid rgba(255,255,255,0.12);
        color: #fff;
        font-family: 'IBM Plex Mono', monospace;
        font-size: 0.7rem;
        font-weight: 600;
        padding: 4px 12px;
        border-radius: 100px;
    }

    /* Hover: reveal subtle top shimmer */
    .wisata-card-3d::after {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 2px;
        background: linear-gradient(90deg, transparent, rgba(200,155,60,0.8), transparent);
        opacity: 0;
        transition: opacity 0.35s;
        z-index: 4;
        border-radius: 20px 20px 0 0;
    }
    .wisata-card-3d:hover::after { opacity: 1; }

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
        border-color: #1F3A34;
    }

    .umkm-logo {
        width: 60px; height: 60px;
        border-radius: 12px;
        object-fit: cover;
        flex-shrink: 0;
    }

    .umkm-logo-placeholder {
        width: 60px; height: 60px;
        border-radius: 12px;
        background: #e9f7ef;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #1F3A34;
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
        top: 12px; right: 12px;
        background: var(--accent);
        color: var(--primary-dark);
        border-radius: 8px;
        padding: 6px 12px;
        text-align: center;
        font-family: 'Fraunces', serif;
        font-weight: 600;
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

    /* ===== CTA Section — glassmorphism dark ===== */
    .cta-section {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        border-radius: 20px;
        padding: 70px 40px;
        color: #fff;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .cta-section::before {
        content: '';
        position: absolute;
        top: -60px; right: -60px;
        width: 280px; height: 280px;
        background: radial-gradient(circle, rgba(200,155,60,0.18) 0%, transparent 70%);
        pointer-events: none;
    }

    .cta-section::after {
        content: '';
        position: absolute;
        bottom: -60px; left: -40px;
        width: 200px; height: 200px;
        background: radial-gradient(circle, rgba(200,155,60,0.1) 0%, transparent 70%);
        pointer-events: none;
    }

    @media (max-width: 768px) {
        .hero-section { min-height: 100svh; padding: 80px 0 60px; }
        .cta-section { padding: 50px 24px; }
    }
</style>
@endpush

@section('content')

<!-- ===== HERO PREMIUM ===== -->
<section class="hero-section" id="hero">
    <!-- Animated glow layers -->
    <div class="hero-glow-main"></div>
    <div class="hero-glow-accent"></div>
    <!-- Particles canvas -->
    <canvas id="hero-particles"></canvas>
    <!-- Grain texture -->
    <div class="hero-grain"></div>

    <div class="container">
        <div class="row align-items-center gy-5 py-5">

            <!-- LEFT: Text -->
            <div class="col-lg-6">
                <!-- Badge -->
                <div class="hero-badge-pill">
                    <span class="dot"></span>
                    <i class="fa-solid fa-mountain-sun"></i>
                    Kabupaten Magetan, Jawa Timur
                </div>

                <!-- Title -->
                <h1 class="hero-title mb-4">
                    Jelajahi<br>
                    <span class="highlight">Wisata & Event</span><br>
                    Magetan
                </h1>

                <!-- Subtitle -->
                <p class="hero-subtitle mb-5">
                    Temukan destinasi wisata menakjubkan, event menarik, dan informasi pariwisata lengkap Kabupaten Magetan dalam satu platform.
                </p>

                <!-- CTA Buttons -->
                <div class="hero-cta-row d-flex gap-3 flex-wrap">
                    <a href="{{ route('public.wisata') }}" class="btn-hero-primary">
                        <i class="fa-solid fa-map-location-dot"></i>
                        Jelajahi Wisata
                    </a>
                    <a href="{{ route('public.event') }}" class="btn-hero-ghost">
                        <i class="fa-solid fa-calendar-days"></i>
                        Lihat Event
                    </a>
                </div>

                <!-- Stats row below CTA -->
                @php
                    $heroStats = [
                        ['icon'=>'fa-map-location-dot','num'=>App\Models\Wisata::count(),'label'=>'Destinasi Wisata'],
                        ['icon'=>'fa-calendar-days','num'=>App\Models\Event::count(),'label'=>'Event & Agenda'],
                    ];
                @endphp
                <div class="hero-stats-grid d-flex gap-3 mt-5 flex-wrap">
                    @foreach($heroStats as $stat)
                    <div class="hero-stat-card flex-fill" style="min-width:140px;">
                        <div class="hero-stat-icon">
                            <i class="fa-solid {{ $stat['icon'] }}"></i>
                        </div>
                        <div class="hero-stat-num">{{ $stat['num'] }}+</div>
                        <div class="hero-stat-label">{{ $stat['label'] }}</div>
                    </div>
                    @endforeach
                    <div class="hero-stat-card flex-fill" style="min-width:140px;">
                        <div class="hero-stat-icon">
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <div class="hero-stat-num">4.8</div>
                        <div class="hero-stat-label">Rating Wisatawan</div>
                    </div>
                </div>
            </div>

            <!-- RIGHT: Visual card -->
            <div class="col-lg-6 d-none d-lg-flex justify-content-end">
                <div class="hero-visual" style="width:100%; max-width:460px;">
                    <!-- Mock browser window card -->
                    <div class="hero-visual-card">
                        <div class="hero-visual-card-header">
                            <span class="hero-dot red"></span>
                            <span class="hero-dot yellow"></span>
                            <span class="hero-dot green"></span>
                            <span style="font-family:'IBM Plex Mono',monospace; font-size:0.68rem; color:rgba(255,255,255,0.4); margin-left:10px;">ecatalog.magetan.go.id</span>
                        </div>
                        <!-- Map preview / destination showcase -->
                        <div style="position:relative; height:260px; background:linear-gradient(135deg, #1F3A34 0%, #14261F 100%); overflow:hidden;">
                            <!-- Decorative map grid lines -->
                            <svg style="position:absolute;inset:0;width:100%;height:100%;opacity:0.08" viewBox="0 0 460 260">
                                @for($i = 0; $i < 7; $i++)
                                <line x1="{{ $i * 66 }}" y1="0" x2="{{ $i * 66 }}" y2="260" stroke="white" stroke-width="0.5"/>
                                @endfor
                                @for($j = 0; $j < 5; $j++)
                                <line x1="0" y1="{{ $j * 52 }}" x2="460" y2="{{ $j * 52 }}" stroke="white" stroke-width="0.5"/>
                                @endfor
                            </svg>
                            <!-- Location pins -->
                            <div style="position:absolute; top:30%; left:40%; transform:translate(-50%,-50%);">
                                <div style="background:var(--accent); width:36px; height:36px; border-radius:50% 50% 50% 0; transform:rotate(-45deg); display:flex; align-items:center; justify-content:center; box-shadow:0 4px 16px rgba(200,155,60,0.5);">
                                    <i class="fa-solid fa-mountain" style="color:#14261F; font-size:0.8rem; transform:rotate(45deg);"></i>
                                </div>
                                <div style="position:absolute; top:-32px; left:50%; transform:translateX(-50%); white-space:nowrap; background:rgba(200,155,60,0.15); border:1px solid rgba(200,155,60,0.4); color:var(--accent); font-size:0.65rem; font-weight:600; padding:3px 10px; border-radius:6px; font-family:'IBM Plex Mono',monospace;">Telaga Sarangan</div>
                            </div>
                            <div style="position:absolute; top:55%; left:65%; transform:translate(-50%,-50%);">
                                <div style="background:rgba(255,255,255,0.9); width:28px; height:28px; border-radius:50% 50% 50% 0; transform:rotate(-45deg); display:flex; align-items:center; justify-content:center; box-shadow:0 4px 12px rgba(0,0,0,0.3);">
                                    <i class="fa-solid fa-tree" style="color:#1F3A34; font-size:0.65rem; transform:rotate(45deg);"></i>
                                </div>
                            </div>
                            <div style="position:absolute; top:70%; left:28%; transform:translate(-50%,-50%);">
                                <div style="background:rgba(255,255,255,0.7); width:22px; height:22px; border-radius:50% 50% 50% 0; transform:rotate(-45deg); display:flex; align-items:center; justify-content:center;">
                                    <i class="fa-solid fa-water" style="color:#1F3A34; font-size:0.55rem; transform:rotate(45deg);"></i>
                                </div>
                            </div>
                            <!-- Glow on main pin -->
                            <div style="position:absolute; top:30%; left:40%; transform:translate(-50%,-50%); width:80px; height:80px; background:radial-gradient(circle, rgba(200,155,60,0.25), transparent 70%); border-radius:50%;"></div>
                            <!-- Label bottom -->
                            <div style="position:absolute; bottom:16px; left:16px; right:16px; background:rgba(255,255,255,0.06); border:1px solid rgba(255,255,255,0.1); border-radius:10px; padding:10px 14px; backdrop-filter:blur(8px); display:flex; justify-content:space-between; align-items:center;">
                                <span style="color:rgba(255,255,255,0.8); font-size:0.78rem; font-family:'Plus Jakarta Sans',sans-serif;"><i class="fa-solid fa-location-dot me-1" style="color:var(--accent);"></i>Jawa Timur, Indonesia</span>
                                <span style="background:rgba(200,155,60,0.2); border:1px solid rgba(200,155,60,0.35); color:var(--accent); font-size:0.65rem; font-weight:600; padding:2px 10px; border-radius:6px; font-family:'IBM Plex Mono',monospace;">LIVE</span>
                            </div>
                        </div>
                        <!-- Info row -->
                        <div style="padding:16px 20px; display:flex; gap:16px;">
                            <div style="flex:1; text-align:center; border-right:1px solid rgba(255,255,255,0.08); padding-right:16px;">
                                <div style="color:#fff; font-weight:700; font-size:1.1rem; font-family:'Fraunces',serif;">{{ App\Models\Wisata::count() }}+</div>
                                <div style="color:rgba(255,255,255,0.45); font-size:0.72rem;">Destinasi</div>
                            </div>
                            <div style="flex:1; text-align:center; border-right:1px solid rgba(255,255,255,0.08); padding-right:16px;">
                                <div style="color:#fff; font-weight:700; font-size:1.1rem; font-family:'Fraunces',serif;">{{ App\Models\Event::count() }}+</div>
                                <div style="color:rgba(255,255,255,0.45); font-size:0.72rem;">Event</div>
                            </div>
                            <div style="flex:1; text-align:center;">
                                <div style="color:var(--accent); font-weight:700; font-size:1.1rem; font-family:'Fraunces',serif;">4.8★</div>
                                <div style="color:rgba(255,255,255,0.45); font-size:0.72rem;">Rating</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Scroll indicator -->
    <div class="hero-scroll-indicator">
        <div class="hero-scroll-mouse"></div>
        <span class="hero-scroll-label">Scroll</span>
    </div>
</section>

@push('scripts')
<script>
// ── Particles animation ──
(function() {
    const canvas = document.getElementById('hero-particles');
    if (!canvas) return;
    const ctx = canvas.getContext('2d');
    let particles = [];
    const COLORS = ['rgba(200,155,60,', 'rgba(255,255,255,', 'rgba(31,58,52,'];

    function resize() {
        canvas.width = canvas.offsetWidth;
        canvas.height = canvas.offsetHeight;
    }

    function createParticle() {
        return {
            x: Math.random() * canvas.width,
            y: Math.random() * canvas.height,
            r: Math.random() * 1.8 + 0.3,
            vx: (Math.random() - 0.5) * 0.25,
            vy: (Math.random() - 0.5) * 0.25 - 0.1,
            alpha: Math.random() * 0.5 + 0.1,
            color: COLORS[Math.floor(Math.random() * COLORS.length)],
            life: 0,
            maxLife: Math.random() * 300 + 150,
        };
    }

    function init() {
        resize();
        for (let i = 0; i < 60; i++) particles.push(createParticle());
    }

    function draw() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        particles.forEach((p, i) => {
            p.x += p.vx; p.y += p.vy; p.life++;
            const progress = p.life / p.maxLife;
            const fade = progress < 0.2 ? progress / 0.2 : progress > 0.8 ? (1 - progress) / 0.2 : 1;
            ctx.beginPath();
            ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
            ctx.fillStyle = p.color + (p.alpha * fade) + ')';
            ctx.fill();
            if (p.life >= p.maxLife || p.y < -10 || p.y > canvas.height + 10) {
                particles[i] = createParticle();
            }
        });
        requestAnimationFrame(draw);
    }

    window.addEventListener('resize', () => { resize(); });
    init(); draw();
})();
</script>
@endpush

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
        <div class="row g-3" id="wisata-grid">
            @foreach($wisata as $w)
            <div class="col-md-6 col-xl-4">
                {{-- 3D Card — inspired by 21st.dev / Kavi Katiyar "3D Card" --}}
                <a href="{{ route('public.wisata.detail', $w->slug) }}"
                   class="wisata-card-3d"
                   data-tilt
                   style="animation: card-reveal 0.7s cubic-bezier(0.2,0.6,0.2,1) {{ ($loop->iteration - 1) * 0.1 }}s both;">

                    {{-- Full-bleed image --}}
                    @if($w->thumbnail)
                        <img class="wc-img" src="{{ Storage::url($w->thumbnail) }}" alt="{{ $w->nama }}" loading="lazy">
                    @else
                        <div class="wc-nophoto">
                            <i class="fa-solid fa-mountain"></i>
                        </div>
                    @endif

                    {{-- Gradient overlay --}}
                    <div class="wc-overlay"></div>

                    {{-- Top: name + location --}}
                    <div class="wc-top">
                        <p class="wc-name">{{ $w->nama }}</p>
                        <div class="wc-loc">
                            <i class="fa-solid fa-location-dot"></i>
                            {{ $w->kecamatan }}, Magetan
                        </div>
                    </div>

                    {{-- Top-right: arrow CTA --}}
                    <div class="wc-arrow">
                        <i class="fa-solid fa-arrow-up-right-from-square" style="font-size:0.8rem;"></i>
                    </div>

                    {{-- Bottom: category + price --}}
                    <div class="wc-bottom">
                        <span class="wc-cat">{{ $w->kategori }}</span>
                        @if($w->harga_tiket > 0)
                            <span class="wc-price">Rp {{ number_format($w->harga_tiket, 0, ',', '.') }}</span>
                        @else
                            <span class="wc-price" style="background:rgba(31,58,52,0.8);">Gratis</span>
                        @endif
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

        <div class="text-center mt-5 d-md-none">
            <a href="{{ route('public.wisata') }}" class="btn-outline-custom">Lihat Semua Wisata</a>
        </div>
    </div>
</section>

@push('scripts')
<script>
// ── 3D Tilt Effect — wisata cards (21st.dev style) ──
document.querySelectorAll('[data-tilt]').forEach(card => {
    let bounds;
    const INTENSITY = 12; // degrees max tilt
    const SCALE = 1.03;

    function rotateCard(e) {
        if (!bounds) bounds = card.getBoundingClientRect();
        const mouseX = e.clientX - bounds.left;
        const mouseY = e.clientY - bounds.top;
        const centerX = bounds.width / 2;
        const centerY = bounds.height / 2;
        const rotateX = ((mouseY - centerY) / centerY) * -INTENSITY;
        const rotateY = ((mouseX - centerX) / centerX) * INTENSITY;
        card.style.transform = `perspective(800px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale(${SCALE})`;
    }

    function resetCard() {
        card.style.transition = 'transform 0.5s cubic-bezier(0.2, 0.6, 0.2, 1), box-shadow 0.4s cubic-bezier(0.2,0.6,0.2,1)';
        card.style.transform = 'perspective(800px) rotateX(0) rotateY(0) scale(1)';
        bounds = null;
    }

    card.addEventListener('mouseenter', () => {
        bounds = card.getBoundingClientRect();
        card.style.transition = 'box-shadow 0.4s cubic-bezier(0.2,0.6,0.2,1)';
    });
    card.addEventListener('mousemove', rotateCard);
    card.addEventListener('mouseleave', resetCard);
});
</script>
@endpush


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
                            <div class="w-100 h-100 d-flex align-items-center justify-content-center" style="background:#1F3A34">
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
                            <i class="fa-regular fa-newspaper fa-3x" style="color:#1F3A34; opacity:0.3;"></i>
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
                <a href="{{ route('public.wisata') }}" class="btn-primary-custom fw-bold px-4 py-2">
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
