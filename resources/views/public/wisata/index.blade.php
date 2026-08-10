@extends('layouts.public')
@section('title', 'Destinasi Wisata — E-Catalog Magetan')

@push('styles')
<style>
/* =============================================
   FILTER CARD PREMIUM
============================================= */
.page-hero-wisata {
    background: linear-gradient(135deg, #0a2e1c 0%, #134e2c 50%, #1a6b3a 100%);
    padding: 70px 0 60px;
    position: relative;
    overflow: hidden;
}

.page-hero-wisata::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -20%;
    width: 600px;
    height: 600px;
    background: radial-gradient(circle, rgba(200,155,60,0.12) 0%, transparent 70%);
    pointer-events: none;
}

.filter-card-premium {
    background: #ffffff;
    border-radius: 18px;
    padding: 22px 24px;
    box-shadow: 0 12px 35px rgba(20, 38, 31, 0.08);
    border: 1px solid rgba(26, 107, 58, 0.12);
    margin-top: -38px;
    position: relative;
    z-index: 10;
}

/* =============================================
   21st.dev WISATA CARD SYSTEM
============================================= */
.wisata-card-21st {
    position: relative;
    height: 380px;
    border-radius: 22px;
    overflow: hidden;
    background: #0f221a;
    border: 1px solid rgba(255, 255, 255, 0.12);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    transition: transform 0.4s cubic-bezier(0.2, 0.6, 0.2, 1),
                box-shadow 0.4s cubic-bezier(0.2, 0.6, 0.2, 1),
                border-color 0.4s ease;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.wisata-card-21st:hover {
    transform: translateY(-8px) scale(1.01);
    box-shadow: 0 24px 50px rgba(10, 26, 18, 0.45), 0 0 0 1px rgba(200, 155, 60, 0.35);
    border-color: rgba(200, 155, 60, 0.4);
}

.wc-img-wrapper {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
    overflow: hidden;
}

.wc-bg-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.7s cubic-bezier(0.2, 0.6, 0.2, 1);
}

.wisata-card-21st:hover .wc-bg-img {
    transform: scale(1.09);
}

.wc-no-img {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #142e20, #0a1b13);
    color: rgba(255, 255, 255, 0.2);
    font-size: 3.5rem;
}

.wc-gradient-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(
        180deg,
        rgba(10, 22, 18, 0.65) 0%,
        rgba(10, 22, 18, 0.1) 32%,
        rgba(10, 22, 18, 0.4) 60%,
        rgba(8, 18, 14, 0.95) 100%
    );
    transition: opacity 0.3s ease;
}

.wc-top-bar {
    position: relative;
    z-index: 5;
    padding: 16px 18px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.wc-badge-category {
    background: rgba(15, 34, 26, 0.75);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    color: #fff;
    font-size: 0.75rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.6px;
    padding: 5px 12px;
    border-radius: 100px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
}

.wc-bottom-content {
    position: relative;
    z-index: 5;
    padding: 18px 20px 20px;
    margin-top: auto;
}

.wc-meta-row {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 8px;
    flex-wrap: wrap;
}

.wc-rating-pill, .wc-hours-pill {
    background: rgba(0, 0, 0, 0.45);
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    border: 1px solid rgba(255, 255, 255, 0.15);
    padding: 3px 9px;
    border-radius: 100px;
    font-size: 0.72rem;
    font-weight: 600;
    color: rgba(255, 255, 255, 0.9);
    display: inline-flex;
    align-items: center;
    gap: 4px;
}

.wc-title,
.wc-title a,
.wc-title span {
    font-family: 'Fraunces', serif;
    font-size: 1.3rem;
    font-weight: 700;
    line-height: 1.3;
    margin-bottom: 6px;
    color: #ffffff !important;
    text-decoration: none !important;
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.7);
}

.wc-title a:hover {
    color: var(--accent) !important;
}

.wc-location {
    font-size: 0.82rem;
    color: rgba(255, 255, 255, 0.82);
    display: flex;
    align-items: center;
    gap: 6px;
    margin-bottom: 14px;
    font-weight: 500;
}

