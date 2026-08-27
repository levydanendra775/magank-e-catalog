<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atur Ulang Kata Sandi - Pesona Magetan</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,600;9..144,700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #1F3D2B;
            /* Solid green Magetan */
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
                display: none;
                /* Hide image on smaller screens */
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
            font-size: 14.5px;
            color: rgba(255, 255, 255, 0.75);
            margin-bottom: 32px;
            font-weight: 400;
            line-height: 1.6;
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
            padding: 10px 0;
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
            margin-top: 10px;
            margin-bottom: 24px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-submit:hover {
            background: #d8af56;
            transform: translateY(-2px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.15);
        }

        .btn-submit:active {
            transform: translateY(0);
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

        .text-danger {
            color: #ff8787;
            font-size: 12px;
            margin-top: 6px;
            display: block;
        }

        /* 21st.dev Interactive Hover Button */
        .btn-interactive {
            position: relative;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 9999px;
            border: 1.5px solid transparent;
            cursor: pointer;
            overflow: hidden;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 600;
            text-decoration: none !important;
            user-select: none;
            vertical-align: middle;
            transition: border-color 0.35s ease, box-shadow 0.35s ease, transform 0.25s ease, background 0.35s ease;
            white-space: nowrap;
            letter-spacing: 0.2px;
        }

        .btn-interactive:active {
            transform: scale(0.97) !important;
        }

        .btn-interactive-md {
            min-width: 190px;
            height: 42px;
            padding: 0 22px;
            font-size: 0.88rem;
        }

        .btn-interactive .btn-text-initial {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transform: translateX(4px);
            opacity: 1;
            transition: transform 0.35s cubic-bezier(0.2, 0.8, 0.2, 1), opacity 0.3s ease;
            z-index: 2;
        }

        .btn-interactive:hover .btn-text-initial {
            transform: translateX(28px);
            opacity: 0;
        }

        .btn-interactive .btn-text-hover {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transform: translateX(28px);
            opacity: 0;
            transition: transform 0.35s cubic-bezier(0.2, 0.8, 0.2, 1), opacity 0.3s ease;
            z-index: 3;
            font-weight: 700;
        }

        .btn-interactive:hover .btn-text-hover {
            transform: translateX(0);
            opacity: 1;
        }

        .btn-interactive .btn-text-hover i {
            font-size: 0.85em;
            transition: transform 0.3s ease;
        }

        .btn-interactive:hover .btn-text-hover i.fa-arrow-left {
            transform: translateX(-3px);
        }

        .btn-interactive .btn-bubble {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%) scale(1);
            width: 7px;
            height: 7px;
            border-radius: 50%;
            transition: left 0.35s cubic-bezier(0.2, 0.8, 0.2, 1),
                top 0.35s cubic-bezier(0.2, 0.8, 0.2, 1),
                width 0.35s cubic-bezier(0.2, 0.8, 0.2, 1),
                height 0.35s cubic-bezier(0.2, 0.8, 0.2, 1),
                transform 0.35s cubic-bezier(0.2, 0.8, 0.2, 1),
                border-radius 0.35s cubic-bezier(0.2, 0.8, 0.2, 1),
                background 0.35s ease;
            z-index: 1;
        }

        .btn-interactive:hover .btn-bubble {
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            transform: translateY(0) scale(1);
            border-radius: 9999px;
        }

        .btn-interactive-gold {
            background: rgba(200, 155, 60, 0.12);
            border-color: rgba(200, 155, 60, 0.4);
            color: #f5c842 !important;
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }

        .btn-interactive-gold .btn-bubble {
            background: linear-gradient(135deg, #C89B3C 0%, #f5c842 100%);
            box-shadow: 0 0 8px rgba(245, 200, 66, 0.6);
        }

        .btn-interactive-gold .btn-text-hover {
            color: #14261F !important;
        }

        .btn-interactive-gold:hover {
            border-color: #f5c842;
            box-shadow: 0 8px 28px rgba(200, 155, 60, 0.45);
        }

        .text-center {
            text-align: center;
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
                <h1 class="title">Atur Ulang Kata Sandi</h1>
                <p class="subtitle">Silakan masukkan kata sandi baru yang kuat dan aman untuk akun Anda.</p>
            </div>

            <form method="POST" action="{{ route('password.store') }}">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email Address -->
                <div class="form-group">
                    <label for="email" class="form-label">Alamat Email</label>
                    <input id="email" class="form-control" type="email" name="email" value="{{ old('email', $request->email) }}"
                        required autofocus autocomplete="username" placeholder="Masukkan email akun">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password" class="form-label">Kata Sandi Baru</label>
                    <input id="password" class="form-control" type="password" name="password" required
                        autocomplete="new-password" placeholder="Minimal 8 karakter">
                    <i class="fa-regular fa-eye password-toggle" id="togglePasswordIcon" onclick="togglePassword('password', 'togglePasswordIcon')"></i>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi Baru</label>
                    <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required
                        autocomplete="new-password" placeholder="Ulangi kata sandi baru">
                    <i class="fa-regular fa-eye password-toggle" id="toggleConfirmPasswordIcon" onclick="togglePassword('password_confirmation', 'toggleConfirmPasswordIcon')"></i>
                    @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn-submit">
                    <i class="fa-solid fa-key"></i>
                    <span>Simpan Kata Sandi Baru</span>
                </button>

                <div class="text-center">
                    <a href="{{ route('home') }}" class="btn-interactive btn-interactive-gold btn-interactive-md">
                        <span class="btn-text-initial">Kembali ke Beranda</span>
                        <div class="btn-text-hover">
                            <i class="fa-solid fa-arrow-left"></i>
                            <span>Kembali ke Beranda</span>
                        </div>
                        <div class="btn-bubble"></div>
                    </a>
                </div>

                <div class="signup-text">
                    Ingat kata sandi lama Anda? <a href="{{ route('login') }}">Masuk di sini</a>
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
    </script>
</body>

</html>
