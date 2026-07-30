<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - E-Catalog Magetan</title>
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
        }

        body {
            /* Theme Background matching Hero Section */
            background: 
                linear-gradient(rgba(15, 26, 22, 0.60), rgba(15, 26, 22, 0.75)),
                url('/images/hero-telaga-sarangan.jpg') center/cover no-repeat fixed;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
        }

        .login-wrapper {
            width: 100%;
            max-width: 420px;
            padding: 20px;
        }

        .login-card {
            background: rgba(20, 20, 22, 0.85); /* Dark Glass */
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }

        .avatar {
            width: 56px;
            height: 56px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
            font-size: 24px;
            font-weight: 600;
            color: #ffffff;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .text-center { text-align: center; }
        .mb-4 { margin-bottom: 24px; }
        
        .title {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 8px;
            letter-spacing: -0.5px;
        }

        .subtitle {
            font-size: 14px;
            color: #a1a1aa; /* Zinc 400 */
            margin-bottom: 32px;
        }

        .form-group {
            position: relative;
            margin-bottom: 16px;
        }

        .form-group i.icon-left {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #71717a; /* Zinc 500 */
            font-size: 14px;
        }

        .password-toggle {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #71717a; /* Zinc 500 */
            font-size: 14px;
            cursor: pointer;
            z-index: 10;
        }

        .form-control {
            width: 100%;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 12px;
            padding: 14px 16px 14px 44px;
            color: #ffffff;
            font-size: 14px;
            transition: all 0.2s ease;
            outline: none;
        }

        .form-control::placeholder {
            color: #52525b; /* Zinc 600 */
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.06);
            border-color: rgba(255, 255, 255, 0.2);
            box-shadow: 0 0 0 4px rgba(255, 255, 255, 0.05);
        }

        .options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            font-size: 13px;
        }

        .checkbox-wrapper {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            color: #a1a1aa;
        }

        .checkbox-wrapper input {
            appearance: none;
            width: 16px;
            height: 16px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 4px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
        }

        .checkbox-wrapper input:checked {
            background: #ffffff;
            border-color: #ffffff;
        }

        .checkbox-wrapper input:checked::before {
            content: '\f00c';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            color: #000;
            font-size: 10px;
        }

        .forgot-link {
            color: #a1a1aa;
            text-decoration: none;
            transition: color 0.2s;
        }

        .forgot-link:hover {
            color: #ffffff;
        }

        .btn-submit {
            width: 100%;
            background: #ffffff;
            color: #09090b; /* Zinc 950 */
            border: none;
            border-radius: 12px;
            padding: 14px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            transition: all 0.2s;
        }

        .btn-submit:hover {
            background: #f4f4f5; /* Zinc 100 */
            transform: translateY(-1px);
        }

        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 24px 0;
            color: #52525b; /* Zinc 600 */
            font-size: 12px;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .divider:not(:empty)::before { margin-right: 16px; }
        .divider:not(:empty)::after { margin-left: 16px; }

        .btn-secondary {
            width: 100%;
            background: rgba(255, 255, 255, 0.03);
            color: #ffffff;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 12px;
            padding: 12px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            transition: all 0.2s;
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.06);
        }

        .signup-text {
            text-align: center;
            font-size: 13px;
            color: #a1a1aa;
            margin-top: 24px;
        }

        .signup-text a {
            color: #ffffff;
            text-decoration: none;
            font-weight: 500;
        }

        .signup-text a:hover {
            text-decoration: underline;
        }

        /* Status and Validation Messages */
        .alert {
            background: rgba(34, 197, 94, 0.1);
            border: 1px solid rgba(34, 197, 94, 0.2);
            color: #4ade80;
            padding: 12px;
            border-radius: 8px;
            font-size: 13px;
            margin-bottom: 20px;
            text-align: center;
        }

        .text-danger {
            color: #f87171;
            font-size: 12px;
            margin-top: 6px;
            display: block;
            margin-left: 4px;
        }
    </style>
</head>
<body>

    <div class="login-wrapper">
        <div class="login-card">
            
            <div class="avatar">
                E
            </div>

            <div class="text-center">
                <h1 class="title">Selamat Datang</h1>
                <p class="subtitle">Masuk untuk melanjutkan ke E-Catalog</p>
            </div>

            @if (session('status'))
                <div class="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <i class="fa-regular fa-envelope icon-left"></i>
                    <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="Alamat email">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <i class="fa-solid fa-lock icon-left"></i>
                    <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" placeholder="Password" style="padding-right: 44px;">
                    <i class="fa-regular fa-eye password-toggle" id="togglePasswordIcon" onclick="togglePassword()"></i>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="options">
                    <label class="checkbox-wrapper">
                        <input type="checkbox" name="remember" id="remember_me">
                        <span>Ingat saya</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="forgot-link">Lupa password?</a>
                    @endif
                </div>

                <button type="submit" class="btn-submit">
                    Sign In <i class="fa-solid fa-arrow-right ms-1" style="font-size: 12px; margin-left: 4px;"></i>
                </button>

                <div class="divider">atau</div>

                <a href="{{ route('home') }}" class="btn-secondary">
                    <i class="fa-solid fa-house"></i> Kembali ke Beranda
                </a>

                <div class="signup-text">
                    Belum punya akun? <a href="{{ route('register') }}">Daftar</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('togglePasswordIcon');
            
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
