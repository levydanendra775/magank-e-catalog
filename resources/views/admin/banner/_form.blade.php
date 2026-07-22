@php $item = $banner ?? null; @endphp
<div class="row g-3">
    <div class="col-md-8"><label class="form-label fw-semibold">Judul Banner <span class="text-danger">*</span></label>
        <input type="text" name="judul" class="form-control" value="{{ old('judul', $item?->judul) }}" required></div>
    <div class="col-md-4"><label class="form-label fw-semibold">Urutan</label>
        <input type="number" name="urutan" class="form-control" value="{{ old('urutan', $item?->urutan ?? 0) }}" min="0"></div>
    <div class="col-12"><label class="form-label fw-semibold">Link URL</label>
        <input type="url" name="link" class="form-control" value="{{ old('link', $item?->link) }}"></div>
    <div class="col-12"><label class="form-label fw-semibold">Gambar Banner {{ $item ? '' : '(Wajib)' }}</label>
        @if($item?->gambar)<div class="mb-2"><img src="{{ Storage::url($item->gambar) }}" height="80" class="rounded"></div>@endif
        <input type="file" name="gambar" class="form-control" accept="image/*" {{ $item ? '' : 'required' }}></div>
</div>