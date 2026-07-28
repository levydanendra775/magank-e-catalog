<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Beranda') — E-Catalog Magetan</title>
    <meta name="description" content="@yield('meta_description', 'Temukan destinasi wisata, event menarik, dan berita seputar Kabupaten Magetan.')">

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
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(0,0,0,0.05);
            padding: 20px 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .navbar-public.scrolled {
            padding: 12px 0;
            background: rgba(255, 255, 255, 0.98);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        .navbar-brand-text {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 800;
            font-size: 1.35rem;
            background: linear-gradient(135deg, var(--primary), #20c997);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            line-height: 1.2;
        }

        .navbar-brand-text span {
            display: block;
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--text-muted);
            -webkit-text-fill-color: var(--text-muted); /* override webkit text fill */
            margin-top: -2px;
        }

        .nav-link-custom {
            color: var(--text-muted) !important;
            font-weight: 600;
            font-size: 0.95rem;
            padding: 8px 18px !important;
            border-radius: 50px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }

        .nav-link-custom:hover, .nav-link-custom.active {
            color: var(--primary) !important;
            background: var(--primary-light);
            transform: translateY(-2px);
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
            background: #0f172a;
            position: relative;
            color: #94a3b8;
            padding: 70px 0 30px;
            overflow: hidden;
        }

        .footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80%;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--primary), #20c997, transparent);
            opacity: 0.6;
        }

        .footer::after {
            content: '';
            position: absolute;
            top: -150px;
            left: 50%;
            transform: translateX(-50%);
            width: 600px;
            height: 300px;
            background: radial-gradient(ellipse at center, rgba(32, 201, 151, 0.15) 0%, transparent 70%);
            pointer-events: none;
        }

        .footer h5 {
            color: #f8fafc;
            font-weight: 700;
            letter-spacing: 0.5px;
            margin-bottom: 20px;
        }

        .footer .brand-title {
            background: linear-gradient(135deg, #fff, #20c997);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
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
            transform: translateX(-10px);
            transition: all 0.3s ease;
            color: #20c997;
        }

        .footer a:hover {
            color: #20c997;
            transform: translateX(5px);
        }

        .footer a:hover i.fa-chevron-right {
            opacity: 1;
            transform: translateX(0);
        }

        .footer .contact-icon {
            color: #20c997;
            background: rgba(32, 201, 151, 0.1);
            width: 32px;
            height: 32px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            margin-right: 12px;
            border: 1px solid rgba(32, 201, 151, 0.2);
            flex-shrink: 0;
        }

        .footer .contact-text {
            display: flex;
            align-items: flex-start;
            margin-bottom: 12px;
            color: #cbd5e1;
            transition: transform 0.3s ease;
        }

        .footer a.contact-text:hover,
        .footer .contact-text:hover {
            transform: translateX(5px);
            color: #20c997;
        }

        .footer-divider {
            border: none;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
            margin: 40px 0 20px;
        }

        /* ===== BUTTONS ===== */
        .btn-primary-custom {
            background: linear-gradient(135deg, var(--primary), #20c997);
            border: none;
            color: #fff;
            padding: 10px 26px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 15px rgba(26,107,58,0.25);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }

        .btn-primary-custom:hover, .btn-primary-custom:focus {
            background: linear-gradient(135deg, var(--primary-dark), #17a57a);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(26,107,58,0.4);
            color: #fff;
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

        .wishlist-btn.active {
        background: #e63946 !important;
        }
        .wishlist-btn[data-active="true"] {
        background: #e63946;
        }
    </style>

    @stack('styles')

     <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar-public" id="mainNavbar">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <a href="{{ route('home') }}" class="text-decoration-none">
                    <div class="d-flex align-items-center gap-3">
                        <div class="rounded-3 d-flex align-items-center justify-content-center shadow-sm" style="width:48px;height:48px;background:linear-gradient(135deg, var(--primary), #20c997); transition: transform 0.3s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                            <i class="fa-solid fa-mountain-sun text-white fs-5"></i>
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
                    <a href="{{ route('public.event') }}" class="nav-link-custom {{ request()->routeIs('public.event') ? 'active' : '' }}">Event</a>
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
                    <a href="{{ route('public.event') }}" class="nav-link-custom">Event</a>
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
        <div class="container position-relative" style="z-index: 1;">
            <div class="row g-4">
                <div class="col-md-4 pe-md-5">
                    <h5 class="brand-title mb-3">E-Catalog Magetan</h5>
                    <p class="small" style="line-height:1.8; color:#94a3b8;">Portal informasi dan promosi pariwisata Kabupaten Magetan yang dikelola oleh Bidang Pemasaran Dinas Pariwisata dan Kebudayaan.</p>
                </div>
                <div class="col-md-2">
                    <h5 class="fs-6">Wisata</h5>
                    <ul class="list-unstyled small d-flex flex-column gap-2">
                        <li><a href="{{ route('public.wisata') }}"><i class="fa-solid fa-chevron-right"></i>Destinasi</a></li>
                        <li><a href="{{ route('public.event') }}"><i class="fa-solid fa-chevron-right"></i>Event</a></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h5 class="fs-6">Informasi</h5>
                    <ul class="list-unstyled small d-flex flex-column gap-2">
                        <li><a href="{{ route('public.berita') }}"><i class="fa-solid fa-chevron-right"></i>Berita</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5 class="fs-6">Kontak</h5>
                    <div class="small" style="line-height:1.6;">
                        <a href="https://www.google.com/maps/search/?api=1&query=Plaza+Ndoyo%2C+Jl.+Hasanudin+No.20%2C+Terbono%2C+Selosari%2C+Kec.+Magetan%2C+Kabupaten+Magetan%2C+Jawa+Timur" target="_blank" rel="noopener noreferrer" class="contact-text text-decoration-none w-100">
                            <div class="contact-icon"><i class="fa-solid fa-location-dot"></i></div>
                            <div class="mt-1">Plaza Ndoyo, Jl. Hasanudin No.20, Terbono, Selosari, Kec. Magetan, Kabupaten Magetan, Jawa Timur</div>
                        </a>
                        <div class="contact-text w-100">
                            <div class="contact-icon"><i class="fa-solid fa-phone"></i></div>
                            <div class="mt-1">(0351) 891831</div>
                        </div>
                        <div class="contact-text w-100">
                            <div class="contact-icon"><i class="fa-solid fa-envelope"></i></div>
                            <div class="mt-1">disparbudpora01@gmail.com</div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="footer-divider">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center small" style="color:#94a3b8;">
                <p class="mb-2 mb-md-0">© {{ date('Y') }} Dinas Pariwisata dan Kebudayaan Kabupaten Magetan.</p>
                <p class="mb-0">All rights reserved.</p>
            </div>
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
            once: false,
            mirror: true,
            offset: 100,
        });
    </script>
    @stack('scripts')

    <script>
    document.querySelectorAll('.wishlist-btn').forEach(btn => {
    if (btn.dataset.active === 'true') btn.classList.add('active');
    btn.addEventListener('click', async (e) => {
        e.preventDefault();
        e.stopPropagation();

        const id = btn.dataset.id;
        const res = await fetch(`/wisata/${id}/wishlist`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            },
        });
        const data = await res.json();
        btn.classList.toggle('active', data.wishlisted);
        });
    });
    </script>

</body>
</html>
