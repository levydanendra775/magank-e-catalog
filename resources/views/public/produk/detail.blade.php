@extends('layouts.public')
@section('title', $produk->nama.' — E-Catalog Magetan')
@section('content')

<div class="container py-5 mt-4">
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none" style="color:#1a6b3a;">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('public.produk') }}" class="text-decoration-none" style="color:#1a6b3a;">Produk UMKM</a></li>
            <li class="breadcrumb-item active text-muted">{{ $produk->nama }}</li>
        </ol>
    </nav>

    <div class="row g-5">
        <div class="col-lg-5">
            <div class="card border-0 shadow-sm" style="border-radius:20px;overflow:hidden;">
                @if($produk->foto)
                    <img src="{{ Storage::url($produk->foto) }}" alt="{{ $produk->nama }}" style="width:100%;height:400px;object-fit:cover;">
                @else
                    <div class="d-flex align-items-center justify-content-center" style="height:400px;background:#f0fdf4;"><i class="fa-solid fa-box fa-5x" style="color:#1a6b3a;opacity:0.2;"></i></div>
                @endif
            </div>
        </div>

        <div class="col-lg-7">
            <span class="badge mb-3 px-3 py-2" style="background:#e9f7ef;color:#1a6b3a;font-size:0.85rem;border-radius:8px;">{{ $produk->kategori }}</span>
            <h1 class="fw-bold mb-2" style="font-family:'Plus Jakarta Sans',sans-serif;">{{ $produk->nama }}</h1>
            <p class="text-muted mb-4 fs-5">Oleh: <span class="fw-semibold text-dark">{{ $produk->umkm?->nama }}</span></p>
            
            <h2 class="fw-bold mb-4" style="color:#1a6b3a;">Rp {{ number_format($produk->harga, 0, ',', '.') }}</h2>

            @if($produk->deskripsi)
            <div class="mb-5">
                <h5 class="fw-bold mb-3" style="font-family:'Plus Jakarta Sans',sans-serif;">Deskripsi Produk</h5>
                <div class="text-muted" style="line-height:1.8;text-align:justify;">
                    {!! nl2br(e($produk->deskripsi)) !!}
                </div>
            </div>
            @endif

            <hr class="mb-4">

            <h5 class="fw-bold mb-3" style="font-family:'Plus Jakarta Sans',sans-serif;">Informasi Penjual (UMKM)</h5>
            <div class="row g-3 mb-4">
                <div class="col-sm-6">
                    <div class="d-flex align-items-center gap-3">
                        <div style="width:40px;height:40px;background:#f0f0ff;border-radius:10px;display:flex;align-items:center;justify-content:center;">
                            <i class="fa-solid fa-user text-primary"></i>
                        </div>
                        <div>
                            <div class="small text-muted mb-0">Pemilik</div>
                            <div class="fw-bold text-dark">{{ $produk->umkm?->pemilik ?? '-' }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="d-flex align-items-center gap-3">
                        <div style="width:40px;height:40px;background:#fff0f3;border-radius:10px;display:flex;align-items:center;justify-content:center;">
                            <i class="fa-solid fa-location-dot text-danger"></i>
                        </div>
                        <div>
                            <div class="small text-muted mb-0">Alamat</div>
                            <div class="fw-bold text-dark">{{ $produk->umkm?->alamat ?? '-' }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex flex-wrap gap-2 mt-4">
                @if($produk->umkm?->no_hp)
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $produk->umkm->no_hp) }}?text=Halo,%20saya%20tertarik%20dengan%20produk%20{{ urlencode($produk->nama) }}%20yang%20ada%20di%20E-Catalog%20Magetan." target="_blank" rel="noopener noreferrer"
                   class="btn px-4 py-2"
                   style="border-radius:10px;font-weight:600;background:#25D366;border-color:#25D366;color:#fff;">
                    <i class="fa-brands fa-whatsapp me-2"></i>Pesan via WhatsApp
                </a>
                @endif
                <a href="{{ route('public.produk') }}"
                   class="btn btn-outline-secondary px-4 py-2"
                   style="border-radius:10px;font-weight:600;">
                    <i class="fa-solid fa-arrow-left me-2"></i>Kembali
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
