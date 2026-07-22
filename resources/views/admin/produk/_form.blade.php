@php $p = $produk ?? null; @endphp
<div class="row g-3">
    <div class="col-12">
        <label class="form-label fw-semibold">UMKM <span class="text-danger">*</span></label>
        <select name="umkm_id" class="form-select" required>
            <option value="">Pilih UMKM</option>
            @foreach($umkm as $u)
                <option value="{{ $u->id }}" {{ old('umkm_id', $p?->umkm_id) == $u->id ? 'selected' : '' }}>{{ $u->nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-8">
        <label class="form-label fw-semibold">Nama Produk <span class="text-danger">*</span></label>
        <input type="text" name="nama" class="form-control" value="{{ old('nama', $p?->nama) }}" required>
    </div>
    <div class="col-md-4">
        <label class="form-label fw-semibold">Kategori <span class="text-danger">*</span></label>
        <input type="text" name="kategori" class="form-control" value="{{ old('kategori', $p?->kategori) }}" required placeholder="Makanan, Kerajinan...">
    </div>
    <div class="col-md-6">
        <label class="form-label fw-semibold">Harga (Rp) <span class="text-danger">*</span></label>
        <input type="number" name="harga" class="form-control" value="{{ old('harga', $p?->harga) }}" required min="0">
    </div>
    <div class="col-md-6">
        <label class="form-label fw-semibold">Foto Produk</label>
        @if($p?->foto)
            <div class="mb-2"><img src="{{ Storage::url($p->foto) }}" height="60" class="rounded"></div>
        @endif
        <input type="file" name="foto" class="form-control" accept="image/*">
    </div>
    <div class="col-12">
        <label class="form-label fw-semibold">Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $p?->deskripsi) }}</textarea>
    </div>
    <div class="col-12">
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="status" id="status" value="1" {{ old('status', $p?->status ?? true) ? 'checked' : '' }}>
            <label class="form-check-label fw-semibold" for="status">Status Aktif</label>
        </div>
    </div>
</div>