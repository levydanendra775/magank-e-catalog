@extends('layouts.public')
@section('title', 'Tentang Kami — Pesona Magetan')
@section('content')
    <div style="position:relative;background-color:#0f2018;background-image:url('{{ asset('images/hero-telaga-sarangan.jpg') }}');background-size:cover;background-position:center 85%;background-repeat:no-repeat;padding:80px 0;overflow:hidden;"
        data-aos="fade-down">

        <div class="container text-white text-center">
            <h1 class="fw-bold mb-3" style="font-family:'Plus Jakarta Sans',sans-serif;">Tentang Pesona Magetan</h1>
            <p style="opacity:0.85;max-width:600px;margin:0 auto;">Platform digital promosi wisata, event, dan berita
                Kabupaten Magetan</p>
        </div>
    </div>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="p-4 mb-4" style="background:#fff;border:1px solid var(--border);border-radius:16px;"
                    data-aos="fade-up">
                    <h4 class="fw-bold mb-3" style="font-family:'Plus Jakarta Sans',sans-serif;color:var(--text-dark);">
                        Tentang Kami</h4>
                    <p style="line-height:1.9;color:var(--text-muted);text-align:justify;">
                        <strong style="color:var(--text-dark);">Pesona Magetan</strong> adalah platform digital yang dikembangkan oleh Tim Magang Universitas PGRI Madiun (2026) di Bidang Pemasaran Dinas Pariwisata dan Kebudayaan Kabupaten Magetan. Platform ini hadir sebagai satu pintu digital untuk mengatasi masalah informasi wisata Magetan yang sebelumnya tersebar di berbagai sumber dan sulit diakses maupun diperbarui.
                    </p>
                    <p style="line-height:1.9;color:var(--text-muted);">Melalui platform ini, wisatawan dapat mengakses:</p>
                    <ul style="line-height:1.9;color:var(--text-muted);padding-left:1.4rem;">
                        <li><strong style="color:var(--text-dark);">Informasi destinasi wisata —</strong> harga tiket, jam operasional, fasilitas, deskripsi, dan lokasi yang terintegrasi peta digital</li>
                        <li><strong style="color:var(--text-dark);">Event &amp; agenda —</strong> kegiatan pariwisata dan budaya di Magetan</li>
                        <li><strong style="color:var(--text-dark);">Berita —</strong> perkembangan pariwisata daerah dan program Dinas Pariwisata</li>
                    </ul>
                    <p style="line-height:1.9;color:var(--text-muted);text-align:justify;">
                        Tujuan utamanya adalah memperluas promosi wisata Magetan secara digital, mendukung transformasi layanan informasi pemerintah daerah yang lebih modern, serta memudahkan wisatawan merencanakan perjalanan dari mencari destinasi hingga mengikuti update terbaru.
                    </p>
                </div>
                <div class="p-4" style="background:#fff;border:1px solid var(--border);border-radius:16px;"
                    data-aos="fade-up" data-aos-delay="100">
                    <h5 class="fw-bold mb-3" style="font-family:'Plus Jakarta Sans',sans-serif;color:var(--text-dark);">
                        Kontak Kami</h5>
                    <div class="d-flex flex-column gap-3">
                        <a href="{{ config('kontak.alamat_maps_url') }}" target="_blank" rel="noopener noreferrer"
                            class="d-flex gap-3 align-items-center text-decoration-none">
                            <div
                                style="width:42px;height:42px;background:var(--primary-light);border-radius:10px;display:flex;align-items:center;justify-content:center;color:var(--primary);flex-shrink:0;">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div>
                                <div class="fw-semibold small" style="color:var(--text-dark);">Alamat</div>
                                <div class="small" style="color:var(--text-muted);">{{ config('kontak.alamat') }}</div>
                            </div>
                        </a>
                        <div class="d-flex gap-3 align-items-center">
                            <div
                                style="width:42px;height:42px;background:var(--primary-light);border-radius:10px;display:flex;align-items:center;justify-content:center;color:var(--primary);flex-shrink:0;">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div>
                                <div class="fw-semibold small" style="color:var(--text-dark);">Telepon</div>
                                <div class="small" style="color:var(--text-muted);">{{ config('kontak.telepon') }}</div>
                            </div>
                        </div>
                        <div class="d-flex gap-3 align-items-center">
                            <div
                                style="width:42px;height:42px;background:var(--primary-light);border-radius:10px;display:flex;align-items:center;justify-content:center;color:var(--primary);flex-shrink:0;">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div>
                                <div class="fw-semibold small" style="color:var(--text-dark);">Email</div>
                                <div class="small" style="color:var(--text-muted);">{{ config('kontak.email') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
