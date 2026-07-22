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
            <a href="{{ route('public.berita.detail', $b->id) }}" class="text-decoration-none">
            <div class="card border-0 shadow-sm h-100" style="border-radius:16px;border:1px solid #e2e8f0!important;overflow:hidden;transition:all 0.3s;cursor:pointer;" onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 12px 32px rgba(0,0,0,0.12)';" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='';">
                @if($b->thumbnail)
                    <img src="{{ Storage::url($b->thumbnail) }}" style="height:210px;object-fit:cover;width:100%;" alt="{{ $b->judul }}">
                @else
                    <div class="d-flex align-items-center justify-content-center" style="height:210px;background:#e9f7ef;"><i class="fa-regular fa-newspaper fa-3x" style="color:#1a6b3a;opacity:0.3;"></i></div>
                @endif
                <div class="card-body p-4">
                    <p class="text-muted small mb-2"><i class="fa-regular fa-calendar me-1"></i>{{ $b->created_at->format('d M Y') }}</p>
                    <h6 class="fw-bold mb-2" style="font-family:'Plus Jakarta Sans',sans-serif;color:#1a1a1a;">{{ $b->judul }}</h6>
                    <p class="text-muted small mb-0">{{ Str::limit(strip_tags($b->isi), 100) }}</p>
                </div>
            </div>
            </a>
        </div>
        @empty
        <div class="col-12 text-center py-5 text-muted"><i class="fa-regular fa-newspaper fa-3x mb-3 opacity-25"></i><p>Belum ada berita.</p></div>
        @endforelse
    </div>
    <div class="mt-4">{{ $berita->links() }}</div>
</div>
@endsection