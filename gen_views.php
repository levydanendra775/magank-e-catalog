<?php

function makeDir($path) {
    if (!is_dir($path)) mkdir($path, 0755, true);
}

function writeFile($path, $content) {
    file_put_contents($path, $content);
    echo "  Written: $path\n";
}

$base = __DIR__ . '/resources/views/admin';

// ============================================================
// WISATA
// ============================================================
makeDir("$base/wisata");

writeFile("$base/wisata/index.blade.php", <<<'BLADE'
@extends('layouts.admin')
@section('title', 'Destinasi Wisata')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">Data Destinasi Wisata</h5>
    <a href="{{ route('admin.wisata.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus me-1"></i> Tambah</a>
</div>
<div class="card border-0 shadow-sm" style="border-radius:12px;">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr><th>#</th><th>Thumbnail</th><th>Nama</th><th>Kategori</th><th>Kecamatan</th><th>Status</th><th>Aksi</th></tr>
                </thead>
                <tbody>
                @forelse($wisata as $i => $w)
                <tr>
                    <td>{{ $wisata->firstItem() + $i }}</td>
                    <td>
                        @if($w->thumbnail)
                            <img src="{{ Storage::url($w->thumbnail) }}" width="60" height="45" class="rounded object-fit-cover">
                        @else
                            <span class="text-muted small">-</span>
                        @endif
                    </td>
                    <td class="fw-semibold">{{ $w->nama }}</td>
                    <td>{{ $w->kategori }}</td>
                    <td>{{ $w->kecamatan }}</td>
                    <td>
                        @if($w->status_publish)
                            <span class="badge bg-success">Publish</span>
                        @else
                            <span class="badge bg-secondary">Draft</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.wisata.edit', $w) }}" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-pen"></i></a>
                        <form action="{{ route('admin.wisata.destroy', $w) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" class="text-center text-muted py-4">Belum ada data wisata.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer bg-transparent">{{ $wisata->links() }}</div>
</div>
@endsection
BLADE);

writeFile("$base/wisata/create.blade.php", <<<'BLADE'
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
BLADE);

writeFile("$base/wisata/edit.blade.php", <<<'BLADE'
@extends('layouts.admin')
@section('title', 'Edit Wisata')
@section('content')
<div class="card border-0 shadow-sm" style="border-radius:12px; max-width:800px;">
    <div class="card-body p-4">
        <h5 class="fw-bold mb-4">Edit Destinasi Wisata</h5>
        <form action="{{ route('admin.wisata.update', $wisata) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            @include('admin.wisata._form')
            <div class="mt-4">
                <button type="submit" class="btn btn-primary me-2">Update</button>
                <a href="{{ route('admin.wisata.index') }}" class="btn btn-outline-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
BLADE);

