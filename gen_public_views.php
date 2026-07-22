<?php

function makeDir($path) {
    if (!is_dir($path)) mkdir($path, 0755, true);
}

function writeFile($path, $content) {
    file_put_contents($path, $content);
    echo "Written: $path\n";
}

$base = __DIR__ . '/resources/views/public';

// ===== WISATA LIST =====
makeDir("$base/wisata");
writeFile("$base/wisata/index.blade.php", <<<'BLADE'
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
</style>
@endpush
@section('content')
<div class="page-hero">
    <div class="container text-white">
        <h1 class="fw-bold mb-2" style="font-family:'Plus Jakarta Sans',sans-serif;">Destinasi Wisata Magetan</h1>
        <p class="mb-0" style="opacity:0.8;">Temukan keindahan alam dan budaya Kabupaten Magetan</p>
    </div>
</div>
<div class="container py-5">
    <div class="row g-4">
        @forelse($wisata as $w)
        <div class="col-md-6 col-xl-4">
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
BLADE);

writeFile("$base/wisata/detail.blade.php", <<<'BLADE'
@extends('layouts.public')
@section('title', $wisata->nama.' — E-Catalog Magetan')
@section('content')
@if($wisata->thumbnail)
    <div style="height:420px;overflow:hidden;">
        <img src="{{ Storage::url($wisata->thumbnail) }}" alt="{{ $wisata->nama }}" style="width:100%;height:100%;object-fit:cover;">
    </div>
@endif
<div class="container py-5">
    <div class="row">
        <div class="col-lg-8">
            <span class="badge mb-3" style="background:#1a6b3a;font-size:0.8rem;padding:6px 14px;border-radius:100px;">{{ $wisata->kategori }}</span>
            <h1 style="font-family:'Plus Jakarta Sans',sans-serif;font-weight:800;">{{ $wisata->nama }}</h1>
            <p class="text-muted mb-4"><i class="fa-solid fa-location-dot me-1"></i>{{ $wisata->alamat }}, {{ $wisata->kecamatan }}</p>
            @if($wisata->deskripsi)
            <div class="mb-4" style="line-height:1.9;color:#444;">{{ $wisata->deskripsi }}</div>
            @endif
        </div>
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm" style="border-radius:16px;position:sticky;top:80px;">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-4" style="font-family:'Plus Jakarta Sans',sans-serif;">Informasi</h5>
                    <div class="d-flex flex-column gap-3">
                        <div class="d-flex gap-3 align-items-start">
                            <i class="fa-solid fa-ticket mt-1" style="color:#1a6b3a;width:20px;"></i>
                            <div><div class="fw-semibold small">Harga Tiket</div>
                            <div class="text-muted small">{{ $wisata->harga_tiket > 0 ? 'Rp '.number_format($wisata->harga_tiket,0,',','.') : 'Gratis' }}</div></div>
                        </div>
                        @if($wisata->jam_operasional)
                        <div class="d-flex gap-3 align-items-start">
                            <i class="fa-regular fa-clock mt-1" style="color:#1a6b3a;width:20px;"></i>
                            <div><div class="fw-semibold small">Jam Operasional</div>
                            <div class="text-muted small">{{ $wisata->jam_operasional }}</div></div>
                        </div>
                        @endif
                        @if($wisata->fasilitas)
                        <div class="d-flex gap-3 align-items-start">
                            <i class="fa-solid fa-star mt-1" style="color:#1a6b3a;width:20px;"></i>
                            <div><div class="fw-semibold small">Fasilitas</div>
                            <div class="text-muted small">{{ $wisata->fasilitas }}</div></div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ route('public.wisata') }}" class="btn btn-outline-secondary mt-4"><i class="fa-solid fa-arrow-left me-2"></i>Kembali</a>
</div>
@endsection
BLADE);

// ===== UMKM =====
makeDir("$base/umkm");
writeFile("$base/umkm/index.blade.php", <<<'BLADE'
@extends('layouts.public')
@section('title', 'UMKM Lokal — E-Catalog Magetan')
@section('content')
<div style="background:linear-gradient(135deg,#0a3d1f,#1a6b3a);padding:60px 0;">
    <div class="container text-white">
        <h1 class="fw-bold mb-2" style="font-family:'Plus Jakarta Sans',sans-serif;">UMKM Kabupaten Magetan</h1>
        <p class="mb-0" style="opacity:0.8;">Dukung produk lokal unggulan Kabupaten Magetan</p>
    </div>
</div>
<div class="container py-5">
    <div class="row g-4">
        @forelse($umkm as $u)
        <div class="col-md-6 col-lg-4">
            <div class="card border-0 shadow-sm h-100" style="border-radius:16px;border:1px solid #e2e8f0!important;transition:all 0.3s;">
                <div class="card-body p-4 d-flex gap-3">
                    @if($u->logo)
                        <img src="{{ Storage::url($u->logo) }}" class="rounded-3 flex-shrink-0" style="width:65px;height:65px;object-fit:cover;" alt="{{ $u->nama }}">
                    @else
                        <div class="rounded-3 flex-shrink-0 d-flex align-items-center justify-content-center" style="width:65px;height:65px;background:#e9f7ef;color:#1a6b3a;font-size:1.5rem;"><i class="fa-solid fa-shop"></i></div>
                    @endif
                    <div>
                        <h6 class="fw-bold mb-1" style="font-family:'Plus Jakarta Sans',sans-serif;">{{ $u->nama }}</h6>
                        <p class="text-muted small mb-1"><i class="fa-solid fa-user me-1"></i>{{ $u->pemilik }}</p>
                        <p class="text-muted small mb-1"><i class="fa-solid fa-location-dot me-1"></i>{{ $u->kecamatan }}</p>
                        <p class="text-muted small mb-0"><i class="fa-solid fa-phone me-1"></i>{{ $u->no_hp }}</p>
                    </div>
                </div>
                @if($u->deskripsi)
                <div class="px-4 pb-4"><p class="text-muted small mb-0">{{ Str::limit($u->deskripsi, 80) }}</p></div>
                @endif
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5 text-muted"><i class="fa-solid fa-shop fa-3x mb-3 opacity-25"></i><p>Belum ada UMKM terdaftar.</p></div>
        @endforelse
    </div>
    <div class="mt-4">{{ $umkm->links() }}</div>
</div>
@endsection
BLADE);

// ===== PRODUK =====
makeDir("$base/produk");
writeFile("$base/produk/index.blade.php", <<<'BLADE'
@extends('layouts.public')
@section('title', 'Katalog Produk UMKM — E-Catalog Magetan')
@section('content')
<div style="background:linear-gradient(135deg,#0a3d1f,#1a6b3a);padding:60px 0;">
    <div class="container text-white">
        <h1 class="fw-bold mb-2" style="font-family:'Plus Jakarta Sans',sans-serif;">Katalog Produk UMKM</h1>
        <p class="mb-0" style="opacity:0.8;">Temukan produk lokal berkualitas dari Kabupaten Magetan</p>
    </div>
</div>
<div class="container py-5">
    <div class="row g-4">
        @forelse($produk as $p)
        <div class="col-md-6 col-xl-3">
            <div class="card border-0 shadow-sm h-100" style="border-radius:16px;border:1px solid #e2e8f0!important;overflow:hidden;transition:all 0.3s;">
                @if($p->foto)
                    <img src="{{ Storage::url($p->foto) }}" class="card-img-top" style="height:190px;object-fit:cover;" alt="{{ $p->nama }}">
                @else
                    <div class="d-flex align-items-center justify-content-center" style="height:190px;background:#f0fdf4;"><i class="fa-solid fa-box fa-3x" style="color:#1a6b3a;opacity:0.3;"></i></div>
                @endif
                <div class="card-body p-3">
                    <span class="badge mb-2" style="background:#e9f7ef;color:#1a6b3a;font-size:0.72rem;">{{ $p->kategori }}</span>
                    <h6 class="fw-bold mb-1" style="font-family:'Plus Jakarta Sans',sans-serif;">{{ $p->nama }}</h6>
                    <p class="text-muted small mb-2">{{ $p->umkm?->nama }}</p>
                    <p class="fw-bold mb-0" style="color:#1a6b3a;">Rp {{ number_format($p->harga,0,',','.') }}</p>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5 text-muted"><i class="fa-solid fa-box fa-3x mb-3 opacity-25"></i><p>Belum ada produk.</p></div>
        @endforelse
    </div>
    <div class="mt-4">{{ $produk->links() }}</div>
</div>
@endsection
BLADE);

// ===== EVENT =====
makeDir("$base/event");
writeFile("$base/event/index.blade.php", <<<'BLADE'
@extends('layouts.public')
@section('title', 'Event & Agenda — E-Catalog Magetan')
@section('content')
<div style="background:linear-gradient(135deg,#0a3d1f,#1a6b3a);padding:60px 0;">
    <div class="container text-white">
        <h1 class="fw-bold mb-2" style="font-family:'Plus Jakarta Sans',sans-serif;">Event & Agenda Wisata</h1>
        <p class="mb-0" style="opacity:0.8;">Jangan lewatkan acara seru di Kabupaten Magetan</p>
    </div>
</div>
<div class="container py-5">
    <div class="row g-4">
        @forelse($events as $event)
        <div class="col-md-6 col-xl-4">
            <div class="card border-0 shadow-sm h-100" style="border-radius:16px;border:1px solid #e2e8f0!important;overflow:hidden;transition:all 0.3s;">
                <div style="position:relative;height:200px;overflow:hidden;">
                    @if($event->poster)
                        <img src="{{ Storage::url($event->poster) }}" class="w-100 h-100" style="object-fit:cover;" alt="{{ $event->judul }}">
                    @else
                        <div class="w-100 h-100 d-flex align-items-center justify-content-center" style="background:linear-gradient(135deg,#1a6b3a,#2d8a55);">
                            <i class="fa-solid fa-calendar-star fa-3x text-white opacity-50"></i>
                        </div>
                    @endif
                    <div style="position:absolute;top:12px;right:12px;background:#f5a623;color:#fff;border-radius:10px;padding:6px 12px;text-align:center;font-weight:700;font-family:'Plus Jakarta Sans',sans-serif;min-width:54px;">
                        <div style="font-size:1.1rem;">{{ $event->tanggal->format('d') }}</div>
                        <div style="font-size:0.7rem;opacity:0.9;">{{ $event->tanggal->format('M Y') }}</div>
                    </div>
                </div>
                <div class="card-body p-4">
                    <h6 class="fw-bold mb-2" style="font-family:'Plus Jakarta Sans',sans-serif;">{{ $event->judul }}</h6>
                    <p class="text-muted small mb-2"><i class="fa-solid fa-location-dot me-1"></i>{{ $event->lokasi }}</p>
                    @if($event->jam)
                    <p class="text-muted small mb-2"><i class="fa-regular fa-clock me-1"></i>{{ $event->jam }}</p>
                    @endif
                    <p class="text-muted small mb-3">{{ Str::limit(strip_tags($event->deskripsi), 80) }}</p>
                    @if($event->link_pendaftaran)
                    <a href="{{ $event->link_pendaftaran }}" target="_blank" class="btn btn-sm btn-warning fw-bold" style="border-radius:8px;">Daftar Sekarang</a>
                    @endif
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5 text-muted"><i class="fa-solid fa-calendar-days fa-3x mb-3 opacity-25"></i><p>Belum ada event.</p></div>
        @endforelse
    </div>
    <div class="mt-4">{{ $events->links() }}</div>
</div>
@endsection
BLADE);

// ===== KULINER =====
makeDir("$base/kuliner");
writeFile("$base/kuliner/index.blade.php", <<<'BLADE'
@extends('layouts.public')
@section('title', 'Kuliner Khas — E-Catalog Magetan')
@section('content')
<div style="background:linear-gradient(135deg,#0a3d1f,#1a6b3a);padding:60px 0;">
    <div class="container text-white">
        <h1 class="fw-bold mb-2" style="font-family:'Plus Jakarta Sans',sans-serif;">Kuliner Khas Magetan</h1>
        <p class="mb-0" style="opacity:0.8;">Cicipi kelezatan kuliner khas Kabupaten Magetan</p>
    </div>
</div>
<div class="container py-5">
    <div class="row g-4">
        @forelse($kuliner as $k)
        <div class="col-md-6 col-xl-4">
            <div class="card border-0 shadow-sm h-100" style="border-radius:16px;border:1px solid #e2e8f0!important;overflow:hidden;transition:all 0.3s;">
                @if($k->foto)
                    <img src="{{ Storage::url($k->foto) }}" style="height:200px;object-fit:cover;width:100%;" alt="{{ $k->nama }}">
                @else
                    <div class="d-flex align-items-center justify-content-center" style="height:200px;background:#fff8f0;"><i class="fa-solid fa-utensils fa-3x" style="color:#fd7e14;opacity:0.3;"></i></div>
                @endif
                <div class="card-body p-4">
                    <h6 class="fw-bold mb-2" style="font-family:'Plus Jakarta Sans',sans-serif;">{{ $k->nama }}</h6>
                    @if($k->menu_unggulan)
                    <p class="text-muted small mb-1"><i class="fa-solid fa-star me-1" style="color:#f5a623;"></i>{{ $k->menu_unggulan }}</p>
                    @endif
                    @if($k->jam_buka)
                    <p class="text-muted small mb-1"><i class="fa-regular fa-clock me-1"></i>{{ $k->jam_buka }}</p>
                    @endif
                    <p class="text-muted small mb-0"><i class="fa-solid fa-location-dot me-1" style="color:#1a6b3a;"></i>{{ Str::limit($k->alamat,50) }}</p>
                    @if($k->no_hp)
                    <p class="text-muted small mb-0 mt-1"><i class="fa-solid fa-phone me-1"></i>{{ $k->no_hp }}</p>
                    @endif
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5 text-muted"><i class="fa-solid fa-utensils fa-3x mb-3 opacity-25"></i><p>Belum ada data kuliner.</p></div>
        @endforelse
    </div>
    <div class="mt-4">{{ $kuliner->links() }}</div>
</div>
@endsection
BLADE);

// ===== PENGINAPAN =====
makeDir("$base/penginapan");
writeFile("$base/penginapan/index.blade.php", <<<'BLADE'
@extends('layouts.public')
@section('title', 'Penginapan — E-Catalog Magetan')
@section('content')
<div style="background:linear-gradient(135deg,#0a3d1f,#1a6b3a);padding:60px 0;">
    <div class="container text-white">
        <h1 class="fw-bold mb-2" style="font-family:'Plus Jakarta Sans',sans-serif;">Penginapan di Magetan</h1>
        <p class="mb-0" style="opacity:0.8;">Temukan akomodasi terbaik untuk perjalanan Anda</p>
    </div>
</div>
<div class="container py-5">
    <div class="row g-4">
        @forelse($penginapan as $p)
        <div class="col-md-6 col-xl-4">
            <div class="card border-0 shadow-sm h-100" style="border-radius:16px;border:1px solid #e2e8f0!important;overflow:hidden;transition:all 0.3s;">
                @if($p->foto)
                    <img src="{{ Storage::url($p->foto) }}" style="height:200px;object-fit:cover;width:100%;" alt="{{ $p->nama }}">
                @else
                    <div class="d-flex align-items-center justify-content-center" style="height:200px;background:#f0f0ff;"><i class="fa-solid fa-bed fa-3x" style="color:#6f42c1;opacity:0.3;"></i></div>
                @endif
                <div class="card-body p-4">
                    <span class="badge mb-2" style="background:#f0f0ff;color:#6f42c1;font-size:0.72rem;">{{ $p->jenis }}</span>
                    <h6 class="fw-bold mb-2" style="font-family:'Plus Jakarta Sans',sans-serif;">{{ $p->nama }}</h6>
                    @if($p->harga_mulai)
                    <p class="fw-bold mb-2" style="color:#1a6b3a;">Mulai Rp {{ number_format($p->harga_mulai,0,',','.') }}/malam</p>
                    @endif
                    @if($p->fasilitas)
                    <p class="text-muted small mb-1"><i class="fa-solid fa-circle-check me-1"></i>{{ Str::limit($p->fasilitas,50) }}</p>
                    @endif
                    <p class="text-muted small mb-0"><i class="fa-solid fa-location-dot me-1" style="color:#1a6b3a;"></i>{{ Str::limit($p->alamat,50) }}</p>
                    @if($p->no_hp)
                    <p class="text-muted small mt-1 mb-0"><i class="fa-solid fa-phone me-1"></i>{{ $p->no_hp }}</p>
                    @endif
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5 text-muted"><i class="fa-solid fa-bed fa-3x mb-3 opacity-25"></i><p>Belum ada data penginapan.</p></div>
        @endforelse
    </div>
    <div class="mt-4">{{ $penginapan->links() }}</div>
</div>
@endsection
BLADE);

// ===== BERITA =====
makeDir("$base/berita");
writeFile("$base/berita/index.blade.php", <<<'BLADE'
@extends('layouts.public')
@section('title', 'Berita Terkini — E-Catalog Magetan')
@section('content')
<div style="background:linear-gradient(135deg,#0a3d1f,#1a6b3a);padding:60px 0;">
    <div class="container text-white">
        <h1 class="fw-bold mb-2" style="font-family:'Plus Jakarta Sans',sans-serif;">Berita & Informasi</h1>
        <p class="mb-0" style="opacity:0.8;">Update terbaru seputar pariwisata dan UMKM Magetan</p>
    </div>
</div>
<div class="container py-5">
    <div class="row g-4">
        @forelse($berita as $b)
        <div class="col-md-6 col-xl-4">
            <div class="card border-0 shadow-sm h-100" style="border-radius:16px;border:1px solid #e2e8f0!important;overflow:hidden;transition:all 0.3s;">
                @if($b->thumbnail)
                    <img src="{{ Storage::url($b->thumbnail) }}" style="height:210px;object-fit:cover;width:100%;" alt="{{ $b->judul }}">
                @else
                    <div class="d-flex align-items-center justify-content-center" style="height:210px;background:#e9f7ef;"><i class="fa-regular fa-newspaper fa-3x" style="color:#1a6b3a;opacity:0.3;"></i></div>
                @endif
                <div class="card-body p-4">
                    <p class="text-muted small mb-2"><i class="fa-regular fa-calendar me-1"></i>{{ $b->created_at->format('d M Y') }}</p>
                    <h6 class="fw-bold mb-2" style="font-family:'Plus Jakarta Sans',sans-serif;">{{ $b->judul }}</h6>
                    <p class="text-muted small mb-0">{{ Str::limit(strip_tags($b->isi), 100) }}</p>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5 text-muted"><i class="fa-regular fa-newspaper fa-3x mb-3 opacity-25"></i><p>Belum ada berita.</p></div>
        @endforelse
    </div>
    <div class="mt-4">{{ $berita->links() }}</div>
</div>
@endsection
BLADE);

// ===== TENTANG =====
writeFile("$base/tentang.blade.php", <<<'BLADE'
@extends('layouts.public')
@section('title', 'Tentang Kami — E-Catalog Magetan')
@section('content')
<div style="background:linear-gradient(135deg,#0a3d1f,#1a6b3a);padding:80px 0;">
    <div class="container text-white text-center">
        <h1 class="fw-bold mb-3" style="font-family:'Plus Jakarta Sans',sans-serif;">Tentang E-Catalog Magetan</h1>
        <p style="opacity:0.8;max-width:600px;margin:0 auto;">Platform digital promosi pariwisata dan UMKM Kabupaten Magetan</p>
    </div>
</div>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm p-4 mb-4" style="border-radius:16px;">
                <h4 class="fw-bold mb-3" style="font-family:'Plus Jakarta Sans',sans-serif;">Tentang Kami</h4>
                <p style="line-height:1.9;color:#444;">E-Catalog Pariwisata & UMKM merupakan platform digital yang dikembangkan oleh <strong>Bidang Pemasaran Dinas Pariwisata dan Kebudayaan Kabupaten Magetan</strong> sebagai media promosi dan informasi terpadu untuk destinasi wisata, produk UMKM lokal, kuliner, penginapan, dan event yang ada di Kabupaten Magetan, Jawa Timur.</p>
                <p style="line-height:1.9;color:#444;">Platform ini bertujuan untuk memperluas jangkauan promosi pariwisata secara digital, mendukung pertumbuhan ekonomi kreatif masyarakat lokal, serta memudahkan wisatawan dalam mengakses informasi perjalanan ke Kabupaten Magetan.</p>
            </div>
            <div class="card border-0 shadow-sm p-4" style="border-radius:16px;">
                <h5 class="fw-bold mb-3" style="font-family:'Plus Jakarta Sans',sans-serif;">Kontak Kami</h5>
                <div class="d-flex flex-column gap-3">
                    <div class="d-flex gap-3 align-items-center"><div style="width:42px;height:42px;background:#e9f7ef;border-radius:10px;display:flex;align-items:center;justify-content:center;color:#1a6b3a;"><i class="fa-solid fa-location-dot"></i></div><div><div class="fw-semibold small">Alamat</div><div class="text-muted small">Jl. Jend. Sudirman No. 1, Magetan, Jawa Timur</div></div></div>
                    <div class="d-flex gap-3 align-items-center"><div style="width:42px;height:42px;background:#e9f7ef;border-radius:10px;display:flex;align-items:center;justify-content:center;color:#1a6b3a;"><i class="fa-solid fa-phone"></i></div><div><div class="fw-semibold small">Telepon</div><div class="text-muted small">(0351) 895018</div></div></div>
                    <div class="d-flex gap-3 align-items-center"><div style="width:42px;height:42px;background:#e9f7ef;border-radius:10px;display:flex;align-items:center;justify-content:center;color:#1a6b3a;"><i class="fa-solid fa-envelope"></i></div><div><div class="fw-semibold small">Email</div><div class="text-muted small">disbudparmagetan@gmail.com</div></div></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
BLADE);

echo "All public views generated!\n";
