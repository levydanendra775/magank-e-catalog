<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - E-Catalog Magetan</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f6f9;
        }
        .sidebar {
            width: 260px;
            height: 100vh;
            background-color: #212529;
            color: #fff;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 20px;
            transition: all 0.3s;
        }
        .sidebar a {
            color: #adb5bd;
            text-decoration: none;
            padding: 12px 20px;
            display: block;
            transition: 0.2s;
        }
        .sidebar a:hover, .sidebar a.active {
            color: #fff;
            background-color: #343a40;
            border-left: 4px solid #0d6efd;
        }
        .sidebar i {
            width: 25px;
        }
        .main-content {
            margin-left: 260px;
            padding: 20px;
            min-height: 100vh;
        }
        .topbar {
            background-color: #fff;
            padding: 15px 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 25px;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="text-center mb-4 fw-bold">E-Catalog<br><small class="fw-normal text-muted" style="font-size: 14px;">Magetan</small></h4>
        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}"><i class="fa-solid fa-gauge"></i> Dashboard</a>
        <a href="{{ route('admin.wisata.index') }}" class="{{ request()->routeIs('admin.wisata*') ? 'active' : '' }}"><i class="fa-solid fa-map-location-dot"></i> Wisata</a>
        <a href="{{ route('admin.event.index') }}" class="{{ request()->routeIs('admin.event*') ? 'active' : '' }}"><i class="fa-solid fa-calendar-days"></i> Event</a>

        <h6 class="px-3 mt-4 mb-2 text-muted text-uppercase" style="font-size:12px;">Konten</h6>
        <a href="{{ route('admin.berita.index') }}" class="{{ request()->routeIs('admin.berita*') ? 'active' : '' }}"><i class="fa-regular fa-newspaper"></i> Berita</a>
        <a href="{{ route('admin.ulasan.index') }}" class="{{ request()->routeIs('admin.ulasan*') ? 'active' : '' }}"><i class="fa-solid fa-star-half-stroke"></i> Ulasan & Rating</a>
        <a href="{{ route('admin.galeri.index') }}" class="{{ request()->routeIs('admin.galeri*') ? 'active' : '' }}"><i class="fa-solid fa-images"></i> Galeri</a>
        <a href="{{ route('admin.banner.index') }}" class="{{ request()->routeIs('admin.banner*') ? 'active' : '' }}"><i class="fa-solid fa-bullhorn"></i> Banner</a>
        <h6 class="px-3 mt-4 mb-2 text-muted text-uppercase" style="font-size:12px;">Laporan</h6>
        <a href="{{ route('admin.laporan.index') }}" class="{{ request()->routeIs('admin.laporan*') ? 'active' : '' }}"><i class="fa-solid fa-file-pdf"></i> Cetak Laporan</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="topbar">
            <h5 class="mb-0 fw-bold text-dark">@yield('title', 'Dashboard')</h5>
            <div>
                <span class="me-3">{{ Auth::user()->name ?? 'Admin' }}</span>
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-right-from-bracket"></i> Logout</button>
                </form>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Gagal menyimpan data!</strong> Silakan periksa kembali isian formulir Anda.
                <ul class="mb-0 mt-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('content')
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
