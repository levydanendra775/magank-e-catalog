@php $item = $penginapan ?? null; @endphp
<div class="row g-3">
    <div class="col-md-8"><label class="form-label fw-semibold">Nama <span class="text-danger">*</span></label>
        <input type="text" name="nama" class="form-control" value="{{ old('nama', $item?->nama) }}" required></div>
    <div class="col-md-4"><label class="form-label fw-semibold">Jenis <span class="text-danger">*</span></label>
        <select name="jenis" class="form-select" required>
            @foreach(['Hotel', 'Villa', 'Guest House', 'Homestay', 'Losmen', 'Resort'] as $j)
                <option value="{{ $j }}" {{ old('jenis', $item?->jenis) == $j ? 'selected' : '' }}>{{ $j }}</option>
            @endforeach
        </select></div>
    <div class="col-md-6"><label class="form-label fw-semibold">Harga Mulai (Rp)</label>
        <input type="number" name="harga_mulai" class="form-control" value="{{ old('harga_mulai', $item?->harga_mulai) }}" min="0"></div>
    <div class="col-md-6"><label class="form-label fw-semibold">No. HP</label>
        <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp', $item?->no_hp) }}"></div>
    <div class="col-12"><label class="form-label fw-semibold">Alamat <span class="text-danger">*</span></label>
        <textarea name="alamat" class="form-control" rows="2" required>{{ old('alamat', $item?->alamat) }}</textarea></div>
    <div class="col-12"><label class="form-label fw-semibold">Fasilitas</label>
        <textarea name="fasilitas" class="form-control" rows="2">{{ old('fasilitas', $item?->fasilitas) }}</textarea></div>
    <div class="col-12"><label class="form-label fw-semibold">Link Maps</label>
        <input type="text" name="maps" class="form-control" value="{{ old('maps', $item?->maps) }}"></div>
    <div class="col-md-6"><label class="form-label fw-semibold">Foto</label>
        @if($item?->foto)<div class="mb-2"><img src="{{ Storage::url($item->foto) }}" height="60" class="rounded"></div>@endif
        <input type="file" name="foto" class="form-control" accept="image/*"></div>
</div>