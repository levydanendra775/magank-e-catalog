@php $item = $galeri ?? null; @endphp

<div class="row g-4">
    <div class="col-12">
        <div class="card border border-light-subtle shadow-sm rounded-4 p-4">
            <h6 class="fw-bold mb-3 d-flex align-items-center gap-2" style="color:var(--primary);">
                <i class="fa-solid fa-photo-film" style="color:var(--accent);"></i> Form Galeri
            </h6>
            <div class="row g-3">
                <div class="col-md-8">
                    <label class="form-label fw-semibold">Judul Galeri <span class="text-danger">*</span></label>
                    <input type="text" name="judul" class="form-control" value="{{ old('judul', $item?->judul) }}" placeholder="Contoh: Dokumentasi Event Grebeg Suro" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Kategori <span class="text-danger">*</span></label>
                    <select name="kategori" class="form-select" required>
                        @foreach(['Wisata', 'Event', 'UMKM', 'Kuliner', 'Penginapan', 'Lainnya'] as $kat)
                            <option value="{{ $kat }}" {{ old('kategori', $item?->kategori) == $kat ? 'selected' : '' }}>{{ $kat }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Upload Foto <span class="text-danger">*</span></label>
                    <input type="file" name="foto" id="fotoInput" class="form-control" accept="image/*">
                    
                    <div class="mt-3" id="previewContainer">
                        @if($item?->foto)
                            <div class="p-2 border rounded-3 bg-light d-inline-block position-relative">
                                <img src="{{ Storage::url($item->foto) }}" id="imagePreview" class="rounded-2 object-fit-cover" style="max-height: 140px; width: auto;">
                            </div>
                        @else
                            <img id="imagePreview" class="rounded-2 object-fit-cover d-none" style="max-height: 140px; width: auto;">
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Video (URL YouTube)</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="fa-brands fa-youtube text-danger"></i></span>
                        <input type="url" name="video" class="form-control" value="{{ old('video', $item?->video) }}" placeholder="https://www.youtube.com/watch?v=...">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const input = document.getElementById('fotoInput');
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