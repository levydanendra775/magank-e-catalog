@extends('layouts.public')
@section('title', $wisata->nama.' — E-Catalog Magetan')
@section('content')
@php
    // Siapkan URL Google Maps yang selalu valid berdasarkan nama + alamat + kecamatan
    $query = $wisata->nama . ' ' . $wisata->alamat . ' ' . $wisata->kecamatan . ' Magetan';
    $mapsSearchUrl = 'https://www.google.com/maps/search/?api=1&query=' . urlencode($query);

    // Embed URL dari koordinat jika tersedia, fallback ke pencarian nama
    if ($wisata->latitude && $wisata->longitude) {
        $embedUrl = 'https://maps.google.com/maps?q=' . $wisata->latitude . ',' . $wisata->longitude . '&output=embed&z=16';
        $mapsSearchUrl = 'https://www.google.com/maps/search/?api=1&query=' . $wisata->latitude . ',' . $wisata->longitude;
    } else {
        $embedUrl = 'https://maps.google.com/maps?q=' . urlencode($query) . '&output=embed&z=16';
    }

    // Jika ada link maps dari DB dan valid (punya path), gunakan itu sebagai link tombol
    $storedMaps = $wisata->maps;
    $parsedUrl = $storedMaps ? parse_url($storedMaps) : null;
    $hasValidPath = $parsedUrl && isset($parsedUrl['path']) && strlen(trim($parsedUrl['path'], '/')) > 0;
    $finalMapsUrl = ($storedMaps && $hasValidPath) ? $storedMaps : $mapsSearchUrl;

    // Override embed jika link DB adalah format embed
    if ($storedMaps && str_contains($storedMaps, 'google.com/maps/embed')) {
        $embedUrl = $storedMaps;
    }
@endphp

{{-- Hero Banner --}}
@if($wisata->thumbnail)
    <div style="height:420px;overflow:hidden;position:relative;">
        <img src="{{ Storage::url($wisata->thumbnail) }}" alt="{{ $wisata->nama }}" style="width:100%;height:100%;object-fit:cover;">
        <div style="position:absolute;inset:0;background:linear-gradient(to top,rgba(0,0,0,0.6) 0%,transparent 55%);"></div>

        @auth
        <button type="button" class="wishlist-btn" data-id="{{ $wisata->id }}"
            data-active="{{ auth()->user()->wishlist->contains($wisata->id) ? 'true' : 'false' }}"
            style="position:absolute;top:20px;right:20px;background:rgba(0,0,0,0.5);border:none;border-radius:50%;width:44px;height:44px;color:#fff;font-size:1.2rem;z-index:2;">
            ❤
        </button>
        @endauth

        <div style="position:absolute;bottom:32px;left:0;right:0;" class="container">
            <span class="badge mb-2" style="background:#1a6b3a;font-size:0.8rem;padding:6px 14px;border-radius:100px;">{{ $wisata->kategori }}</span>
            <h1 class="text-white fw-bold mb-1" style="font-family:'Plus Jakarta Sans',sans-serif;text-shadow:0 2px 8px rgba(0,0,0,0.4);">{{ $wisata->nama }}</h1>
            <p class="text-white mb-0" style="opacity:0.85;"><i class="fa-solid fa-location-dot me-1"></i>{{ $wisata->alamat }}, {{ $wisata->kecamatan }}</p>
        </div>
    </div>
@else
    <div style="background:linear-gradient(135deg,#0a3d1f,#1a6b3a);padding:60px 0;position:relative;">
        <div class="container text-white">
            <span class="badge mb-2" style="background:rgba(255,255,255,0.2);font-size:0.8rem;padding:6px 14px;border-radius:100px;">{{ $wisata->kategori }}</span>
            <h1 class="fw-bold mb-1" style="font-family:'Plus Jakarta Sans',sans-serif;">{{ $wisata->nama }}</h1>
            <p class="mb-0" style="opacity:0.8;"><i class="fa-solid fa-location-dot me-1"></i>{{ $wisata->alamat }}, {{ $wisata->kecamatan }}</p>
        </div>

        @auth
        <button type="button" class="wishlist-btn" data-id="{{ $wisata->id }}"
            data-active="{{ auth()->user()->wishlist->contains($wisata->id) ? 'true' : 'false' }}"
            style="position:absolute;top:20px;right:20px;background:rgba(0,0,0,0.5);border:none;border-radius:50%;width:44px;height:44px;color:#fff;font-size:1.2rem;z-index:2;">
            ❤
        </button>
        @endauth
    </div>
