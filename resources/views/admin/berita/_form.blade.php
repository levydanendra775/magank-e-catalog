@php $item = $berita ?? null; @endphp

<div class="row g-4">
    <!-- Section 1: Detail Utama Berita -->
    <div class="col-12">
        <div class="card border border-light-subtle shadow-sm rounded-4 p-4 mb-2">
            <h6 class="fw-bold mb-3 d-flex align-items-center gap-2" style="color:var(--primary);">
                <i class="fa-solid fa-pen-nib" style="color:var(--accent);"></i> Informasi Utama
            </h6>
            <div class="row g-3">
                <div class="col-12">
                    <label class="form-label fw-semibold">Judul Berita <span class="text-danger">*</span></label>
                    <input type="text" name="judul" class="form-control" value="{{ old('judul', $item?->judul) }}" placeholder="Contoh: Magetan Raih Penghargaan Pariwisata Tingkat Nasional" required>
                </div>

                <div class="col-12">
                    <label class="form-label fw-semibold">Isi Berita Lengkap <span class="text-danger">*</span></label>
                    <textarea name="isi" class="form-control" rows="12" placeholder="Tuliskan isi berita atau artikel secara detail di sini..." required>{{ old('isi', $item?->isi) }}</textarea>
                </div>
            </div>
        </div>
    </div>

    <!-- Section 2: Media & Publikasi -->
    <div class="col-12">
        <div class="card border border-light-subtle shadow-sm rounded-4 p-4">
            <h6 class="fw-bold mb-3 d-flex align-items-center gap-2" style="color:var(--primary);">
                <i class="fa-solid fa-photo-film" style="color:var(--accent);"></i> Media & Status
            </h6>
            <div class="row g-3">
                <div class="col-md-7">
                    <label class="form-label fw-semibold">Upload Gambar Thumbnail</label>
                    <input type="file" name="thumbnail" id="thumbnailInput" class="form-control" accept="image/*">
                    <div class="form-text">Format: JPG, PNG, WEBP (Maksimal 2MB). Disarankan rasio landscape 16:9.</div>

                    <!-- Live Image Preview Container -->
                    <div class="mt-3" id="previewContainer">
                        @if($item?->thumbnail)
                            <div class="p-2 border rounded-3 bg-light d-inline-block position-relative">
                                <span class="badge bg-dark position-absolute top-0 start-0 m-2 opacity-75">Thumbnail Saat Ini</span>
                                <img src="{{ Storage::url($item->thumbnail) }}" id="imagePreview" class="rounded-2 object-fit-cover" style="max-height: 140px; width: auto;">
                            </div>
                        @else
                            <img id="imagePreview" class="rounded-2 object-fit-cover d-none" style="max-height: 140px; width: auto;">
                        @endif
                    </div>
                </div>

                <div class="col-md-5 d-flex align-items-center">
                    <div class="p-4 rounded-4 bg-light w-100 border">
                        <div class="form-check form-switch mb-0">
                            <input class="form-check-input" type="checkbox" name="status" id="status" value="1" style="width: 2.5em; height: 1.3em;" {{ old('status', $item?->status ?? true) ? 'checked' : '' }}>
                            <label class="form-check-label fw-bold ms-2" for="status" style="color:var(--primary);">
                                Status Publish
                            </label>
                        </div>
                        <div class="text-muted small mt-2">
                            Jika diaktifkan, berita ini akan langsung dipublikasikan dan dapat dibaca oleh publik.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const input = document.getElementById('thumbnailInput');
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