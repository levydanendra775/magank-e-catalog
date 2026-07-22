@php $item = $kuliner ?? null; @endphp
<div class="row g-3">
    <div class="col-md-8"><label class="form-label fw-semibold">Nama <span class="text-danger">*</span></label>
        <input type="text" name="nama" class="form-control" value="{{ old('nama', $item?->nama) }}" required></div>
    <div class="col-md-4"><label class="form-label fw-semibold">No. HP</label>
        <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp', $item?->no_hp) }}"></div>
    <div class="col-12"><label class="form-label fw-semibold">Alamat <span class="text-danger">*</span></label>
        <textarea name="alamat" class="form-control" rows="2" required>{{ old('alamat', $item?->alamat) }}</textarea></div>
    <div class="col-md-6"><label class="form-label fw-semibold">Menu Unggulan</label>
        <input type="text" name="menu_unggulan" class="form-control" value="{{ old('menu_unggulan', $item?->menu_unggulan) }}"></div>
    <div class="col-md-6"><label class="form-label fw-semibold">Jam Buka</label>
        <input type="text" name="jam_buka" class="form-control" value="{{ old('jam_buka', $item?->jam_buka) }}" placeholder="08.00 - 20.00"></div>
    <div class="col-12"><label class="form-label fw-semibold">Link Google Maps</label>
        <input type="url" name="maps" class="form-control" value="{{ old('maps', $item?->maps) }}" placeholder="https://maps.app.goo.gl/xxxx atau https://www.google.com/maps/...">
        <div class="form-text"><i class="fa-solid fa-circle-info me-1 text-primary"></i>Cara mendapatkan link: Buka Google Maps → Cari lokasi → Klik <strong>Share</strong> → Klik <strong>Copy link</strong> → Paste di sini. Pastikan URL lengkap dimulai dari <code>https://</code>.</div>
    </div>
    <div class="col-md-6"><label class="form-label fw-semibold">Foto</label>
        @if($item?->foto)<div class="mb-2"><img src="{{ Storage::url($item->foto) }}" height="60" class="rounded"></div>@endif
        <input type="file" name="foto" class="form-control" accept="image/*"></div>
</div>