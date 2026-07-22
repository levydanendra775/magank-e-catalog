@extends('layouts.admin')
@section('title', 'Tambah Event')
@section('content')
<div class="card border-0 shadow-sm" style="border-radius:12px; max-width:700px;">
    <div class="card-body p-4">
        <h5 class="fw-bold mb-4">Tambah Event</h5>
        <form action="{{ route('admin.event.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.event._form')
            <div class="mt-4">
                <button type="submit" class="btn btn-primary me-2">Simpan</button>
                <a href="{{ route('admin.event.index') }}" class="btn btn-outline-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection