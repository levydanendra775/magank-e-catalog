@extends('layouts.admin')
@section('title', 'Banner')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">Data Banner</h5>
    <a href="{{ route('admin.banner.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus me-1"></i> Tambah</a>
</div>
@endsection
