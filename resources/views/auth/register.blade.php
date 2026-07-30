<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - E-Catalog Magetan</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,600;9..144,700&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #1F3D2B; /* Solid green Magetan */
            color: #ffffff;
            height: 100vh;
            display: flex;
            overflow: hidden;
        }

        /* Split Screen Layout */
        .split-layout {
            display: flex;
            width: 100%;
            height: 100%;
        }

        /* Left Panel - Image */
        .image-panel {
            flex: 1.2;
            background: url('/images/hero-telaga-sarangan.jpg') center/cover no-repeat;
            position: relative;
        }

        /* Right Panel - Form */
        .form-panel {
            flex: 1;
            background-color: #1F3D2B;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 40px 8%;
            box-shadow: -10px 0 30px rgba(0, 0, 0, 0.2);
            z-index: 10;
            overflow-y: auto;
        }

        @media (max-width: 900px) {
            .image-panel {
                display: none; /* Hide image on smaller screens */
            }
            .form-panel {
                padding: 40px 5%;
            }
        }

        /* Logo styling */
        .logo-container {
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .logo-container img {
            height: 64px;
            width: auto;
            object-fit: contain;
        }

        .logo-text {
            display: flex;
            flex-direction: column;
        }

        .logo-text span.top {
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.7);
        }

        .logo-text span.bottom {
            font-size: 14px;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        /* Typography */
        .title {
            font-family: 'Fraunces', serif;
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 8px;
            line-height: 1.2;
            color: #ffffff;
        }

        .subtitle {
            font-size: 15px;
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 36px;
            font-weight: 400;
        }

        /* Form styling */
        .form-group {
            position: relative;
            margin-bottom: 24px;
        }

        .form-label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.85);
            margin-bottom: 8px;
            letter-spacing: 0.3px;
        }

        .form-control {
            width: 100%;
            background: transparent;
            border: none;
            border-bottom: 1.5px solid rgba(255, 255, 255, 0.3);
            padding: 8px 0;
            color: #ffffff;
            font-size: 15px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            transition: border-color 0.3s ease;
            outline: none;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.3);
            font-weight: 400;
        }

        .form-control:focus {
            border-bottom-color: #C89B3C;
        }

        .password-toggle {
            position: absolute;
            right: 0;
            bottom: 12px;
            color: rgba(255, 255, 255, 0.6);
            font-size: 16px;
            cursor: pointer;
            transition: color 0.2s;
        }
        
        .password-toggle:hover {
            color: #ffffff;
        }

        /* Buttons */
        .btn-submit {
            width: 100%;
            background: #C89B3C;
            color: #1F3D2B;
            border: none;
            border-radius: 8px;
            padding: 16px;
            font-size: 16px;
            font-weight: 700;
            font-family: 'Plus Jakarta Sans', sans-serif;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 16px;
            margin-bottom: 24px;
        }

        .btn-submit:hover {
            background: #d8af56;
            transform: translateY(-2px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.15);
        }

        .back-link {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            color: rgba(255, 255, 255, 0.6);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: color 0.2s;
        }

        .back-link:hover {
            color: #ffffff;
        }

        .signup-text {
            text-align: center;
            font-size: 14px;
            color: rgba(255, 255, 255, 0.7);
            margin-top: 24px;
        }

        .signup-text a {
            color: #C89B3C;
            text-decoration: none;
            font-weight: 600;
        }

        .signup-text a:hover {
            text-decoration: underline;
        }

        /* Status and Validation Messages */
        .alert {
            background: rgba(220, 38, 38, 0.1);
            border-left: 4px solid #f87171;
            color: #f87171;
            padding: 12px 16px;
            font-size: 13px;
            margin-bottom: 24px;
        }
        
        .alert ul {
            margin-left: 16px;
            margin-bottom: 0;
            padding-left: 0;
        }

        .text-danger {
            color: #ff8787;
            font-size: 12px;
            margin-top: 6px;
            display: block;
        }

        /* Password Strength */
        .password-strength-container {
            display: flex;
            gap: 4px;
            margin-top: 8px;
            padding: 0;
        }

        .password-strength {
            height: 4px;
            border-radius: 2px;
            transition: all 0.3s;
            flex: 1;
            background: rgba(255, 255, 255, 0.2);
        }

        #strengthText {
            font-size: 12px;
            margin-top: 6px;
            color: rgba(255, 255, 255, 0.6);
        }
    </style>
</head>
<body>

    <div class="split-layout">
        <!-- Background Image Panel -->
        <div class="image-panel"></div>

        <!-- Form Panel -->
        <div class="form-panel">
            
            <div class="logo-container">
                <img src="{{ asset('images/lambang-magetan.png') }}" alt="Lambang Magetan">
                <div class="logo-text">
                    <span class="top">Pemerintah Kabupaten</span>
                    <span class="bottom">MAGETAN</span>
                </div>
            </div>

            <div>
                <h1 class="title">Buat Akun Baru</h1>
                <p class="subtitle">Daftarkan diri Anda untuk mengelola E-Catalog Magetan.</p>
            </div>

            @if ($errors->any())
                <div class="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Masukkan nama lengkap Anda">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Alamat Email</label>
                    <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="Masukkan email Anda">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group" style="margin-bottom: 24px;">
                    <label for="password" class="form-label">Kata Sandi</label>
                    <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" placeholder="Minimal 8 karakter" oninput="checkStrength(this.value)" style="padding-right: 32px;">
                    <i class="fa-regular fa-eye password-toggle" id="togglePasswordIcon1" onclick="togglePassword('password', 'togglePasswordIcon1')"></i>
                    
                    <div class="password-strength-container">
                        <div id="str1" class="password-strength"></div>
                        <div id="str2" class="password-strength"></div>
                        <div id="str3" class="password-strength"></div>
                        <div id="str4" class="password-strength"></div>
                    </div>
                    <div id="strengthText"></div>
                    
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
                    <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Ulangi kata sandi Anda" style="padding-right: 32px;">
                    <i class="fa-regular fa-eye password-toggle" id="togglePasswordIcon2" onclick="togglePassword('password_confirmation', 'togglePasswordIcon2')"></i>
                </div>

                <button type="submit" class="btn-submit">
                    Daftar Sekarang
                </button>

                <div class="signup-text">
                    Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        function togglePassword(inputId, iconId) {
            const passwordInput = document.getElementById(inputId);
            const toggleIcon = document.getElementById(iconId);
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
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

            const colors = ['#f87171', '#fb923c', '#fbbf24', '#4ade80'];
            const labels = ['Sangat lemah', 'Lemah', 'Cukup kuat', 'Kuat'];

            bars.forEach((bar, i) => {
                bar.style.background = i < score ? colors[score - 1] : 'rgba(255, 255, 255, 0.2)';
            });
            
            if (val.length > 0) {
                text.textContent = labels[score - 1] || '';
                text.style.color = colors[score - 1];
            } else {
                text.textContent = '';
                text.style.color = 'rgba(255, 255, 255, 0.6)';
            }
        }
    </script>
</body>
</html>
