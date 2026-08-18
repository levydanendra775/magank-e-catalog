@extends('layouts.public')
@section('title', 'Tentang Kami — Jelajah Magetan')
@section('content')
<div style="background:linear-gradient(135deg, var(--primary-dark), var(--primary));padding:80px 0;" data-aos="fade-down">
    <div class="container text-white text-center">
        <h1 class="fw-bold mb-3" style="font-family:'Plus Jakarta Sans',sans-serif;">Tentang Jelajah Magetan</h1>
        <p style="opacity:0.85;max-width:600px;margin:0 auto;">Platform digital promosi wisata, event, dan berita Kabupaten Magetan</p>
    </div>
</div>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="p-4 mb-4" style="background:#fff;border:1px solid var(--border);border-radius:16px;" data-aos="fade-up">
                <h4 class="fw-bold mb-3" style="font-family:'Plus Jakarta Sans',sans-serif;color:var(--text-dark);">Tentang Kami</h4>
                <p style="line-height:1.9;color:var(--text-muted);">Jelajah Magetan merupakan platform digital yang dikembangkan oleh <strong style="color:var(--text-dark);">Bidang Pemasaran Dinas Pariwisata dan Kebudayaan Kabupaten Magetan</strong> sebagai media promosi dan informasi terpadu untuk destinasi wisata, event, dan berita seputar Kabupaten Magetan, Jawa Timur.</p>
                <p style="line-height:1.9;color:var(--text-muted);">Platform ini bertujuan untuk memperluas jangkauan promosi pariwisata secara digital, serta memudahkan wisatawan dalam mengakses informasi perjalanan ke Kabupaten Magetan — mulai dari pencarian destinasi, jadwal event, hingga berita terbaru seputar pariwisata daerah.</p>
            </div>
            <div class="p-4" style="background:#fff;border:1px solid var(--border);border-radius:16px;" data-aos="fade-up" data-aos-delay="100">
                <h5 class="fw-bold mb-3" style="font-family:'Plus Jakarta Sans',sans-serif;color:var(--text-dark);">Kontak Kami</h5>
                <div class="d-flex flex-column gap-3">
                    <a href="{{ config('kontak.alamat_maps_url') }}" target="_blank" rel="noopener noreferrer" class="d-flex gap-3 align-items-center text-decoration-none">
                        <div style="width:42px;height:42px;background:var(--primary-light);border-radius:10px;display:flex;align-items:center;justify-content:center;color:var(--primary);flex-shrink:0;"><i class="fa-solid fa-location-dot"></i></div>
                        <div><div class="fw-semibold small" style="color:var(--text-dark);">Alamat</div><div class="small" style="color:var(--text-muted);">{{ config('kontak.alamat') }}</div></div>
                    </a>
                    <div class="d-flex gap-3 align-items-center">
                        <div style="width:42px;height:42px;background:var(--primary-light);border-radius:10px;display:flex;align-items:center;justify-content:center;color:var(--primary);flex-shrink:0;"><i class="fa-solid fa-phone"></i></div>
                        <div><div class="fw-semibold small" style="color:var(--text-dark);">Telepon</div><div class="small" style="color:var(--text-muted);">{{ config('kontak.telepon') }}</div></div>
                    </div>
                    <div class="d-flex gap-3 align-items-center">
                        <div style="width:42px;height:42px;background:var(--primary-light);border-radius:10px;display:flex;align-items:center;justify-content:center;color:var(--primary);flex-shrink:0;"><i class="fa-solid fa-envelope"></i></div>
                        <div><div class="fw-semibold small" style="color:var(--text-dark);">Email</div><div class="small" style="color:var(--text-muted);">{{ config('kontak.email') }}</div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection