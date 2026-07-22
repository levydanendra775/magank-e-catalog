@extends('layouts.public')
@section('title', 'Katalog Produk UMKM — E-Catalog Magetan')
@section('content')
<div style="background:linear-gradient(135deg,#0a3d1f,#1a6b3a);padding:60px 0;">
    <div class="container text-white">
        <h1 class="fw-bold mb-2" style="font-family:'Plus Jakarta Sans',sans-serif;">Katalog Produk UMKM</h1>
        <p class="mb-0" style="opacity:0.8;">Temukan produk lokal berkualitas dari Kabupaten Magetan</p>
    </div>
</div>

<div class="container mt-4">
    <form action="{{ route('public.produk') }}" method="GET">
        <div class="input-group input-group-lg border rounded-3" style="box-shadow: 0 4px 15px rgba(0,0,0,0.05); max-width: 600px; margin: 0 auto;">
            <input type="text" name="q" class="form-control border-0" placeholder="Cari nama produk..." value="{{ request('q') }}">
            <button class="btn btn-warning fw-bold px-4 border-0" type="submit"><i class="fa-solid fa-magnifying-glass me-2"></i>Cari</button>
        </div>
    </form>
</div>

<div class="container py-4">
    <div class="row g-4">
        @forelse($produk as $p)
        <div class="col-md-6 col-xl-3">
            <a href="{{ route('public.produk.detail', $p->id) }}" class="text-decoration-none">
            <div class="card border-0 shadow-sm h-100" style="border-radius:16px;border:1px solid #e2e8f0!important;overflow:hidden;transition:all 0.3s;cursor:pointer;" onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 12px 32px rgba(0,0,0,0.12)';" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='';">
                @if($p->foto)
                    <img src="{{ Storage::url($p->foto) }}" class="card-img-top" style="height:190px;object-fit:cover;" alt="{{ $p->nama }}">
                @else
                    <div class="d-flex align-items-center justify-content-center" style="height:190px;background:#f0fdf4;"><i class="fa-solid fa-box fa-3x" style="color:#1a6b3a;opacity:0.3;"></i></div>
                @endif
                <div class="card-body p-3">
                    <span class="badge mb-2" style="background:#e9f7ef;color:#1a6b3a;font-size:0.72rem;">{{ $p->kategori }}</span>
                    <h6 class="fw-bold mb-1" style="font-family:'Plus Jakarta Sans',sans-serif;color:#1a1a1a;">{{ $p->nama }}</h6>
                    <p class="text-muted small mb-2">{{ $p->umkm?->nama }}</p>
                    <p class="fw-bold mb-0" style="color:#1a6b3a;">Rp {{ number_format($p->harga,0,',','.') }}</p>
                </div>
            </div>
            </a>
        </div>
        @empty
        <div class="col-12 text-center py-5 text-muted"><i class="fa-solid fa-box fa-3x mb-3 opacity-25"></i><p>Belum ada produk.</p></div>
        @endforelse
    </div>
    <div class="mt-4">{{ $produk->links() }}</div>
</div>
@endsection