writeFile("$base/wisata/_form.blade.php", <<<'BLADE'
@php $w = $wisata ?? null; @endphp
<div class="row g-3">
    <div class="col-md-8">
        <label class="form-label fw-semibold">Nama Wisata <span class="text-danger">*</span></label>
        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $w?->nama) }}" required>
        @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-4">
        <label class="form-label fw-semibold">Kategori <span class="text-danger">*</span></label>
        <select name="kategori" class="form-select @error('kategori') is-invalid @enderror" required>
            <option value="">Pilih Kategori</option>
            @foreach(['Alam', 'Budaya', 'Religi', 'Buatan', 'Edukasi', 'Kuliner', 'Olahraga'] as $kat)
                <option value="{{ $kat }}" {{ old('kategori', $w?->kategori) == $kat ? 'selected' : '' }}>{{ $kat }}</option>
            @endforeach
        </select>
        @error('kategori')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6">
        <label class="form-label fw-semibold">Kecamatan <span class="text-danger">*</span></label>
        <select name="kecamatan" class="form-select" required>
            <option value="">Pilih Kecamatan</option>
            @foreach(['Magetan', 'Maospati', 'Karas', 'Panekan', 'Plaosan', 'Sidorejo', 'Parang', 'Barat', 'Sukomoro', 'Ngariboyo', 'Kartoharjo', 'Kawedanan', 'Takeran', 'Nguntoronadi', 'Lembeyan', 'Bancikan', 'Poncol', 'Satu Atap'] as $kec)
                <option value="{{ $kec }}" {{ old('kecamatan', $w?->kecamatan) == $kec ? 'selected' : '' }}>{{ $kec }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6">
        <label class="form-label fw-semibold">Harga Tiket (Rp)</label>
        <input type="number" name="harga_tiket" class="form-control" value="{{ old('harga_tiket', $w?->harga_tiket) }}" min="0">
    </div>
    <div class="col-12">
        <label class="form-label fw-semibold">Alamat</label>
        <input type="text" name="alamat" class="form-control" value="{{ old('alamat', $w?->alamat) }}">
    </div>
    <div class="col-md-6">
        <label class="form-label fw-semibold">Latitude</label>
        <input type="text" name="latitude" class="form-control" value="{{ old('latitude', $w?->latitude) }}" placeholder="-7.67...">
    </div>
    <div class="col-md-6">
        <label class="form-label fw-semibold">Longitude</label>
        <input type="text" name="longitude" class="form-control" value="{{ old('longitude', $w?->longitude) }}" placeholder="111.32...">
    </div>
    <div class="col-md-6">
        <label class="form-label fw-semibold">Jam Operasional</label>
        <input type="text" name="jam_operasional" class="form-control" value="{{ old('jam_operasional', $w?->jam_operasional) }}" placeholder="07.00 - 17.00 WIB">
    </div>
    <div class="col-12">
        <label class="form-label fw-semibold">Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="4">{{ old('deskripsi', $w?->deskripsi) }}</textarea>
    </div>
    <div class="col-12">
        <label class="form-label fw-semibold">Fasilitas</label>
        <textarea name="fasilitas" class="form-control" rows="2" placeholder="Parkir, Toilet, Warung Makan, ...">{{ old('fasilitas', $w?->fasilitas) }}</textarea>
    </div>
    <div class="col-md-6">
        <label class="form-label fw-semibold">Thumbnail</label>
        @if($w?->thumbnail)
            <div class="mb-2"><img src="{{ Storage::url($w->thumbnail) }}" height="80" class="rounded"></div>
        @endif
        <input type="file" name="thumbnail" class="form-control" accept="image/*">
    </div>
    <div class="col-md-6 d-flex align-items-center">
        <div class="form-check form-switch mt-4">
            <input class="form-check-input" type="checkbox" name="status_publish" id="status_publish" {{ old('status_publish', $w?->status_publish ?? true) ? 'checked' : '' }}>
            <label class="form-check-label fw-semibold" for="status_publish">Status Publish</label>
        </div>
    </div>
</div>
BLADE);

// ============================================================
// UMKM
// ============================================================
makeDir("$base/umkm");

writeFile("$base/umkm/index.blade.php", <<<'BLADE'
@extends('layouts.admin')
@section('title', 'UMKM')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">Data UMKM</h5>
    <a href="{{ route('admin.umkm.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus me-1"></i> Tambah</a>
</div>
<div class="card border-0 shadow-sm" style="border-radius:12px;">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr><th>#</th><th>Logo</th><th>Nama UMKM</th><th>Pemilik</th><th>Kecamatan</th><th>No. HP</th><th>Aksi</th></tr>
                </thead>
                <tbody>
                @forelse($umkm as $i => $u)
                <tr>
                    <td>{{ $umkm->firstItem() + $i }}</td>
                    <td>
                        @if($u->logo)
                            <img src="{{ Storage::url($u->logo) }}" width="45" height="45" class="rounded-circle object-fit-cover">
                        @else
                            <div class="rounded-circle bg-secondary d-inline-flex align-items-center justify-content-center" style="width:45px;height:45px">
                                <i class="fa-solid fa-shop text-white"></i>
                            </div>
                        @endif
                    </td>
                    <td class="fw-semibold">{{ $u->nama }}</td>
                    <td>{{ $u->pemilik }}</td>
                    <td>{{ $u->kecamatan }}</td>
                    <td>{{ $u->no_hp }}</td>
                    <td>
                        <a href="{{ route('admin.umkm.edit', $u) }}" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-pen"></i></a>
                        <form action="{{ route('admin.umkm.destroy', $u) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" class="text-center text-muted py-4">Belum ada data UMKM.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer bg-transparent">{{ $umkm->links() }}</div>
</div>
@endsection
BLADE);

writeFile("$base/umkm/create.blade.php", <<<'BLADE'
@extends('layouts.admin')
@section('title', 'Tambah UMKM')
@section('content')
<div class="card border-0 shadow-sm" style="border-radius:12px; max-width:700px;">
    <div class="card-body p-4">
        <h5 class="fw-bold mb-4">Tambah Data UMKM</h5>
        <form action="{{ route('admin.umkm.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.umkm._form')
            <div class="mt-4">
                <button type="submit" class="btn btn-primary me-2">Simpan</button>
                <a href="{{ route('admin.umkm.index') }}" class="btn btn-outline-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
BLADE);

writeFile("$base/umkm/edit.blade.php", <<<'BLADE'
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
BLADE);

writeFile("$base/umkm/_form.blade.php", <<<'BLADE'
@php $u = $umkm ?? null; @endphp
<div class="row g-3">
    <div class="col-md-8">
        <label class="form-label fw-semibold">Nama UMKM <span class="text-danger">*</span></label>
        <input type="text" name="nama" class="form-control" value="{{ old('nama', $u?->nama) }}" required>
    </div>
    <div class="col-md-4">
        <label class="form-label fw-semibold">No. HP <span class="text-danger">*</span></label>
        <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp', $u?->no_hp) }}" required>
    </div>
    <div class="col-md-6">
        <label class="form-label fw-semibold">Nama Pemilik <span class="text-danger">*</span></label>
        <input type="text" name="pemilik" class="form-control" value="{{ old('pemilik', $u?->pemilik) }}" required>
    </div>
    <div class="col-md-6">
        <label class="form-label fw-semibold">Kecamatan <span class="text-danger">*</span></label>
        <select name="kecamatan" class="form-select" required>
            @foreach(['Magetan', 'Maospati', 'Karas', 'Panekan', 'Plaosan', 'Sidorejo', 'Parang', 'Barat', 'Sukomoro', 'Ngariboyo', 'Kartoharjo', 'Kawedanan', 'Takeran', 'Nguntoronadi', 'Lembeyan', 'Bancikan', 'Poncol'] as $kec)
                <option value="{{ $kec }}" {{ old('kecamatan', $u?->kecamatan) == $kec ? 'selected' : '' }}>{{ $kec }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-12">
        <label class="form-label fw-semibold">Alamat <span class="text-danger">*</span></label>
        <textarea name="alamat" class="form-control" rows="2" required>{{ old('alamat', $u?->alamat) }}</textarea>
    </div>
    <div class="col-md-6">
        <label class="form-label fw-semibold">Logo</label>
        @if($u?->logo)
            <div class="mb-2"><img src="{{ Storage::url($u->logo) }}" height="70" class="rounded-circle"></div>
        @endif
        <input type="file" name="logo" class="form-control" accept="image/*">
    </div>
    <div class="col-12">
        <label class="form-label fw-semibold">Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $u?->deskripsi) }}</textarea>
    </div>
</div>
BLADE);

// ============================================================
// PRODUK
// ============================================================
makeDir("$base/produk");

