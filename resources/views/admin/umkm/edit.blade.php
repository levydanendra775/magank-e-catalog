@extends('layouts.admin')
@section('title', 'Edit UMKM')
@section('content')
<div class="card border-0 shadow-sm" style="border-radius:12px; max-width:700px;">
    <div class="card-body p-4">
        <h5 class="fw-bold mb-4">Edit Data UMKM</h5>
        <form action="{{ route('admin.umkm.update', $umkm) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            @include('admin.umkm._form')
            <div class="mt-4">
                <button type="submit" class="btn btn-primary me-2">Update</button>
                <a href="{{ route('admin.umkm.index') }}" class="btn btn-outline-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection