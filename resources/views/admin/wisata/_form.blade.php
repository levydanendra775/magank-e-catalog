@php $w = $wisata ?? null; @endphp
<div class="row g-3">
    <div class="col-md-8">
        <label class="form-label fw-semibold">Nama Wisata <span class="text-danger">*</span></label>
        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $w?->nama) }}" required>
        @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-4">
        <label class="form-label fw-semibold">Kategori <span class="text-danger">*</span></label>
        <select name="kategori" class="form-select @error('kategori') is-invalid @enderror" required>
            <option value="">Pilih Kategori</option>
            @foreach(['Alam', 'Budaya', 'Religi', 'Buatan', 'Edukasi', 'Kuliner', 'Olahraga'] as $kat)
                <option value="{{ $kat }}" {{ old('kategori', $w?->kategori) == $kat ? 'selected' : '' }}>{{ $kat }}</option>
            @endforeach
        </select>
        @error('kategori')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6">
        <label class="form-label fw-semibold">Kecamatan <span class="text-danger">*</span></label>
        <select name="kecamatan" class="form-select" required>
            <option value="">Pilih Kecamatan</option>
            @foreach(['Magetan', 'Maospati', 'Karas', 'Panekan', 'Plaosan', 'Sidorejo', 'Parang', 'Barat', 'Sukomoro', 'Ngariboyo', 'Kartoharjo', 'Kawedanan', 'Takeran', 'Nguntoronadi', 'Lembeyan', 'Bancikan', 'Poncol', 'Karangrejo', 'Satu Atap'] as $kec)
                <option value="{{ $kec }}" {{ old('kecamatan', $w?->kecamatan) == $kec ? 'selected' : '' }}>{{ $kec }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6">
        <label class="form-label fw-semibold">Harga Tiket (Rp)</label>
        <input type="number" name="harga_tiket" class="form-control" value="{{ old('harga_tiket', $w?->harga_tiket) }}" min="0">
    </div>
    <div class="col-12">
        <label class="form-label fw-semibold">Alamat</label>
        <input type="text" name="alamat" class="form-control" value="{{ old('alamat', $w?->alamat) }}">
    </div>
    <div class="col-md-6">
        <label class="form-label fw-semibold">Latitude</label>
        <input type="text" name="latitude" class="form-control" value="{{ old('latitude', $w?->latitude) }}" placeholder="-7.67...">
    </div>
    <div class="col-md-6">
        <label class="form-label fw-semibold">Longitude</label>
        <input type="text" name="longitude" class="form-control" value="{{ old('longitude', $w?->longitude) }}" placeholder="111.32...">
    </div>
    <div class="col-12">
        <label class="form-label fw-semibold">Link Google Maps</label>
        <input type="url" name="maps" class="form-control" value="{{ old('maps', $w?->maps) }}" placeholder="https://maps.app.goo.gl/xxxx atau https://www.google.com/maps/...">
        <div class="form-text"><i class="fa-solid fa-circle-info me-1 text-primary"></i>Cara mendapatkan link: Buka Google Maps → Cari lokasi → Klik <strong>Share</strong> → Klik <strong>Copy link</strong> → Paste di sini. Pastikan URL lengkap dimulai dari <code>https://</code>.</div>
    </div>
    <div class="col-md-6">
        <label class="form-label fw-semibold">Jam Operasional</label>
        <input type="text" name="jam_operasional" class="form-control" value="{{ old('jam_operasional', $w?->jam_operasional) }}" placeholder="07.00 - 17.00 WIB">
    </div>
    <div class="col-12">
        <label class="form-label fw-semibold">Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="4">{{ old('deskripsi', $w?->deskripsi) }}</textarea>
    </div>
    <div class="col-12">
        <label class="form-label fw-semibold">Fasilitas</label>
        <textarea name="fasilitas" class="form-control" rows="2" placeholder="Parkir, Toilet, Warung Makan, ...">{{ old('fasilitas', $w?->fasilitas) }}</textarea>
    </div>
    <div class="col-md-6">
        <label class="form-label fw-semibold">Thumbnail</label>
        @if($w?->thumbnail)
            <div class="mb-2"><img src="{{ Storage::url($w->thumbnail) }}" height="80" class="rounded"></div>
        @endif
        <input type="file" name="thumbnail" class="form-control" accept="image/*">
    </div>
    <div class="col-md-6 d-flex align-items-center">
        <div class="form-check form-switch mt-4">
            <input class="form-check-input" type="checkbox" name="status_publish" id="status_publish" value="1" {{ old('status_publish', $w?->status_publish ?? true) ? 'checked' : '' }}>
            <label class="form-check-label fw-semibold" for="status_publish">Status Publish</label>
        </div>
    </div>
</div>