writeFile("$base/produk/index.blade.php", <<<'BLADE'
@extends('layouts.admin')
@section('title', 'Produk UMKM')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">Data Produk UMKM</h5>
    <a href="{{ route('admin.produk.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus me-1"></i> Tambah</a>
</div>
<div class="card border-0 shadow-sm" style="border-radius:12px;">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr><th>#</th><th>Foto</th><th>Nama Produk</th><th>UMKM</th><th>Kategori</th><th>Harga</th><th>Status</th><th>Aksi</th></tr>
                </thead>
                <tbody>
                @forelse($produk as $i => $p)
                <tr>
                    <td>{{ $produk->firstItem() + $i }}</td>
                    <td>
                        @if($p->foto)
                            <img src="{{ Storage::url($p->foto) }}" width="50" height="45" class="rounded object-fit-cover">
                        @else <span class="text-muted">-</span> @endif
                    </td>
                    <td class="fw-semibold">{{ $p->nama }}</td>
                    <td>{{ $p->umkm?->nama }}</td>
                    <td>{{ $p->kategori }}</td>
                    <td>Rp {{ number_format($p->harga, 0, ',', '.') }}</td>
                    <td><span class="badge {{ $p->status ? 'bg-success' : 'bg-secondary' }}">{{ $p->status ? 'Aktif' : 'Nonaktif' }}</span></td>
                    <td>
                        <a href="{{ route('admin.produk.edit', $p) }}" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-pen"></i></a>
                        <form action="{{ route('admin.produk.destroy', $p) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="8" class="text-center text-muted py-4">Belum ada data produk.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer bg-transparent">{{ $produk->links() }}</div>
</div>
@endsection
BLADE);

writeFile("$base/produk/create.blade.php", <<<'BLADE'
@extends('layouts.admin')
@section('title', 'Tambah Produk')
@section('content')
<div class="card border-0 shadow-sm" style="border-radius:12px; max-width:700px;">
    <div class="card-body p-4">
        <h5 class="fw-bold mb-4">Tambah Produk UMKM</h5>
        <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.produk._form')
            <div class="mt-4">
                <button type="submit" class="btn btn-primary me-2">Simpan</button>
                <a href="{{ route('admin.produk.index') }}" class="btn btn-outline-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
BLADE);

writeFile("$base/produk/edit.blade.php", <<<'BLADE'
@extends('layouts.admin')
@section('title', 'Edit Produk')
@section('content')
<div class="card border-0 shadow-sm" style="border-radius:12px; max-width:700px;">
    <div class="card-body p-4">
        <h5 class="fw-bold mb-4">Edit Produk UMKM</h5>
        <form action="{{ route('admin.produk.update', $produk) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            @include('admin.produk._form')
            <div class="mt-4">
                <button type="submit" class="btn btn-primary me-2">Update</button>
                <a href="{{ route('admin.produk.index') }}" class="btn btn-outline-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
BLADE);

writeFile("$base/produk/_form.blade.php", <<<'BLADE'
@php $p = $produk ?? null; @endphp
<div class="row g-3">
    <div class="col-12">
        <label class="form-label fw-semibold">UMKM <span class="text-danger">*</span></label>
        <select name="umkm_id" class="form-select" required>
            <option value="">Pilih UMKM</option>
            @foreach($umkm as $u)
                <option value="{{ $u->id }}" {{ old('umkm_id', $p?->umkm_id) == $u->id ? 'selected' : '' }}>{{ $u->nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-8">
        <label class="form-label fw-semibold">Nama Produk <span class="text-danger">*</span></label>
        <input type="text" name="nama" class="form-control" value="{{ old('nama', $p?->nama) }}" required>
    </div>
    <div class="col-md-4">
        <label class="form-label fw-semibold">Kategori <span class="text-danger">*</span></label>
        <input type="text" name="kategori" class="form-control" value="{{ old('kategori', $p?->kategori) }}" required placeholder="Makanan, Kerajinan...">
    </div>
    <div class="col-md-6">
        <label class="form-label fw-semibold">Harga (Rp) <span class="text-danger">*</span></label>
        <input type="number" name="harga" class="form-control" value="{{ old('harga', $p?->harga) }}" required min="0">
    </div>
    <div class="col-md-6">
        <label class="form-label fw-semibold">Foto Produk</label>
        @if($p?->foto)
            <div class="mb-2"><img src="{{ Storage::url($p->foto) }}" height="60" class="rounded"></div>
        @endif
        <input type="file" name="foto" class="form-control" accept="image/*">
    </div>
    <div class="col-12">
        <label class="form-label fw-semibold">Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $p?->deskripsi) }}</textarea>
    </div>
    <div class="col-12">
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="status" id="status" {{ old('status', $p?->status ?? true) ? 'checked' : '' }}>
            <label class="form-check-label fw-semibold" for="status">Status Aktif</label>
        </div>
    </div>
