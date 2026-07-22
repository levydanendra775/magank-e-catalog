@php $e = $event ?? null; @endphp
<div class="row g-3">
    <div class="col-12">
        <label class="form-label fw-semibold">Judul Event <span class="text-danger">*</span></label>
        <input type="text" name="judul" class="form-control" value="{{ old('judul', $e?->judul) }}" required>
    </div>
    <div class="col-md-6">
        <label class="form-label fw-semibold">Lokasi <span class="text-danger">*</span></label>
        <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi', $e?->lokasi) }}" required>
    </div>
    <div class="col-md-3">
        <label class="form-label fw-semibold">Tanggal <span class="text-danger">*</span></label>
        <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', $e?->tanggal?->format('Y-m-d')) }}" required>
    </div>
    <div class="col-md-3">
        <label class="form-label fw-semibold">Jam</label>
        <input type="time" name="jam" class="form-control" value="{{ old('jam', $e?->jam) }}">
    </div>
    <div class="col-md-6">
        <label class="form-label fw-semibold">Poster</label>
        @if($e?->poster)
            <div class="mb-2"><img src="{{ Storage::url($e->poster) }}" height="70" class="rounded"></div>
        @endif
        <input type="file" name="poster" class="form-control" accept="image/*">
    </div>
    <div class="col-md-6">
        <label class="form-label fw-semibold">Link Pendaftaran</label>
        <input type="url" name="link_pendaftaran" class="form-control" value="{{ old('link_pendaftaran', $e?->link_pendaftaran) }}">
    </div>
    <div class="col-12">
        <label class="form-label fw-semibold">Deskripsi <span class="text-danger">*</span></label>
        <textarea name="deskripsi" class="form-control" rows="4" required>{{ old('deskripsi', $e?->deskripsi) }}</textarea>
    </div>
    <div class="col-12">
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="status" id="status" value="1" {{ old('status', $e?->status ?? true) ? 'checked' : '' }}>
            <label class="form-check-label fw-semibold" for="status">Status Publish</label>
        </div>
    </div>
</div>