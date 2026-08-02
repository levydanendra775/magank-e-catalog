@extends('layouts.public')
@section('title', 'Event & Agenda — E-Catalog Magetan')

@push('styles')
<style>
.event-card-3d {
    border-radius: 20px;
    overflow: hidden;
    height: 360px;
    position: relative;
    cursor: pointer;
    transform-style: preserve-3d;
    transition: box-shadow 0.4s cubic-bezier(0.2,0.6,0.2,1), transform 0.1s ease-out;
    will-change: transform;
    display: block;
    text-decoration: none;
    background: #0f221a;
    border: 1px solid rgba(255, 255, 255, 0.12);
}

.event-card-3d:hover {
    box-shadow: 0 32px 72px rgba(0,0,0,0.35), 0 0 0 1px rgba(200,155,60,0.25);
}

.event-card-3d .ec-img {
    position: absolute;
    inset: 0;
    width: 100%; height: 100%;
    object-fit: cover;
    transition: transform 0.6s cubic-bezier(0.2,0.6,0.2,1);
}

.event-card-3d:hover .ec-img { transform: scale(1.08); }

.event-card-3d .ec-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(to bottom, rgba(0,0,0,0.65) 0%, rgba(0,0,0,0.1) 40%, rgba(10,22,18,0.4) 60%, rgba(8,18,14,0.95) 100%);
    transition: opacity 0.3s;
}

.event-card-3d .ec-nophoto {
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, #142e20, #0a1b13);
    display: flex; align-items: center; justify-content: center;
    font-size: 3rem; color: rgba(255,255,255,0.2);
}

.event-card-3d .ec-arrow {
    width: 38px; height: 38px;
    border-radius: 50%;
    background: rgba(255,255,255,0.15);
    border: 1.5px solid rgba(255,255,255,0.35);
    backdrop-filter: blur(8px);
    display: flex; align-items: center; justify-content: center;
    color: #fff;
    font-size: 0.85rem;
    transition: all 0.25s cubic-bezier(0.2,0.6,0.2,1);
    transform: rotate(-45deg);
}

.event-card-3d:hover .ec-arrow {
    background: var(--accent);
    border-color: var(--accent);
    color: var(--primary-dark);
    transform: rotate(0deg);
    box-shadow: 0 4px 16px rgba(200,155,60,0.5);
}

.event-card-3d::after {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 2px;
    background: linear-gradient(90deg, transparent, rgba(200,155,60,0.8), transparent);
    opacity: 0;
    transition: opacity 0.35s;
    z-index: 4;
    border-radius: 20px 20px 0 0;
}
.event-card-3d:hover::after { opacity: 1; }
</style>
@endpush

@section('content')
<div style="background:linear-gradient(135deg,#0a3d1f,#1a6b3a);padding:70px 0 60px;" data-aos="fade-down">
    <div class="container text-white">
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb" style="--bs-breadcrumb-divider-color:rgba(255,255,255,0.5);">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white text-decoration-none opacity-75">Beranda</a></li>
                <li class="breadcrumb-item active text-white">Event & Agenda</li>
            </ol>
        </nav>
        <span class="badge mb-2 px-3 py-2" style="background:rgba(255,255,255,0.15);backdrop-filter:blur(8px);border:1px solid rgba(255,255,255,0.25);border-radius:100px;font-size:0.75rem;letter-spacing:1px;font-weight:700;">
            <i class="fa-solid fa-calendar-days me-1 text-warning"></i> AGENDA PARIWISATA
        </span>
        <h1 class="fw-bold mb-2" style="font-family:'Plus Jakarta Sans',sans-serif;">Event & Agenda Wisata Magetan</h1>
        <p class="mb-0 text-white-50">Jangan lewatkan berbagai acara festival, seni budaya, dan kalender wisata seru di Magetan</p>
    </div>
</div>