</div>
BLADE);

// ============================================================
// EVENT
// ============================================================
makeDir("$base/event");

writeFile("$base/event/index.blade.php", <<<'BLADE'
@extends('layouts.admin')
@section('title', 'Event')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">Data Event</h5>
    <a href="{{ route('admin.event.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus me-1"></i> Tambah</a>
</div>
<div class="card border-0 shadow-sm" style="border-radius:12px;">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr><th>#</th><th>Poster</th><th>Judul</th><th>Lokasi</th><th>Tanggal</th><th>Status</th><th>Aksi</th></tr>
                </thead>
                <tbody>
                @forelse($events as $i => $e)
                <tr>
                    <td>{{ $events->firstItem() + $i }}</td>
                    <td>
                        @if($e->poster)
                            <img src="{{ Storage::url($e->poster) }}" width="60" height="45" class="rounded object-fit-cover">
                        @else <span class="text-muted">-</span> @endif
                    </td>
                    <td class="fw-semibold">{{ $e->judul }}</td>
                    <td>{{ $e->lokasi }}</td>
                    <td>{{ $e->tanggal->format('d M Y') }}</td>
                    <td><span class="badge {{ $e->status ? 'bg-success' : 'bg-secondary' }}">{{ $e->status ? 'Publish' : 'Draft' }}</span></td>
                    <td>
                        <a href="{{ route('admin.event.edit', $e) }}" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-pen"></i></a>
                        <form action="{{ route('admin.event.destroy', $e) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" class="text-center text-muted py-4">Belum ada data event.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer bg-transparent">{{ $events->links() }}</div>
</div>
@endsection
BLADE);

writeFile("$base/event/create.blade.php", <<<'BLADE'
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
BLADE);

writeFile("$base/event/edit.blade.php", <<<'BLADE'
@extends('layouts.admin')
@section('title', 'Edit Event')
@section('content')
<div class="card border-0 shadow-sm" style="border-radius:12px; max-width:700px;">
    <div class="card-body p-4">
        <h5 class="fw-bold mb-4">Edit Event</h5>
        <form action="{{ route('admin.event.update', $event) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            @include('admin.event._form')
            <div class="mt-4">
                <button type="submit" class="btn btn-primary me-2">Update</button>
                <a href="{{ route('admin.event.index') }}" class="btn btn-outline-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
BLADE);

writeFile("$base/event/_form.blade.php", <<<'BLADE'
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
            <input class="form-check-input" type="checkbox" name="status" id="status" {{ old('status', $e?->status ?? true) ? 'checked' : '' }}>
            <label class="form-check-label fw-semibold" for="status">Status Publish</label>
        </div>
    </div>
</div>
BLADE);

// ============================================================
// KULINER
// ============================================================
makeDir("$base/kuliner");

