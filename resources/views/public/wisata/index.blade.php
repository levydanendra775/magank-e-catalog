@extends('layouts.public')
@section('title', 'Destinasi Wisata — E-Catalog Magetan')
@push('styles')
<style>
.wisata-grid-card { border-radius:16px; overflow:hidden; border:1px solid #e2e8f0; transition:all 0.3s; height:100%; }
.wisata-grid-card:hover { transform:translateY(-6px); box-shadow:0 16px 40px rgba(26,107,58,0.12); border-color:#1a6b3a; }
.wisata-grid-card .img-wrap { position:relative; height:200px; overflow:hidden; }
.wisata-grid-card .img-wrap img { width:100%; height:100%; object-fit:cover; transition:transform 0.4s; }
.wisata-grid-card:hover .img-wrap img { transform:scale(1.08); }
.page-hero { background:linear-gradient(135deg,#0a3d1f,#1a6b3a); padding:60px 0; }
.filter-card { background:#fff; border-radius:12px; padding:20px; box-shadow:0 4px 15px rgba(0,0,0,0.05); margin-top:-40px; position:relative; z-index:10; }
</style>
@endpush
@section('content')
<div class="page-hero" data-aos="fade-down">
    <div class="container text-white pb-5">
        <h1 class="fw-bold mb-2" style="font-family:'Plus Jakarta Sans',sans-serif;">Destinasi Wisata Magetan</h1>
        <p class="mb-0" style="opacity:0.8;">Temukan keindahan alam dan budaya Kabupaten Magetan</p>
    </div>
</div>

<div class="container mb-4">
    <div class="filter-card border" data-aos="fade-up" data-aos-delay="200">
        <form action="{{ route('public.wisata') }}" method="GET">
            <div class="row g-3">
                <div class="col-md-4">
                    <input type="text" name="q" class="form-control form-control-lg" placeholder="Cari nama wisata..." value="{{ request('q') }}">
                </div>
                <div class="col-md-3">
                    <select name="kategori" class="form-select form-select-lg">
                        <option value="">Semua Kategori</option>
                        @foreach($kategoriList ?? [] as $kat)
                            <option value="{{ $kat }}" {{ request('kategori') == $kat ? 'selected' : '' }}>{{ $kat }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="kecamatan" class="form-select form-select-lg">
                        <option value="">Semua Kecamatan</option>
                        @foreach($kecamatanList ?? [] as $kec)
                            <option value="{{ $kec }}" {{ request('kecamatan') == $kec ? 'selected' : '' }}>{{ $kec }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 d-grid">
                    <button type="submit" class="btn btn-warning fw-bold btn-lg"><i class="fa-solid fa-magnifying-glass me-2"></i>Cari</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="container py-4">
    <div class="row g-4">
        @forelse($wisata as $w)
        <div class="col-md-6 col-xl-4" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
            <a href="{{ route('public.wisata.detail', $w->slug) }}" class="text-decoration-none text-dark">
                <div class="wisata-grid-card">
                    <div class="img-wrap">
                        @if($w->thumbnail)
                            <img src="{{ Storage::url($w->thumbnail) }}" alt="{{ $w->nama }}">
                        @else
                            <div class="d-flex align-items-center justify-content-center h-100 bg-light"><i class="fa-solid fa-image fa-3x text-muted opacity-25"></i></div>
                        @endif
                        <span style="position:absolute;top:12px;left:12px;background:#1a6b3a;color:#fff;font-size:0.72rem;font-weight:600;padding:4px 12px;border-radius:100px;">{{ $w->kategori }}</span>
                        <span style="position:absolute;bottom:12px;right:12px;background:rgba(0,0,0,0.65);color:#fff;font-size:0.75rem;font-weight:600;padding:4px 12px;border-radius:100px;">
                            {{ $w->harga_tiket > 0 ? 'Rp '.number_format($w->harga_tiket,0,',','.') : 'Gratis' }}
                        </span>

                        @auth
                        <button type="button" class="wishlist-btn" data-id="{{ $w->id }}"
                            data-active="{{ auth()->user()->wishlist->contains($w->id) ? 'true' : 'false' }}"
                            style="position:absolute;top:12px;right:12px;background:rgba(0,0,0,0.5);border:none;border-radius:50%;width:32px;height:32px;color:#fff;font-size:1rem;">
                            ❤
                        </button>
                        @else
                        <a href="{{ route('login') }}" title="Login untuk menyimpan wishlist"
                            style="position:absolute;top:12px;right:12px;background:rgba(0,0,0,0.5);border:none;border-radius:50%;width:32px;height:32px;color:#fff;font-size:1rem;display:flex;align-items:center;justify-content:center;text-decoration:none;">
                            🤍
                        </a>
                        @endauth

                    </div>
                    <div class="p-4">
                        <h6 class="fw-bold mb-1" style="font-family:'Plus Jakarta Sans',sans-serif;">{{ $w->nama }}</h6>
                        <p class="text-muted small mb-2"><i class="fa-solid fa-location-dot me-1" style="color:#1a6b3a"></i>{{ $w->kecamatan }}, Magetan</p>
                        @if($w->jam_operasional)
                        <p class="text-muted small mb-0"><i class="fa-regular fa-clock me-1"></i>{{ $w->jam_operasional }}</p>
                        @endif
                    </div>
                </div>
            </a>
        </div>
        @empty
        <div class="col-12 text-center py-5 text-muted">
            <i class="fa-regular fa-map fa-3x mb-3 opacity-25"></i><p>Belum ada destinasi wisata.</p>
        </div>
        @endforelse
    </div>
    <div class="mt-4">{{ $wisata->links() }}</div>
</div>
@endsection