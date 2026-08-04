@php $w = $wisata ?? null; @endphp

<div class="row g-4">
    <!-- Section 1: Informasi Utama -->
    <div class="col-12">
        <div class="card border border-light-subtle shadow-sm rounded-4 p-4 mb-2">
            <h6 class="fw-bold mb-3 d-flex align-items-center gap-2" style="color:var(--primary);">
                <i class="fa-solid fa-circle-info" style="color:var(--accent);"></i> Informasi Utama
            </h6>
            <div class="row g-3">
                <div class="col-md-8">
                    <label class="form-label fw-semibold">Nama Destinasi Wisata <span class="text-danger">*</span></label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $w?->nama) }}" placeholder="Contoh: Telaga Sarangan" required>
                    @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Kategori <span class="text-danger">*</span></label>
                    <select name="kategori" class="form-select @error('kategori') is-invalid @enderror" required>
                        <option value="">Pilih Kategori Wisata</option>
                        @foreach(['Alam', 'Budaya', 'Religi', 'Buatan', 'Edukasi', 'Kuliner', 'Olahraga'] as $kat)
                            <option value="{{ $kat }}" {{ old('kategori', $w?->kategori) == $kat ? 'selected' : '' }}>{{ $kat }}</option>
                        @endforeach
                    </select>
                    @error('kategori')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Kecamatan <span class="text-danger">*</span></label>
                    <select name="kecamatan" class="form-select @error('kecamatan') is-invalid @enderror" required>
                        <option value="">Pilih Kecamatan di Magetan</option>
                        @foreach(['Magetan', 'Maospati', 'Karas', 'Panekan', 'Plaosan', 'Sidorejo', 'Parang', 'Barat', 'Sukomoro', 'Ngariboyo', 'Kartoharjo', 'Kawedanan', 'Takeran', 'Nguntoronadi', 'Lembeyan', 'Bancikan', 'Poncol', 'Karangrejo', 'Satu Atap'] as $kec)
                            <option value="{{ $kec }}" {{ old('kecamatan', $w?->kecamatan) == $kec ? 'selected' : '' }}>{{ $kec }}</option>
                        @endforeach
                    </select>
                    @error('kecamatan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Harga Tiket Masuk (Rp)</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light text-muted">Rp</span>
                        <input type="number" name="harga_tiket" class="form-control" value="{{ old('harga_tiket', $w?->harga_tiket) }}" min="0" placeholder="0 untuk gratis">
                    </div>
                    <div class="form-text">Biarkan kosong atau 0 jika tidak ada biaya tiket.</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section 2: Lokasi & Pemetaan -->
    <div class="col-12">
        <div class="card border border-light-subtle shadow-sm rounded-4 p-4 mb-2">
            <h6 class="fw-bold mb-3 d-flex align-items-center gap-2" style="color:var(--primary);">
                <i class="fa-solid fa-map-pin" style="color:var(--accent);"></i> Lokasi & Pemetaan
            </h6>
            <div class="row g-3">
                <div class="col-12">
                    <label class="form-label fw-semibold">Alamat Lengkap</label>
                    <input type="text" name="alamat" class="form-control" value="{{ old('alamat', $w?->alamat) }}" placeholder="Jl. Raya Ngariboyo No. 12, Magetan...">
                </div>

                <div class="col-12">
                    <label class="form-label fw-semibold">Link Google Maps</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light text-muted"><i class="fa-solid fa-link"></i></span>
                        <input type="url" name="maps" class="form-control" value="{{ old('maps', $w?->maps) }}" placeholder="https://maps.app.goo.gl/xxxx atau https://www.google.com/maps/...">
                    </div>
                    <div class="form-text text-muted mt-1">
                        <i class="fa-solid fa-circle-info me-1 text-primary"></i> <strong>Petunjuk:</strong> Buka Google Maps &rarr; Cari Lokasi &rarr; Klik <strong>Bagikan (Share)</strong> &rarr; Klik <strong>Salin Link (Copy Link)</strong> &rarr; Paste di sini.
                    </div>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Koordinat Latitude</label>
                    <input type="text" name="latitude" class="form-control font-mono" value="{{ old('latitude', $w?->latitude) }}" placeholder="-7.671234">
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Koordinat Longitude</label>
                    <input type="text" name="longitude" class="form-control font-mono" value="{{ old('longitude', $w?->longitude) }}" placeholder="111.321234">
                </div>
            </div>
        </div>
    </div>

    <!-- Section 3: Detail Operasional & Fasilitas -->
    <div class="col-12">
        <div class="card border border-light-subtle shadow-sm rounded-4 p-4 mb-2">
            <h6 class="fw-bold mb-3 d-flex align-items-center gap-2" style="color:var(--primary);">
                <i class="fa-solid fa-clock-rotate-left" style="color:var(--accent);"></i> Detail & Operasional
            </h6>
            <div class="row g-3">
                <div class="col-12">
                    <label class="form-label fw-semibold">Jam Operasional</label>
                    <input type="text" name="jam_operasional" class="form-control" value="{{ old('jam_operasional', $w?->jam_operasional) }}" placeholder="Contoh: 07.00 - 17.00 WIB (Buka Setiap Hari)">
                </div>

                <div class="col-12">
                    <label class="form-label fw-semibold">Deskripsi Wisata</label>
                    <textarea name="deskripsi" class="form-control" rows="5" placeholder="Tuliskan gambaran umum, daya tarik utama, dan informasi singkat seputar objek wisata ini...">{{ old('deskripsi', $w?->deskripsi) }}</textarea>
                </div>

                <div class="col-12">
                    <label class="form-label fw-semibold">Fasilitas Wisata</label>
                    <textarea name="fasilitas" class="form-control" rows="3" placeholder="Contoh: Area Parkir Luas, Musholla, Toilet Bersih, Warung Makan, Spot Foto Instagramable">{{ old('fasilitas', $w?->fasilitas) }}</textarea>
                </div>
            </div>
        </div>
    </div>

    <!-- Section 4: Media & Publikasi -->
    <div class="col-12">
        <div class="card border border-light-subtle shadow-sm rounded-4 p-4">
            <h6 class="fw-bold mb-3 d-flex align-items-center gap-2" style="color:var(--primary);">
                <i class="fa-solid fa-photo-film" style="color:var(--accent);"></i> Gambar & Status Publikasi
            </h6>
            <div class="row g-3">
                <div class="col-md-7">
                    <label class="form-label fw-semibold">Upload Gambar Thumbnail</label>
                    <input type="file" name="thumbnail" id="thumbnailInput" class="form-control" accept="image/*">
                    <div class="form-text">Format: JPG, PNG, WEBP (Maksimal 2MB). Disarankan rasio 4:3 atau 16:9.</div>

                    <!-- Live Image Preview Container -->
                    <div class="mt-3" id="previewContainer">
                        @if($w?->thumbnail)
                            <div class="p-2 border rounded-3 bg-light d-inline-block position-relative">
                                <span class="badge bg-dark position-absolute top-0 start-0 m-2 opacity-75">Thumbnail Saat Ini</span>
                                <img src="{{ Storage::url($w->thumbnail) }}" id="imagePreview" class="rounded-2 object-fit-cover" style="max-height: 140px; width: auto;">
                            </div>
                        @else
                            <img id="imagePreview" class="rounded-2 object-fit-cover d-none" style="max-height: 140px; width: auto;">
                        @endif
                    </div>
                </div>

                <div class="col-md-5 d-flex align-items-center">
                    <div class="p-4 rounded-4 bg-light w-100 border">
                        <div class="form-check form-switch mb-0">
                            <input class="form-check-input" type="checkbox" name="status_publish" id="status_publish" value="1" style="width: 2.5em; height: 1.3em;" {{ old('status_publish', $w?->status_publish ?? true) ? 'checked' : '' }}>
                            <label class="form-check-label fw-bold ms-2" for="status_publish" style="color:var(--primary);">
                                Status Publish
                            </label>
                        </div>
                        <div class="text-muted small mt-2">
                            Jika diaktifkan, destinasi wisata ini akan langsung dipublikasikan dan dapat dilihat oleh pengunjung publik.
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