$entityForms = [
    'kuliner' => [
        'title' => 'Kuliner',
        'fields' => <<<'FIELDS'
@php $item = $kuliner ?? null; @endphp
<div class="row g-3">
    <div class="col-md-8"><label class="form-label fw-semibold">Nama <span class="text-danger">*</span></label>
        <input type="text" name="nama" class="form-control" value="{{ old('nama', $item?->nama) }}" required></div>
    <div class="col-md-4"><label class="form-label fw-semibold">No. HP</label>
        <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp', $item?->no_hp) }}"></div>
    <div class="col-12"><label class="form-label fw-semibold">Alamat <span class="text-danger">*</span></label>
        <textarea name="alamat" class="form-control" rows="2" required>{{ old('alamat', $item?->alamat) }}</textarea></div>
    <div class="col-md-6"><label class="form-label fw-semibold">Menu Unggulan</label>
        <input type="text" name="menu_unggulan" class="form-control" value="{{ old('menu_unggulan', $item?->menu_unggulan) }}"></div>
    <div class="col-md-6"><label class="form-label fw-semibold">Jam Buka</label>
        <input type="text" name="jam_buka" class="form-control" value="{{ old('jam_buka', $item?->jam_buka) }}" placeholder="08.00 - 20.00"></div>
    <div class="col-12"><label class="form-label fw-semibold">Link Maps</label>
        <input type="text" name="maps" class="form-control" value="{{ old('maps', $item?->maps) }}"></div>
    <div class="col-md-6"><label class="form-label fw-semibold">Foto</label>
        @if($item?->foto)<div class="mb-2"><img src="{{ Storage::url($item->foto) }}" height="60" class="rounded"></div>@endif
        <input type="file" name="foto" class="form-control" accept="image/*"></div>
</div>
FIELDS,
    ],
    'penginapan' => [
        'title' => 'Penginapan',
        'fields' => <<<'FIELDS'
@php $item = $penginapan ?? null; @endphp
<div class="row g-3">
    <div class="col-md-8"><label class="form-label fw-semibold">Nama <span class="text-danger">*</span></label>
        <input type="text" name="nama" class="form-control" value="{{ old('nama', $item?->nama) }}" required></div>
    <div class="col-md-4"><label class="form-label fw-semibold">Jenis <span class="text-danger">*</span></label>
        <select name="jenis" class="form-select" required>
            @foreach(['Hotel', 'Villa', 'Guest House', 'Homestay', 'Losmen', 'Resort'] as $j)
                <option value="{{ $j }}" {{ old('jenis', $item?->jenis) == $j ? 'selected' : '' }}>{{ $j }}</option>
            @endforeach
        </select></div>
    <div class="col-md-6"><label class="form-label fw-semibold">Harga Mulai (Rp)</label>
        <input type="number" name="harga_mulai" class="form-control" value="{{ old('harga_mulai', $item?->harga_mulai) }}" min="0"></div>
    <div class="col-md-6"><label class="form-label fw-semibold">No. HP</label>
        <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp', $item?->no_hp) }}"></div>
    <div class="col-12"><label class="form-label fw-semibold">Alamat <span class="text-danger">*</span></label>
        <textarea name="alamat" class="form-control" rows="2" required>{{ old('alamat', $item?->alamat) }}</textarea></div>
    <div class="col-12"><label class="form-label fw-semibold">Fasilitas</label>
        <textarea name="fasilitas" class="form-control" rows="2">{{ old('fasilitas', $item?->fasilitas) }}</textarea></div>
    <div class="col-12"><label class="form-label fw-semibold">Link Maps</label>
        <input type="text" name="maps" class="form-control" value="{{ old('maps', $item?->maps) }}"></div>
    <div class="col-md-6"><label class="form-label fw-semibold">Foto</label>
        @if($item?->foto)<div class="mb-2"><img src="{{ Storage::url($item->foto) }}" height="60" class="rounded"></div>@endif
        <input type="file" name="foto" class="form-control" accept="image/*"></div>
</div>
FIELDS,
    ],
    'berita' => [
        'title' => 'Berita',
        'fields' => <<<'FIELDS'
@php $item = $berita ?? null; @endphp
<div class="row g-3">
    <div class="col-12"><label class="form-label fw-semibold">Judul Berita <span class="text-danger">*</span></label>
        <input type="text" name="judul" class="form-control" value="{{ old('judul', $item?->judul) }}" required></div>
    <div class="col-md-6"><label class="form-label fw-semibold">Thumbnail</label>
        @if($item?->thumbnail)<div class="mb-2"><img src="{{ Storage::url($item->thumbnail) }}" height="60" class="rounded"></div>@endif
        <input type="file" name="thumbnail" class="form-control" accept="image/*"></div>
    <div class="col-md-6 d-flex align-items-center">
        <div class="form-check form-switch mt-4">
            <input class="form-check-input" type="checkbox" name="status" id="status" {{ old('status', $item?->status ?? true) ? 'checked' : '' }}>
            <label class="form-check-label fw-semibold" for="status">Status Publish</label>
        </div>
    </div>
    <div class="col-12"><label class="form-label fw-semibold">Isi Berita <span class="text-danger">*</span></label>
        <textarea name="isi" class="form-control" rows="8" required>{{ old('isi', $item?->isi) }}</textarea></div>
</div>
FIELDS,
    ],
    'banner' => [
        'title' => 'Banner',
        'fields' => <<<'FIELDS'
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
FIELDS,
    ],
    'galeri' => [
        'title' => 'Galeri',
        'fields' => <<<'FIELDS'
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
FIELDS,
    ],
];

