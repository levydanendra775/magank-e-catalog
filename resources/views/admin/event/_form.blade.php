@php $e = $event ?? null; @endphp

<div class="row g-4">
    <!-- Section 1: Detail Utama Event -->
    <div class="col-12">
        <div class="card border border-light-subtle shadow-sm rounded-4 p-4 mb-2">
            <h6 class="fw-bold mb-3 d-flex align-items-center gap-2" style="color:var(--primary);">
                <i class="fa-solid fa-calendar-check" style="color:var(--accent);"></i> Informasi utama Event
            </h6>
            <div class="row g-3">
                <div class="col-12">
                    <label class="form-label fw-semibold">Judul Event <span class="text-danger">*</span></label>
                    <input type="text" name="judul" class="form-control" value="{{ old('judul', $e?->judul) }}" placeholder="Contoh: Festival Grebeg Suro Magetan" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Lokasi Pelaksanaan <span class="text-danger">*</span></label>
                    <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi', $e?->lokasi) }}" placeholder="Contoh: Alun-alun Kabupaten Magetan" required>
                </div>

                <div class="col-md-3">
                    <label class="form-label fw-semibold">Tanggal Event <span class="text-danger">*</span></label>
                    <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', $e?->tanggal?->format('Y-m-d')) }}" required>
                </div>

                <div class="col-md-3">
                    <label class="form-label fw-semibold">Jam Pelaksanaan</label>
                    <input type="time" name="jam" class="form-control" value="{{ old('jam', $e?->jam) }}">
                </div>

                <div class="col-12">
                    <label class="form-label fw-semibold">Link Pendaftaran / Informasi URL</label>
                    <input type="url" name="link_pendaftaran" class="form-control" value="{{ old('link_pendaftaran', $e?->link_pendaftaran) }}" placeholder="https://dinas.magetan.go.id/register-event...">
                </div>
            </div>
        </div>
    </div>

    <!-- Section 2: Deskripsi Event -->
    <div class="col-12">
        <div class="card border border-light-subtle shadow-sm rounded-4 p-4 mb-2">
            <h6 class="fw-bold mb-3 d-flex align-items-center gap-2" style="color:var(--primary);">
                <i class="fa-solid fa-align-left" style="color:var(--accent);"></i> Deskripsi Lengkap
            </h6>
            <div class="row g-3">
                <div class="col-12">
                    <label class="form-label fw-semibold">Deskripsi Event <span class="text-danger">*</span></label>
                    <textarea name="deskripsi" class="form-control" rows="5" placeholder="Tuliskan detail susunan acara, bintang tamu, ketentuan peserta, dan informasi penting lainnya..." required>{{ old('deskripsi', $e?->deskripsi) }}</textarea>
                </div>
            </div>
        </div>
    </div>

    <!-- Section 3: Poster & Publikasi -->
    <div class="col-12">
        <div class="card border border-light-subtle shadow-sm rounded-4 p-4">
            <h6 class="fw-bold mb-3 d-flex align-items-center gap-2" style="color:var(--primary);">
                <i class="fa-solid fa-image" style="color:var(--accent);"></i> Poster & Status
            </h6>
            <div class="row g-3">
                <div class="col-md-7">
                    <label class="form-label fw-semibold">Upload Poster Event</label>
                    <input type="file" name="poster" id="posterInput" class="form-control" accept="image/*">
                    <div class="form-text">Format: JPG, PNG, WEBP (Maksimal 2MB).</div>

                    <div class="mt-3" id="previewContainer">
                        @if($e?->poster)
                            <div class="p-2 border rounded-3 bg-light d-inline-block position-relative">
                                <span class="badge bg-dark position-absolute top-0 start-0 m-2 opacity-75">Poster Saat Ini</span>
                                <img src="{{ Storage::url($e->poster) }}" id="imagePreview" class="rounded-2 object-fit-cover" style="max-height: 140px; width: auto;">
                            </div>
                        @else
                            <img id="imagePreview" class="rounded-2 object-fit-cover d-none" style="max-height: 140px; width: auto;">
                        @endif
                    </div>
                </div>

                <div class="col-md-5 d-flex align-items-center">
                    <div class="p-4 rounded-4 bg-light w-100 border">
                        <div class="form-check form-switch mb-0">
                            <input class="form-check-input" type="checkbox" name="status" id="status" value="1" style="width: 2.5em; height: 1.3em;" {{ old('status', $e?->status ?? true) ? 'checked' : '' }}>
                            <label class="form-check-label fw-bold ms-2" for="status" style="color:var(--primary);">
                                Status Publish
                            </label>
                        </div>
                        <div class="text-muted small mt-2">
                            Jika aktif, jadwal event akan ditampilkan di halaman depan publik.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const input = document.getElementById('posterInput');
        const preview = document.getElementById('imagePreview');
        if (input && preview) {
            input.addEventListener('change', function(evt) {
                const file = evt.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.classList.remove('d-none');
                    }
                    reader.readAsDataURL(file);
                }
            });
        }
    });
</script>