.wc-location i {
    color: var(--accent);
}

.wc-footer-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 12px;
    border-top: 1px solid rgba(255, 255, 255, 0.12);
}

.wc-price-tag {
    display: flex;
    flex-direction: column;
}

.wc-price-label {
    font-size: 0.68rem;
    color: rgba(255, 255, 255, 0.6);
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-weight: 600;
}

.wc-price-val {
    font-family: 'IBM Plex Mono', monospace;
    font-size: 0.95rem;
    font-weight: 700;
    color: var(--accent-light, #ffd166);
}

.wc-explore-btn {
    position: relative;
    z-index: 6;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    border: 1px solid rgba(255, 255, 255, 0.25);
    color: #ffffff;
    font-size: 0.8rem;
    font-weight: 600;
    padding: 6px 14px;
    border-radius: 100px;
    text-decoration: none;
    transition: all 0.3s ease;
}

.wisata-card-21st:hover .wc-explore-btn {
    background: var(--accent);
    color: #14261F;
    border-color: var(--accent);
    transform: translateX(2px);
}

.wc-hitbox {
    position: absolute;
    inset: 0;
    z-index: 4;
    text-decoration: none;
}

/* === Pin Badge (Unggulan) === */
.wc-pinned-badge {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    background: linear-gradient(135deg, #C89B3C, #f5c842);
    color: #1a1a1a;
    font-size: 0.7rem;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.6px;
    padding: 4px 10px;
    border-radius: 100px;
    box-shadow: 0 3px 12px rgba(200, 155, 60, 0.5);
    z-index: 6;
    position: relative;
    animation: pinPulse 2.5s ease-in-out infinite;
}

@keyframes pinPulse {
    0%, 100% { box-shadow: 0 3px 12px rgba(200, 155, 60, 0.5); }
    50%       { box-shadow: 0 3px 20px rgba(200, 155, 60, 0.9); }
}

/* Origin UI Search Component Style (21st.dev inspired) */
.origin-ui-search-wrapper {
    position: relative;
    width: 100%;
}

.origin-ui-input {
    width: 100%;
    height: 44px;
    padding-left: 2.75rem !important;
    padding-right: 2.75rem !important;
    border-radius: 12px !important;
    border: 1px solid rgba(0, 0, 0, 0.12) !important;
    background-color: #ffffff !important;
    color: #1f2937 !important;
    font-size: 0.925rem;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
    transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1) !important;
}

.origin-ui-input::placeholder {
    color: #9ca3af;
}

.origin-ui-input:focus {
    border-color: #16a34a !important;
    box-shadow: 0 0 0 3px rgba(22, 163, 74, 0.2) !important;
    outline: none !important;
}

.origin-ui-input::-webkit-search-cancel-button,
.origin-ui-input::-webkit-search-decoration,
.origin-ui-input::-webkit-search-results-button,
.origin-ui-input::-webkit-search-results-decoration {
    -webkit-appearance: none;
    appearance: none;
}

.origin-ui-mic-btn {
    position: absolute;
    top: 50%;
    right: 6px;
    transform: translateY(-50%);
    width: 32px;
    height: 32px;
    border-radius: 8px;
    border: none;
    background: transparent;
    color: #6b7280;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 0.9rem;
    transition: all 0.2s ease;
    cursor: pointer;
    z-index: 5;
}

.origin-ui-mic-btn:hover {
    color: #16a34a;
    background-color: rgba(22, 163, 74, 0.1);
}

.origin-ui-mic-btn.listening {
    color: #dc2626;
    background-color: rgba(220, 38, 38, 0.12);
    animation: micPulse 1.2s infinite ease-in-out;
}

@keyframes micPulse {
    0% { transform: translateY(-50%) scale(1); }
    50% { transform: translateY(-50%) scale(1.18); }
    100% { transform: translateY(-50%) scale(1); }
}

.origin-ui-left-icon {
    position: absolute;
    top: 50%;
    left: 14px;
    transform: translateY(-50%);
    color: #6b7280;
    pointer-events: none;
    z-index: 5;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.95rem;
}
</style>
@endpush

@section('content')
{{-- Page Hero Header --}}
<div class="page-hero-wisata" data-aos="fade-down">
    <div class="container text-white pb-4">
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb" style="--bs-breadcrumb-divider-color:rgba(255,255,255,0.5);">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white text-decoration-none opacity-75">Beranda</a></li>
                <li class="breadcrumb-item active text-white">Wisata</li>
            </ol>
        </nav>
        <span class="badge mb-2 px-3 py-2" style="background:rgba(255,255,255,0.15);backdrop-filter:blur(8px);border:1px solid rgba(255,255,255,0.25);border-radius:100px;font-size:0.75rem;letter-spacing:1px;font-weight:700;">
            <i class="fa-solid fa-mountain-sun me-1"></i> PARIWISATA MAGETAN
        </span>
        <h1 class="fw-bold mb-2 display-6" style="font-family:'Plus Jakarta Sans',sans-serif;">Destinasi Wisata Magetan</h1>
        <p class="mb-0 text-white-50" style="font-size:1.05rem;">Temukan keindahan alam, budaya, dan pesona Kabupaten Magetan yang memukau</p>
    </div>
</div>

{{-- Filter Card --}}
<div class="container mb-4">
    <div class="filter-card-premium" data-aos="fade-up" data-aos-delay="150">
        <form action="{{ route('public.wisata') }}" method="GET">
            <div class="row g-3 align-items-center">
                <div class="col-lg-4 col-md-12">
                    <div class="origin-ui-search-wrapper">
                        <label for="search-input" class="visually-hidden">Search input</label>
                        <input 
                            type="search" 
                            id="search-input" 
                            name="q" 
                            class="form-control origin-ui-input" 
                            placeholder="Cari nama wisata atau alamat..." 
                            value="{{ request('q') }}"
                            autocomplete="off"
                        >
                        {{-- Left side search icon / spin loader --}}
                        <div class="origin-ui-left-icon">
                            <i id="search-spinner" class="fa-solid fa-circle-notch fa-spin text-success d-none"></i>
                            <i id="search-icon" class="fa-solid fa-magnifying-glass"></i>
                        </div>
                        
                        {{-- Right side microphone button for voice search --}}
                        <button 
                            type="button" 
                            id="mic-search-btn" 
                            class="origin-ui-mic-btn" 
                            aria-label="Press to speak"
                            title="Cari dengan suara (Bicara)"
                        >
                            <i class="fa-solid fa-microphone"></i>
                        </button>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <select name="kategori" class="form-select py-2" style="border-radius:10px;">
                        <option value="">Semua Kategori</option>
                        @foreach($kategoriList ?? [] as $kat)
                            <option value="{{ $kat }}" {{ request('kategori') == $kat ? 'selected' : '' }}>{{ $kat }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-3 col-md-4">
                    <select name="kecamatan" class="form-select py-2" style="border-radius:10px;">
                        <option value="">Semua Kecamatan</option>
                        @foreach($kecamatanList ?? [] as $kec)
                            <option value="{{ $kec }}" {{ request('kecamatan') == $kec ? 'selected' : '' }}>{{ $kec }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-2 col-md-4 d-grid">
                    <button type="submit" class="btn btn-warning fw-bold py-2" style="border-radius:10px;">
                        <i class="fa-solid fa-magnifying-glass me-2"></i>Filter
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- Cards Grid --}}
<div class="container py-4">
    @if(request('q') || request('kategori') || request('kecamatan'))
    <div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-2">
        <div class="text-muted small">
            Menampilkan hasil pencarian
            @if(request('q')) untuk "<strong>{{ request('q') }}</strong>"@endif
            @if(request('kategori')) kategori "<strong>{{ request('kategori') }}</strong>"@endif
            @if(request('kecamatan')) di kecamatan "<strong>{{ request('kecamatan') }}</strong>"@endif
            ({{ $wisata->total() }} destinasi ditemukan)
        </div>
        <a href="{{ route('public.wisata') }}" class="btn btn-sm btn-outline-secondary" style="border-radius:8px;">
            <i class="fa-solid fa-rotate-left me-1"></i>Reset Filter
        </a>
    </div>
    @endif

    <div class="row g-4">
        @forelse($wisata as $w)
        <div class="col-md-6 col-xl-4" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 80 }}">
            <div class="wisata-card-21st {{ $w->is_pinned ? 'is-pinned' : '' }}" data-tilt>
                {{-- Image Background --}}
                <div class="wc-img-wrapper">
                    @if($w->thumbnail)
                        <img src="{{ Storage::url($w->thumbnail) }}" alt="{{ $w->nama }}" class="wc-bg-img" loading="lazy">
                    @else
                        <div class="wc-no-img">
                            <i class="fa-solid fa-mountain-sun"></i>
                        </div>
                    @endif
                    <div class="wc-gradient-overlay"></div>
                </div>

                {{-- Top Floating Bar --}}
                <div class="wc-top-bar">
                    <div class="d-flex flex-column gap-2 align-items-start">
                        <span class="wc-badge-category">
                            @php
                            $katIcon = match($w->kategori) {
                                'Alam'     => 'fa-solid fa-tree',
                                'Budaya'   => 'fa-solid fa-landmark',
                                'Religi'   => 'fa-solid fa-mosque',
                                'Buatan'   => 'fa-solid fa-city',
                                'Edukasi'  => 'fa-solid fa-graduation-cap',
                                'Kuliner'  => 'fa-solid fa-utensils',
                                'Olahraga' => 'fa-solid fa-person-running',
                                'Desa'     => 'fa-solid fa-house-chimney-window',
                                default    => 'fa-solid fa-map-pin',
                            };
                            @endphp
                            <i class="{{ $katIcon }}" style="margin-right:5px;font-size:0.7rem;"></i>{{ $w->kategori }}
                        </span>
                        @if($w->is_pinned)
                        <span class="wc-pinned-badge">
                            <i class="fa-solid fa-thumbtack"></i> Unggulan
                        </span>
                        @endif
                    </div>

                    {{-- Like / Wishlist Button --}}
                    @auth
                    <button type="button"
                            class="wishlist-btn {{ auth()->user()->wishlist->contains($w->id) ? 'active' : '' }}"
                            data-id="{{ $w->id }}"
                            data-active="{{ auth()->user()->wishlist->contains($w->id) ? 'true' : 'false' }}"
                            title="{{ auth()->user()->wishlist->contains($w->id) ? 'Hapus dari Wisata Disukai' : 'Sukai Wisata Ini' }}"
                            aria-label="Sukai Wisata">
                        <i class="fa-heart {{ auth()->user()->wishlist->contains($w->id) ? 'fa-solid' : 'fa-regular' }}"></i>
                    </button>
                    @else
                    <a href="{{ route('login') }}"
                       class="wishlist-btn wishlist-btn-guest"
                       title="Login untuk menyukai wisata"
                       aria-label="Login untuk menyukai">
                        <i class="fa-regular fa-heart"></i>
                    </a>
                    @endauth
                </div>

                {{-- Bottom Floating Content --}}
                <div class="wc-bottom-content">
                    <div class="wc-meta-row">
                        @if($w->ratings_avg_rating)
                        <span class="wc-rating-pill">
                            <i class="fa-solid fa-star text-warning"></i>
                            {{ number_format($w->ratings_avg_rating, 1) }}
                            @if($w->ratings_count)
                                <small>({{ $w->ratings_count }})</small>
                            @endif
                        </span>
                        @endif

                        @if($w->jam_operasional)
                        <span class="wc-hours-pill" title="Jam Operasional">
                            <i class="fa-regular fa-clock"></i>
                            {{ Str::limit($w->jam_operasional, 18) }}
                        </span>
                        @endif
                    </div>

                    <h3 class="wc-title text-white">
                        <span class="text-white">{{ $w->nama }}</span>
                    </h3>

                    <p class="wc-location">
                        <i class="fa-solid fa-location-dot"></i>
                        <span>{{ $w->kecamatan }}, Magetan</span>
                    </p>

                    <div class="wc-footer-row">
                        <div class="wc-price-tag">
                            <span class="wc-price-label">Tiket Masuk</span>
                            <span class="wc-price-val">
                                {{ $w->harga_tiket > 0 ? 'Rp ' . number_format($w->harga_tiket, 0, ',', '.') : 'Gratis' }}
                            </span>
                        </div>

                        <a href="{{ route('public.wisata.detail', array_merge(['slug' => $w->slug], request()->query())) }}" class="btn-interactive btn-interactive-card btn-interactive-sm">
                            <span class="btn-text-initial">Detail</span>
                            <div class="btn-text-hover">
                                <span>Detail</span>
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>
                            <div class="btn-bubble"></div>
                        </a>
                    </div>
                </div>

                {{-- Full card clickable hitbox --}}
                <a href="{{ route('public.wisata.detail', array_merge(['slug' => $w->slug], request()->query())) }}" class="wc-hitbox" aria-label="{{ $w->nama }}"></a>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5 text-muted" data-aos="fade-up">
            <div style="width:80px;height:80px;background:rgba(26,107,58,0.1);border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:2rem;color:#1a6b3a;margin-bottom:16px;">
                <i class="fa-solid fa-map-location-dot"></i>
            </div>
            <h5 class="fw-bold">Tidak ada destinasi yang sesuai</h5>
            <p class="text-muted">Coba ubah kata kunci pencarian atau filter kategori/kecamatan.</p>
            <a href="{{ route('public.wisata') }}" class="btn btn-warning fw-bold px-4 py-2" style="border-radius:10px;">
                Tampilkan Semua Wisata
            </a>
        </div>
        @endforelse
    </div>

    <div class="mt-5 d-flex justify-content-center">
        {{ $wisata->links() }}
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search-input');
    const searchIcon = document.getElementById('search-icon');
    const searchSpinner = document.getElementById('search-spinner');
    const micBtn = document.getElementById('mic-search-btn');
    let typingTimer;

    if (searchInput) {
        searchInput.addEventListener('input', function() {
            if (this.value.trim().length > 0) {
                searchIcon.classList.add('d-none');
                searchSpinner.classList.remove('d-none');

                clearTimeout(typingTimer);
                typingTimer = setTimeout(function() {
                    searchSpinner.classList.add('d-none');
                    searchIcon.classList.remove('d-none');
                }, 400);
            } else {
                searchSpinner.classList.add('d-none');
                searchIcon.classList.remove('d-none');
            }
        });
    }

    // Voice Search Feature (Web Speech API)
    if (micBtn && searchInput) {
        const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
        if (SpeechRecognition) {
            const recognition = new SpeechRecognition();
            recognition.lang = 'id-ID';
            recognition.interimResults = false;
            recognition.maxAlternatives = 1;

            micBtn.addEventListener('click', function() {
                if (micBtn.classList.contains('listening')) {
                    recognition.stop();
                } else {
                    try {
                        recognition.start();
                    } catch(e) {}
                }
            });

            recognition.onstart = function() {
                micBtn.classList.add('listening');
                searchInput.placeholder = 'Mendengarkan... Bicara sekarang';
            };

            recognition.onend = function() {
                micBtn.classList.remove('listening');
                searchInput.placeholder = 'Cari nama wisata atau alamat...';
            };

            recognition.onresult = function(event) {
                const transcript = event.results[0][0].transcript;
                searchInput.value = transcript;
                searchIcon.classList.add('d-none');
                searchSpinner.classList.remove('d-none');
                setTimeout(() => {
                    searchInput.form.submit();
                }, 300);
            };

            recognition.onerror = function(event) {
                micBtn.classList.remove('listening');
                searchInput.placeholder = 'Cari nama wisata atau alamat...';
            };
        } else {
            micBtn.addEventListener('click', function() {
                alert('Fitur pencarian suara tidak didukung di browser ini. Silakan ketik nama wisata secara manual.');
            });
        }
    }
});
</script>
@endpush
@endsection