foreach ($entityForms as $entity => $config) {
    makeDir("$base/$entity");

    // Index
    writeFile("$base/$entity/index.blade.php", "@extends('layouts.admin')\n@section('title', '{$config['title']}')\n@section('content')\n<div class=\"d-flex justify-content-between align-items-center mb-4\">\n    <h5 class=\"fw-bold mb-0\">Data {$config['title']}</h5>\n    <a href=\"{{ route('admin.$entity.create') }}\" class=\"btn btn-primary\"><i class=\"fa-solid fa-plus me-1\"></i> Tambah</a>\n</div>\n@endsection\n");

    // Create
    writeFile("$base/$entity/create.blade.php", "@extends('layouts.admin')\n@section('title', 'Tambah {$config['title']}')\n@section('content')\n<div class=\"card border-0 shadow-sm\" style=\"border-radius:12px; max-width:700px;\">\n    <div class=\"card-body p-4\">\n        <h5 class=\"fw-bold mb-4\">Tambah {$config['title']}</h5>\n        <form action=\"{{ route('admin.$entity.store') }}\" method=\"POST\" enctype=\"multipart/form-data\">\n            @csrf\n            @include('admin.$entity._form')\n            <div class=\"mt-4\">\n                <button type=\"submit\" class=\"btn btn-primary me-2\">Simpan</button>\n                <a href=\"{{ route('admin.$entity.index') }}\" class=\"btn btn-outline-secondary\">Batal</a>\n            </div>\n        </form>\n    </div>\n</div>\n@endsection\n");

    // Edit
    writeFile("$base/$entity/edit.blade.php", "@extends('layouts.admin')\n@section('title', 'Edit {$config['title']}')\n@section('content')\n<div class=\"card border-0 shadow-sm\" style=\"border-radius:12px; max-width:700px;\">\n    <div class=\"card-body p-4\">\n        <h5 class=\"fw-bold mb-4\">Edit {$config['title']}</h5>\n        <form action=\"{{ route('admin.$entity.update', \$$entity) }}\" method=\"POST\" enctype=\"multipart/form-data\">\n            @csrf @method('PUT')\n            @include('admin.$entity._form')\n            <div class=\"mt-4\">\n                <button type=\"submit\" class=\"btn btn-primary me-2\">Update</button>\n                <a href=\"{{ route('admin.$entity.index') }}\" class=\"btn btn-outline-secondary\">Batal</a>\n            </div>\n        </form>\n    </div>\n</div>\n@endsection\n");

    // _form
    writeFile("$base/$entity/_form.blade.php", $config['fields']);
}

echo "All views generated!\n";