<div class="container py-5">
    <div class="row g-4">
        @forelse($events as $event)
        <div class="col-md-6 col-xl-4" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 80 }}">
            <div class="event-card-3d" data-tilt>
                @if($event->poster)
                    <img class="ec-img" src="{{ Storage::url($event->poster) }}" alt="{{ $event->judul }}" loading="lazy">
                @else
                    <div class="ec-nophoto">
                        <i class="fa-solid fa-calendar-star"></i>
                    </div>
                @endif

                <div class="ec-overlay"></div>

                {{-- Top: Date Badge & Arrow --}}
                <div class="d-flex justify-content-between align-items-start" style="position:absolute;top:18px;left:18px;right:18px;z-index:3;">
                    <div style="background:var(--accent);color:var(--primary-dark);border-radius:12px;padding:6px 14px;text-align:center;box-shadow:0 4px 14px rgba(0,0,0,0.3);backdrop-filter:blur(8px);">
                        <div style="font-size:1.2rem;line-height:1;font-weight:800;font-family:'Plus Jakarta Sans',sans-serif;">{{ $event->tanggal->format('d') }}</div>
                        <div style="font-size:0.68rem;text-transform:uppercase;letter-spacing:0.5px;font-weight:700;">{{ $event->tanggal->format('M Y') }}</div>
                    </div>
                    <div class="ec-arrow">
                        <i class="fa-solid fa-arrow-up-right-from-square" style="font-size:0.8rem;"></i>
                    </div>
                </div>

                {{-- Bottom: Title, Location & Time --}}
                <div style="position:absolute;bottom:18px;left:18px;right:18px;z-index:3;">
                    <h3 class="text-white fw-bold mb-2" style="font-family:'Fraunces',serif;font-size:1.15rem;line-height:1.3;text-shadow:0 2px 10px rgba(0,0,0,0.7);">
                        {{ Str::limit($event->judul, 50) }}
                    </h3>
                    <div class="d-flex align-items-center gap-2 flex-wrap mb-2">
                        <span style="background:rgba(15,34,26,0.85);backdrop-filter:blur(8px);color:#fff;border:1px solid rgba(255,255,255,0.2);font-size:0.72rem;font-weight:600;padding:4px 10px;border-radius:100px;">
                            <i class="fa-solid fa-location-dot me-1 text-warning"></i>{{ Str::limit($event->lokasi, 26) }}
                        </span>
                        @if($event->jam)
                        <span style="background:rgba(10,22,18,0.75);backdrop-filter:blur(8px);color:#fff;border:1px solid rgba(255,255,255,0.15);font-size:0.72rem;font-weight:600;padding:4px 10px;border-radius:100px;">
                            <i class="fa-regular fa-clock me-1"></i>{{ $event->jam }}
                        </span>
                        @endif
                    </div>
                    <p class="mb-0 text-white-50 small" style="font-size:0.75rem;line-height:1.4;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;text-shadow:0 1px 4px rgba(0,0,0,0.7);">
                        {{ Str::limit(strip_tags($event->deskripsi), 90) }}
                    </p>
                </div>

                {{-- Hitbox --}}
                <a href="{{ route('public.event.detail', $event->id) }}" class="position-absolute inset-0 w-100 h-100" style="z-index:4;" aria-label="{{ $event->judul }}"></a>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5 text-muted">
            <i class="fa-solid fa-calendar-days fa-3x mb-3 opacity-25"></i>
            <p>Belum ada event yang dijadwalkan.</p>
        </div>
        @endforelse
    </div>
    <div class="mt-4">{{ $events->links() }}</div>
</div>

@push('scripts')
<script>
document.querySelectorAll('[data-tilt]').forEach(card => {
    let bounds = null;
    const INTENSITY = 14;
    const SCALE = 1.02;

    function rotateCard(e) {
        if (!bounds) bounds = card.getBoundingClientRect();
        const mouseX = e.clientX - bounds.left;
        const mouseY = e.clientY - bounds.top;
        const centerX = bounds.width / 2;
        const centerY = bounds.height / 2;
        const rotateX = -((mouseY - centerY) / centerY) * INTENSITY;
        const rotateY = ((mouseX - centerX) / centerX) * INTENSITY;
        card.style.transform = `perspective(800px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale(${SCALE})`;
    }

    function resetCard() {
        card.style.transition = 'transform 0.5s cubic-bezier(0.2, 0.6, 0.2, 1), box-shadow 0.4s cubic-bezier(0.2,0.6,0.2,1)';
        card.style.transform = 'perspective(800px) rotateX(0) rotateY(0) scale(1)';
        bounds = null;
    }

    card.addEventListener('mouseenter', () => {
        bounds = card.getBoundingClientRect();
        card.style.transition = 'box-shadow 0.4s cubic-bezier(0.2,0.6,0.2,1)';
    });
    card.addEventListener('mousemove', rotateCard);
    card.addEventListener('mouseleave', resetCard);
});
</script>
@endpush
@endsection