@endif

<div class="container py-5">
    <div class="row g-4">

        {{-- Kolom Kiri: Informasi Utama --}}
        <div class="col-lg-8">

            {{-- Breadcrumb --}}
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none" style="color:#1a6b3a;">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('public.wisata') }}" class="text-decoration-none" style="color:#1a6b3a;">Wisata</a></li>
                    <li class="breadcrumb-item active text-muted">{{ $wisata->nama }}</li>
                </ol>
            </nav>

            {{-- Judul jika tidak ada thumbnail --}}
            @if(!$wisata->thumbnail)
            <span class="badge mb-3" style="background:#1a6b3a;font-size:0.8rem;padding:6px 14px;border-radius:100px;">{{ $wisata->kategori }}</span>
            <h1 style="font-family:'Plus Jakarta Sans',sans-serif;font-weight:800;">{{ $wisata->nama }}</h1>
            <p class="text-muted mb-4"><i class="fa-solid fa-location-dot me-1"></i>{{ $wisata->alamat }}, {{ $wisata->kecamatan }}</p>
            @endif

            {{-- Info Cards --}}
            <div class="row g-3 mb-4">
                <div class="col-sm-6">
                    <div class="d-flex align-items-start gap-3 p-3 rounded-3" style="background:#f0fff4;border:1px solid #b7ebc8;">
                        <div style="width:38px;height:38px;background:#1a6b3a;border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <i class="fa-solid fa-ticket text-white" style="font-size:0.9rem;"></i>
                        </div>
                        <div>
                            <div class="fw-semibold small text-muted mb-1">Harga Tiket</div>
                            <div class="fw-bold" style="color:#333;">{{ $wisata->harga_tiket > 0 ? 'Rp '.number_format($wisata->harga_tiket,0,',','.') : 'Gratis' }}</div>
                        </div>
                    </div>
                </div>

                @if($wisata->jam_operasional)
                <div class="col-sm-6">
                    <div class="d-flex align-items-start gap-3 p-3 rounded-3" style="background:#f0f4ff;border:1px solid #c7d4fb;">
                        <div style="width:38px;height:38px;background:#4361ee;border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <i class="fa-regular fa-clock text-white" style="font-size:0.9rem;"></i>
                        </div>
                        <div>
                            <div class="fw-semibold small text-muted mb-1">Jam Operasional</div>
                            <div class="fw-bold" style="color:#333;">{{ $wisata->jam_operasional }}</div>
                        </div>
                    </div>
                </div>
                @endif

                @if($wisata->kecamatan)
                <div class="col-sm-6">
                    <div class="d-flex align-items-start gap-3 p-3 rounded-3" style="background:#fff0f3;border:1px solid #fbc8d4;">
                        <div style="width:38px;height:38px;background:#e63946;border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <i class="fa-solid fa-location-dot text-white" style="font-size:0.9rem;"></i>
                        </div>
                        <div>
                            <div class="fw-semibold small text-muted mb-1">Kecamatan</div>
                            <div class="fw-bold" style="color:#333;">{{ $wisata->kecamatan }}</div>
                        </div>
                    </div>
                </div>
                @endif

                @if($wisata->fasilitas)
                <div class="col-sm-6">
                    <div class="d-flex align-items-start gap-3 p-3 rounded-3" style="background:#fff8f0;border:1px solid #fde8c8;">
                        <div style="width:38px;height:38px;background:#fd7e14;border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <i class="fa-solid fa-star text-white" style="font-size:0.9rem;"></i>
                        </div>
                        <div>
                            <div class="fw-semibold small text-muted mb-1">Fasilitas</div>
                            <div style="color:#333;font-size:0.92rem;">{{ $wisata->fasilitas }}</div>
                        </div>
                    </div>
                </div>
                @endif
            </div>

            {{-- Deskripsi --}}
            @if($wisata->deskripsi)
            <div class="mb-5">
                <h5 class="fw-bold mb-3" style="font-family:'Plus Jakarta Sans',sans-serif;">Tentang Tempat Ini</h5>
                <div style="line-height:1.9;color:#444;white-space:pre-line;text-align:justify;">{{ $wisata->deskripsi }}</div>
            </div>
            @endif

            {{-- Rating & Ulasan --}}
            <div class="mb-5" id="ulasan">
                {{-- Header --}}
                <div class="d-flex align-items-center gap-3 mb-4">
                    <h5 class="fw-bold mb-0" style="font-family:'Plus Jakarta Sans',sans-serif;">
                        Ulasan & Rating
                    </h5>
                    <div class="d-flex align-items-center gap-1 px-3 py-1 rounded-pill" style="background:#fff8e1;">
                        <i class="fa-solid fa-star" style="color:#fd7e14; font-size:0.9rem;"></i>
                        <strong style="color:#fd7e14;">{{ number_format($wisata->ratings_avg_rating ?? 0, 1) }}</strong>
                        <span class="text-muted" style="font-size:0.8rem;">({{ $wisata->ratings_count ?? 0 }} ulasan)</span>
                    </div>
                </div>

                {{-- Alert status --}}
                @if(session('status'))
                <div class="alert alert-success alert-dismissible fade show py-2 mb-3" role="alert" style="border-radius:10px;">
                    <i class="fa-solid fa-circle-check me-2"></i>{{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif

                @auth
                @php $myRating = $wisata->ratings->firstWhere('user_id', auth()->id()); @endphp

                @if($myRating)
                {{-- User sudah punya ulasan: tampilkan ulasan dengan tombol hapus saja --}}
                <div class="mb-4 p-3 rounded-3" style="background:#f8f9fa; border:1px solid #e2e8f0;">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <p class="fw-semibold small mb-0" style="color:#1a6b3a;"><i class="fa-solid fa-circle-check me-1"></i>Ulasan Anda Sudah Terkirim</p>
                        <form action="{{ route('rating.destroy', $wisata) }}" method="POST"
                              onsubmit="return confirm('Hapus ulasan Anda?');">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger" style="font-size:0.78rem; padding:2px 10px;">
                                <i class="fa-solid fa-trash me-1"></i>Hapus Ulasan
                            </button>
                        </form>
                    </div>
                    <div class="d-flex align-items-center gap-1 mb-2">
                        @for($i = 1; $i <= 5; $i++)
                            <i class="fa-{{ $i <= $myRating->rating ? 'solid' : 'regular' }} fa-star" style="color:#fd7e14; font-size:0.85rem;"></i>
                        @endfor
                        <span class="text-muted ms-1" style="font-size:0.78rem;">({{ $myRating->rating }}/5)</span>
                    </div>
                    @if($myRating->komentar)
                    <p class="mb-0" style="font-size:0.9rem; color:#444; line-height:1.7;">{{ $myRating->komentar }}</p>
                    @else
                    <p class="mb-0 text-muted fst-italic" style="font-size:0.85rem;">— tidak ada komentar —</p>
                    @endif
                </div>
                @else
                {{-- Belum ada ulasan: form kirim baru --}}
                <form action="{{ route('rating.store', $wisata) }}" method="POST" class="mb-4 p-3 rounded-3" style="background:#f8f9fa; border:1px solid #e2e8f0;">
                    @csrf
                    <p class="fw-semibold small mb-2" style="color:#1a6b3a;"><i class="fa-solid fa-pen-to-square me-1"></i>Tulis Ulasan Anda</p>
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <label class="small fw-semibold mb-0 text-muted">Rating:</label>
                        <select name="rating" class="form-select form-select-sm" required style="max-width:120px;">
                            @for ($i = 5; $i >= 1; $i--)
                                <option value="{{ $i }}">{{ $i }} ⭐</option>
                            @endfor
                        </select>
                    </div>
                    <textarea name="komentar" class="form-control mb-2" rows="3" placeholder="Tulis ulasanmu..." style="font-size:0.9rem;"></textarea>
                    <button type="submit" class="btn btn-sm" style="background:#1a6b3a;color:#fff;font-size:0.85rem;">
                        <i class="fa-solid fa-paper-plane me-1"></i>Kirim Ulasan
                    </button>
                </form>
                @endif

                @else
                <div class="mb-4 p-3 rounded-3 text-center" style="background:#f8f9fa; border:1px dashed #ccc;">
                    <p class="text-muted mb-0 small">
                        <a href="{{ route('login') }}" style="color:#1a6b3a; font-weight:600;">Login</a> terlebih dahulu untuk memberikan ulasan.
                    </p>
                </div>
                @endauth

                {{-- Daftar Semua Ulasan --}}
                <div id="daftar-ulasan">
                    @forelse ($wisata->ratings as $r)
                    <div class="py-3" style="border-bottom:1px solid #f0f0f0;">
                        {{-- Header Ulasan --}}
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="d-flex align-items-center gap-2">
                                <div style="width:38px;height:38px;border-radius:50%;background:linear-gradient(135deg,#1a6b3a,#20c997);display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;font-size:0.9rem;flex-shrink:0;">
                                    {{ strtoupper(substr($r->user->name, 0, 1)) }}
                                </div>
                                <div>
                                    <strong style="font-size:0.9rem;">{{ $r->user->name }}</strong>
                                    <div class="text-muted" style="font-size:0.73rem;">
                                        <i class="fa-regular fa-clock me-1"></i>{{ $r->created_at->translatedFormat('d F Y, H:i') }}
                                        @if($r->updated_at->gt($r->created_at->addSeconds(5)))
                                            <span class="ms-1">(diedit)</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="text-warning" style="font-size:0.85rem; letter-spacing:1px; flex-shrink:0;">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fa-{{ $i <= $r->rating ? 'solid' : 'regular' }} fa-star"></i>
                                @endfor
                                <span class="text-muted ms-1" style="font-size:0.75rem;">({{ $r->rating }}/5)</span>
                            </div>
                        </div>

                        {{-- Komentar --}}
                        @if($r->komentar)
                        <p class="mt-2 mb-2" style="font-size:0.9rem; color:#444; line-height:1.7;">{{ $r->komentar }}</p>
                        @else
                        <p class="mt-2 mb-2 text-muted fst-italic" style="font-size:0.85rem;">— tidak ada komentar —</p>
                        @endif

                        {{-- Balasan Admin --}}
                        @if($r->admin_reply)
                        <div class="mt-2 p-3 rounded-3" style="background:#e9f7ef; border-left:3px solid #1a6b3a; margin-left:10px;">
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <i class="fa-solid fa-shield-halved" style="color:#1a6b3a; font-size:0.8rem;"></i>
                                <strong style="color:#1a6b3a; font-size:0.82rem;">Dinas Pariwisata & Kebudayaan</strong>
                                <span class="text-muted" style="font-size:0.72rem;">
                                    · <i class="fa-regular fa-clock me-1"></i>{{ $r->admin_replied_at?->translatedFormat('d F Y, H:i') }}
                                </span>
                            </div>
                            <p class="mb-0" style="font-size:0.88rem; color:#2d6a4f; line-height:1.65;">{{ $r->admin_reply }}</p>
                        </div>
                        @endif

                        {{-- Tombol Like --}}
                        <div class="mt-2 d-flex align-items-center gap-1">
                            @auth
                            <button
                                class="btn-like d-flex align-items-center gap-1"
                                data-rating-id="{{ $r->id }}"
                                data-liked="{{ session()->has('liked_rating_'.$r->id.'_'.auth()->id()) ? 'true' : 'false' }}"
                                style="border:1px solid #dee2e6; background:transparent; border-radius:20px; padding:3px 10px; font-size:0.8rem; cursor:pointer; transition:all 0.2s; color:#6c757d;"
                            >
                                <i class="fa-{{ session()->has('liked_rating_'.$r->id.'_'.auth()->id()) ? 'solid' : 'regular' }} fa-thumbs-up" style="font-size:0.85rem;"></i>
                                <span class="like-count">{{ $r->likes }}</span>
                            </button>
                            @else
                            <span class="d-flex align-items-center gap-1" style="border:1px solid #dee2e6; border-radius:20px; padding:3px 10px; font-size:0.8rem; color:#6c757d;">
                                <i class="fa-regular fa-thumbs-up" style="font-size:0.85rem;"></i>
                                <span>{{ $r->likes }}</span>
                            </span>
                            @endauth
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-4 text-muted">
                        <i class="fa-regular fa-comment-dots fa-2x mb-2 d-block opacity-25"></i>
                        <p class="mb-0 small">Belum ada ulasan. Jadilah yang pertama memberi ulasan!</p>
                    </div>
                    @endforelse
                </div>
            </div>

            {{-- Tombol Aksi --}}
            <div class="d-flex flex-wrap gap-2">
                <a href="{{ $finalMapsUrl }}" target="_blank" rel="noopener noreferrer"
                   class="btn btn-danger px-4 py-2"
                   style="border-radius:10px;font-weight:600;background:#e63946;border-color:#e63946;">
                    <i class="fa-solid fa-map-location-dot me-2"></i>Buka di Google Maps
                </a>
                <a href="{{ route('public.wisata') }}"
                   class="btn btn-outline-secondary px-4 py-2"
                   style="border-radius:10px;font-weight:600;">
                    <i class="fa-solid fa-arrow-left me-2"></i>Kembali
                </a>
            </div>
        </div>

        {{-- Kolom Kanan: Peta --}}
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm" style="border-radius:16px;overflow:hidden;position:sticky;top:80px;">
                <div class="card-header py-3 px-4 border-0" style="background:#f8f9fa;">
                    <h6 class="fw-bold mb-0" style="font-family:'Plus Jakarta Sans',sans-serif;">
                        <i class="fa-solid fa-map-location-dot me-2" style="color:#e63946;"></i>Lokasi
                    </h6>
                </div>
                <div class="card-body p-0">
                    <iframe
                        src="{{ $embedUrl }}"
                        width="100%"
                        height="300"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
                <div class="card-footer border-0 p-3" style="background:#f8f9fa;">
                    <a href="{{ $finalMapsUrl }}" target="_blank" rel="noopener noreferrer"
                       class="btn btn-danger w-100"
                       style="border-radius:10px;font-weight:600;background:#e63946;border-color:#e63946;">
                        <i class="fa-solid fa-diamond-turn-right me-2"></i>Petunjuk Arah
                    </a>
                </div>
            </div>

            {{-- Koordinat (jika ada) --}}
            @if($wisata->latitude && $wisata->longitude)
            <div class="mt-3 p-3 rounded-3" style="background:#f8f9fa;border:1px solid #e2e8f0;">
                <div class="small text-muted mb-1 fw-semibold">Koordinat GPS</div>
                <code style="font-size:0.8rem;color:#555;">{{ $wisata->latitude }}, {{ $wisata->longitude }}</code>
            </div>
            @endif
        </div>

    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

    document.querySelectorAll('.btn-like').forEach(function (btn) {
        // Set initial visual state
        updateLikeBtn(btn, btn.dataset.liked === 'true');

        btn.addEventListener('click', function () {
            const ratingId = this.dataset.ratingId;

            fetch('/rating/' + ratingId + '/like', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                },
            })
            .then(res => res.json())
            .then(data => {
                this.dataset.liked = data.liked ? 'true' : 'false';
                this.querySelector('.like-count').textContent = data.likes;
                updateLikeBtn(this, data.liked);

                // Bounce animation
                this.style.transform = 'scale(1.2)';
                setTimeout(() => { this.style.transform = 'scale(1)'; }, 200);
            })
            .catch(() => {});
        });
    });

    function updateLikeBtn(btn, liked) {
        const icon = btn.querySelector('i');
        if (liked) {
            btn.style.color = '#1a6b3a';
            btn.style.borderColor = '#1a6b3a';
            btn.style.background = '#f0fff4';
            icon.className = 'fa-solid fa-thumbs-up';
            icon.style.fontSize = '0.85rem';
        } else {
            btn.style.color = '#6c757d';
            btn.style.borderColor = '#dee2e6';
            btn.style.background = 'transparent';
            icon.className = 'fa-regular fa-thumbs-up';
            icon.style.fontSize = '0.85rem';
        }
    }
});
</script>
@endpush