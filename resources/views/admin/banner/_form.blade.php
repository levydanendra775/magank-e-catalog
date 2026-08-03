@php $item = $banner ?? null; @endphp

<div class="row g-4">
    <div class="col-12">
        <div class="card border border-light-subtle shadow-sm rounded-4 p-4">
            <h6 class="fw-bold mb-3 d-flex align-items-center gap-2" style="color:var(--primary);">
                <i class="fa-solid fa-panorama" style="color:var(--accent);"></i> Form Banner Slider
            </h6>
            <div class="row g-3">
                <div class="col-md-9">
                    <label class="form-label fw-semibold">Judul Banner <span class="text-danger">*</span></label>
                    <input type="text" name="judul" class="form-control" value="{{ old('judul', $item?->judul) }}" placeholder="Contoh: Promo Wisata Akhir Tahun" required>
                </div>

                <div class="col-md-3">
                    <label class="form-label fw-semibold">Urutan Tampil <span class="text-danger">*</span></label>
                    <input type="number" name="urutan" class="form-control" value="{{ old('urutan', $item?->urutan ?? 1) }}" min="1" required>
                </div>

                <div class="col-12">
                    <label class="form-label fw-semibold">Link / Tautan URL Tujuan</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="fa-solid fa-link text-muted"></i></span>
                        <input type="url" name="link" class="form-control" value="{{ old('link', $item?->link) }}" placeholder="https://contoh-link.com (Opsional)">
                    </div>
                </div>

                <div class="col-12 mt-4">
                    <label class="form-label fw-semibold">Upload Gambar Banner {!! $item ? '' : '<span class="text-danger">*</span>' !!}</label>
                    <input type="file" name="gambar" id="gambarInput" class="form-control" accept="image/*" {{ $item ? '' : 'required' }}>
                    <div class="form-text">Format: JPG, PNG, WEBP (Maksimal 4MB). Resolusi disarankan 1920x600 px (Landscape panjang).</div>

                    <div class="mt-3" id="previewContainer">
                        @if($item?->gambar)
                            <div class="p-2 border rounded-3 bg-light d-inline-block position-relative w-100 text-center">
                                <span class="badge bg-dark position-absolute top-0 start-0 m-2 opacity-75">Banner Saat Ini</span>
                                <img src="{{ Storage::url($item->gambar) }}" id="imagePreview" class="rounded-2 object-fit-cover shadow-sm w-100" style="max-height: 250px;">
                            </div>
                        @else
                            <img id="imagePreview" class="rounded-2 object-fit-cover shadow-sm w-100 d-none" style="max-height: 250px;">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const input = document.getElementById('gambarInput');
        const preview = document.getElementById('imagePreview');

        if (input && preview) {
            input.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(evt) {
                        preview.src = evt.target.result;
                        preview.classList.remove('d-none');
                    }
                    reader.readAsDataURL(file);
                }
            });
        }
    });
</script>