@php $u = $umkm ?? null; @endphp
<div class="row g-3">
    <div class="col-md-8">
        <label class="form-label fw-semibold">Nama UMKM <span class="text-danger">*</span></label>
        <input type="text" name="nama" class="form-control" value="{{ old('nama', $u?->nama) }}" required>
    </div>
    <div class="col-md-4">
        <label class="form-label fw-semibold">No. HP <span class="text-danger">*</span></label>
        <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp', $u?->no_hp) }}" required>
    </div>
    <div class="col-md-6">
        <label class="form-label fw-semibold">Nama Pemilik <span class="text-danger">*</span></label>
        <input type="text" name="pemilik" class="form-control" value="{{ old('pemilik', $u?->pemilik) }}" required>
    </div>
    <div class="col-md-6">
        <label class="form-label fw-semibold">Kecamatan <span class="text-danger">*</span></label>
        <select name="kecamatan" class="form-select" required>
            @foreach(['Magetan', 'Maospati', 'Karas', 'Panekan', 'Plaosan', 'Sidorejo', 'Parang', 'Barat', 'Sukomoro', 'Ngariboyo', 'Kartoharjo', 'Kawedanan', 'Takeran', 'Nguntoronadi', 'Lembeyan', 'Bancikan', 'Poncol', 'Karangrejo'] as $kec)
                <option value="{{ $kec }}" {{ old('kecamatan', $u?->kecamatan) == $kec ? 'selected' : '' }}>{{ $kec }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-12">
        <label class="form-label fw-semibold">Alamat <span class="text-danger">*</span></label>
        <textarea name="alamat" class="form-control" rows="2" required>{{ old('alamat', $u?->alamat) }}</textarea>
    </div>
    <div class="col-md-6">
        <label class="form-label fw-semibold">Logo</label>
        @if($u?->logo)
            <div class="mb-2"><img src="{{ Storage::url($u->logo) }}" height="70" class="rounded-circle"></div>
        @endif
        <input type="file" name="logo" class="form-control" accept="image/*">
    </div>
    <div class="col-12">
        <label class="form-label fw-semibold">Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $u?->deskripsi) }}</textarea>
    </div>
</div>