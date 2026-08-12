@extends('layouts.admin')
@section('title', 'Edit Wisata')
@section('content')

<!-- Header Breadcrumb & Actions -->
<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
    <div>
        <div class="text-muted small mb-1">
            <a href="{{ route('admin.wisata.index') }}" class="text-decoration-none text-muted">
                <i class="fa-solid fa-map-location-dot me-1"></i> Data Wisata
            </a>
            <i class="fa-solid fa-chevron-right mx-2 text-muted small"></i>
            <span class="text-dark font-mono">Edit Destinasi</span>
        </div>
        <h4 class="fw-bold mb-0" style="color:var(--primary);">Edit Destinasi Wisata: {{ $wisata->nama }}</h4>
    </div>

    <div>
        <a href="{{ route('admin.wisata.index') }}" class="btn-interactive btn-interactive-forest btn-interactive-md">
            <span class="btn-text-initial">Kembali</span>
            <div class="btn-text-hover">
                <i class="fa-solid fa-arrow-left"></i>
                <span>Kembali</span>
            </div>
            <div class="btn-bubble"></div>
        </a>
    </div>
</div>

<form action="{{ route('admin.wisata.update', $wisata) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    @include('admin.wisata._form')

    <div class="mt-4 d-flex align-items-center justify-content-end gap-2 p-3 bg-white border rounded-4 shadow-sm">
        <a href="{{ route('admin.wisata.index') }}" class="btn btn-light border px-4 fw-semibold">Batal</a>
        <button type="submit" class="btn btn-primary px-5 fw-bold shadow-sm">
            <i class="fa-solid fa-pen-to-square me-1.5"></i> Update Data Wisata
        </button>
    </div>
</form>

{{-- ===== GALERI FOTO (form terpisah, di luar form utama) ===== --}}
<div class="row g-4 mt-1">
<div class="col-12">
    <div class="card border border-light-subtle shadow-sm rounded-4 p-4" id="section-galeri">
        <h6 class="fw-bold mb-1 d-flex align-items-center gap-2" style="color:var(--primary);">
            <i class="fa-solid fa-images" style="color:var(--accent);"></i> Galeri Foto
            <span class="badge rounded-pill ms-1" style="background:#1F3A34;font-size:0.72rem;">
                {{ $wisata->galleries->count() }} foto
            </span>
        </h6>
        <p class="text-muted small mb-4">Foto galeri akan tampil dalam grid di halaman detail wisata. Thumbnail utama + galeri = semua foto yang terlihat pengunjung.</p>

        @if(session('gallery_success'))
        <div class="alert alert-success alert-dismissible fade show py-2 mb-3" role="alert" style="border-radius:10px;">
            <i class="fa-solid fa-circle-check me-2"></i>{{ session('gallery_success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        {{-- Grid foto yang sudah ada --}}
        @if($wisata->galleries->count() > 0)
        <div class="row g-2 mb-4">
            @foreach($wisata->galleries as $gal)
            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                <div class="position-relative rounded-3 overflow-hidden border" style="aspect-ratio:4/3;background:#f0f0f0;">
                    <img src="{{ Storage::url($gal->foto) }}" alt="Galeri {{ $loop->iteration }}"
                         class="w-100 h-100" style="object-fit:cover;">
                    <form action="{{ route('admin.wisata.gallery.destroy', [$wisata, $gal]) }}" method="POST"
                          onsubmit="return confirm('Hapus foto ini dari galeri?');"
                          style="position:absolute;top:5px;right:5px;">
                        @csrf @method('DELETE')
                        <button type="submit"
                                class="btn btn-sm btn-danger p-0 d-flex align-items-center justify-content-center"
                                style="width:26px;height:26px;border-radius:50%;font-size:0.7rem;"
                                title="Hapus foto ini">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </form>
                    <span class="position-absolute bottom-0 start-0 m-1 badge bg-dark bg-opacity-60"
                          style="font-size:0.65rem;">#{{ $loop->iteration }}</span>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-4 mb-4 rounded-3" style="background:#f8f9fa;border:2px dashed #dde;">
            <i class="fa-regular fa-images fa-2x text-muted mb-2 d-block"></i>
            <p class="text-muted small mb-0">Belum ada foto galeri. Upload foto di bawah ini.</p>
        </div>
        @endif

        {{-- Form Upload Foto Baru (form TERPISAH dari form utama) --}}
        <form action="{{ route('admin.wisata.gallery.store', $wisata) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label class="form-label fw-semibold">Upload Foto Baru <span class="text-muted fw-normal">(bisa pilih banyak sekaligus)</span></label>
            <div class="input-group mb-2">
                <input type="file" name="fotos[]" id="galleryInput" class="form-control"
                       accept="image/*" multiple required>
                <button type="submit" class="btn px-4 fw-semibold"
                        style="background:#1F3A34;color:#fff;border-radius:0 8px 8px 0;">
                    <i class="fa-solid fa-upload me-1"></i> Upload
                </button>
            </div>
            <div class="form-text">Format: JPG, PNG, WEBP &bull; Maks. 3MB per foto &bull; Bisa pilih lebih dari satu file.</div>
            <div id="gallery-preview" class="row g-2 mt-2"></div>
        </form>
    </div>
</div>
</div>

<script>
    // Preview foto galeri sebelum upload
    document.addEventListener('DOMContentLoaded', function() {
        const galleryInput = document.getElementById('galleryInput');
        const galleryPreview = document.getElementById('gallery-preview');
        if (galleryInput && galleryPreview) {
            galleryInput.addEventListener('change', function(e) {
                galleryPreview.innerHTML = '';
                Array.from(e.target.files).forEach(function(file, idx) {
                    const reader = new FileReader();
                    reader.onload = function(evt) {
                        const col = document.createElement('div');
                        col.className = 'col-6 col-sm-4 col-md-3 col-lg-2';
                        col.innerHTML = `
                            <div class="position-relative rounded-3 overflow-hidden border" style="aspect-ratio:4/3;background:#e9ecef;">
                                <img src="${evt.target.result}" class="w-100 h-100" style="object-fit:cover;" alt="Preview ${idx+1}">
                                <span class="position-absolute top-0 start-0 m-1 badge" style="background:#1F3A34;font-size:0.65rem;">Baru</span>
                                <span class="position-absolute bottom-0 start-0 m-1 badge bg-dark bg-opacity-60" style="font-size:0.62rem;">${file.name.substring(0,14)}…</span>
                            </div>`;
                        galleryPreview.appendChild(col);
                    };
                    reader.readAsDataURL(file);
                });
            });
        }

        // Auto scroll ke section galeri jika ada flash gallery_success
        @if(session('gallery_success'))
        const galSection = document.getElementById('section-galeri');
        if (galSection) {
            setTimeout(() => galSection.scrollIntoView({ behavior: 'smooth', block: 'start' }), 200);
        }
        @endif
    });
</script>

@endsection