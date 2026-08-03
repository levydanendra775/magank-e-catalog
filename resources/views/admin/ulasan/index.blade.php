@extends('layouts.admin')
@section('title', 'Kelola Ulasan & Rating')
@section('content')

<!-- Top Metric Stats Header -->
<div class="row g-4 mb-4">
    <div class="col-12 col-sm-6 col-xl-4">
        <div class="stat-card">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div class="stat-icon-wrapper" style="background:rgba(200, 155, 60, 0.15); color:var(--accent);">
                    <i class="fa-solid fa-star"></i>
                </div>
                <span class="badge rounded-pill" style="background:var(--primary-light); color:var(--primary); font-weight:700;">Total Ulasan</span>
            </div>
            <div class="text-muted small font-mono uppercase">Ulasan Masuk</div>
            <h3 class="fw-bold mb-0 mt-1" style="color:var(--primary);">{{ $ulasans->total() }}</h3>
            <div class="text-muted small mt-2"><i class="fa-solid fa-comments me-1 text-warning"></i> Dari Pengguna</div>
        </div>
    </div>
</div>

<!-- Main Table Card -->
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white border-bottom p-4 d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
        <div>
            <h5 class="fw-bold mb-1" style="color:var(--primary);">Data Ulasan & Rating</h5>
            <p class="text-muted small mb-0">Kelola dan balas ulasan dari pengunjung wisata</p>
        </div>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th style="width: 50px;">#</th>
                        <th style="width: 18%;">Pengguna</th>
                        <th style="width: 18%;">Destinasi Wisata</th>
                        <th style="width: 15%;">Rating & Komentar</th>
                        <th style="width: 25%;">Balasan Admin</th>
                        <th style="width: 12%;">Tanggal</th>
                        <th class="text-end" style="width: 80px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($ulasans as $index => $ulasan)
                <tr>
                    <td class="fw-bold text-muted small">{{ $ulasans->firstItem() + $index }}</td>
                    <td>
                        <div class="fw-bold text-dark mb-1">{{ $ulasan->user->name ?? 'User Dihapus' }}</div>
                        <div class="text-muted small font-mono"><i class="fa-regular fa-envelope me-1"></i>{{ $ulasan->user->email ?? '-' }}</div>
                    </td>
                    <td>
                        @if($ulasan->wisata)
                            <a href="{{ route('public.wisata.detail', $ulasan->wisata->slug) }}" target="_blank" class="text-decoration-none fw-semibold text-primary">
                                {{ Str::limit($ulasan->wisata->nama, 35) }} <i class="fa-solid fa-arrow-up-right-from-square ms-1 small"></i>
                            </a>
                        @else
                            <span class="badge bg-secondary-subtle text-secondary rounded-pill border">Wisata Dihapus</span>
                        @endif
                    </td>
                    <td>
                        <div class="text-warning mb-1" style="font-size:0.95rem;">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fa-{{ $i <= $ulasan->rating ? 'solid' : 'regular' }} fa-star"></i>
                            @endfor
                            <span class="text-muted small ms-1 fw-bold">({{ $ulasan->rating }}/5)</span>
                        </div>
                        <div class="small text-dark fw-medium mt-2" style="line-height: 1.4;">
                            {!! $ulasan->komentar ? nl2br(e(Str::limit($ulasan->komentar, 100))) : '<em class="text-muted">Tidak ada komentar tulisan.</em>' !!}
                        </div>
                    </td>
                    <td>
                        @if($ulasan->admin_reply)
                            {{-- Sudah ada balasan --}}
                            <div class="p-3 rounded-3 mb-2 border border-success-subtle bg-success-subtle position-relative">
                                <div class="d-flex align-items-center mb-1">
                                    <i class="fa-solid fa-reply me-1 text-success small"></i>
                                    <span class="fw-bold text-success small">Balasan Admin:</span>
                                </div>
                                <div class="small text-dark mb-2">{{ $ulasan->admin_reply }}</div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted font-mono" style="font-size: 0.7rem;">
                                        <i class="fa-regular fa-clock me-1"></i>{{ $ulasan->admin_replied_at?->format('d M Y, H:i') }}
                                    </small>
                                    <button class="btn btn-sm btn-link text-decoration-none p-0" onclick="toggleReplyForm('form-reply-{{ $ulasan->id }}')">
                                        <i class="fa-solid fa-pen-to-square small"></i> Ubah
                                    </button>
                                </div>
                            </div>
                        @else
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <span class="badge bg-light text-muted border rounded-pill px-3 py-2"><i class="fa-solid fa-clock-rotate-left me-1"></i> Belum Dibalas</span>
                                <button class="btn btn-sm btn-primary rounded-pill px-3 shadow-sm" onclick="toggleReplyForm('form-reply-{{ $ulasan->id }}')">
                                    <i class="fa-solid fa-reply me-1"></i> Balas
                                </button>
                            </div>
                        @endif

                        {{-- Form Balasan --}}
                        <div id="form-reply-{{ $ulasan->id }}" class="{{ $ulasan->admin_reply ? 'd-none' : 'd-none' }} mt-3 p-3 border rounded-3 bg-light shadow-sm">
                            <form action="{{ route('admin.ulasan.reply', $ulasan->id) }}" method="POST">
                                @csrf
                                <label class="small fw-bold mb-2 text-dark">Tulis Balasan:</label>
                                <textarea name="admin_reply" class="form-control form-control-sm mb-2 rounded-3" rows="3"
                                    placeholder="Terima kasih atas ulasan Anda..."
                                    required>{{ $ulasan->admin_reply }}</textarea>
                                <div class="d-flex justify-content-end gap-2">
                                    <button type="button" class="btn btn-sm btn-light border fw-semibold rounded-pill px-3"
                                        onclick="toggleReplyForm('form-reply-{{ $ulasan->id }}')">Batal</button>
                                    <button type="submit" class="btn btn-sm btn-success fw-bold rounded-pill px-3 shadow-sm">
                                        <i class="fa-solid fa-paper-plane me-1"></i> Kirim
                                    </button>
                                </div>
                            </form>
                        </div>
                    </td>
                    <td>
                        <div class="small fw-semibold text-dark"><i class="fa-solid fa-calendar me-1 text-warning"></i>{{ $ulasan->created_at->format('d M Y') }}</div>
                        <div class="small text-muted font-mono"><i class="fa-regular fa-clock me-1"></i>{{ $ulasan->created_at->format('H:i') }}</div>
                    </td>
                    <td class="text-end">
                        <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $ulasan->id }}" title="Hapus Ulasan">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>

                        <!-- Modal Confirmation Delete -->
                        <div class="modal fade text-start" id="deleteModal{{ $ulasan->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content border-0 shadow-lg rounded-4">
                                    <div class="modal-header border-0 pb-0">
                                        <h5 class="modal-title fw-bold text-danger">
                                            <i class="fa-solid fa-triangle-exclamation me-2"></i> Konfirmasi Hapus
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body py-4">
                                        Apakah Anda yakin ingin menghapus ulasan dari <strong class="text-dark">"{{ $ulasan->user->name ?? 'User Dihapus' }}"</strong>?
                                    </div>
                                    <div class="modal-footer border-0 pt-0">
                                        <button type="button" class="btn btn-light rounded-3 px-4 fw-semibold" data-bs-dismiss="modal">Batal</button>
                                        <form action="{{ route('admin.ulasan.destroy', $ulasan->id) }}" method="POST" class="d-inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-danger rounded-3 px-4 fw-semibold shadow-sm">
                                                <i class="fa-solid fa-trash-can me-1"></i> Ya, Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-muted py-5">
                        <i class="fa-regular fa-comments fa-2x mb-3 d-block opacity-50"></i>
                        Belum ada ulasan yang masuk.
                    </td>
                </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-footer bg-white border-top p-3">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
            <div class="text-muted small">
                Menampilkan <strong>{{ $ulasans->firstItem() ?? 0 }}</strong> - <strong>{{ $ulasans->lastItem() ?? 0 }}</strong> dari total <strong>{{ $ulasans->total() }}</strong> ulasan
            </div>
            <div>
                {{ $ulasans->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function toggleReplyForm(formId) {
    const form = document.getElementById(formId);
    if(form.classList.contains('d-none')) {
        form.classList.remove('d-none');
        // Optional: Scroll slightly to make form visible if at bottom
    } else {
        form.classList.add('d-none');
    }
}
</script>
@endpush
