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
            <a href="{{ route('public.penginapan.detail', $p->id) }}" class="text-decoration-none">
            <div class="card border-0 shadow-sm h-100" style="border-radius:16px;border:1px solid #e2e8f0!important;overflow:hidden;transition:all 0.3s;cursor:pointer;" onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 12px 32px rgba(0,0,0,0.12)';" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='';">
                @if($p->foto)
                    <img src="{{ Storage::url($p->foto) }}" style="height:200px;object-fit:cover;width:100%;" alt="{{ $p->nama }}">
                @else
                    <div class="d-flex align-items-center justify-content-center" style="height:200px;background:#f0f0ff;"><i class="fa-solid fa-bed fa-3x" style="color:#6f42c1;opacity:0.3;"></i></div>
                @endif
                <div class="card-body p-4">
                    <span class="badge mb-2" style="background:#f0f0ff;color:#6f42c1;font-size:0.72rem;">{{ $p->jenis }}</span>
                    <h6 class="fw-bold mb-2" style="font-family:'Plus Jakarta Sans',sans-serif;color:#1a1a1a;">{{ $p->nama }}</h6>
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
            </a>
        </div>
        @empty
        <div class="col-12 text-center py-5 text-muted"><i class="fa-solid fa-bed fa-3x mb-3 opacity-25"></i><p>Belum ada data penginapan.</p></div>
        @endforelse
    </div>
    <div class="mt-4">{{ $penginapan->links() }}</div>
</div>
@endsection