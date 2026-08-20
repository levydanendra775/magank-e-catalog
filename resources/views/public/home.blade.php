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
        0%   { opacity: 0.9; }
        50%  { opacity: 0.6; }
        100% { opacity: 0.9; }
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
            url('/images/hero-telaga-sarangan.jpg') center/cover no-repeat fixed;
        display: flex;
        align-items: center;
        position: relative;
        overflow: hidden;
    }

    /* Disable parallax on mobile — major perf killer on iOS/Android */
    @media (max-width: 768px) {
        .hero-section {
            background-attachment: scroll;
        }
    }

    /* Animated radial glow — main (GPU-promoted, cheaper animation) */
    .hero-glow-main {
        position: absolute;
        left: 50%; top: 60%;
        width: 140vw; height: 140vh;
        transform: translate(-50%, -50%);
        background:
            radial-gradient(50% 50% at 50% 50%, rgba(31,58,52,0.85) 0%, transparent 70%),
            radial-gradient(38% 44% at 30% 40%, rgba(200,155,60,0.22) 0%, transparent 65%),
            radial-gradient(30% 38% at 72% 30%, rgba(31,58,52,0.55) 0%, transparent 65%);
        filter: blur(48px);
        /* Only animate opacity — no transform mutation = no layout/paint thrashing */
        animation: glow-pulse 14s ease-in-out infinite;
        pointer-events: none;
        z-index: 0;
        will-change: opacity;
        contain: layout paint;
    }

    /* Subtle accent glow top-left — static, no animation needed */
    .hero-glow-accent {
        position: absolute;
        top: -10%; left: -5%;
        width: 55vw; height: 55vh;
        background: radial-gradient(ellipse at center, rgba(200,155,60,0.08) 0%, transparent 70%);
        filter: blur(36px);
        pointer-events: none;
        z-index: 0;
        /* Static — no animation */
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
        /* shimmer on accent text — slowed to reduce repaints */
        background: linear-gradient(90deg, #C89B3C 0%, #F5D08A 35%, #C89B3C 60%, #9C7726 100%);
        background-size: 200% auto;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        animation: shimmer-line 7s linear infinite;
        will-change: background-position;
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
       WISATA UNGGULAN — Featured Pin Section
    ============================================= */
    .section-unggulan {
    background: linear-gradient(135deg, var(--primary) 0%, #1a3327 50%, var(--primary-dark) 100%);
         padding: 100px 0 70px;
    }
    .section-unggulan::before {
        content: '';
        position: absolute;
        top: -30%;
        left: -10%;
        width: 70vw; height: 70vh;
        background: radial-gradient(ellipse at center, rgba(200,155,60,0.12) 0%, transparent 70%);
        filter: blur(60px);
        pointer-events: none;
    }

    .section-unggulan::after {
        content: '';
        position: absolute;
        bottom: -20%;
        right: -5%;
        width: 50vw; height: 50vh;
        background: radial-gradient(ellipse at center, rgba(26,107,58,0.18) 0%, transparent 70%);
        filter: blur(50px);
        pointer-events: none;
    }

    .unggulan-scroll-wrap {
        display: flex;
        gap: 24px;
        overflow-x: auto;
        overflow-y: visible;
        padding-bottom: 16px;
        padding-top: 14px;
        scrollbar-width: thin;
        scrollbar-color: rgba(200,155,60,0.35) transparent;
        scroll-snap-type: x mandatory;
        -webkit-overflow-scrolling: touch;
    }

    .unggulan-scroll-wrap::-webkit-scrollbar { height: 4px; }
    .unggulan-scroll-wrap::-webkit-scrollbar-track { background: transparent; }
    .unggulan-scroll-wrap::-webkit-scrollbar-thumb {
        background: rgba(200,155,60,0.4);
        border-radius: 10px;
    }

    .ug-card {
        flex: 0 0 320px;
        height: 420px;
        border-radius: 22px;
        overflow: hidden;
        position: relative;
        cursor: pointer;
        border: 1.5px solid rgba(200,155,60,0.35);
        box-shadow: 0 0 0 1px rgba(200,155,60,0.15),
                    0 12px 40px rgba(0,0,0,0.45);
        transition: transform 0.4s cubic-bezier(0.2,0.6,0.2,1),
                    box-shadow 0.4s ease,
                    border-color 0.3s ease;
        scroll-snap-align: start;
    }

    .ug-card:hover {
        transform: translateY(-10px) scale(1.02);
        border-color: rgba(200,155,60,0.75);
        box-shadow: 0 0 0 1px rgba(200,155,60,0.45),
                    0 24px 60px rgba(0,0,0,0.55),
                    0 0 40px rgba(200,155,60,0.2);
    }

    .ug-card img.ug-img {
        position: absolute;
        inset: 0;
        width: 100%; height: 100%;
        object-fit: cover;
        transition: transform 0.7s cubic-bezier(0.2,0.6,0.2,1);
    }

    .ug-card:hover img.ug-img { transform: scale(1.1); }

   .ug-nophoto {
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    /* sebelumnya: #0f2e1c, #071810 — samakan dengan token */
    }

   .ug-overlay {
    background: linear-gradient(
        180deg,
        rgba(5,15,10,0.15) 0%,
        rgba(5,15,10,0.05) 35%,
        rgba(5,15,10,0.55) 65%,
        rgba(5,15,10,0.88) 100%   /* sebelumnya 0.97 — foto sedikit lebih terlihat di bawah */
    );
    }

    .ug-pin-badge {
        position: absolute;
        top: 16px;
        left: 16px;
        z-index: 5;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        background: linear-gradient(135deg, #C89B3C, #f5c842);
        color: #1a1a1a;
        font-size: 0.7rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.7px;
        padding: 5px 12px;
        border-radius: 100px;
        box-shadow: 0 4px 16px rgba(200,155,60,0.55);
        animation: pinPulse 2.5s ease-in-out infinite;
    }

    @keyframes pinPulse {
        0%, 100% { box-shadow: 0 4px 16px rgba(200,155,60,0.55); }
        50%       { box-shadow: 0 4px 28px rgba(200,155,60,1); }
    }

    .ug-content {
        position: absolute;
        bottom: 0;
        left: 0; right: 0;
        z-index: 4;
        padding: 20px 20px 22px;
    }

    .ug-category {
        font-size: 0.72rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.6px;
        color: rgba(255,255,255,0.75);
        margin-bottom: 6px;
        display: block;
    }

    .ug-name {
        font-family: 'Fraunces', 'Plus Jakarta Sans', serif;
        font-size: 1.25rem;
        font-weight: 700;
        color: #fff;
        line-height: 1.3;
        margin-bottom: 6px;
        text-shadow: 0 2px 12px rgba(0,0,0,0.7);
    }

    .ug-loc {
        font-size: 0.82rem;
        color: rgba(255,255,255,0.7);
        display: flex;
        align-items: center;
        gap: 5px;
        margin-bottom: 14px;
    }

    .ug-loc i { color: #C89B3C; }

    .ug-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-top: 1px solid rgba(255,255,255,0.12);
        padding-top: 12px;
    }

    .ug-rating {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        background: rgba(0,0,0,0.4);
        backdrop-filter: blur(8px);
        border: 1px solid rgba(255,255,255,0.12);
        padding: 3px 10px;
        border-radius: 100px;
        font-size: 0.75rem;
        font-weight: 600;
        color: #fff;
    }

    .ug-price {
        font-family: 'IBM Plex Mono', monospace;
        font-size: 0.9rem;
        font-weight: 700;
        color: #f5c842;
    }

    .ug-detail-btn {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: rgba(255,255,255,0.12);
        backdrop-filter: blur(8px);
        border: 1px solid rgba(255,255,255,0.22);
        color: #fff;
        font-size: 0.8rem;
        font-weight: 600;
        padding: 7px 16px;
        border-radius: 100px;
        text-decoration: none;
        transition: all 0.3s ease;
        position: relative;
        z-index: 6;
    }

    .ug-card:hover .ug-detail-btn {
        background: #C89B3C;
        color: #0f2018;
        border-color: #C89B3C;
    }

    .ug-hitbox {
        position: absolute;
        inset: 0;
        z-index: 3;
    }

    /* =============================================
       WISATA CARD — 21st.dev "3D Card" Style
    ============================================= */
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

    /* =============================================
       21st.dev AURORA BENTO CTA SECTION
    ============================================= */
    .cta-aurora-wrapper {
        position: relative;
        padding: 40px 0 90px;
        overflow: hidden;
    }

    .cta-aurora-card {
        position: relative;
        border-radius: 32px;
        background: linear-gradient(135deg, #071f16 0%, #0d3425 50%, #061911 100%);
        border: 1px solid rgba(255, 255, 255, 0.15);
        box-shadow: 
            0 30px 90px -20px rgba(5, 30, 20, 0.65),
            0 0 0 1px rgba(200, 155, 60, 0.2),
            inset 0 1px 1px rgba(255, 255, 255, 0.3);
        padding: 68px 56px;
        overflow: hidden;
        color: #fff;
    }

    /* Background animated glow orbs */
    .cta-aurora-card .aurora-orb {
        position: absolute;
        border-radius: 50%;
        filter: blur(80px);
        pointer-events: none;
        opacity: 0.6;
        animation: aurora-float 8s ease-in-out infinite alternate;
    }

    .cta-aurora-card .aurora-orb-1 {
        width: 380px;
        height: 380px;
        top: -120px;
        left: -100px;
        background: radial-gradient(circle, rgba(16, 185, 129, 0.45) 0%, transparent 70%);
    }

    .cta-aurora-card .aurora-orb-2 {
        width: 420px;
        height: 420px;
        bottom: -140px;
        right: -120px;
        background: radial-gradient(circle, rgba(245, 166, 35, 0.35) 0%, transparent 70%);
        animation-delay: -3s;
    }

    .cta-aurora-card .aurora-orb-3 {
        width: 260px;
        height: 260px;
        top: 25%;
        left: 45%;
        background: radial-gradient(circle, rgba(52, 211, 153, 0.25) 0%, transparent 70%);
        animation-delay: -5s;
    }

    @keyframes aurora-float {
        0% { transform: translate(0, 0) scale(1); }
        50% { transform: translate(30px, -20px) scale(1.08); }
        100% { transform: translate(-20px, 30px) scale(0.95); }
    }

    /* Subtle dot grid pattern */
    .cta-aurora-card .grid-dots {
        position: absolute;
        inset: 0;
        background-image: radial-gradient(rgba(255, 255, 255, 0.08) 1.5px, transparent 1.5px);
        background-size: 28px 28px;
        mask-image: radial-gradient(ellipse 85% 70% at 50% 50%, #000 50%, transparent 100%);
        -webkit-mask-image: radial-gradient(ellipse 85% 70% at 50% 50%, #000 50%, transparent 100%);
        pointer-events: none;
    }

    /* Floating decorative rings */
    .cta-aurora-card .deco-rings {
        position: absolute;
        right: -100px;
        top: -100px;
        width: 460px;
        height: 460px;
        border-radius: 50%;
        border: 1px dashed rgba(200, 155, 60, 0.18);
        pointer-events: none;
    }

    .cta-aurora-card .deco-rings::before {
        content: '';
        position: absolute;
        inset: 50px;
        border-radius: 50%;
        border: 1px solid rgba(255, 255, 255, 0.05);
    }

    /* Badge with pulse dot */
    .cta-pill-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.25);
        border-radius: 100px;
        padding: 6px 16px;
        font-size: 0.76rem;
        font-weight: 700;
        letter-spacing: 0.8px;
        text-transform: uppercase;
        color: #fff;
        margin-bottom: 20px;
    }

    .cta-pill-badge .live-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: #10b981;
        box-shadow: 0 0 10px #10b981;
        animation: live-pulse 2s infinite;
    }

    @keyframes live-pulse {
        0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7); }
        70% { transform: scale(1); box-shadow: 0 0 0 8px rgba(16, 185, 129, 0); }
        100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(16, 185, 129, 0); }
    }

    .cta-heading {
        font-family: 'Fraunces', serif;
        font-size: 2.75rem;
        font-weight: 700;
        line-height: 1.2;
        color: #ffffff;
        margin-bottom: 16px;
    }

    .text-gradient-gold {
        background: linear-gradient(135deg, #fce08b 0%, #f5a623 50%, #e08b14 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        display: inline-block;
    }

    .cta-desc {
        color: rgba(255, 255, 255, 0.82);
        font-size: 1.05rem;
        line-height: 1.7;
        max-width: 560px;
        margin-bottom: 30px;
    }

    /* Bento Stats Box */
    .cta-bento-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 16px;
    }

    .cta-bento-item {
        background: rgba(255, 255, 255, 0.06);
        backdrop-filter: blur(16px);
        border: 1px solid rgba(255, 255, 255, 0.12);
        border-radius: 20px;
        padding: 20px;
        transition: all 0.3s cubic-bezier(0.2, 0.6, 0.2, 1);
        position: relative;
        overflow: hidden;
    }

    .cta-bento-item:hover {
        background: rgba(255, 255, 255, 0.12);
        border-color: rgba(200, 155, 60, 0.4);
        transform: translateY(-4px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.25);
    }

    .cta-bento-icon {
        width: 44px;
        height: 44px;
        border-radius: 14px;
        background: linear-gradient(135deg, rgba(200, 155, 60, 0.25), rgba(16, 185, 129, 0.2));
        border: 1px solid rgba(255, 255, 255, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
        color: var(--accent);
        margin-bottom: 12px;
    }

    .cta-bento-val {
        font-family: 'Fraunces', serif;
        font-size: 1.45rem;
        font-weight: 700;
        color: #ffffff;
        line-height: 1.1;
        margin-bottom: 4px;
    }

    .cta-bento-lbl {
        font-size: 0.76rem;
        color: rgba(255, 255, 255, 0.75);
        font-weight: 500;
        line-height: 1.35;
        margin: 0;
    }

    /* Shimmer primary button */
    .btn-cta-primary {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: linear-gradient(135deg, #f5a623 0%, #d48806 100%);
        color: #0d281e !important;
        font-weight: 700;
        font-size: 0.98rem;
        padding: 14px 28px;
        border-radius: 14px;
        text-decoration: none;
        box-shadow: 0 8px 24px rgba(245, 166, 35, 0.35);
        transition: all 0.3s cubic-bezier(0.2, 0.6, 0.2, 1);
        position: relative;
        overflow: hidden;
        border: none;
    }

    .btn-cta-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 14px 32px rgba(245, 166, 35, 0.5);
        color: #071711 !important;
    }

    .btn-cta-primary::after {
        content: '';
        position: absolute;
        top: -50%;
        left: -60%;
        width: 40%;
        height: 200%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
        transform: rotate(25deg);
        transition: left 0.75s ease-in-out;
    }

    .btn-cta-primary:hover::after {
        left: 130%;
    }

    .btn-cta-secondary {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(12px);
        border: 1.5px solid rgba(255, 255, 255, 0.25);
        color: #ffffff !important;
        font-weight: 600;
        font-size: 0.98rem;
        padding: 14px 26px;
        border-radius: 14px;
        text-decoration: none;
        transition: all 0.3s cubic-bezier(0.2, 0.6, 0.2, 1);
    }

    .btn-cta-secondary:hover {
        background: rgba(255, 255, 255, 0.18);
        border-color: rgba(255, 255, 255, 0.5);
        transform: translateY(-2px);
        color: #ffffff !important;
    }

    /* Floating Quote Pill */
    .floating-quote-pill {
        position: absolute;
        bottom: 22px;
        right: 24px;
        background: rgba(10, 24, 18, 0.75);
        backdrop-filter: blur(14px);
        border: 1px solid rgba(200, 155, 60, 0.3);
        border-radius: 100px;
        padding: 8px 18px;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 0.78rem;
        color: #fce08b;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        animation: float-quote 4s ease-in-out infinite alternate;
    }

    @keyframes float-quote {
        0% { transform: translateY(0); }
        100% { transform: translateY(-6px); }
    }

    @media (max-width: 991px) {
        .cta-aurora-card { padding: 44px 28px; }
        .cta-heading { font-size: 2.1rem; }
        .cta-bento-grid { margin-top: 24px; }
        .floating-quote-pill { display: none; }
    }

    @media (max-width: 576px) {
        .cta-bento-grid { grid-template-columns: 1fr; }
        .cta-heading { font-size: 1.75rem; }
    }

    @media (max-width: 768px) {
        .hero-section { min-height: 100svh; padding: 80px 0 60px; }
    }
</style>
@endpush

@section('content')

<!-- ===== HERO PREMIUM ===== -->
<section class="hero-section" id="hero">
    <!-- Animated glow layers -->
    <div class="hero-glow-main"></div>
    <div class="hero-glow-accent"></div>
    <!-- Grain texture -->
    <div class="hero-grain"></div>

    <div class="container">
        <div class="row align-items-center gy-5 py-5">

            <!-- LEFT: Text -->
            <div class="col-lg-6">

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
                            <span style="font-family:'IBM Plex Mono',monospace; font-size:0.68rem; color:rgba(255,255,255,0.4); margin-left:10px;"></span>
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
                            <a href="https://www.google.com/maps/search/Telaga+Sarangan+Magetan" target="_blank" style="position:absolute; top:30%; left:40%; transform:translate(-50%,-50%); text-decoration:none; z-index:10; transition: transform 0.2s ease-in-out; cursor:pointer;" onmouseover="this.style.transform='translate(-50%,-60%) scale(1.1)'" onmouseout="this.style.transform='translate(-50%,-50%) scale(1)'">
                                <div style="background:var(--accent); width:36px; height:36px; border-radius:50% 50% 50% 0; transform:rotate(-45deg); display:flex; align-items:center; justify-content:center; box-shadow:0 4px 16px rgba(200,155,60,0.5);">
                                    <i class="fa-solid fa-mountain" style="color:#14261F; font-size:0.8rem; transform:rotate(45deg);"></i>
                                </div>
                                <div style="position:absolute; top:-32px; left:50%; transform:translateX(-50%); white-space:nowrap; background:rgba(200,155,60,0.15); border:1px solid rgba(200,155,60,0.4); color:var(--accent); font-size:0.65rem; font-weight:600; padding:3px 10px; border-radius:6px; font-family:'IBM Plex Mono',monospace;">Telaga Sarangan</div>
                            </a>
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



<!-- ===== WISATA UNGGULAN (DISEMATKAN) ===== -->
@if(isset($wisataPinned) && $wisataPinned->count())
<section class="section-unggulan">
    <div class="container position-relative" style="z-index:5;">
        {{-- Section Header --}}
        <div class="d-flex justify-content-between align-items-end mb-5">
            <div data-aos="fade-up">
                <div class="section-badge" style="background:rgba(200,155,60,0.15);color:#C89B3C;border:1px solid rgba(200,155,60,0.3);">
                    <i class="fa-solid fa-thumbtack me-2"></i>Wisata Unggulan
                </div>
                <h2 class="section-title mb-2" style="color:#fff;">Destinasi Ikonik Magetan</h2>
                <p class="mb-0" style="color:rgba(255,255,255,0.6);">Wisata pilihan admin yang wajib Anda kunjungi</p>
            </div>
            <a href="{{ route('public.wisata') }}" class="btn-interactive btn-interactive-gold btn-interactive-md d-none d-md-inline-flex" data-aos="fade-left">
                <span class="btn-text-initial">Lihat Semua</span>
                <div class="btn-text-hover">
                    <span>Lihat Semua</span>
                    <i class="fa-solid fa-arrow-right"></i>
                </div>
                <div class="btn-bubble"></div>
            </a>
        </div>

        {{-- Scrollable Cards --}}
        <div class="unggulan-scroll-wrap" data-aos="fade-up" data-aos-delay="100">
            @foreach($wisataPinned as $wp)
            <div class="ug-card">
                {{-- Image --}}
                @if($wp->thumbnail)
                    <img class="ug-img" src="{{ Storage::url($wp->thumbnail) }}" alt="{{ $wp->nama }}" loading="lazy">
                @else
                    <div class="ug-nophoto"><i class="fa-solid fa-mountain-sun"></i></div>
                @endif

                {{-- Dark gradient overlay --}}
                <div class="ug-overlay"></div>

                {{-- Pin badge --}}
                <span class="ug-pin-badge">
                    <i class="fa-solid fa-thumbtack"></i> Unggulan
                </span>

                {{-- Content --}}
                <div class="ug-content">
                    <span class="ug-category">{{ $wp->kategori }}</span>
                    <h3 class="ug-name">{{ $wp->nama }}</h3>
                    <div class="ug-loc">
                        <i class="fa-solid fa-location-dot"></i>
                        <span>{{ $wp->kecamatan }}, Magetan</span>
                    </div>
                    <div class="ug-footer">
                        <div class="d-flex align-items-center gap-2">
                            @if($wp->ratings_avg_rating)
                            <span class="ug-rating">
                                <i class="fa-solid fa-star text-warning"></i>
                                {{ number_format($wp->ratings_avg_rating, 1) }}
                                @if($wp->ratings_count)
                                <small style="opacity:0.7;">({{ $wp->ratings_count }})</small>
                                @endif
                            </span>
                            @endif
                            @if($wp->harga_tiket > 0)
                            <span class="ug-price">Rp {{ number_format($wp->harga_tiket, 0, ',', '.') }}</span>
                            @else
                            <span class="ug-price" style="color:rgba(255,255,255,0.6);">Gratis</span>
                            @endif
                        </div>
                        <a href="{{ route('public.wisata.detail', $wp->slug) }}" class="btn-interactive btn-interactive-card btn-interactive-sm">
                            <span class="btn-text-initial">Detail</span>
                            <div class="btn-text-hover">
                                <span>Detail</span>
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>
                            <div class="btn-bubble"></div>
                        </a>
                    </div>
                </div>

                {{-- Full card hitbox --}}
                <a href="{{ route('public.wisata.detail', $wp->slug) }}" class="ug-hitbox" aria-label="{{ $wp->nama }}"></a>
            </div>
            @endforeach
        </div>

        {{-- Mobile: lihat semua button --}}
        <div class="text-center mt-4 d-md-none">
            <a href="{{ route('public.wisata') }}" class="btn-interactive btn-interactive-gold btn-interactive-lg">
                <span class="btn-text-initial">Lihat Semua Wisata</span>
                <div class="btn-text-hover">
                    <span>Lihat Semua Wisata</span>
                    <i class="fa-solid fa-arrow-right"></i>
                </div>
                <div class="btn-bubble"></div>
            </a>
        </div>
    </div>
</section>
@endif

<!-- ===== DESTINASI WISATA ===== -->
<section class="section-py">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-5">
            <div data-aos="fade-up">
                <div class="section-badge"><i class="fa-solid fa-map-location-dot me-2"></i>Destinasi Wisata</div>
                <h2 class="section-title mb-2">Tempat Wisata Unggulan</h2>
                <p class="text-muted mb-0">Keindahan alam dan budaya Kabupaten Magetan yang memukau</p>
            </div>
            <a href="{{ route('public.wisata') }}" class="btn-interactive btn-interactive-forest btn-interactive-md d-none d-md-inline-flex" data-aos="fade-left">
                <span class="btn-text-initial">Lihat Semua</span>
                <div class="btn-text-hover">
                    <span>Lihat Semua</span>
                    <i class="fa-solid fa-arrow-right"></i>
                </div>
                <div class="btn-bubble"></div>
            </a>
        </div>

        @if($wisata->count())
        <div class="row g-3" id="wisata-grid">
            @foreach($wisata as $w)
            <div class="col-md-6 col-xl-4" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                {{-- 3D Card — inspired by 21st.dev / Kavi Katiyar "3D Card" --}}
                <div class="wisata-card-3d" data-tilt>

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
                    <div class="wc-top pe-5">
                        <p class="wc-name">{{ $w->nama }}</p>
                        <div class="wc-loc">
                            <i class="fa-solid fa-location-dot"></i>
                            {{ $w->kecamatan }}, Magetan
                        </div>
                    </div>

                    {{-- Top-right: Like Button --}}
                    <div style="position:absolute;top:14px;right:14px;z-index:10;">
                        @auth
                        <button type="button"
                                class="wishlist-btn {{ auth()->user()->wishlist->contains($w->id) ? 'active' : '' }}"
                                data-id="{{ $w->id }}"
                                data-active="{{ auth()->user()->wishlist->contains($w->id) ? 'true' : 'false' }}"
                                title="{{ auth()->user()->wishlist->contains($w->id) ? 'Hapus dari Wisata Disukai' : 'Sukai Wisata Ini' }}"
                                aria-label="Sukai Wisata">
                            <i class="fa-heart {{ auth()->user()->wishlist->contains($w->id) ? 'fa-solid' : 'fa-regular' }}"></i>
                        </button>
                        @else
                        <a href="{{ route('login') }}"
                           class="wishlist-btn wishlist-btn-guest"
                           title="Login untuk menyukai wisata"
                           aria-label="Login untuk menyukai">
                            <i class="fa-regular fa-heart"></i>
                        </a>
                        @endauth
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

                    {{-- Card Link Hitbox --}}
                    <a href="{{ route('public.wisata.detail', $w->slug) }}" class="position-absolute inset-0 w-100 h-100" style="z-index:3;" aria-label="{{ $w->nama }}"></a>
                </div>
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
            <a href="{{ route('public.wisata') }}" class="btn-interactive btn-interactive-forest btn-interactive-lg">
                <span class="btn-text-initial">Lihat Semua Wisata</span>
                <div class="btn-text-hover">
                    <span>Lihat Semua Wisata</span>
                    <i class="fa-solid fa-arrow-right"></i>
                </div>
                <div class="btn-bubble"></div>
            </a>
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
            <a href="{{ route('public.event') }}" class="btn-interactive btn-interactive-forest btn-interactive-md d-none d-md-inline-flex" data-aos="fade-left">
                <span class="btn-text-initial">Lihat Semua</span>
                <div class="btn-text-hover">
                    <span>Lihat Semua</span>
                    <i class="fa-solid fa-arrow-right"></i>
                </div>
                <div class="btn-bubble"></div>
            </a>
        </div>

        <div class="row g-4">
            @foreach($events as $event)
            <div class="col-md-6 col-xl-3" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                {{-- 3D Event Card --}}
                <div class="wisata-card-3d event-card-3d" data-tilt>
                    @if($event->poster)
                        <img class="wc-img" src="{{ Storage::url($event->poster) }}" alt="{{ $event->judul }}" loading="lazy">
                    @else
                        <div class="wc-nophoto" style="background:linear-gradient(135deg,#142e20,#0a1b13);">
                            <i class="fa-solid fa-calendar-star"></i>
                        </div>
                    @endif

                    <div class="wc-overlay"></div>

                    {{-- Top bar: date badge & arrow --}}
                    <div class="d-flex justify-content-between align-items-start" style="position:absolute;top:16px;left:16px;right:16px;z-index:3;">
                        <div style="background:var(--accent);color:var(--primary-dark);border-radius:12px;padding:6px 12px;text-align:center;box-shadow:0 4px 14px rgba(0,0,0,0.3);backdrop-filter:blur(8px);">
                            <div style="font-size:1.15rem;line-height:1;font-weight:800;font-family:'Plus Jakarta Sans',sans-serif;">{{ $event->tanggal->format('d') }}</div>
                            <div style="font-size:0.65rem;text-transform:uppercase;letter-spacing:0.5px;font-weight:700;">{{ $event->tanggal->format('M Y') }}</div>
                        </div>
                        <div class="wc-arrow" style="position:static;">
                            <i class="fa-solid fa-arrow-up-right-from-square" style="font-size:0.8rem;"></i>
                        </div>
                    </div>

                    {{-- Bottom content: title & location --}}
                    <div class="wc-bottom flex-column align-items-start" style="gap:6px;">
                        <p class="wc-name text-white fw-bold mb-1" style="font-size:1.05rem;line-height:1.3;text-shadow:0 2px 8px rgba(0,0,0,0.7);">
                            {{ Str::limit($event->judul, 45) }}
                        </p>
                        <div class="d-flex align-items-center gap-2 flex-wrap">
                            <span class="wc-cat" style="background:rgba(15,34,26,0.85);backdrop-filter:blur(8px);font-size:0.65rem;">
                                <i class="fa-solid fa-location-dot me-1 text-warning"></i>{{ Str::limit($event->lokasi, 22) }}
                            </span>
                            @if($event->jam)
                            <span class="wc-price" style="background:rgba(10,22,18,0.75);font-size:0.65rem;">
                                <i class="fa-regular fa-clock me-1"></i>{{ $event->jam }}
                            </span>
                            @endif
                        </div>
                    </div>

                    <a href="{{ route('public.event.detail', $event->id) }}" class="position-absolute inset-0 w-100 h-100" style="z-index:4;" aria-label="{{ $event->judul }}"></a>
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
            <a href="{{ route('public.berita') }}" class="btn-interactive btn-interactive-forest btn-interactive-md d-none d-md-inline-flex" data-aos="fade-left">
                <span class="btn-text-initial">Lihat Semua</span>
                <div class="btn-text-hover">
                    <span>Lihat Semua</span>
                    <i class="fa-solid fa-arrow-right"></i>
                </div>
                <div class="btn-bubble"></div>
            </a>
        </div>

        <div class="row g-4">
            @foreach($berita as $b)
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                {{-- 3D Berita Card --}}
                <div class="wisata-card-3d berita-card-3d" data-tilt>
                    @if($b->thumbnail)
                        <img class="wc-img" src="{{ Storage::url($b->thumbnail) }}" alt="{{ $b->judul }}" loading="lazy">
                    @else
                        <div class="wc-nophoto" style="background:linear-gradient(135deg,#142e20,#0a1b13);">
                            <i class="fa-regular fa-newspaper"></i>
                        </div>
                    @endif

                    <div class="wc-overlay"></div>

                    {{-- Top bar: date badge & arrow --}}
                    <div class="d-flex justify-content-between align-items-center" style="position:absolute;top:16px;left:16px;right:16px;z-index:3;">
                        <span class="wc-cat" style="background:rgba(26,107,58,0.85);backdrop-filter:blur(8px);border:1px solid rgba(255,255,255,0.2);">
                            <i class="fa-regular fa-calendar me-1"></i>{{ $b->created_at->format('d M Y') }}
                        </span>
                        <div class="wc-arrow" style="position:static;">
                            <i class="fa-solid fa-arrow-up-right-from-square" style="font-size:0.8rem;"></i>
                        </div>
                    </div>

                    {{-- Bottom content: title & snippet --}}
                    <div class="wc-bottom flex-column align-items-start" style="gap:6px;">
                        <p class="wc-name text-white fw-bold mb-1" style="font-size:1.1rem;line-height:1.35;text-shadow:0 2px 8px rgba(0,0,0,0.7);">
                            {{ Str::limit($b->judul, 60) }}
                        </p>
                        <p class="mb-0 text-white-50 small" style="font-size:0.75rem;line-height:1.4;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;text-shadow:0 1px 4px rgba(0,0,0,0.7);">
                            {{ Str::limit(strip_tags($b->isi), 90) }}
                        </p>
                    </div>

                    <a href="{{ route('public.berita.detail', $b->id) }}" class="position-absolute inset-0 w-100 h-100" style="z-index:4;" aria-label="{{ $b->judul }}"></a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- ===== CTA AURORA BENTO 21ST.DEV ===== -->
<section class="cta-aurora-wrapper">
    <div class="container">
        <div class="cta-aurora-card" data-aos="zoom-in" data-aos-duration="900">
            <!-- Background Aurora Ambient Orbs -->
            <div class="aurora-orb aurora-orb-1"></div>
            <div class="aurora-orb aurora-orb-2"></div>
            <div class="aurora-orb aurora-orb-3"></div>

            <!-- Dot Grid Overlay -->
            <div class="grid-dots"></div>

            <!-- Geometric Rings -->
            <div class="deco-rings"></div>

            <div class="row align-items-center position-relative g-4" style="z-index: 2;">
                <!-- Left Column: Content & Call to Actions -->
                <div class="col-lg-7 pe-lg-4">
                    <div class="cta-pill-badge">
                        <span class="live-dot"></span>
                        <span>Dinas Kebudayaan & Pariwisata Kab. Magetan</span>
                    </div>

                    <h2 class="cta-heading">
                        Siap Menjelajahi Pesona <span class="text-gradient-gold">Bumi Magetan?</span>
                    </h2>

                    <p class="cta-desc">
                        Temukan keindahan Telaga Sarangan, segarnya udara lereng Gunung Lawu, kekayaan tradisi budaya, dan nikmati aneka ragam kuliner legendaris khas Magetan dalam satu genggaman.
                    </p>

                    <div class="d-flex gap-3 flex-wrap align-items-center mb-4">
                        <a href="{{ route('public.wisata') }}" class="btn-cta-primary">
                            <i class="fa-solid fa-compass"></i>
                            <span>Mulai Jelajah Wisata</span>
                            <i class="fa-solid fa-arrow-right ms-1"></i>
                        </a>
                        <a href="{{ route('public.tentang') }}" class="btn-cta-secondary">
                            <i class="fa-solid fa-circle-info"></i>
                            <span>Tentang Jelajah Magetan</span>
                        </a>
                    </div>

                    <div class="d-inline-flex align-items-center gap-2 px-3 py-2" style="background:rgba(255,255,255,0.06); border:1px solid rgba(255,255,255,0.12); border-radius:100px; font-size:0.8rem; color:rgba(255,255,255,0.85); backdrop-filter:blur(8px);">
                        <i class="fa-solid fa-headset text-warning"></i>
                        <span>Pusat Layanan & Konsultasi Wisata:</span>
                        <strong class="text-white">Buka Setiap Hari (08:00 - 16:00 WIB)</strong>
                    </div>
                </div>

                <!-- Right Column: Bento Stats Cards -->
                <div class="col-lg-5">
                    <div class="cta-bento-grid">
                        <div class="cta-bento-item">
                            <div class="cta-bento-icon">
                                <i class="fa-solid fa-mountain-sun"></i>
                            </div>
                            <div class="cta-bento-val">50+</div>
                            <p class="cta-bento-lbl">Destinasi Wisata Alam & Budaya Unggulan</p>
                        </div>

                        <div class="cta-bento-item">
                            <div class="cta-bento-icon">
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <div class="cta-bento-val">4.9 / 5</div>
                            <p class="cta-bento-lbl">Tingkat Kepuasan & Ulasan Wisatawan</p>
                        </div>

                        <div class="cta-bento-item">
                            <div class="cta-bento-icon">
                                <i class="fa-solid fa-calendar-check"></i>
                            </div>
                            <div class="cta-bento-val">Event</div>
                            <p class="cta-bento-lbl">Festival Tradisi & Seni Budaya Tahunan</p>
                        </div>

                        <div class="cta-bento-item">
                            <div class="cta-bento-icon">
                                <i class="fa-solid fa-map-location-dot"></i>
                            </div>
                            <div class="cta-bento-val">E-Catalog</div>
                            <p class="cta-bento-lbl">Akses Rute, Tiket & Fasilitas Terpadu</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Floating Quote Pill -->
            <div class="floating-quote-pill">
                <i class="fa-solid fa-sparkles"></i>
                <span><strong>Magetan:</strong> The Beauty of Java</span>
            </div>
        </div>
    </div>
</section>

@endsection
