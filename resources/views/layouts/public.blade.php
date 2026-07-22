<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Beranda') — E-Catalog Magetan</title>
    <meta name="description" content="@yield('meta_description', 'Temukan destinasi wisata, UMKM, kuliner, penginapan, dan event menarik di Kabupaten Magetan.')">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        :root {
            --primary: #1a6b3a;
            --primary-dark: #114d2a;
            --primary-light: #e9f7ef;
            --accent: #f5a623;
            --accent-dark: #d4891a;
            --text-dark: #1a1a2e;
            --text-muted: #6c757d;
            --bg-light: #f8faf9;
            --border: #e2e8f0;
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'Inter', sans-serif;
            color: var(--text-dark);
            background: #fff;
        }

        h1, h2, h3, h4, h5 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 700;
        }

        /* ===== NAVBAR ===== */
        .navbar-public {
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border);
            padding: 14px 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            transition: box-shadow 0.3s;
        }

        .navbar-public.scrolled {
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }

        .navbar-brand-text {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 800;
            font-size: 1.25rem;
            color: var(--primary);
            line-height: 1.2;
        }

        .navbar-brand-text span {
            display: block;
            font-size: 0.7rem;
            font-weight: 500;
            color: var(--text-muted);
        }

        .nav-link-custom {
            color: var(--text-dark) !important;
            font-weight: 500;
            font-size: 0.9rem;
            padding: 8px 14px !important;
            border-radius: 8px;
            transition: all 0.2s;
        }

        .nav-link-custom:hover, .nav-link-custom.active {
            color: var(--primary) !important;
            background: var(--primary-light);
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
            border-radius: 16px !important;
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .card-hover:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 48px rgba(26,107,58,0.12) !important;
            border-color: var(--primary) !important;
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
            background: var(--primary);
            color: #fff;
            font-size: 0.73rem;
            font-weight: 600;
            padding: 4px 12px;
            border-radius: 100px;
        }

        /* ===== FOOTER ===== */
        .footer {
            background: var(--text-dark);
            color: rgba(255,255,255,0.75);
            padding: 60px 0 24px;
        }

        .footer h5 {
            color: #fff;
        }

        .footer a {
            color: rgba(255,255,255,0.6);
            text-decoration: none;
            transition: color 0.2s;
        }

        .footer a:hover {
            color: var(--accent);
        }

        .footer-divider {
            border-color: rgba(255,255,255,0.1);
        }

        /* ===== BUTTONS ===== */
        .btn-primary-custom {
            background: var(--primary);
            border: none;
            color: #fff;
            padding: 10px 24px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.2s;
        }

        .btn-primary-custom:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
            box-shadow: 0 4px 14px rgba(26,107,58,0.3);
        }

        .btn-outline-custom {
            border: 2px solid var(--primary);
            color: var(--primary);
            padding: 9px 24px;
            border-radius: 10px;
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
            background: linear-gradient(135deg, #e9f7ef, #c8ebd5);
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
    </style>

    @stack('styles')
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar-public" id="mainNavbar">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <a href="{{ route('home') }}" class="text-decoration-none">
                    <div class="d-flex align-items-center gap-2">
                        <div class="rounded-2 d-flex align-items-center justify-content-center" style="width:40px;height:40px;background:var(--primary)">
                            <i class="fa-solid fa-mountain-sun text-white"></i>
                        </div>
                        <div class="navbar-brand-text">E-Catalog Magetan <span>Dinas Pariwisata & Kebudayaan</span></div>
                    </div>
                </a>

                <!-- Mobile toggle -->
                <button class="navbar-toggler border-0 d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                    <i class="fa-solid fa-bars"></i>
                </button>

                <!-- Nav links desktop -->
                <div class="d-none d-md-flex align-items-center gap-1">
                    <a href="{{ route('public.wisata') }}" class="nav-link-custom {{ request()->routeIs('public.wisata*') ? 'active' : '' }}">Wisata</a>
                    <a href="{{ route('public.umkm') }}" class="nav-link-custom {{ request()->routeIs('public.umkm') ? 'active' : '' }}">UMKM</a>
                    <a href="{{ route('public.produk') }}" class="nav-link-custom {{ request()->routeIs('public.produk') ? 'active' : '' }}">Produk</a>
                    <a href="{{ route('public.event') }}" class="nav-link-custom {{ request()->routeIs('public.event') ? 'active' : '' }}">Event</a>
                    <a href="{{ route('public.kuliner') }}" class="nav-link-custom {{ request()->routeIs('public.kuliner') ? 'active' : '' }}">Kuliner</a>
                    <a href="{{ route('public.penginapan') }}" class="nav-link-custom {{ request()->routeIs('public.penginapan') ? 'active' : '' }}">Penginapan</a>
                    <a href="{{ route('public.berita') }}" class="nav-link-custom {{ request()->routeIs('public.berita') ? 'active' : '' }}">Berita</a>
                    @auth
                        <div class="dropdown ms-2">
                            <button class="btn-primary-custom dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-user-circle me-1"></i>Akun
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2" style="border-radius:12px;">
                                <li><a class="dropdown-item py-2" href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-gauge me-2 text-muted"></i>Dashboard Admin</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item py-2 text-danger fw-semibold"><i class="fa-solid fa-right-from-bracket me-2"></i>Logout / Ganti Akun</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="btn-primary-custom ms-2">Login</a>
                    @endauth
                </div>
            </div>

            <!-- Mobile collapse -->
            <div class="collapse d-md-none mt-3" id="navMenu">
                <div class="d-flex flex-column gap-1">
                    <a href="{{ route('public.wisata') }}" class="nav-link-custom">Wisata</a>
                    <a href="{{ route('public.umkm') }}" class="nav-link-custom">UMKM</a>
                    <a href="{{ route('public.produk') }}" class="nav-link-custom">Produk</a>
                    <a href="{{ route('public.event') }}" class="nav-link-custom">Event</a>
                    <a href="{{ route('public.kuliner') }}" class="nav-link-custom">Kuliner</a>
                    <a href="{{ route('public.penginapan') }}" class="nav-link-custom">Penginapan</a>
                    <a href="{{ route('public.berita') }}" class="nav-link-custom">Berita</a>
                    @auth
                        <hr class="my-2 text-muted">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link-custom fw-bold"><i class="fa-solid fa-gauge me-2"></i>Dashboard Admin</a>
                        <form method="POST" action="{{ route('logout') }}" class="mt-1 mb-2">
                            @csrf
                            <button type="submit" class="btn btn-danger w-100 text-center" style="border-radius:10px;font-weight:600;"><i class="fa-solid fa-right-from-bracket me-2"></i>Logout / Ganti Akun</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn-primary-custom mt-2 text-center">Login Admin</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- PAGE CONTENT -->
    @yield('content')

    <!-- FOOTER -->
    <footer class="footer">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <h5 class="mb-3">E-Catalog Magetan</h5>
                    <p class="small" style="line-height:1.8; opacity:0.75;">Portal informasi dan promosi pariwisata serta produk UMKM Kabupaten Magetan yang dikelola oleh Bidang Pemasaran Dinas Pariwisata dan Kebudayaan.</p>
                </div>
                <div class="col-md-2">
                    <h5 class="mb-3 fs-6">Wisata</h5>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><a href="{{ route('public.wisata') }}">Destinasi</a></li>
                        <li class="mb-2"><a href="{{ route('public.kuliner') }}">Kuliner</a></li>
                        <li class="mb-2"><a href="{{ route('public.penginapan') }}">Penginapan</a></li>
                        <li class="mb-2"><a href="{{ route('public.event') }}">Event</a></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h5 class="mb-3 fs-6">UMKM</h5>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><a href="{{ route('public.umkm') }}">Daftar UMKM</a></li>
                        <li class="mb-2"><a href="{{ route('public.produk') }}">Katalog Produk</a></li>
                        <li class="mb-2"><a href="{{ route('public.berita') }}">Berita</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5 class="mb-3 fs-6">Kontak</h5>
                    <p class="small" style="opacity:0.75; line-height:2;">
                        <i class="fa-solid fa-location-dot me-2"></i> Jl. Jend. Sudirman No. 1, Magetan<br>
                        <i class="fa-solid fa-phone me-2"></i> (0351) 895018<br>
                        <i class="fa-solid fa-envelope me-2"></i> disbudparmagetan@gmail.com
                    </p>
                </div>
            </div>
            <hr class="footer-divider mt-4">
            <p class="text-center small mb-0" style="opacity:0.5;">© {{ date('Y') }} Dinas Pariwisata dan Kebudayaan Kabupaten Magetan. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            document.getElementById('mainNavbar').classList.toggle('scrolled', window.scrollY > 20);
        });
    </script>

    <!-- AOS Animation JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
            offset: 100,
        });
    </script>
    @stack('scripts')
</body>
</html>
