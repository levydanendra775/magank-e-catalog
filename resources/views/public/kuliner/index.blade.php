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
            <a href="{{ route('public.kuliner.detail', $k->id) }}" class="text-decoration-none">
            <div class="card border-0 shadow-sm h-100" style="border-radius:16px;border:1px solid #e2e8f0!important;overflow:hidden;transition:all 0.3s;cursor:pointer;" onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 12px 32px rgba(0,0,0,0.12)';" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='';">
                @if($k->foto)
                    <img src="{{ Storage::url($k->foto) }}" style="height:200px;object-fit:cover;width:100%;" alt="{{ $k->nama }}">
                @else
                    <div class="d-flex align-items-center justify-content-center" style="height:200px;background:#fff8f0;"><i class="fa-solid fa-utensils fa-3x" style="color:#fd7e14;opacity:0.3;"></i></div>
                @endif
                <div class="card-body p-4">
                    <h6 class="fw-bold mb-2" style="font-family:'Plus Jakarta Sans',sans-serif;color:#1a1a1a;">{{ $k->nama }}</h6>
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
                    @if($k->maps)
                    <span class="badge mt-2" style="background:#fde8c8;color:#d97706;font-size:0.72rem;"><i class="fa-solid fa-map-location-dot me-1"></i>Ada Lokasi Maps</span>
                    @endif
                </div>
            </div>
            </a>
        </div>
        @empty
        <div class="col-12 text-center py-5 text-muted"><i class="fa-solid fa-utensils fa-3x mb-3 opacity-25"></i><p>Belum ada data kuliner.</p></div>
        @endforelse
    </div>
    <div class="mt-4">{{ $kuliner->links() }}</div>
</div>
@endsection