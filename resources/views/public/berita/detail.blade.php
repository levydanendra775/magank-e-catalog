@extends('layouts.public')
@section('title', $berita->judul.' — Pesona Magetan')
@section('content')

<div class="container py-5 mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none" style="color:var(--primary);">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('public.berita') }}" class="text-decoration-none" style="color:var(--primary);">Berita</a></li>
                    <li class="breadcrumb-item active text-muted">Detail</li>
                </ol>
            </nav>

            <h1 class="fw-bold mb-3" style="font-family:'Plus Jakarta Sans',sans-serif;line-height:1.4;">{{ $berita->judul }}</h1>
            
            <div class="d-flex align-items-center gap-4 mb-4 text-muted small">
                <span class="d-flex align-items-center gap-2"><i class="fa-regular fa-calendar" style="color:var(--primary);"></i> {{ $berita->created_at->format('d M Y, H:i') }}</span>
                <span class="d-flex align-items-center gap-2"><i class="fa-solid fa-user-pen" style="color:var(--primary);"></i> {{ $berita->penulis?->name ?? 'Admin' }}</span>
            </div>

            @if($berita->thumbnail)
            <div class="mb-5 rounded-4 overflow-hidden shadow-sm" style="border:1px solid var(--border);">
                <img src="{{ Storage::url($berita->thumbnail) }}" alt="{{ $berita->judul }}" style="width:100%;height:auto;max-height:500px;object-fit:cover;">
            </div>
            @endif

            <div class="berita-content" style="line-height:1.8;font-size:1.05rem;color:var(--text-dark);text-align:justify;">
                {!! $berita->isi !!}
            </div>

            <hr class="my-5">

            @php
                $backUrl = route('public.berita');
                if (request()->has('page')) {
                    $backUrl = route('public.berita', request()->query());
                } elseif (url()->previous() && url()->previous() !== url()->current() && str_contains(url()->previous(), '/berita')) {
                    $backUrl = url()->previous();
                }
            @endphp
            <div class="d-flex justify-content-between align-items-center">
                <a href="{{ $backUrl }}" onclick="if(document.referrer && document.referrer.includes('/berita')){ history.back(); return false; }" class="btn-interactive btn-interactive-forest btn-interactive-lg">
                    <span class="btn-text-initial">Kembali ke Daftar Berita</span>
                    <div class="btn-text-hover">
                        <i class="fa-solid fa-arrow-left"></i>
                        <span>Kembali ke Daftar Berita</span>
                    </div>
                    <div class="btn-bubble"></div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
