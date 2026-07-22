@php $item = $galeri ?? null; @endphp
<div class="row g-3">
    <div class="col-md-8"><label class="form-label fw-semibold">Judul <span class="text-danger">*</span></label>
        <input type="text" name="judul" class="form-control" value="{{ old('judul', $item?->judul) }}" required></div>
    <div class="col-md-4"><label class="form-label fw-semibold">Kategori <span class="text-danger">*</span></label>
        <select name="kategori" class="form-select" required>
            @foreach(['Wisata', 'Event', 'UMKM', 'Kuliner', 'Penginapan', 'Lainnya'] as $kat)
                <option value="{{ $kat }}" {{ old('kategori', $item?->kategori) == $kat ? 'selected' : '' }}>{{ $kat }}</option>
            @endforeach
        </select></div>
    <div class="col-md-6"><label class="form-label fw-semibold">Foto</label>
        @if($item?->foto)<div class="mb-2"><img src="{{ Storage::url($item->foto) }}" height="60" class="rounded"></div>@endif
        <input type="file" name="foto" class="form-control" accept="image/*"></div>
    <div class="col-md-6"><label class="form-label fw-semibold">Video (URL YouTube/Link)</label>
        <input type="text" name="video" class="form-control" value="{{ old('video', $item?->video) }}"></div>
</div>