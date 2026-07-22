<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - E-Catalog Magetan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f6f9;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px 0;
        }
        .register-card {
            max-width: 440px;
            width: 100%;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            background: #fff;
        }
        .btn-primary {
            background-color: #1a6b3a;
            border-color: #1a6b3a;
        }
        .btn-primary:hover {
            background-color: #145530;
            border-color: #145530;
        }
        .form-control:focus {
            border-color: #1a6b3a;
            box-shadow: 0 0 0 0.2rem rgba(26, 107, 58, 0.15);
        }
        .text-primary-green { color: #1a6b3a !important; }
        .password-strength {
            height: 4px;
            border-radius: 2px;
            transition: all 0.3s;
        }
    </style>
</head>
<body>

    <div class="register-card">
        {{-- Logo & Judul --}}
        <div class="text-center mb-4">
            <div class="mb-3">
                <div style="width:52px;height:52px;background:linear-gradient(135deg,#1a6b3a,#2d9d5c);border-radius:14px;display:flex;align-items:center;justify-content:center;margin:0 auto;">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>
                </div>
            </div>
            <h4 class="fw-bold text-dark mb-1">Buat Akun Baru</h4>
            <p class="text-muted small mb-0">Daftar untuk mengelola E-Catalog Magetan</p>
        </div>

        {{-- Session / Error Global --}}
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show py-2 px-3 small" role="alert">
            <ul class="mb-0 ps-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" style="font-size:0.65rem;"></button>
        </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            {{-- Nama --}}
            <div class="mb-3">
                <label for="name" class="form-label fw-semibold small">Nama Lengkap <span class="text-danger">*</span></label>
                <input id="name"
                    class="form-control @error('name') is-invalid @enderror"
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    required
                    autofocus
                    autocomplete="name"
                    placeholder="Nama lengkap Anda">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Email --}}
            <div class="mb-3">
                <label for="email" class="form-label fw-semibold small">Alamat Email <span class="text-danger">*</span></label>
                <input id="email"
                    class="form-control @error('email') is-invalid @enderror"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autocomplete="username"
                    placeholder="contoh@email.com">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Password --}}
            <div class="mb-3">
                <label for="password" class="form-label fw-semibold small">Password <span class="text-danger">*</span></label>
                <div class="input-group">
                    <input id="password"
                        class="form-control @error('password') is-invalid @enderror"
                        type="password"
                        name="password"
                        required
                        autocomplete="new-password"
                        placeholder="Minimal 8 karakter"
                        oninput="checkStrength(this.value)">
                    <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('password', 'eyeIcon1')" style="border-color:#dee2e6;">
                        <svg id="eyeIcon1" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                    </button>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                {{-- Indikator kekuatan password --}}
                <div class="mt-2 d-flex gap-1">
                    <div id="str1" class="password-strength flex-fill" style="background:#dee2e6;"></div>
                    <div id="str2" class="password-strength flex-fill" style="background:#dee2e6;"></div>
                    <div id="str3" class="password-strength flex-fill" style="background:#dee2e6;"></div>
                    <div id="str4" class="password-strength flex-fill" style="background:#dee2e6;"></div>
                </div>
                <div id="strengthText" class="text-muted mt-1" style="font-size:0.75rem;"></div>
            </div>

            {{-- Konfirmasi Password --}}
            <div class="mb-4">
                <label for="password_confirmation" class="form-label fw-semibold small">Konfirmasi Password <span class="text-danger">*</span></label>
                <div class="input-group">
                    <input id="password_confirmation"
                        class="form-control @error('password_confirmation') is-invalid @enderror"
                        type="password"
                        name="password_confirmation"
                        required
                        autocomplete="new-password"
                        placeholder="Ulangi password Anda">
                    <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('password_confirmation', 'eyeIcon2')" style="border-color:#dee2e6;">
                        <svg id="eyeIcon2" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                    </button>
                    @error('password_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- Tombol Daftar --}}
            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-primary fw-bold py-2">
                    Daftar Sekarang
                </button>
            </div>

            {{-- Link Login --}}
            <div class="text-center">
                <span class="text-muted small">Sudah punya akun? </span>
                <a href="{{ route('login') }}" class="text-decoration-none fw-semibold small" style="color:#1a6b3a;">
                    Masuk di sini
                </a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function togglePassword(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);
            if (input.type === 'password') {
                input.type = 'text';
                icon.innerHTML = '<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/>';
            } else {
                input.type = 'password';
                icon.innerHTML = '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>';
            }
        }

        function checkStrength(val) {
            const bars = [document.getElementById('str1'), document.getElementById('str2'), document.getElementById('str3'), document.getElementById('str4')];
            const text = document.getElementById('strengthText');
            let score = 0;
            if (val.length >= 8) score++;
            if (/[A-Z]/.test(val)) score++;
            if (/[0-9]/.test(val)) score++;
            if (/[^A-Za-z0-9]/.test(val)) score++;

            const colors = ['#dc3545', '#fd7e14', '#ffc107', '#1a6b3a'];
            const labels = ['Sangat lemah', 'Lemah', 'Cukup kuat', 'Kuat'];

            bars.forEach((bar, i) => {
                bar.style.background = i < score ? colors[score - 1] : '#dee2e6';
            });
            text.textContent = val.length > 0 ? labels[score - 1] || '' : '';
            text.style.color = score > 0 ? colors[score - 1] : '#6c757d';
        }
    </script>
</body>
</html>
