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
            <a href="{{ route('public.event.detail', $event->id) }}" class="text-decoration-none">
            <div class="card border-0 shadow-sm h-100" style="border-radius:16px;border:1px solid #e2e8f0!important;overflow:hidden;transition:all 0.3s;" onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 12px 30px rgba(0,0,0,0.12)';" onmouseout="this.style.transform='';this.style.boxShadow='';">
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
                    <h6 class="fw-bold mb-2" style="font-family:'Plus Jakarta Sans',sans-serif;color:#1a1a1a;">{{ $event->judul }}</h6>
                    <p class="text-muted small mb-2"><i class="fa-solid fa-location-dot me-1"></i>{{ $event->lokasi }}</p>
                    @if($event->jam)
                    <p class="text-muted small mb-2"><i class="fa-regular fa-clock me-1"></i>{{ $event->jam }}</p>
                    @endif
                    <p class="text-muted small mb-3">{{ Str::limit(strip_tags($event->deskripsi), 80) }}</p>
                    <span class="btn btn-sm btn-outline-success fw-bold" style="border-radius:8px;">Lihat Detail →</span>
                </div>
            </div>
            </a>
        </div>
        @empty
        <div class="col-12 text-center py-5 text-muted"><i class="fa-solid fa-calendar-days fa-3x mb-3 opacity-25"></i><p>Belum ada event.</p></div>
        @endforelse
    </div>
    <div class="mt-4">{{ $events->links() }}</div>
</div>
@endsection