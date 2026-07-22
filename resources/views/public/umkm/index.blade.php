@extends('layouts.public')
@section('title', 'UMKM Lokal — E-Catalog Magetan')
@section('content')
<div style="background:linear-gradient(135deg,#0a3d1f,#1a6b3a);padding:60px 0;" data-aos="fade-down">
    <div class="container text-white">
        <h1 class="fw-bold mb-2" style="font-family:'Plus Jakarta Sans',sans-serif;">UMKM Kabupaten Magetan</h1>
        <p class="mb-0" style="opacity:0.8;">Dukung produk lokal unggulan Kabupaten Magetan</p>
    </div>
</div>

<div class="container mt-4" data-aos="fade-up" data-aos-delay="200">
    <form action="{{ route('public.umkm') }}" method="GET">
        <div class="input-group input-group-lg border rounded-3" style="box-shadow: 0 4px 15px rgba(0,0,0,0.05); max-width: 600px; margin: 0 auto;">
            <input type="text" name="q" class="form-control border-0" placeholder="Cari nama UMKM atau pemilik..." value="{{ request('q') }}">
            <button class="btn btn-warning fw-bold px-4 border-0" type="submit"><i class="fa-solid fa-magnifying-glass me-2"></i>Cari</button>
        </div>
    </form>
</div>

<div class="container py-4">
    <div class="row g-4">
        @forelse($umkm as $u)
        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
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