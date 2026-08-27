@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <!-- Hero Welcome Banner -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 text-white overflow-hidden p-4 p-md-5"
                style="background: linear-gradient(135deg, #1F3A34 0%, #14261F 100%); border-radius: 20px !important; position: relative;">

                <!-- Decorative Subtle Accent Shape -->
                <div
                    style="position: absolute; right: -30px; bottom: -30px; width: 220px; height: 220px; background: rgba(200, 155, 60, 0.08); border-radius: 50%; pointer-events: none;">
                </div>
                <div
                    style="position: absolute; right: 100px; top: -40px; width: 140px; height: 140px; background: rgba(255, 255, 255, 0.04); border-radius: 50%; pointer-events: none;">
                </div>

                <div class="position-relative" style="z-index: 2;">
                    <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill mb-3"
                        style="background: rgba(200, 155, 60, 0.2); border: 1px solid rgba(200, 155, 60, 0.4); color: #E5C16C; font-size: 0.78rem; font-weight: 700; letter-spacing: 0.5px; text-transform: uppercase;">
                        <i class="fa-solid fa-crown" style="font-size:0.75rem;"></i> Panel Kontrol Admin
                    </div>

                    <h2 class="fw-bold mb-2 text-white" style="font-family: 'Fraunces', serif; font-size: 1.85rem;">
                        Selamat Datang, {{ Auth::user()->name }}! 👋
                    </h2>

                    <p class="mb-0 text-white-50" style="max-width: 720px; font-size: 0.95rem; line-height: 1.6;">
                        Kelola seluruh destinasi wisata, agenda event, publikasi berita, ulasan pengunjung, serta laporan
                        pariwisata Kabupaten Magetan dalam satu portal terpadu.
                    </p>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
        <style>
            .stat-hover-card {
                position: relative;
                overflow: hidden;
                transition: all 0.3s cubic-bezier(0.2, 0.6, 0.2, 1);
                cursor: pointer;
            }

            .stat-hover-card::before {
                content: '';
                position: absolute;
                inset: 0;
                background: linear-gradient(135deg, rgba(255, 255, 255, 0.35) 0%, transparent 60%);
                opacity: 0;
                transition: opacity 0.25s ease;
                pointer-events: none;
            }

            .stat-hover-card:hover {
                transform: translateY(-4px);
                box-shadow: 0 16px 36px rgba(0, 0, 0, 0.08) !important;
            }

            .stat-hover-card:hover::before {
                opacity: 1;
            }

            /* Icon box base & transitions */
            .stat-icon-box {
                width: 62px;
                height: 62px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                transition: all 0.3s cubic-bezier(0.2, 0.6, 0.2, 1);
                position: relative;
                overflow: hidden;
            }

            .stat-icon-box::before {
                content: '';
                position: absolute;
                inset: 0;
                background: linear-gradient(135deg, rgba(255, 255, 255, 0.3) 0%, transparent 60%);
                opacity: 0;
                transition: opacity 0.25s ease;
                pointer-events: none;
            }

            .stat-hover-card:hover .stat-icon-box::before {
                opacity: 1;
            }

            /* Wisata Logo Hover Effect */
            .stat-icon-wisata {
                background: #EAF0EC;
                color: #1F3A34;
            }

            .stat-hover-card:hover .stat-icon-wisata {
                background: #1F3A34 !important;
                color: #E5C16C !important;
                transform: translateY(-3px) scale(1.1) rotate(4deg);
                box-shadow: 0 8px 24px rgba(31, 58, 52, 0.4);
            }

            /* Event Logo Hover Effect */
            .stat-icon-event {
                background: rgba(200, 155, 60, 0.15);
                color: #C89B3C;
            }

            .stat-hover-card:hover .stat-icon-event {
                background: linear-gradient(135deg, #C89B3C 0%, #E5C16C 100%) !important;
                color: #14261F !important;
                transform: translateY(-3px) scale(1.1) rotate(-4deg);
                box-shadow: 0 8px 24px rgba(200, 155, 60, 0.5);
            }

            /* Berita Logo Hover Effect */
            .stat-icon-berita {
                background: rgba(122, 59, 46, 0.12);
                color: #7A3B2E;
            }

            .stat-hover-card:hover .stat-icon-berita {
                background: linear-gradient(135deg, #7A3B2E 0%, #A04D3C 100%) !important;
                color: #ffffff !important;
                transform: translateY(-3px) scale(1.1) rotate(4deg);
                box-shadow: 0 8px 24px rgba(122, 59, 46, 0.4);
            }
        </style>
    @endpush

    <!-- Stat Cards Grid -->
    <div class="row g-4 mb-4">
        <!-- Wisata Card -->
        <div class="col-xl-4 col-md-6">
            <a href="{{ route('admin.wisata.index') }}" class="text-decoration-none d-block h-100"
                title="Kelola Destinasi Wisata">
                <div class="card border-0 h-100 p-3 stat-hover-card"
                    style="border-radius: 16px !important; border-left: 5px solid #1F3A34 !important;">
                    <div class="card-body d-flex align-items-center justify-content-between p-2">
                        <div>
                            <span class="text-uppercase font-mono fw-bold text-muted small"
                                style="letter-spacing: 0.5px; font-size: 0.75rem;">Destinasi Wisata</span>
                            <h2 class="fw-bold mb-0 mt-1"
                                style="font-family: 'Fraunces', serif; color: #1F3A34; font-size: 2.2rem;">
                                {{ $stats['wisata'] }}</h2>
                            <span class="badge mt-2"
                                style="background: #EAF0EC; color: #1F3A34; font-weight: 600; font-size: 0.73rem;">
                                <i class="fa-solid fa-location-dot me-1"></i> Terdaftar di Magetan
                            </span>
                            @if ($trendBulanIni['wisata'] > 0)
                                <span class="badge mt-2 ms-1"
                                    style="background: rgba(31,58,52,0.08); color: #1F3A34; font-weight: 600; font-size: 0.73rem;">
                                    <i class="fa-solid fa-arrow-trend-up me-1"></i> +{{ $trendBulanIni['wisata'] }} bulan
                                    ini
                                </span>
                            @endif
                        </div>
                        <div class="stat-icon-box stat-icon-wisata">
                            <i class="fa-solid fa-map-location-dot fa-xl"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Event Card -->
        <div class="col-xl-4 col-md-6">
            <a href="{{ route('admin.event.index') }}" class="text-decoration-none d-block h-100"
                title="Kelola Agenda Event">
                <div class="card border-0 h-100 p-3 stat-hover-card"
                    style="border-radius: 16px !important; border-left: 5px solid #C89B3C !important;">
                    <div class="card-body d-flex align-items-center justify-content-between p-2">
                        <div>
                            <span class="text-uppercase font-mono fw-bold text-muted small"
                                style="letter-spacing: 0.5px; font-size: 0.75rem;">Event Mendatang</span>
                            <h2 class="fw-bold mb-0 mt-1"
                                style="font-family: 'Fraunces', serif; color: #9C7726; font-size: 2.2rem;">
                                {{ $stats['event'] }}</h2>
                            <span class="badge mt-2"
                                style="background: rgba(200, 155, 60, 0.15); color: #9C7726; font-weight: 600; font-size: 0.73rem;">
                                <i class="fa-solid fa-calendar-check me-1"></i> Agenda Aktif
                            </span>
                        </div>
                        <div class="stat-icon-box stat-icon-event">
                            <i class="fa-solid fa-calendar-days fa-xl"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Berita Card -->
        <div class="col-xl-4 col-md-6">
            <a href="{{ route('admin.berita.index') }}" class="text-decoration-none d-block h-100"
                title="Kelola Berita Publikasi">
                <div class="card border-0 h-100 p-3 stat-hover-card"
                    style="border-radius: 16px !important; border-left: 5px solid #7A3B2E !important;">
                    <div class="card-body d-flex align-items-center justify-content-between p-2">
                        <div>
                            <span class="text-uppercase font-mono fw-bold text-muted small"
                                style="letter-spacing: 0.5px; font-size: 0.75rem;">Berita Publikasi</span>
                            <h2 class="fw-bold mb-0 mt-1"
                                style="font-family: 'Fraunces', serif; color: #7A3B2E; font-size: 2.2rem;">
                                {{ $stats['berita'] }}</h2>
                            <span class="badge mt-2"
                                style="background: rgba(122, 59, 46, 0.12); color: #7A3B2E; font-weight: 600; font-size: 0.73rem;">
                                <i class="fa-solid fa-newspaper me-1"></i> Artikel Terbit
                            </span>
                            @if ($trendBulanIni['berita'] > 0)
                                <span class="badge mt-2 ms-1"
                                    style="background: rgba(122,59,46,0.06); color: #7A3B2E; font-weight: 600; font-size: 0.73rem;">
                                    <i class="fa-solid fa-arrow-trend-up me-1"></i> +{{ $trendBulanIni['berita'] }} bulan
                                    ini
                                </span>
                            @endif
                        </div>
                        <div class="stat-icon-box stat-icon-berita">
                            <i class="fa-regular fa-newspaper fa-xl"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="row g-4">
        <!-- Chart: Wisata per Kecamatan -->
        <div class="col-lg-6">
            <div class="card border-0 h-100" style="border-radius: 16px !important;">
                <div
                    class="card-header bg-transparent border-0 pt-4 px-4 pb-0 d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="fw-bold mb-0" style="color: #1F3A34; font-size: 1.05rem;">Wisata per Kecamatan</h6>
                        <small class="text-muted">Sebaran destinasi wisata di Kabupaten Magetan</small>
                    </div>
                    <span class="badge" style="background: #EAF0EC; color: #1F3A34; font-weight: 600;">Chart Visual</span>
                </div>
                <div class="card-body p-4">
                    <div style="position: relative; height: 260px;">
                        <canvas id="chartWisata"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chart: Event per Bulan -->
        <div class="col-lg-6">
            <div class="card border-0 h-100" style="border-radius: 16px !important;">
                <div
                    class="card-header bg-transparent border-0 pt-4 px-4 pb-0 d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="fw-bold mb-0" style="color: #1F3A34; font-size: 1.05rem;">Event per Bulan
                            ({{ date('Y') }})</h6>
                        <small class="text-muted">Jumlah agenda kegiatan pariwisata per bulan</small>
                    </div>
                    <span class="badge"
                        style="background: rgba(200, 155, 60, 0.15); color: #9C7726; font-weight: 600;">Tahunan</span>
                </div>
                <div class="card-body p-4">
                    <div style="position: relative; height: 260px;">
                        <canvas id="chartEvent"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity Panel -->
    <div class="row g-4 mt-1">
        <div class="col-12">
            <div class="card border-0" style="border-radius: 16px !important;">
                <div
                    class="card-header bg-transparent border-0 pt-4 px-4 pb-0 d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="fw-bold mb-0" style="color: #1F3A34; font-size: 1.05rem;">Aktivitas Terbaru</h6>
                        <small class="text-muted">Komentar &amp; interaksi pengunjung di seluruh konten</small>
                    </div>
                </div>
                <div class="card-body p-4">
                    @if (isset($recentActivities) && $recentActivities->count() > 0)
                        <div class="d-flex flex-column gap-1">
                            @foreach ($recentActivities as $activity)
                                <div class="d-flex align-items-start gap-3 p-2 rounded-3"
                                    style="transition: background-color .15s;"
                                    onmouseover="this.style.backgroundColor='#F4F7F4'"
                                    onmouseout="this.style.backgroundColor='transparent'">
                                    <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0"
                                        style="width:40px;height:40px;background:#EAF0EC;">
                                        <i class="{{ $activity->icon }}"
                                            style="color: {{ $activity->icon_color }};"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="mb-0 fw-semibold" style="font-size:0.88rem;color:#24302B;">
                                            {{ $activity->user_name }} <span
                                                class="fw-normal text-muted">{{ $activity->message }}</span>
                                            {{ $activity->target_name }}
                                        </p>
                                        <small class="text-muted"><i
                                                class="fa-regular fa-clock me-1"></i>{{ \Carbon\Carbon::parse($activity->time)->diffForHumans() }}</small>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-4 text-muted">
                            <i class="fa-regular fa-bell-slash mb-2 d-block" style="font-size:1.8rem;opacity:0.4;"></i>
                            <p class="mb-0 small">Belum ada aktivitas baru</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Theme palette matching public design system
            const themeColors = ['#1F3A34', '#C89B3C', '#7A3B2E', '#3B6E61', '#9C7726', '#4A7C59', '#B8860B',
                '#2E5B50', '#8B5A2B', '#2C5E4C'
            ];

            // Chart Wisata per Kecamatan (Doughnut)
            const ctxWisata = document.getElementById('chartWisata').getContext('2d');
            new Chart(ctxWisata, {
                type: 'doughnut',
                data: {
                    labels: {!! json_encode(array_keys($wisataPerKecamatan)) !!},
                    datasets: [{
                        data: {!! json_encode(array_values($wisataPerKecamatan)) !!},
                        backgroundColor: themeColors,
                        borderWidth: 2,
                        borderColor: '#ffffff'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'right',
                            labels: {
                                boxWidth: 12,
                                padding: 12,
                                font: {
                                    family: "'Plus Jakarta Sans', sans-serif",
                                    size: 12
                                }
                            }
                        }
                    },
                    cutout: '65%'
                }
            });

            // Chart Event per Bulan (Bar)
            const ctxEvent = document.getElementById('chartEvent').getContext('2d');
            new Chart(ctxEvent, {
                type: 'bar',
                data: {
                    labels: {!! json_encode(array_values($bulanLabels)) !!},
                    datasets: [{
                        label: 'Jumlah Event',
                        data: {!! json_encode($eventBulanData) !!},
                        backgroundColor: '#C89B3C',
                        hoverBackgroundColor: '#9C7726',
                        borderRadius: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1,
                                font: {
                                    family: "'Plus Jakarta Sans', sans-serif"
                                }
                            },
                            grid: {
                                color: '#EAF0EC'
                            }
                        },
                        x: {
                            ticks: {
                                font: {
                                    family: "'Plus Jakarta Sans', sans-serif"
                                }
                            },
                            grid: {
                                display: false
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
        });
    </script>
@endpush
