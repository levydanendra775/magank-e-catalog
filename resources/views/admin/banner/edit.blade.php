@extends('layouts.admin')
@section('title', 'Edit Banner')
@section('content')
<div class="card border-0 shadow-sm" style="border-radius:12px; max-width:700px;">
    <div class="card-body p-4">
        <h5 class="fw-bold mb-4">Edit Banner</h5>
        <form action="{{ route('admin.banner.update', $banner) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            @include('admin.banner._form')
            <div class="mt-4">
                <button type="submit" class="btn btn-primary me-2">Update</button>
                <a href="{{ route('admin.banner.index') }}" class="btn btn-outline-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
