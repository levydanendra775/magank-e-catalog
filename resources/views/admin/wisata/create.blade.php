@extends('layouts.admin')
@section('title', 'Tambah Wisata')
@section('content')
<div class="card border-0 shadow-sm" style="border-radius:12px; max-width:800px;">
    <div class="card-body p-4">
        <h5 class="fw-bold mb-4">Tambah Destinasi Wisata</h5>
        <form action="{{ route('admin.wisata.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.wisata._form')
            <div class="mt-4">
                <button type="submit" class="btn btn-primary me-2">Simpan</button>
                <a href="{{ route('admin.wisata.index') }}" class="btn btn-outline-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection