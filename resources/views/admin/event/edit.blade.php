@extends('layouts.admin')
@section('title', 'Edit Event')
@section('content')

<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
    <div>
        <div class="text-muted small mb-1">
            <a href="{{ route('admin.event.index') }}" class="text-decoration-none text-muted">
                <i class="fa-solid fa-calendar-days me-1"></i> Data Event
            </a>
            <i class="fa-solid fa-chevron-right mx-2 text-muted small"></i>
            <span class="text-dark font-mono">Edit Event</span>
        </div>
        <h4 class="fw-bold mb-0" style="color:var(--primary);">Edit Event: {{ $event->judul }}</h4>
    </div>

    <div>
        <a href="{{ route('admin.event.index') }}" class="btn btn-outline-secondary px-4 me-2">
            <i class="fa-solid fa-arrow-left me-1"></i> Kembali
        </a>
    </div>
</div>

<form action="{{ route('admin.event.update', $event) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    @include('admin.event._form')

    <div class="mt-4 d-flex align-items-center justify-content-end gap-2 p-3 bg-white border rounded-4 shadow-sm">
        <a href="{{ route('admin.event.index') }}" class="btn btn-light border px-4 fw-semibold">Batal</a>
        <button type="submit" class="btn btn-primary px-5 fw-bold shadow-sm">
            <i class="fa-solid fa-pen-to-square me-1.5"></i> Update Event
        </button>
    </div>
</form>

@endsection