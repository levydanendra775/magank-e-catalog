@php $item = $banner ?? null; @endphp

<div class="row g-4">
    <div class="col-12">
        <div class="card border border-light-subtle shadow-sm rounded-4 p-4">
            <h6 class="fw-bold mb-3 d-flex align-items-center gap-2" style="color:var(--primary);">
                <i class="fa-solid fa-panorama" style="color:var(--accent);"></i> Form Foto Background Hero Landing Page
            </h6>
            <div class="row g-3">
                <div class="col-md-8">
                    <label class="form-label fw-semibold">Judul / Keterangan Foto <span
                            class="text-danger">*</span></label>
                    <input type="text" name="judul" class="form-control" value="{{ old('judul', $item?->judul) }}"
                        placeholder="Contoh: Panorama Telaga Sarangan di Pagi Hari" required>
                    <div class="form-text">Beri nama atau keterangan singkat untuk foto ini.</div>
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Urutan Tampil <span class="text-danger">*</span></label>
                    <input type="number" name="urutan" class="form-control font-mono"
                        value="{{ old('urutan', $item?->urutan ?? 1) }}" min="1" required>
                    <div class="form-text">Urutan ke-1 akan tampil pertama saat halaman dibuka.</div>
                </div>

                <div class="col-12">
                    <label class="form-label fw-semibold">Tautan Terkait (Opsional)</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="fa-solid fa-link text-muted"></i></span>
                        <input type="url" name="link" class="form-control"
                            value="{{ old('link', $item?->link) }}"
                            placeholder="https://magetan.go.id (Opsional jika ingin menautkan ke halaman tertentu)">
                    </div>
                </div>

                <div class="col-12 mt-4">
                    <label class="form-label fw-semibold">Upload Gambar Foto Background {!! $item ? '' : '<span class="text-danger">*</span>' !!}</label>
                    <input type="file" name="gambar" id="gambarInput" class="form-control" accept="image/*"
                        {{ $item ? '' : 'required' }}>
                    <div class="form-text">
                        <i class="fa-solid fa-circle-info me-1 text-primary"></i> Format didukung: <strong>JPG, PNG,
                            WEBP</strong> (Maksimal 4MB). Disarankan menggunakan foto lanskap beresolusi tinggi (contoh:
                        <strong>1920x1080 px</strong>) agar tampak jernih di semua ukuran layar.
                    </div>

                    <div class="mt-3" id="previewContainer">
                        @if ($item?->gambar)
                            <div
                                class="p-2 border rounded-4 bg-light d-inline-block position-relative w-100 text-center shadow-sm overflow-hidden">
                                <span class="badge bg-dark position-absolute top-0 start-0 m-3 opacity-75 shadow-sm">
                                    <i class="fa-solid fa-image me-1"></i> Foto Saat Ini
                                </span>
                                <img src="{{ Storage::url($item->gambar) }}" id="imagePreview"
                                    class="rounded-3 object-fit-cover shadow-sm w-100" style="max-height: 320px;"
                                    alt="{{ $item->judul }}">
                            </div>
                        @else
                            <div id="previewWrapper"
                                class="p-2 border rounded-4 bg-light d-none position-relative w-100 text-center shadow-sm overflow-hidden">
                                <span class="badge bg-success position-absolute top-0 start-0 m-3 shadow-sm">
                                    <i class="fa-solid fa-check me-1"></i> Preview Foto Baru
                                </span>
                                <img id="imagePreview" class="rounded-3 object-fit-cover shadow-sm w-100"
                                    style="max-height: 320px;" alt="Preview Foto">
                            </div>
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
        const previewWrapper = document.getElementById('previewWrapper');

        if (input && preview) {
            input.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(evt) {
                        preview.src = evt.target.result;
                        if (previewWrapper) {
                            previewWrapper.classList.remove('d-none');
                        } else {
                            preview.classList.remove('d-none');
                        }
                    }
                    reader.readAsDataURL(file);
                }
            });
        }
    });
</script>
