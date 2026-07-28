@extends('layouts.admin')

@section('title', 'Kelola Ulasan & Rating')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold mb-0">Kelola Ulasan & Rating Wisata</h4>
    <span class="badge bg-secondary fs-6">{{ $ulasans->total() }} Ulasan</span>
</div>

<div class="card border-0 shadow-sm" style="border-radius: 14px;">
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th width="4%">No</th>
                        <th width="16%">Pengguna</th>
                        <th width="16%">Wisata</th>
                        <th width="10%">Rating</th>
                        <th width="20%">Komentar</th>
                        <th width="22%">Balasan Admin</th>
                        <th width="8%">Tanggal</th>
                        <th width="4%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($ulasans as $index => $ulasan)
                    <tr>
                        <td>{{ $ulasans->firstItem() + $index }}</td>
                        <td>
                            <div class="fw-bold">{{ $ulasan->user->name ?? 'User Dihapus' }}</div>
                            <div class="small text-muted">{{ $ulasan->user->email ?? '-' }}</div>
                        </td>
                        <td>
                            @if($ulasan->wisata)
                                <a href="{{ route('public.wisata.detail', $ulasan->wisata->slug) }}" target="_blank" class="text-decoration-none">
                                    {{ $ulasan->wisata->nama }} <i class="fa-solid fa-arrow-up-right-from-square small"></i>
                                </a>
                            @else
                                <span class="text-muted fst-italic">Wisata Dihapus</span>
                            @endif
                        </td>
                        <td>
                            <div class="text-warning" style="font-size:1rem; letter-spacing:1px;">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fa-{{ $i <= $ulasan->rating ? 'solid' : 'regular' }} fa-star"></i>
                                @endfor
                            </div>
                            <span class="small text-muted">({{ $ulasan->rating }}/5)</span>
                        </td>
                        <td>
                            <div style="font-size:0.9rem; color:#444;">
                                {{ $ulasan->komentar ?: '<em class="text-muted">Tidak ada komentar</em>' }}
                            </div>
                        </td>
                        <td>
                            @if($ulasan->admin_reply)
                                {{-- Sudah ada balasan, tampilkan dengan opsi edit --}}
                                <div class="p-2 rounded-2 mb-2" style="background:#e9f7ef; border-left:3px solid #1a6b3a; font-size:0.85rem;">
                                    <i class="fa-solid fa-reply me-1" style="color:#1a6b3a;"></i>
                                    {{ $ulasan->admin_reply }}
                                </div>
                                <small class="text-muted d-block mb-1">
                                    <i class="fa-regular fa-clock me-1"></i>{{ $ulasan->admin_replied_at?->format('d M Y, H:i') }}
                                </small>
                                {{-- Tombol edit balasan --}}
                                <button class="btn btn-xs btn-outline-secondary" style="font-size:0.75rem; padding:2px 8px;"
                                    onclick="toggleReplyForm('form-reply-{{ $ulasan->id }}')">
                                    <i class="fa-solid fa-pen me-1"></i>Ubah Balasan
                                </button>
                            @else
                                <span class="text-muted small fst-italic">Belum dibalas</span>
                            @endif

                            {{-- Form Balasan --}}
                            <div id="form-reply-{{ $ulasan->id }}" class="{{ $ulasan->admin_reply ? 'd-none' : '' }} mt-2">
                                <form action="{{ route('admin.ulasan.reply', $ulasan->id) }}" method="POST">
                                    @csrf
                                    <textarea name="admin_reply" class="form-control mb-1" rows="2"
                                        placeholder="Tulis balasan admin..." style="font-size:0.85rem;"
                                        required>{{ $ulasan->admin_reply }}</textarea>
                                    <div class="d-flex gap-1">
                                        <button type="submit" class="btn btn-sm btn-success" style="font-size:0.8rem;">
                                            <i class="fa-solid fa-paper-plane me-1"></i>Kirim
                                        </button>
                                        @if($ulasan->admin_reply)
                                        <button type="button" class="btn btn-sm btn-outline-secondary" style="font-size:0.8rem;"
                                            onclick="toggleReplyForm('form-reply-{{ $ulasan->id }}')">Batal</button>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </td>
                        <td>
                            <span class="small">{{ $ulasan->created_at->format('d M Y') }}</span>
                        </td>
                        <td class="text-center">
                            <form action="{{ route('admin.ulasan.destroy', $ulasan->id) }}" method="POST"
                                onsubmit="return confirm('Hapus ulasan ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-4 text-muted">
                            <i class="fa-regular fa-comment-dots fa-2x mb-2 d-block opacity-25"></i>
                            Belum ada ulasan yang diberikan.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-end mt-4">
            {{ $ulasans->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function toggleReplyForm(formId) {
    const form = document.getElementById(formId);
    form.classList.toggle('d-none');
}
</script>
@endpush
