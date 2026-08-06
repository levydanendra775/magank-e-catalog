<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') — E-Catalog Magetan</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Google Fonts: Fraunces, Plus Jakarta Sans, IBM Plex Mono -->
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,wght@0,500;0,600;1,500&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=IBM+Plex+Mono:wght@500&display=swap" rel="stylesheet">

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
            --bg-admin: #F4F7F4;
            --border-color: #DCE4DD;
            --sidebar-expanded: 260px;
            --sidebar-collapsed: 72px;
        }

        * { box-sizing: border-box; }
        
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-admin);
            color: var(--text-dark);
            min-height: 100vh;
            margin: 0;
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Fraunces', serif;
            font-weight: 600;
        }

        .font-mono { font-family: 'IBM Plex Mono', monospace; }

        /* =========================================================
           COLLAPSIBLE SIDEBAR SYSTEM (Matching 21st.dev UX & Landing Page Colors)
           ========================================================= */
        .sidebar {
            width: var(--sidebar-expanded);
            height: 100vh;
            background: linear-gradient(180deg, #1F3A34 0%, #14261F 100%);
            color: #fff;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1050;
            display: flex;
            flex-direction: column;
            box-shadow: 4px 0 25px rgba(0,0,0,0.12);
            transition: width 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
        }

        body.sidebar-collapsed .sidebar {
            width: var(--sidebar-collapsed);
        }

        /* Sidebar Brand */
        .sidebar-brand {
            padding: 18px 16px;
            border-bottom: 1px solid rgba(255,255,255,0.08);
            background: rgba(0,0,0,0.15);
            display: flex;
            align-items: center;
            gap: 12px;
            white-space: nowrap;
        }

        .sidebar-brand img {
            height: 38px;
            width: auto;
            object-fit: contain;
            shrink: 0;
        }

        .sidebar-brand-text {
            transition: opacity 0.2s ease, max-width 0.3s ease;
            overflow: hidden;
        }

        body.sidebar-collapsed .sidebar-brand-text {
            opacity: 0;
            pointer-events: none;
            width: 0;
            display: none;
        }

        .sidebar-brand-title {
            font-size: 0.95rem;
            font-weight: 800;
            color: #ffffff;
            letter-spacing: 0.5px;
            line-height: 1.2;
            text-transform: uppercase;
        }

        .sidebar-brand-sub {
            font-size: 0.7rem;
            color: var(--accent);
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-top: 2px;
        }

        /* Sidebar Menu */
        .sidebar-menu {
            padding: 16px 10px;
            overflow-y: auto;
            overflow-x: hidden;
            flex: 1;
        }

        .sidebar-label {
            font-family: 'IBM Plex Mono', monospace;
            font-size: 0.68rem;
            font-weight: 700;
            color: var(--accent);
            text-transform: uppercase;
            letter-spacing: 1.2px;
            padding: 16px 10px 6px;
            opacity: 0.9;
            white-space: nowrap;
        }

        body.sidebar-collapsed .sidebar-label {
            display: none;
        }

        .sidebar-link {
            color: rgba(255,255,255,0.75);
            text-decoration: none;
            padding: 11px 14px;
            display: flex;
            align-items: center;
            gap: 14px;
            font-size: 0.88rem;
            font-weight: 500;
            border-radius: 10px;
            transition: all 0.2s ease;
            margin-bottom: 4px;
            white-space: nowrap;
            position: relative;
        }

        .sidebar-link i {
            width: 20px;
            font-size: 1.05rem;
            text-align: center;
            color: rgba(255,255,255,0.55);
            transition: color 0.2s ease;
            flex-shrink: 0;
        }

        .sidebar-link:hover {
            color: #ffffff;
            background: rgba(255,255,255,0.08);
        }

        .sidebar-link:hover i {
            color: var(--accent);
        }

        .sidebar-link.active {
            color: #ffffff;
            background: rgba(200, 155, 60, 0.18);
            border-left: 4px solid var(--accent);
            font-weight: 700;
            border-radius: 4px 10px 10px 4px;
        }

        .sidebar-link.active i {
            color: var(--accent);
        }

        body.sidebar-collapsed .sidebar-link span {
            display: none;
        }

        body.sidebar-collapsed .sidebar-link {
            justify-content: center;
            padding: 12px;
            border-left: none;
            border-radius: 10px;
        }

        body.sidebar-collapsed .sidebar-link.active {
            background: rgba(200, 155, 60, 0.25);
            box-shadow: inset 0 0 0 1px var(--accent);
        }

        /* Sidebar Toggle Footer */
        .sidebar-footer {
            padding: 12px 10px;
            border-top: 1px solid rgba(255,255,255,0.08);
            background: rgba(0,0,0,0.2);
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .btn-view-public {
            background: rgba(255,255,255,0.08);
            color: #fff;
            border: 1px solid rgba(255,255,255,0.15);
            padding: 9px 12px;
            border-radius: 10px;
            font-size: 0.82rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            text-decoration: none;
            transition: all 0.25s ease;
            white-space: nowrap;
        }

        .btn-view-public:hover {
            background: var(--accent);
            color: var(--primary-dark);
            border-color: var(--accent);
        }

        body.sidebar-collapsed .btn-view-public span {
            display: none;
        }

        .toggle-sidebar-btn {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.1);
            color: rgba(255,255,255,0.7);
            border-radius: 10px;
            padding: 8px 12px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            cursor: pointer;
            width: 100%;
            transition: all 0.2s ease;
        }

        .toggle-sidebar-btn:hover {
            background: rgba(255,255,255,0.12);
            color: #ffffff;
        }

        body.sidebar-collapsed .toggle-sidebar-btn {
            justify-content: center;
        }

        body.sidebar-collapsed .toggle-sidebar-btn span {
            display: none;
        }

        .toggle-sidebar-btn i {
            transition: transform 0.3s ease;
        }

        body.sidebar-collapsed .toggle-sidebar-btn i {
            transform: rotate(180deg);
        }

        /* =========================================================
           MAIN CONTENT & TOPBAR LAYOUT
           ========================================================= */
        .main-content {
            margin-left: var(--sidebar-expanded);
            padding: 24px 30px;
            min-height: 100vh;
            transition: margin-left 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        body.sidebar-collapsed .main-content {
            margin-left: var(--sidebar-collapsed);
        }

        /* Topbar Header */
        .topbar {
            background: #ffffff;
            padding: 14px 24px;
            border: 1px solid var(--border-color);
            box-shadow: 0 4px 20px rgba(31,58,52,0.04);
            margin-bottom: 28px;
            border-radius: 16px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .topbar-title-section {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .topbar-title {
            font-family: 'Fraunces', serif;
            font-weight: 600;
            font-size: 1.35rem;
            color: var(--primary);
            margin: 0;
        }

        .topbar-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .topbar-btn {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            border: 1px solid var(--border-color);
            background: #fff;
            color: var(--text-muted);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            position: relative;
            transition: all 0.2s ease;
        }

        .topbar-btn:hover {
            background: var(--primary-light);
            color: var(--primary);
            border-color: var(--primary);
        }

        .topbar-badge-dot {
            position: absolute;
            top: 8px;
            right: 8px;
            width: 8px;
            height: 8px;
            background-color: #dc3545;
            border-radius: 50%;
            border: 2px solid #fff;
        }

        .user-badge {
            background: var(--primary-light);
            color: var(--primary);
            font-size: 0.78rem;
            font-weight: 700;
            padding: 6px 14px;
            border-radius: 20px;
            letter-spacing: 0.3px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            border: 1px solid rgba(31,58,52,0.1);
        }

        /* Stats Card Styling (21st.dev Style) */
        .stat-card {
            background: #ffffff;
            border: 1px solid var(--border-color);
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 4px 16px rgba(31,58,52,0.03);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(31,58,52,0.07);
        }

        .stat-icon-wrapper {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.15rem;
        }

        /* Buttons & Forms */
        .card {
            border-radius: 16px !important;
            border: 1px solid var(--border-color) !important;
            box-shadow: 0 6px 20px rgba(31,58,52,0.04) !important;
            background: #ffffff;
        }

        .btn-primary {
            background-color: var(--primary) !important;
            border-color: var(--primary) !important;
            color: #ffffff !important;
            border-radius: 10px;
            font-weight: 600;
            padding: 9px 20px;
            transition: all 0.2s ease;
            box-shadow: 0 4px 12px rgba(31,58,52,0.15);
        }

        .btn-primary:hover {
            background-color: var(--primary-dark) !important;
            border-color: var(--primary-dark) !important;
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(31,58,52,0.25);
        }

        .btn-outline-primary {
            color: var(--primary) !important;
            border-color: var(--primary) !important;
            border-radius: 10px;
            font-weight: 600;
        }

        .btn-outline-primary:hover {
            background-color: var(--primary) !important;
            color: #ffffff !important;
        }

        .btn-outline-danger {
            color: var(--rust) !important;
            border-color: var(--rust) !important;
            border-radius: 10px;
            font-weight: 600;
        }

        .btn-outline-danger:hover {
            background-color: var(--rust) !important;
            color: #ffffff !important;
        }

        .form-control, .form-select {
            border-radius: 10px;
            border: 1px solid var(--border-color);
            padding: 10px 14px;
            font-size: 0.9rem;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(31,58,52,0.12);
        }

        .table thead th {
            background-color: var(--primary-light) !important;
            color: var(--primary) !important;
            font-weight: 700;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 1px solid var(--border-color);
            padding: 14px 18px;
        }

        .table tbody td {
            padding: 16px 18px;
            vertical-align: middle;
            color: var(--text-dark);
            border-bottom: 1px solid var(--border-color);
        }

        .table-hover tbody tr:hover {
            background-color: rgba(31,58,52,0.02) !important;
        }

        @media (max-width: 991px) {
            .sidebar {
                transform: translateX(-100%);
                width: var(--sidebar-expanded) !important;
            }
            .sidebar.show {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0 !important;
                padding: 16px;
            }
        }

        /* 21st.dev Interactive Hover Button */
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

        .btn-interactive-sm {
            min-width: 96px;
            height: 36px;
            padding: 0 16px;
            font-size: 0.8rem;
        }

        .btn-interactive-md {
            min-width: 120px;
            height: 38px;
            padding: 0 20px;
            font-size: 0.86rem;
        }

        .btn-interactive-lg {
            min-width: 160px;
            height: 44px;
            padding: 0 24px;
            font-size: 0.92rem;
        }

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

        .btn-interactive-forest {
            background: #ffffff;
            border-color: rgba(31, 58, 52, 0.25);
            color: #1F3A34 !important;
            box-shadow: 0 2px 8px rgba(31, 58, 52, 0.06);
        }
        .btn-interactive-forest .btn-bubble {
            background: #1F3A34;
        }
        .btn-interactive-forest .btn-text-hover {
            color: #ffffff !important;
        }
        .btn-interactive-forest:hover {
            border-color: #1F3A34;
            box-shadow: 0 6px 18px rgba(31, 58, 52, 0.2);
        }

        /* =========================================================
           21st.dev / shadcn PAGINATION COMPONENT
           Inspired by: 21st.dev / @reui_io
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
            font-size: 0.85rem;
            font-weight: 500;
            line-height: 1;
            color: var(--text-muted, #5B6B62);
            background: transparent;
            border: 1px solid transparent;
            border-radius: 8px;
            text-decoration: none !important;
            cursor: pointer;
            user-select: none;
            transition: all 0.18s cubic-bezier(0.4, 0, 0.2, 1);
            outline: none;
        }

        /* Ghost hover */
        .btn-pagination-21st:hover:not(.disabled):not(.active) {
            background-color: var(--primary-light, #EAF0EC);
            color: var(--primary, #1F3A34);
            border-color: transparent;
        }

        /* Icon / numeric square mode */
        .btn-pagination-21st.btn-pagination-icon {
            width: 36px;
            height: 36px;
            padding: 0;
            min-width: 36px;
        }

        /* Previous / Next button mode */
        .btn-pagination-21st.btn-pagination-nav {
            height: 36px;
            padding: 0 12px;
            gap: 6px;
            font-size: 0.85rem;
        }

        /* Active Page (Outline Variant in shadcn) */
        .btn-pagination-21st.active {
            background-color: #ffffff;
            color: var(--primary, #1F3A34);
            border: 1.5px solid var(--border-color, #DCE4DD);
            font-weight: 700;
            box-shadow: 0 1px 3px rgba(31, 58, 52, 0.08);
            cursor: default;
        }

        /* Disabled state */
        .btn-pagination-21st.disabled {
            color: #94a3b8;
            opacity: 0.45;
            cursor: not-allowed;
            pointer-events: none;
            background: transparent;
            border-color: transparent;
        }

        /* Ellipsis */
        .pagination-21st-ellipsis {
            display: inline-flex;
            width: 36px;
            height: 36px;
            align-items: center;
            justify-content: center;
            color: #94a3b8;
            font-size: 0.85rem;
        }
    </style>
    @stack('styles')
    @yield('styles')
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar" id="adminSidebar">
        <div class="sidebar-brand">
            <img src="{{ asset('images/lambang-magetan.png') }}" alt="Logo Magetan">
            <div class="sidebar-brand-text">
                <div class="sidebar-brand-title">E-Catalog</div>
                <div class="sidebar-brand-sub">Admin Panel</div>
            </div>
        </div>

        <div class="sidebar-menu">
            <div class="sidebar-label">Utama</div>
            <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" title="Dashboard">
                <i class="fa-solid fa-gauge"></i> <span>Dashboard</span>
            </a>
            <a href="{{ route('admin.wisata.index') }}" class="sidebar-link {{ request()->routeIs('admin.wisata*') ? 'active' : '' }}" title="Wisata">
                <i class="fa-solid fa-map-location-dot"></i> <span>Wisata</span>
            </a>
            <a href="{{ route('admin.event.index') }}" class="sidebar-link {{ request()->routeIs('admin.event*') ? 'active' : '' }}" title="Event">
                <i class="fa-solid fa-calendar-days"></i> <span>Event</span>
            </a>

            <div class="sidebar-label">Konten</div>
            <a href="{{ route('admin.berita.index') }}" class="sidebar-link {{ request()->routeIs('admin.berita*') ? 'active' : '' }}" title="Berita">
                <i class="fa-regular fa-newspaper"></i> <span>Berita</span>
            </a>
            <a href="{{ route('admin.ulasan.index') }}" class="sidebar-link {{ request()->routeIs('admin.ulasan*') ? 'active' : '' }}" title="Ulasan & Rating">
                <i class="fa-solid fa-star-half-stroke"></i> <span>Ulasan & Rating</span>
            </a>
            <a href="{{ route('admin.galeri.index') }}" class="sidebar-link {{ request()->routeIs('admin.galeri*') ? 'active' : '' }}" title="Galeri">
                <i class="fa-solid fa-images"></i> <span>Galeri</span>
            </a>
            <a href="{{ route('admin.banner.index') }}" class="sidebar-link {{ request()->routeIs('admin.banner*') ? 'active' : '' }}" title="Banner">
                <i class="fa-solid fa-bullhorn"></i> <span>Banner</span>
            </a>

            <div class="sidebar-label">Laporan</div>
            <a href="{{ route('admin.laporan.index') }}" class="sidebar-link {{ request()->routeIs('admin.laporan*') ? 'active' : '' }}" title="Cetak Laporan">
                <i class="fa-solid fa-file-pdf"></i> <span>Cetak Laporan</span>
            </a>
        </div>

        <div class="sidebar-footer">
            <a href="{{ route('home') }}" target="_blank" class="btn-view-public" title="Lihat Website Public">
                <i class="fa-solid fa-globe"></i> <span>Lihat Website Public</span>
            </a>
            <button class="toggle-sidebar-btn" id="sidebarToggleBtn" type="button" title="Sembunyikan Sidebar">
                <div class="d-flex align-items-center gap-2">
                    <i class="fa-solid fa-angles-left" id="toggleIcon"></i>
                    <span>Sembunyikan</span>
                </div>
            </button>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="main-content">
        <!-- Topbar Header -->
        <div class="topbar">
            <div class="topbar-title-section">
                <button class="btn btn-sm btn-light d-lg-none border" type="button" onclick="document.getElementById('adminSidebar').classList.toggle('show')">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <h5 class="topbar-title">@yield('title', 'Dashboard')</h5>
            </div>

            <div class="topbar-actions">
                <div class="dropdown">
                    <button class="topbar-btn" type="button" id="notificationDropdown" data-bs-toggle="dropdown" aria-expanded="false" title="Notifikasi">
                        <i class="fa-regular fa-bell"></i>
                        @if(isset($hasUnreadActivities) && $hasUnreadActivities)
                        <span class="topbar-badge-dot"></span>
                        @endif
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 mt-2" aria-labelledby="notificationDropdown" style="width: 320px; border-radius: 12px; padding: 0;">
                        <li class="p-3 border-bottom" style="background-color: var(--primary-light); border-top-left-radius: 12px; border-top-right-radius: 12px;">
                            <h6 class="mb-0 fw-bold" style="color: var(--primary);">Notifikasi Aktivitas</h6>
                        </li>
                        <div style="max-height: 350px; overflow-y: auto;">
                            @if(isset($recentActivities) && $recentActivities->count() > 0)
                                @foreach($recentActivities as $activity)
                                <li>
                                    <a class="dropdown-item d-flex align-items-start p-3 border-bottom text-wrap" href="#" style="transition: background-color 0.2s;">
                                        <div class="bg-light rounded-circle p-2 me-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; flex-shrink: 0;">
                                            <i class="{{ $activity->icon }}" style="color: {{ $activity->icon_color }};"></i>
                                        </div>
                                        <div>
                                            <p class="mb-1 text-dark fw-semibold" style="font-size: 0.88rem; line-height: 1.4;">{{ $activity->user_name }} <span class="fw-normal text-muted">{{ $activity->message }}</span> {{ $activity->target_name }}</p>
                                            <small class="text-muted" style="font-size: 0.75rem;"><i class="fa-regular fa-clock me-1"></i>{{ \Carbon\Carbon::parse($activity->time)->diffForHumans() }}</small>
                                        </div>
                                    </a>
                                </li>
                                @endforeach
                            @else
                                <li class="p-4 text-center text-muted">
                                    <i class="fa-regular fa-bell-slash mb-2" style="font-size: 1.5rem; opacity: 0.5;"></i>
                                    <p class="mb-0" style="font-size: 0.85rem;">Belum ada aktivitas baru</p>
                                </li>
                            @endif
                        </div>
                        <li class="p-2 text-center" style="border-top: 1px solid var(--border-color);">
                            <a href="#" class="text-decoration-none" style="font-size: 0.85rem; font-weight: 600; color: var(--primary);">Lihat Semua Notifikasi</a>
                        </li>
                    </ul>
                </div>

                @php $adminUser = Auth::guard('admin')->user() ?? Auth::user(); @endphp
                <span class="user-badge ms-2">
                    <i class="fa-solid fa-user-shield" style="color:var(--accent);"></i>
                    {{ $adminUser->roles->pluck('name')->first() ?? 'Admin' }}
                </span>

                <span class="fw-semibold text-dark small d-none d-sm-inline me-2">{{ $adminUser->name ?? 'Admin' }}</span>

                <form method="POST" action="{{ route('admin.logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-danger px-3">
                        <i class="fa-solid fa-right-from-bracket me-1"></i> Logout Admin
                    </button>
                </form>
            </div>
        </div>

        <!-- Alert Success -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-4 mb-4" style="background:var(--primary-light); color:var(--primary);" role="alert">
                <i class="fa-solid fa-circle-check me-2" style="color:var(--primary);"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Alert Errors -->
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm rounded-4 mb-4" role="alert">
                <strong><i class="fa-solid fa-triangle-exclamation me-1"></i> Gagal menyimpan data!</strong> Silakan periksa kembali isian formulir Anda.
                <ul class="mb-0 mt-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Dynamic Content -->
        @yield('content')
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Collapsible Sidebar JS -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleBtn = document.getElementById('sidebarToggleBtn');
            const body = document.body;

            // Load saved state
            if (localStorage.getItem('admin_sidebar_collapsed') === 'true') {
                body.classList.add('sidebar-collapsed');
            }

            if (toggleBtn) {
                toggleBtn.addEventListener('click', function() {
                    body.classList.toggle('sidebar-collapsed');
                    const isCollapsed = body.classList.contains('sidebar-collapsed');
                    localStorage.setItem('admin_sidebar_collapsed', isCollapsed);
                });
            }
        });
    </script>
    @stack('scripts')
</body>
</html>
