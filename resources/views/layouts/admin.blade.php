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
            --sidebar-width: 270px;
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-admin);
            color: var(--text-dark);
            min-height: 100vh;
            margin: 0;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Fraunces', serif;
            font-weight: 600;
        }

        .font-mono { font-family: 'IBM Plex Mono', monospace; }

        /* Sidebar Styling */
        .sidebar {
            width: var(--sidebar-width);
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
            transition: all 0.3s ease;
        }

        .sidebar-brand {
            padding: 20px 20px;
            border-bottom: 1px solid rgba(255,255,255,0.08);
            background: rgba(0,0,0,0.15);
        }

        .sidebar-brand-title {
            font-family: 'Plus Jakarta Sans', sans-serif;
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
            margin-top: 3px;
        }

        .sidebar-menu {
            padding: 16px 12px;
            overflow-y: auto;
            flex: 1;
        }

        .sidebar-label {
            font-family: 'IBM Plex Mono', monospace;
            font-size: 0.68rem;
            font-weight: 700;
            color: var(--accent);
            text-transform: uppercase;
            letter-spacing: 1.2px;
            padding: 18px 12px 6px;
            opacity: 0.9;
        }

        .sidebar-link {
            color: rgba(255,255,255,0.72);
            text-decoration: none;
            padding: 10px 14px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 0.88rem;
            font-weight: 500;
            border-radius: 10px;
            transition: all 0.2s ease;
            margin-bottom: 3px;
        }

        .sidebar-link i {
            width: 20px;
            font-size: 1rem;
            text-align: center;
            color: rgba(255,255,255,0.5);
            transition: color 0.2s ease;
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
            background: rgba(200, 155, 60, 0.16);
            border-left: 4px solid var(--accent);
            font-weight: 700;
            border-radius: 4px 10px 10px 4px;
        }

        .sidebar-link.active i {
            color: var(--accent);
        }

        .sidebar-footer {
            padding: 16px 14px;
            border-top: 1px solid rgba(255,255,255,0.08);
            background: rgba(0,0,0,0.15);
        }

        .btn-view-public {
            background: rgba(255,255,255,0.08);
            color: #fff;
            border: 1px solid rgba(255,255,255,0.15);
            padding: 9px 14px;
            border-radius: 10px;
            font-size: 0.82rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            text-decoration: none;
            transition: all 0.25s ease;
        }

        .btn-view-public:hover {
            background: var(--accent);
            color: var(--primary-dark);
            border-color: var(--accent);
        }

        /* Main Content Layout */
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 24px 30px;
            min-height: 100vh;
        }

        /* Topbar Header */
        .topbar {
            background: #ffffff;
            padding: 16px 24px;
            border: 1px solid var(--border-color);
            box-shadow: 0 4px 20px rgba(31,58,52,0.04);
            margin-bottom: 28px;
            border-radius: 16px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .topbar-title {
            font-family: 'Fraunces', serif;
            font-weight: 600;
            font-size: 1.3rem;
            color: var(--primary);
            margin: 0;
        }

        .user-badge {
            background: var(--primary-light);
            color: var(--primary);
            font-size: 0.75rem;
            font-weight: 700;
            padding: 4px 12px;
            border-radius: 20px;
            letter-spacing: 0.3px;
        }

        /* Global UI Elements Override */
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
            padding: 8px 18px;
            transition: all 0.2s ease;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark) !important;
            border-color: var(--primary-dark) !important;
            transform: translateY(-1px);
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
            border-radius: 10px;
            font-weight: 600;
        }

        .table thead th {
            background-color: var(--primary-light) !important;
            color: var(--primary) !important;
            font-weight: 700;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 1px solid var(--border-color);
            padding: 12px 16px;
        }

        .table tbody td {
            padding: 14px 16px;
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
            }
            .sidebar.show {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0;
                padding: 16px;
            }
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar" id="adminSidebar">
        <div class="sidebar-brand d-flex align-items-center gap-3">
            <img src="{{ asset('images/lambang-magetan.png') }}" alt="Logo Magetan" style="height: 42px; width: auto; object-fit: contain;">
            <div>
                <div class="sidebar-brand-title">E-Catalog</div>
                <div class="sidebar-brand-sub">Admin Panel</div>
            </div>
        </div>

        <div class="sidebar-menu">
            <div class="sidebar-label">Utama</div>
            <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fa-solid fa-gauge"></i> <span>Dashboard</span>
            </a>
            <a href="{{ route('admin.wisata.index') }}" class="sidebar-link {{ request()->routeIs('admin.wisata*') ? 'active' : '' }}">
                <i class="fa-solid fa-map-location-dot"></i> <span>Wisata</span>
            </a>
            <a href="{{ route('admin.event.index') }}" class="sidebar-link {{ request()->routeIs('admin.event*') ? 'active' : '' }}">
                <i class="fa-solid fa-calendar-days"></i> <span>Event</span>
            </a>

            <div class="sidebar-label">Konten</div>
            <a href="{{ route('admin.berita.index') }}" class="sidebar-link {{ request()->routeIs('admin.berita*') ? 'active' : '' }}">
                <i class="fa-regular fa-newspaper"></i> <span>Berita</span>
            </a>
            <a href="{{ route('admin.ulasan.index') }}" class="sidebar-link {{ request()->routeIs('admin.ulasan*') ? 'active' : '' }}">
                <i class="fa-solid fa-star-half-stroke"></i> <span>Ulasan & Rating</span>
            </a>
            <a href="{{ route('admin.galeri.index') }}" class="sidebar-link {{ request()->routeIs('admin.galeri*') ? 'active' : '' }}">
                <i class="fa-solid fa-images"></i> <span>Galeri</span>
            </a>
            <a href="{{ route('admin.banner.index') }}" class="sidebar-link {{ request()->routeIs('admin.banner*') ? 'active' : '' }}">
                <i class="fa-solid fa-bullhorn"></i> <span>Banner</span>
            </a>

            <div class="sidebar-label">Laporan</div>
            <a href="{{ route('admin.laporan.index') }}" class="sidebar-link {{ request()->routeIs('admin.laporan*') ? 'active' : '' }}">
                <i class="fa-solid fa-file-pdf"></i> <span>Cetak Laporan</span>
            </a>
        </div>

        <div class="sidebar-footer">
            <a href="{{ route('home') }}" target="_blank" class="btn-view-public">
                <i class="fa-solid fa-globe"></i> <span>Lihat Website Public</span>
            </a>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="main-content">
        <!-- Topbar -->
        <div class="topbar">
            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-sm btn-light d-lg-none" type="button" onclick="document.getElementById('adminSidebar').classList.toggle('show')">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <h5 class="topbar-title">@yield('title', 'Dashboard')</h5>
            </div>

            <div class="d-flex align-items-center gap-3">
                <span class="user-badge">
                    <i class="fa-solid fa-user-shield me-1" style="color:var(--accent);"></i>
                    {{ Auth::user()->roles->pluck('name')->first() ?? 'Admin' }}
                </span>
                <span class="fw-semibold text-dark small d-none d-sm-inline">{{ Auth::user()->name ?? 'Admin' }}</span>
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-danger px-3">
                        <i class="fa-solid fa-right-from-bracket me-1"></i> Logout
                    </button>
                </form>
            </div>
        </div>

        <!-- Alert Success -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-3 mb-4" style="background:var(--primary-light); color:var(--primary);" role="alert">
                <i class="fa-solid fa-circle-check me-2" style="color:var(--primary);"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Alert Errors -->
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm rounded-3 mb-4" role="alert">
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
    @stack('scripts')
</body>
</html>
