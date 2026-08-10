@extends('layouts.public')
@section('title', $event->judul.' — E-Catalog Magetan')
@section('content')

<div style="background:linear-gradient(135deg,#0a3d1f,#1a6b3a);padding:60px 0;">
    <div class="container text-white">
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb" style="--bs-breadcrumb-divider-color:rgba(255,255,255,0.5);">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white text-decoration-none opacity-75">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('public.event') }}" class="text-white text-decoration-none opacity-75">Event</a></li>
                <li class="breadcrumb-item active text-white">Detail</li>
            </ol>
        </nav>
        <h1 class="fw-bold mb-2" style="font-family:'Plus Jakarta Sans',sans-serif;">{{ $event->judul }}</h1>
        <div class="d-flex flex-wrap gap-3 mt-3" style="opacity:0.85;font-size:0.95rem;">
            <span><i class="fa-regular fa-calendar me-1"></i> {{ $event->tanggal->translatedFormat('d F Y') }}</span>
            @if($event->jam)
            <span><i class="fa-regular fa-clock me-1"></i> {{ $event->jam }}</span>
            @endif
            <span><i class="fa-solid fa-location-dot me-1"></i> {{ $event->lokasi }}</span>
        </div>
    </div>
</div>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            @if($event->poster)
            <div class="mb-5 rounded-4 overflow-hidden shadow-sm" style="border:1px solid #e9ecef;">
                <img src="{{ Storage::url($event->poster) }}" alt="{{ $event->judul }}" style="width:100%;height:auto;max-height:500px;object-fit:cover;">
            </div>
            @endif

            {{-- Info Box --}}
            <div class="card border-0 mb-5 p-4" style="background:#f0f9f4;border-radius:16px;border-left:4px solid #1a6b3a!important;">
                <div class="row g-3">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center gap-3">
                            <div style="width:42px;height:42px;background:#1a6b3a;border-radius:10px;display:flex;align-items:center;justify-content:center;">
                                <i class="fa-regular fa-calendar text-white"></i>
                            </div>
                            <div>
                                <div class="text-muted small">Tanggal</div>
                                <div class="fw-bold" style="color:#1a6b3a;">{{ $event->tanggal->translatedFormat('d F Y') }}</div>
                            </div>
                        </div>
                    </div>
                    @if($event->jam)
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center gap-3">
                            <div style="width:42px;height:42px;background:#1a6b3a;border-radius:10px;display:flex;align-items:center;justify-content:center;">
                                <i class="fa-regular fa-clock text-white"></i>
                            </div>
                            <div>
                                <div class="text-muted small">Waktu</div>
                                <div class="fw-bold" style="color:#1a6b3a;">{{ $event->jam }}</div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center gap-3">
                            <div style="width:42px;height:42px;background:#1a6b3a;border-radius:10px;display:flex;align-items:center;justify-content:center;">
                                <i class="fa-solid fa-location-dot text-white"></i>
                            </div>
                            <div>
                                <div class="text-muted small">Lokasi</div>
                                <div class="fw-bold" style="color:#1a6b3a;">{{ $event->lokasi }}</div>
                            </div>
                        </div>
                    </div>
                    @if($event->link_pendaftaran)
                    <div class="col-sm-6 d-flex align-items-center">
                        <a href="{{ $event->link_pendaftaran }}" target="_blank" class="btn btn-warning fw-bold px-4" style="border-radius:10px;">
                            <i class="fa-solid fa-arrow-right me-2"></i>Daftar Sekarang
                        </a>
                    </div>
                    @endif
                </div>
            </div>

            {{-- Deskripsi --}}
            <div class="event-content" style="line-height:1.9;font-size:1.05rem;color:#333;text-align:justify;">
                {!! nl2br(e($event->deskripsi)) !!}
            </div>

            <hr class="my-5">

            @php
                $backUrl = route('public.event');
                if (request()->has('page')) {
                    $backUrl = route('public.event', request()->query());
                } elseif (url()->previous() && url()->previous() !== url()->current() && str_contains(url()->previous(), '/event')) {
                    $backUrl = url()->previous();
                }
            @endphp
            <div class="d-flex justify-content-between align-items-center">
                <a href="{{ $backUrl }}" onclick="if(document.referrer && document.referrer.includes('/event')){ history.back(); return false; }" class="btn-interactive btn-interactive-forest btn-interactive-lg">
                    <span class="btn-text-initial">Kembali ke Daftar Event</span>
                    <div class="btn-text-hover">
                        <i class="fa-solid fa-arrow-left"></i>
                        <span>Kembali ke Daftar Event</span>
                    </div>
                    <div class="btn-bubble"></div>
                </a>
            </div>

        </div>
    </div>
</div>
@endsection
