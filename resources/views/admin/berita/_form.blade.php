@php $item = $berita ?? null; @endphp
<div class="row g-3">
    <div class="col-12"><label class="form-label fw-semibold">Judul Berita <span class="text-danger">*</span></label>
        <input type="text" name="judul" class="form-control" value="{{ old('judul', $item?->judul) }}" required></div>
    <div class="col-md-6"><label class="form-label fw-semibold">Thumbnail</label>
        @if($item?->thumbnail)<div class="mb-2"><img src="{{ Storage::url($item->thumbnail) }}" height="60" class="rounded"></div>@endif
        <input type="file" name="thumbnail" class="form-control" accept="image/*"></div>
    <div class="col-md-6 d-flex align-items-center">
        <div class="form-check form-switch mt-4">
            <input class="form-check-input" type="checkbox" name="status" id="status" value="1" {{ old('status', $item?->status ?? true) ? 'checked' : '' }}>
            <label class="form-check-label fw-semibold" for="status">Status Publish</label>
        </div>
    </div>
    <div class="col-12"><label class="form-label fw-semibold">Isi Berita <span class="text-danger">*</span></label>
        <textarea name="isi" class="form-control" rows="8" required>{{ old('isi', $item?->isi) }}</textarea></div>
</div>