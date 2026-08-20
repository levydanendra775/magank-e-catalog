<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Beranda') — Jelajah Magetan</title>
    <meta name="description" content="@yield('meta_description', 'Temukan destinasi wisata, event menarik, dan berita seputar Kabupaten Magetan.')">

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/lambang-magetan.png') }}">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Jelajah Magetan">
    <meta property="og:title" content="@yield('title', 'Beranda — Jelajah Magetan')">
    <meta property="og:description" content="@yield('meta_description', 'Temukan destinasi wisata, event menarik, dan berita seputar Kabupaten Magetan.')">
    <meta property="og:image" content="@yield('og_image', asset('images/hero-telaga-sarangan.jpg'))">
    <meta property="og:url" content="{{ url()->current() }}">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Fraunces:ital,wght@0,500;0,600;1,500&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=IBM+Plex+Mono:wght@500&display=swap"
        rel="stylesheet">
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        :root {
            --primary: #1F3A34;
            --primary-dark: #14261F;
            --primary-light: #EAF0EC;
            --accent: #C89B3C;
            --accent-dark: #9C7726;
            --rust: #7A3B2E;
            --text-dark: #24302B;
            --text-muted: #5B6B62;
            --bg-light: #F5F7F1;
            --border: #DCE4DD;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--text-dark);
            background: #fff;
        }

        h1,
        h2,
        h3,
        h4,
        h5 {
            font-family: 'Fraunces', serif;
            font-weight: 600;
        }

        .font-mono {
            font-family: 'IBM Plex Mono', monospace;
        }

        /* =============================================
           NAVBAR — 21st.dev "Floating Navbar" Style
           Inspired by: Aceternity UI / Manu Arora
        ============================================= */
        @keyframes nav-slide-down {
            from {
                transform: translateY(-100%);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .navbar-public {
            /* Start: fully solid (matches hero dark bg) */
            background: var(--primary);
            padding: 16px 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            /* Smooth transition for glass morph */
            transition: background 0.4s ease,
                padding 0.3s ease,
                box-shadow 0.4s ease,
                transform 0.4s cubic-bezier(0.2, 0.6, 0.2, 1),
                backdrop-filter 0.4s ease;
            animation: nav-slide-down 0.6s cubic-bezier(0.2, 0.6, 0.2, 1) both;
        }

        /* Scrolled state — glassmorphism dark */
        .navbar-public.nav-glass::after {
            content: '';
            position: absolute;
            left: 0;
            right: 0;
            bottom: -20px;
            height: 20px;
            background: linear-gradient(to bottom, rgba(15, 26, 22, 0.5), transparent);
            pointer-events: none;
        }

        /* Hidden — slides up on scroll down */
        .navbar-public.nav-hidden {
            transform: translateY(-110%);
        }

        /* Logo images */
        .navbar-logo-tourism,
        .navbar-logo-dinas {
            transition: opacity 0.25s ease, transform 0.25s ease;
            filter: brightness(1.05);
        }

        .navbar-logo-tourism:hover,
        .navbar-logo-dinas:hover {
            opacity: 0.85;
            transform: scale(0.97);
        }

        /* Brand text */
        .navbar-brand-text {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 700;
            font-style: normal;
            font-size: 0.75rem;
            color: #fff;
            line-height: 1.3;
            letter-spacing: 0.3px;
            text-transform: uppercase;
        }

        .navbar-brand-text span {
            display: block;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-style: normal;
            font-size: 0.68rem;
            font-weight: 500;
            color: rgba(255, 255, 255, 0.65);
            margin-top: 2px;
            letter-spacing: 0.2px;
        }

        /* Nav links — sliding pill indicator (gaya glass navbar referensi #3) */
        .nav-link-custom {
            text-decoration: none !important;
            /* fix: underline default browser sebelumnya menutupi
                                                   indikator custom */
            font-weight: 600;
            font-size: 0.9rem;
            padding: 6px 14px !important;
            border-radius: 8px;
            position: relative;
            z-index: 1;
            /* teks selalu di atas pill */
            letter-spacing: 0.01em;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .nav-link-custom i {
            font-size: 0.82rem;
            opacity: 0.8;
        }

        .nav-link-custom:hover,
        .nav-link-custom.active {
            color: #fff !important;
        }

        /* ── Teks link animasi vertikal ── */
        .nav-link-text {
            display: inline-block;
            overflow: hidden;
            height: 1.25em;
            line-height: 1.25em;
        }

        .nav-link-text-inner {
            display: flex;
            flex-direction: column;
            transition: transform 0.4s cubic-bezier(0.2, 0.6, 0.2, 1);
        }

        .nav-link-row {
            height: 1.25em;
            line-height: 1.25em;
            color: rgba(255, 255, 255, 0.72);
        }

        .nav-link-row-hover {
            color: #fff;
        }

        .nav-link-custom:hover .nav-link-text-inner,
        .nav-link-custom.active .nav-link-text-inner {
            transform: translateY(-50%);
        }

        /* Wadah 3 link — jadi acuan posisi pill (hanya link, tanpa tombol akun) */
        .nav-links-wrap {
            position: relative;
        }

        /* Pill yang meluncur mengikuti hover / halaman aktif */
        .nav-pill {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            border-radius: 8px;
            background: rgba(200, 155, 60, 0.16);
            border: 1px solid rgba(200, 155, 60, 0.3);
            opacity: 0;
            z-index: 0;
            pointer-events: none;
            transition: transform 0.35s cubic-bezier(0.2, 0.6, 0.2, 1),
                width 0.35s cubic-bezier(0.2, 0.6, 0.2, 1),
                opacity 0.2s ease;
        }

        /* ===== SECTION HEADERS ===== */
        .section-badge {
            display: inline-block;
            background: var(--primary-light);
            color: var(--primary);
            font-size: 0.78rem;
            font-weight: 600;
            padding: 5px 14px;
            border-radius: 100px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 12px;
        }

        /* ===== CARDS ===== */
        .card-hover {
            border: 1px solid var(--border) !important;
            border-radius: 12px !important;
            transition: all 0.25s ease;
            overflow: hidden;
        }

        .card-hover:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 28px rgba(31, 58, 52, 0.12) !important;
            border-color: var(--primary) !important;
        }

        /* Signature: elevation badge (mdpl) — encodes real elevation data, not decoration */
        .elevation-badge {
            position: absolute;
            top: 12px;
            right: 12px;
            background: rgba(31, 58, 52, 0.85);
            color: #fff;
            font-family: 'IBM Plex Mono', monospace;
            font-size: 0.68rem;
            font-weight: 500;
            padding: 4px 10px;
            border-radius: 6px;
            letter-spacing: 0.3px;
        }

        .card-img-wrapper {
            position: relative;
            overflow: hidden;
            height: 210px;
        }

        .card-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .card-hover:hover .card-img-wrapper img {
            transform: scale(1.07);
        }

        .category-badge {
            position: absolute;
            top: 12px;
            left: 12px;
            background: var(--rust);
            color: #fff;
            font-size: 0.73rem;
            font-weight: 600;
            padding: 4px 12px;
            border-radius: 6px;
        }

        /* ===== FOOTER ===== */
        .footer {
            background: var(--primary-dark);
            position: relative;
            color: rgba(255, 255, 255, 0.6);
            padding: 60px 0 30px;
        }

        .footer h5 {
            color: #fff;
            font-weight: 600;
            font-family: 'Fraunces', serif;
            margin-bottom: 20px;
        }

        .footer .brand-title {
            color: #fff;
            font-family: 'Fraunces', serif;
            font-style: italic;
            font-size: 1.4rem;
            display: inline-block;
        }

        .footer a {
            color: #94a3b8;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
        }

        .footer a i.fa-chevron-right {
            font-size: 0.75rem;
            margin-right: 8px;
            opacity: 0;
            transform: translateX(-6px);
            transition: all 0.2s ease;
            color: var(--accent);
        }

        .footer a:hover {
            color: var(--accent);
        }

        .footer a:hover i.fa-chevron-right {
            opacity: 1;
            transform: translateX(0);
        }

        .footer .contact-icon {
            color: var(--accent);
            background: rgba(200, 155, 60, 0.12);
            width: 32px;
            height: 32px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            margin-right: 12px;
            flex-shrink: 0;
        }

        .footer .contact-text {
            display: flex;
            align-items: flex-start;
            margin-bottom: 12px;
            color: rgba(255, 255, 255, 0.6);
        }

        .footer a.contact-text:hover,
        .footer .contact-text:hover {
            color: var(--accent);
        }

        .footer-divider {
            border: none;
            height: 1px;
            background: rgba(255, 255, 255, 0.1);
            margin: 40px 0 20px;
        }

        /* ===== BUTTONS ===== */
        .btn-primary-custom {
            background: var(--accent);
            border: none;
            color: var(--primary-dark);
            padding: 9px 22px;
            border-radius: 8px;
            font-weight: 700;
            font-size: 0.95rem;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }

        .btn-primary-custom:hover,
        .btn-primary-custom:focus {
            background: var(--accent-dark);
            color: #fff;
        }

        .btn-outline-custom {
            border: 1.5px solid var(--primary);
            color: var(--primary);
            padding: 8px 22px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.9rem;
            background: transparent;
            transition: all 0.2s;
        }

        .btn-outline-custom:hover {
            background: var(--primary);
            color: #fff;
        }

        /* ===== PLACEHOLDER image ===== */
        .img-placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--primary-light);
            color: var(--primary);
        }

        /* ===== STATS BAR ===== */
        .stats-bar {
            background: var(--primary);
            color: #fff;
            padding: 18px 0;
        }

        .stat-item {
            text-align: center;
            padding: 0 20px;
        }

        .stat-item .stat-num {
            font-size: 1.8rem;
            font-weight: 800;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .stat-item .stat-label {
            font-size: 0.8rem;
            opacity: 0.85;
        }

        /* Divider between logos — tint gold supaya senada dengan tombol/accent, bukan abu-abu netral */
        .nav-logo-divider-line {
            width: 1px;
            height: 36px;
            background: rgba(200, 155, 60, 0.35);
            margin: 0 4px;
            flex-shrink: 0;
            transition: background 0.3s;
        }

        .navbar-public.nav-glass .nav-logo-divider-line {
            background: rgba(200, 155, 60, 0.25);
        }

        /* Wishlist button */
        .wishlist-btn {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: rgba(15, 34, 26, 0.75);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1.5px solid rgba(255, 255, 255, 0.25);
            color: #ffffff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.05rem;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.2, 0.6, 0.2, 1);
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.25);
            text-decoration: none;
            outline: none;
        }

        .wishlist-btn:hover {
            background: rgba(255, 255, 255, 0.95);
            color: #e63946;
            border-color: #ff6b6b;
            transform: scale(1.12);
            box-shadow: 0 6px 20px rgba(230, 57, 70, 0.45);
        }

        .wishlist-btn.active,
        .wishlist-btn[data-active="true"] {
            background: #e63946 !important;
            border-color: #ff858d !important;
            color: #ffffff !important;
            box-shadow: 0 4px 18px rgba(230, 57, 70, 0.65);
            transform: scale(1.05);
        }

        .wishlist-btn.active:hover,
        .wishlist-btn[data-active="true"]:hover {
            transform: scale(1.15);
            box-shadow: 0 8px 25px rgba(230, 57, 70, 0.8);
        }

        @keyframes heart-pop {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.35) rotate(-10deg);
            }

            100% {
                transform: scale(1);
            }
        }

        .heart-pop {
            animation: heart-pop 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .wc-title,
        .wc-title a,
        .wc-title span,
        .wc-name {
            color: #ffffff !important;
            text-decoration: none !important;
        }

        /* =============================================
           21st.dev INTERACTIVE HOVER BUTTON COMPONENT
           Inspired by: 21st.dev / MagicUI (@dillionverma)
        ============================================= */
        .btn-interactive {
            position: relative;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 9999px;
            border: 1.5px solid transparent;
            cursor: pointer;
            overflow: hidden;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 600;
            text-decoration: none !important;
            user-select: none;
            vertical-align: middle;
            transition: border-color 0.35s ease, box-shadow 0.35s ease, transform 0.25s ease, background 0.35s ease;
            white-space: nowrap;
            letter-spacing: 0.2px;
        }

        .btn-interactive:active {
            transform: scale(0.97) !important;
        }

        /* Sizes */
        .btn-interactive-sm {
            min-width: 96px;
            height: 36px;
            padding: 0 16px;
            font-size: 0.8rem;
        }

        .btn-interactive-md {
            min-width: 142px;
            height: 42px;
            padding: 0 22px;
            font-size: 0.88rem;
        }

        .btn-interactive-lg {
            min-width: 180px;
            height: 46px;
            padding: 0 28px;
            font-size: 0.94rem;
        }

        /* Initial Text (visible by default, slides right & fades out on hover) */
        .btn-interactive .btn-text-initial {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transform: translateX(4px);
            opacity: 1;
            transition: transform 0.35s cubic-bezier(0.2, 0.8, 0.2, 1), opacity 0.3s ease;
            z-index: 2;
        }

        .btn-interactive:hover .btn-text-initial {
            transform: translateX(28px);
            opacity: 0;
        }

        /* Hover Text + Arrow (hidden by default, slides in from right on hover) */
        .btn-interactive .btn-text-hover {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transform: translateX(28px);
            opacity: 0;
            transition: transform 0.35s cubic-bezier(0.2, 0.8, 0.2, 1), opacity 0.3s ease;
            z-index: 3;
            font-weight: 700;
        }

        .btn-interactive:hover .btn-text-hover {
            transform: translateX(0);
            opacity: 1;
        }

        .btn-interactive .btn-text-hover i,
        .btn-interactive .btn-text-hover svg {
            font-size: 0.85em;
            transition: transform 0.3s ease;
        }

        .btn-interactive:hover .btn-text-hover i:not(.fa-arrow-left),
        .btn-interactive:hover .btn-text-hover svg:not(.arrow-left) {
            transform: translateX(3px);
        }

        .btn-interactive:hover .btn-text-hover i.fa-arrow-left,
        .btn-interactive:hover .btn-text-hover svg.arrow-left {
            transform: translateX(-3px);
        }

        /* Dot bubble expanding on hover */
        .btn-interactive .btn-bubble {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%) scale(1);
            width: 7px;
            height: 7px;
            border-radius: 50%;
            transition: left 0.35s cubic-bezier(0.2, 0.8, 0.2, 1),
                top 0.35s cubic-bezier(0.2, 0.8, 0.2, 1),
                width 0.35s cubic-bezier(0.2, 0.8, 0.2, 1),
                height 0.35s cubic-bezier(0.2, 0.8, 0.2, 1),
                transform 0.35s cubic-bezier(0.2, 0.8, 0.2, 1),
                border-radius 0.35s cubic-bezier(0.2, 0.8, 0.2, 1),
                background 0.35s ease;
            z-index: 1;
        }

        .btn-interactive:hover .btn-bubble {
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            transform: translateY(0) scale(1);
            border-radius: 9999px;
        }

        /* ---- Theme 1: Forest Green (For bright sections) ---- */
        .btn-interactive-forest {
            background: #ffffff;
            border-color: rgba(31, 58, 52, 0.25);
            color: #1F3A34 !important;
            box-shadow: 0 4px 14px rgba(31, 58, 52, 0.08);
        }

        .btn-interactive-forest .btn-bubble {
            background: #1F3A34;
        }

        .btn-interactive-forest .btn-text-hover {
            color: #ffffff !important;
        }

        .btn-interactive-forest:hover {
            border-color: #1F3A34;
            box-shadow: 0 8px 24px rgba(31, 58, 52, 0.25);
        }

        /* ---- Theme 2: Gold / Accent (For Wisata Unggulan & dark sections) ---- */
        .btn-interactive-gold {
            background: rgba(200, 155, 60, 0.12);
            border-color: rgba(200, 155, 60, 0.4);
            color: #f5c842 !important;
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }

        .btn-interactive-gold .btn-bubble {
            background: linear-gradient(135deg, #C89B3C 0%, #f5c842 100%);
            box-shadow: 0 0 8px rgba(245, 200, 66, 0.6);
        }

        .btn-interactive-gold .btn-text-hover {
            color: #14261F !important;
        }

        .btn-interactive-gold:hover {
            border-color: #f5c842;
            box-shadow: 0 8px 28px rgba(200, 155, 60, 0.45);
        }

        /* ---- Theme 3: Glass Card Detail (Inside cards & wishlists) ---- */
        .btn-interactive-card {
            background: rgba(255, 255, 255, 0.15);
            border-color: rgba(255, 255, 255, 0.28);
            color: #ffffff !important;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            z-index: 6;
        }

        .btn-interactive-card .btn-bubble {
            background: linear-gradient(135deg, #C89B3C 0%, #f5c842 100%);
        }

        .btn-interactive-card .btn-text-hover {
            color: #14261F !important;
        }

        .btn-interactive-card:hover {
            border-color: #f5c842;
            box-shadow: 0 6px 20px rgba(200, 155, 60, 0.5);
            transform: translateY(-1px);
        }

        /* =========================================================
           PAGINATION — di-recolor ke palet forest-green/gold situs
           (sebelumnya masih warna asli referensi shadcn: slate/putih)
           ========================================================= */
        .pagination-21st-nav {
            display: flex;
            width: 100%;
            justify-content: center;
            align-items: center;
            margin: 0 auto;
        }

        .pagination-21st-content {
            display: inline-flex;
            flex-direction: row;
            align-items: center;
            gap: 6px;
            list-style: none;
            padding: 0;
            margin: 0;
            flex-wrap: wrap;
            justify-content: center;
        }

        .pagination-21st-content li[data-slot="pagination-item"] {
            list-style: none;
            display: inline-flex;
            align-items: center;
            margin: 0;
            padding: 0;
        }

        /* Base button */
        .btn-pagination-21st {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 0.875rem;
            font-weight: 500;
            line-height: 1;
            color: var(--text-muted);
            background: transparent;
            border: 1px solid transparent;
            border-radius: 8px;
            text-decoration: none !important;
            cursor: pointer;
            user-select: none;
            transition: all 0.18s cubic-bezier(0.4, 0, 0.2, 1);
            outline: none;
        }

        /* Ghost hover — tint hijau muda, bukan abu netral */
        .btn-pagination-21st:hover:not(.disabled):not(.active) {
            background-color: var(--primary-light);
            color: var(--primary);
            border-color: transparent;
        }

        /* Icon / numeric square mode */
        .btn-pagination-21st.btn-pagination-icon {
            width: 38px;
            height: 38px;
            padding: 0;
            min-width: 38px;
        }

        /* Previous / Next button mode */
        .btn-pagination-21st.btn-pagination-nav {
            height: 38px;
            padding: 0 14px;
            gap: 8px;
            font-size: 0.875rem;
        }

        /* Active Page — solid gold, senada tombol CTA situs */
        .btn-pagination-21st.active {
            background-color: var(--accent);
            color: #fff;
            border: 1.5px solid var(--accent-dark);
            font-weight: 700;
            box-shadow: 0 3px 10px rgba(200, 155, 60, 0.4);
            cursor: default;
        }

        /* Disabled state */
        .btn-pagination-21st.disabled {
            color: var(--text-muted);
            opacity: 0.4;
            cursor: not-allowed;
            pointer-events: none;
            background: transparent;
            border-color: transparent;
        }

        /* Ellipsis */
        .pagination-21st-ellipsis {
            display: inline-flex;
            width: 38px;
            height: 38px;
            align-items: center;
            justify-content: center;
            color: var(--text-muted);
            font-size: 0.875rem;
        }
    </style>

    @stack('styles')

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>

    <!-- NAVBAR — Floating Style -->
    <nav class="navbar-public" id="mainNavbar">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <a href="{{ route('home') }}" class="text-decoration-none">
                    <div class="d-flex align-items-center gap-2">
                        {{-- Logo Magetan Tourism (JANGAN DIUBAH) --}}
                        <img src="{{ asset('images/magetan-tourism.png') }}" alt="Magetan Tourism"
                            class="navbar-logo-tourism" style="height:50px; width:auto; object-fit:contain;">
                        {{-- Divider --}}
                        <div class="nav-logo-divider-line"></div>
                        {{-- Lambang resmi Kabupaten Magetan (JANGAN DIUBAH) --}}
                        <img src="{{ asset('images/lambang-magetan.png') }}" alt="Lambang Kabupaten Magetan"
                            class="navbar-logo-dinas" style="height:50px; width:auto; object-fit:contain;">
                        {{-- Teks Dinas (JANGAN DIUBAH) --}}
                        <div class="navbar-brand-text d-none d-lg-block" style="line-height:1.25;">
                            DINAS KEBUDAYAAN DAN PARIWISATA
                            <span>KABUPATEN MAGETAN</span>
                        </div>
                    </div>
                </a>

                <!-- Mobile toggle -->
                <button class="navbar-toggler border-0 d-md-none" type="button" id="navToggle"
                    style="background:rgba(255,255,255,0.1); border-radius:8px; padding:8px 12px; color:#fff;">
                    <i class="fa-solid fa-bars"></i>
                </button>

                <!-- Nav links desktop -->
                <div class="d-none d-md-flex align-items-center gap-1">
                    <div class="nav-links-wrap d-flex align-items-center gap-1" id="navLinksWrap">
                        <span class="nav-pill" id="navPill"></span>

                        <a href="{{ route('public.wisata') }}"
                            class="nav-link-custom {{ request()->routeIs('public.wisata*') ? 'active' : '' }}">
                            <i class="fa-solid fa-map-location-dot"></i>
                            <span class="nav-link-text">
                                <span class="nav-link-text-inner">
                                    <span class="nav-link-row">Wisata</span>
                                    <span class="nav-link-row nav-link-row-hover">Wisata</span>
                                </span>
                            </span>
                        </a>

                        <a href="{{ route('public.event') }}"
                            class="nav-link-custom {{ request()->routeIs('public.event') ? 'active' : '' }}">
                            <i class="fa-solid fa-calendar-days"></i>
                            <span class="nav-link-text">
                                <span class="nav-link-text-inner">
                                    <span class="nav-link-row">Event</span>
                                    <span class="nav-link-row nav-link-row-hover">Event</span>
                                </span>
                            </span>
                        </a>

                        <a href="{{ route('public.berita') }}"
                            class="nav-link-custom {{ request()->routeIs('public.berita*') ? 'active' : '' }}">
                            <i class="fa-regular fa-newspaper"></i>
                            <span class="nav-link-text">
                                <span class="nav-link-text-inner">
                                    <span class="nav-link-row">Berita</span>
                                    <span class="nav-link-row nav-link-row-hover">Berita</span>
                                </span>
                            </span>
                        </a>
                    </div>

                    @php
                        $webUser = Auth::guard('web')->user();
                        $adminUser = Auth::guard('admin')->user();
                        $publicUser = $webUser ?? $adminUser;
                    @endphp

                    @if ($publicUser)
                        <div class="dropdown ms-2">
                            <button class="btn-primary-custom dropdown-toggle d-flex align-items-center gap-2"
                                type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                style="border-radius:10px; padding:9px 18px; font-size:0.88rem;">
                                <i class="fa-solid fa-circle-user" style="font-size:1.05rem;"></i>
                                <span>{{ Str::limit($publicUser->name, 12) }}</span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2"
                                style="border-radius:14px; background:rgba(18,36,29,0.96); backdrop-filter:blur(18px); -webkit-backdrop-filter:blur(18px); border:1px solid rgba(255,255,255,0.12) !important; min-width:240px; padding:8px;">
                                <li
                                    class="px-3 py-2 text-white-50 small border-bottom border-secondary border-opacity-25 mb-1">
                                    <div class="fw-bold text-white text-truncate">{{ $publicUser->name }}</div>
                                    <div class="text-truncate" style="font-size:0.75rem;">{{ $publicUser->email }}
                                    </div>
                                    @if ($adminUser && $webUser)
                                        <span class="badge bg-warning text-dark mt-1" style="font-size:0.68rem;"><i
                                                class="fa-solid fa-layer-group me-1"></i>Sesi Concurrent (Admin &
                                            User)</span>
                                    @elseif($adminUser)
                                        <span class="badge bg-success mt-1" style="font-size:0.68rem;"><i
                                                class="fa-solid fa-user-shield me-1"></i>Sesi Admin Aktif</span>
                                    @endif
                                </li>
                                @if ($adminUser || ($webUser && $webUser->hasAnyRole(['Admin', 'Petugas'])))
                                    <li><a class="dropdown-item py-2 px-3 rounded-2"
                                            href="{{ route('admin.dashboard') }}"
                                            style="color:rgba(255,255,255,0.9); font-size:0.88rem; transition: background 0.2s;">
                                            <i class="fa-solid fa-gauge me-2"
                                                style="color:var(--accent);"></i>Dashboard Admin
                                        </a></li>
                                @endif
                                @if ($webUser)
                                    <li><a class="dropdown-item py-2 px-3 rounded-2 d-flex align-items-center justify-content-between"
                                            href="{{ route('wishlist.index') }}"
                                            style="color:rgba(255,255,255,0.9); font-size:0.88rem; transition: background 0.2s;">
                                            <span><i class="fa-solid fa-heart me-2" style="color:#ff6b6b;"></i>Wisata
                                                Disukai</span>
                                            <span class="badge bg-danger rounded-pill navbar-wishlist-count"
                                                style="font-size:0.7rem;">{{ $webUser->wishlist()->count() }}</span>
                                        </a></li>
                                @endif
                                <li><a class="dropdown-item py-2 px-3 rounded-2" href="{{ route('login') }}"
                                        style="color:rgba(255,255,255,0.9); font-size:0.88rem; transition: background 0.2s;">
                                        <i class="fa-solid fa-user-plus me-2" style="color:#60a5fa;"></i>Login / Ganti
                                        Akun
                                    </a></li>
                                <li>
                                    <hr class="dropdown-divider my-2" style="border-color:rgba(255,255,255,0.1);">
                                </li>
                                @if ($webUser)
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit"
                                                class="dropdown-item py-2 px-3 rounded-2 fw-semibold"
                                                style="color:#ff6b6b; font-size:0.88rem;">
                                                <i class="fa-solid fa-right-from-bracket me-2"></i>Logout Sesi User
                                            </button>
                                        </form>
                                    </li>
                                @endif
                                @if ($adminUser)
                                    <li>
                                        <form method="POST" action="{{ route('admin.logout') }}">
                                            @csrf
                                            <button type="submit"
                                                class="dropdown-item py-2 px-3 rounded-2 fw-semibold"
                                                style="color:#fb923c; font-size:0.88rem;">
                                                <i class="fa-solid fa-power-off me-2"></i>Logout Sesi Admin
                                            </button>
                                        </form>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="btn-primary-custom ms-2"
                            style="border-radius:10px; padding:9px 20px; font-size:0.88rem;">
                            <i class="fa-solid fa-right-to-bracket me-1"></i>Login
                        </a>
                    @endif
                </div>
            </div>

            <!-- Mobile menu collapse -->
            <div class="d-md-none" id="navMenuMobile"
                style="display:none !important; overflow:hidden; max-height:0; transition: max-height 0.35s cubic-bezier(0.2,0.6,0.2,1);">
                <div style="padding: 12px 0 8px; border-top: 1px solid rgba(255,255,255,0.1); margin-top: 12px;">
                    <div class="d-flex flex-column gap-1">
                        <a href="{{ route('public.wisata') }}" class="nav-link-custom"><i
                                class="fa-solid fa-map-location-dot"></i>Wisata</a>
                        <a href="{{ route('public.event') }}" class="nav-link-custom"><i
                                class="fa-solid fa-calendar-days"></i>Event</a>
                        <a href="{{ route('public.berita') }}" class="nav-link-custom"><i
                                class="fa-regular fa-newspaper"></i>Berita</a>
                        @if ($publicUser)
                            <hr style="border-color:rgba(255,255,255,0.12); margin:8px 0;">
                            <div class="px-2 py-1 text-white-50 small">
                                Halo, <strong class="text-white">{{ $publicUser->name }}</strong>
                            </div>
                            @if ($adminUser || ($webUser && $webUser->hasAnyRole(['Admin', 'Petugas'])))
                                <a href="{{ route('admin.dashboard') }}" class="nav-link-custom fw-bold">
                                    <i class="fa-solid fa-gauge me-2" style="color:var(--accent);"></i>Dashboard Admin
                                </a>
                            @endif
                            @if ($webUser)
                                <a href="{{ route('wishlist.index') }}"
                                    class="nav-link-custom fw-bold d-flex align-items-center justify-content-between">
                                    <span><i class="fa-solid fa-heart me-2" style="color:#ff6b6b;"></i>Wisata
                                        Disukai</span>
                                    <span
                                        class="badge bg-danger rounded-pill navbar-wishlist-count">{{ $webUser->wishlist()->count() }}</span>
                                </a>
                                <form method="POST" action="{{ route('logout') }}" class="mt-2 mb-1">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger w-100"
                                        style="border-radius:10px; font-weight:600;">
                                        <i class="fa-solid fa-right-from-bracket me-2"></i>Logout Sesi User
                                    </button>
                                </form>
                            @endif
                            @if ($adminUser)
                                <form method="POST" action="{{ route('admin.logout') }}" class="mt-1 mb-2">
                                    @csrf
                                    <button type="submit" class="btn btn-warning w-100"
                                        style="border-radius:10px; font-weight:600;">
                                        <i class="fa-solid fa-power-off me-2"></i>Logout Sesi Admin
                                    </button>
                                </form>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="btn-primary-custom mt-2 text-center">
                                <i class="fa-solid fa-right-to-bracket me-1"></i>Login
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- PAGE CONTENT -->
    @yield('content')

    <!-- FOOTER -->
    <footer class="footer">
        <div class="container position-relative" style="z-index: 1;">
            <div class="row g-4">
                <div class="col-md-4 pe-md-5">
                    <div class="mb-4">
                        <img src="{{ asset('images/Logo JM.png') }}" alt="Logo Jelajah Magetan"
                            style="height:150px; width:auto; object-fit:contain; filter: brightness(0) invert(1) opacity(0.95);">
                    </div>
                    <p class="small" style="line-height:1.8; color:#94a3b8;">Portal informasi dan promosi pariwisata
                        Kabupaten Magetan yang dikelola oleh Bidang Pemasaran Dinas Pariwisata dan Kebudayaan.</p>
                </div>
                <div class="col-md-2">
                    <h5 class="fs-6">Wisata</h5>
                    <ul class="list-unstyled small d-flex flex-column gap-2">
                        <li><a href="{{ route('public.wisata') }}"><i
                                    class="fa-solid fa-chevron-right"></i>Destinasi</a></li>
                        <li><a href="{{ route('public.event') }}"><i class="fa-solid fa-chevron-right"></i>Event</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h5 class="fs-6">Informasi</h5>
                    <ul class="list-unstyled small d-flex flex-column gap-2">
                        <li><a href="{{ route('public.berita') }}"><i
                                    class="fa-solid fa-chevron-right"></i>Berita</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5 class="fs-6">Kontak</h5>
                    <div class="small" style="line-height:1.6;">
                        <a href="{{ config('kontak.alamat_maps_url') }}" target="_blank" rel="noopener noreferrer"
                            class="contact-text text-decoration-none w-100">
                            <div class="contact-icon"><i class="fa-solid fa-location-dot"></i></div>
                            <div class="mt-1">{{ config('kontak.alamat') }}</div>
                        </a>
                        <div class="contact-text w-100">
                            <div class="contact-icon"><i class="fa-solid fa-phone"></i></div>
                            <div class="mt-1">{{ config('kontak.telepon') }}</div>
                        </div>
                        <div class="contact-text w-100">
                            <div class="contact-icon"><i class="fa-solid fa-envelope"></i></div>
                            <div class="mt-1">{{ config('kontak.email') }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="footer-divider">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center small"
                style="color:#94a3b8;">
                <p class="mb-2 mb-md-0">© {{ date('Y') }} Dinas Pariwisata dan Kebudayaan Kabupaten Magetan.</p>
                <p class="mb-0">All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- AOS Animation JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: false,
            mirror: true,
            offset: 100
        });
    </script>

    <script>
        /* =====================================================
                       NAVBAR — Floating glass behavior
                       - Transparan → glass saat scroll (selalu tampil, tidak disembunyikan)
                    ===================================================== */
        (function() {
            const nav = document.getElementById('mainNavbar');
            if (!nav) return;
            let ticking = false;

            function updateNav() {
                const currentY = window.scrollY;
                const pastThreshold = currentY > 60;

                // Glass morph effect saja — navbar tetap selalu tampil,
                // tidak disembunyikan saat scroll ke bawah (lebih cocok
                // untuk katalog yang dijelajah bolak-balik, bukan dibaca linear).
                nav.classList.toggle('nav-glass', pastThreshold);

                ticking = false;
            }

            window.addEventListener('scroll', () => {
                if (!ticking) {
                    requestAnimationFrame(updateNav);
                    ticking = true;
                }
            }, {
                passive: true
            });
        })();

        /* Nav pill — meluncur mengikuti hover, balik ke halaman aktif saat mouse keluar */
        (function() {
            const wrap = document.getElementById('navLinksWrap');
            const pill = document.getElementById('navPill');
            if (!wrap || !pill) return;

            const links = wrap.querySelectorAll('.nav-link-custom');
            const activeLink = wrap.querySelector('.nav-link-custom.active');

            function moveTo(el) {
                if (!el) {
                    pill.style.opacity = '0';
                    return;
                }
                pill.style.opacity = '1';
                pill.style.width = el.offsetWidth + 'px';
                pill.style.transform = `translateX(${el.offsetLeft}px)`;
            }

            moveTo(activeLink); // posisi awal: di halaman yang sedang dibuka

            links.forEach(link => {
                link.addEventListener('mouseenter', () => moveTo(link));
            });
            wrap.addEventListener('mouseleave', () => moveTo(activeLink));

            window.addEventListener('resize', () => moveTo(activeLink));
        })();

        /* Mobile menu custom toggle */
        (function() {
            const toggle = document.getElementById('navToggle');
            const menu = document.getElementById('navMenuMobile');
            if (!toggle || !menu) return;
            let open = false;

            toggle.addEventListener('click', () => {
                open = !open;
                if (open) {
                    menu.style.setProperty('display', 'block', 'important');
                    // Animate open
                    requestAnimationFrame(() => {
                        menu.style.maxHeight = menu.scrollHeight + 'px';
                    });
                    toggle.innerHTML = '<i class="fa-solid fa-xmark"></i>';
                } else {
                    menu.style.maxHeight = '0';
                    menu.addEventListener('transitionend', () => {
                        if (!open) menu.style.setProperty('display', 'none', 'important');
                    }, {
                        once: true
                    });
                    toggle.innerHTML = '<i class="fa-solid fa-bars"></i>';
                }
            });
        })();
    </script>
    @stack('scripts')

    <!-- Toast Container -->
    <div id="toast-container"
        style="position:fixed; bottom:28px; right:28px; z-index:99999; display:flex; flex-direction:column; gap:10px; pointer-events:none;">
    </div>

    <script>
        (function() {
            function showWishlistToast(message, type = 'success') {
                const container = document.getElementById('toast-container');
                if (!container) return;
                const toast = document.createElement('div');
                toast.style.cssText = `
                background: ${type === 'error' ? 'rgba(220, 53, 69, 0.95)' : 'rgba(18, 36, 29, 0.95)'};
                color: #fff;
                padding: 12px 20px;
                border-radius: 14px;
                box-shadow: 0 12px 36px rgba(0,0,0,0.3);
                backdrop-filter: blur(14px);
                -webkit-backdrop-filter: blur(14px);
                border: 1px solid rgba(255,255,255,0.18);
                font-size: 0.88rem;
                font-weight: 600;
                display: flex;
                align-items: center;
                gap: 10px;
                opacity: 0;
                transform: translateY(20px) scale(0.95);
                transition: all 0.35s cubic-bezier(0.2, 0.6, 0.2, 1);
                pointer-events: auto;
            `;
                toast.innerHTML =
                    `<i class="fa-solid fa-heart" style="color:${type === 'error' ? '#fff' : '#ff6b6b'}; font-size:1.1rem;"></i><span>${message}</span>`;
                container.appendChild(toast);
                requestAnimationFrame(() => {
                    toast.style.opacity = '1';
                    toast.style.transform = 'translateY(0) scale(1)';
                });
                setTimeout(() => {
                    toast.style.opacity = '0';
                    toast.style.transform = 'translateY(10px) scale(0.95)';
                    setTimeout(() => toast.remove(), 350);
                }, 2800);
            }

            document.addEventListener('click', async (e) => {
                const btn = e.target.closest('.wishlist-btn');
                if (!btn) return;

                e.preventDefault();
                e.stopPropagation();

                if (btn.classList.contains('wishlist-btn-guest')) {
                    window.location.href = "{{ route('login') }}";
                    return;
                }

                const id = btn.dataset.id;
                const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;

                btn.disabled = true;
                try {
                    const res = await fetch(`/wisata/${id}/wishlist`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                        },
                    });

                    if (res.status === 401) {
                        window.location.href = "{{ route('login') }}";
                        return;
                    }

                    const data = await res.json();
                    if (data.success) {
                        // Update all matching buttons on the page
                        document.querySelectorAll(`.wishlist-btn[data-id="${id}"]`).forEach(b => {
                            b.classList.toggle('active', data.wishlisted);
                            b.setAttribute('data-active', data.wishlisted ? 'true' : 'false');
                            b.title = data.wishlisted ? 'Hapus dari Wisata Disukai' :
                                'Sukai Wisata Ini';

                            const icon = b.querySelector('i');
                            if (icon) {
                                icon.className = data.wishlisted ? 'fa-solid fa-heart' :
                                    'fa-regular fa-heart';
                            }
                            b.classList.add('heart-pop');
                            setTimeout(() => b.classList.remove('heart-pop'), 450);
                        });

                        // Update navbar counts
                        if (data.user_count !== undefined) {
                            document.querySelectorAll('.navbar-wishlist-count').forEach(badge => {
                                badge.textContent = data.user_count;
                            });
                        }

                        showWishlistToast(data.message, 'success');

                        // If on Wishlist Page, remove card smoothly
                        if (btn.dataset.isWishlistPage === 'true' && !data.wishlisted) {
                            const cardCol = document.getElementById(`wishlist-col-${id}`);
                            if (cardCol) {
                                cardCol.style.transition = 'all 0.4s ease';
                                cardCol.style.opacity = '0';
                                cardCol.style.transform = 'scale(0.85) translateY(20px)';
                                setTimeout(() => {
                                    cardCol.remove();
                                    const grid = document.getElementById('wishlist-grid');
                                    const remaining = grid ? grid.querySelectorAll(
                                        '.wishlist-item-col').length : 0;
                                    if (remaining === 0) {
                                        const emptyState = document.getElementById(
                                            'wishlist-empty-state');
                                        if (emptyState) emptyState.classList.remove('d-none');
                                    }
                                }, 400);
                            }
                        }
                    }
                } catch (err) {
                    console.error(err);
                    showWishlistToast('Gagal memproses permintaan', 'error');
                } finally {
                    btn.disabled = false;
                }
            });
        })();
    </script>
</body>

</html>
