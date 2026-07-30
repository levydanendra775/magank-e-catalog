<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - E-Catalog Magetan</title>
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
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            padding: 24px 0;
        }

        .login-wrapper {
            width: 100%;
            max-width: 440px;
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
        .mb-3 { margin-bottom: 16px; }
        
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
            margin-top: 24px;
        }

        .btn-submit:hover {
            background: #f4f4f5; /* Zinc 100 */
            transform: translateY(-1px);
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
            background: rgba(220, 38, 38, 0.1);
            border: 1px solid rgba(220, 38, 38, 0.2);
            color: #f87171;
            padding: 12px;
            border-radius: 8px;
            font-size: 13px;
            margin-bottom: 20px;
        }

        .alert ul {
            margin-left: 20px;
            margin-bottom: 0;
            padding-left: 0;
        }

        .text-danger {
            color: #f87171;
            font-size: 12px;
            margin-top: 6px;
            display: block;
            margin-left: 4px;
        }

        /* Password Strength */
        .password-strength-container {
            display: flex;
            gap: 4px;
            margin-top: 8px;
            padding: 0 4px;
        }

        .password-strength {
            height: 4px;
            border-radius: 2px;
            transition: all 0.3s;
            flex: 1;
            background: rgba(255, 255, 255, 0.1);
        }

        #strengthText {
            font-size: 12px;
            margin-top: 4px;
            margin-left: 4px;
            color: #a1a1aa;
        }
    </style>
</head>
<body>

    <div class="login-wrapper">
        <div class="login-card">
            
            <div class="avatar">
                <i class="fa-solid fa-user-plus" style="font-size: 20px;"></i>
            </div>

            <div class="text-center">
                <h1 class="title">Buat Akun Baru</h1>
                <p class="subtitle">Daftar untuk mengelola E-Catalog Magetan</p>
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
                    <i class="fa-regular fa-user icon-left"></i>
                    <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Nama Lengkap">
                </div>

                <div class="form-group">
                    <i class="fa-regular fa-envelope icon-left"></i>
                    <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="Alamat Email">
                </div>

                <div class="form-group" style="margin-bottom: 24px;">
                    <i class="fa-solid fa-lock icon-left"></i>
                    <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" placeholder="Password (Min. 8 karakter)" oninput="checkStrength(this.value)" style="padding-right: 44px;">
                    <i class="fa-regular fa-eye password-toggle" id="togglePasswordIcon1" onclick="togglePassword('password', 'togglePasswordIcon1')"></i>
                    
                    <div class="password-strength-container">
                        <div id="str1" class="password-strength"></div>
                        <div id="str2" class="password-strength"></div>
                        <div id="str3" class="password-strength"></div>
                        <div id="str4" class="password-strength"></div>
                    </div>
                    <div id="strengthText"></div>
                </div>

                <div class="form-group">
                    <i class="fa-solid fa-lock icon-left"></i>
                    <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Konfirmasi Password" style="padding-right: 44px;">
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
                bar.style.background = i < score ? colors[score - 1] : 'rgba(255, 255, 255, 0.1)';
            });
            
            if (val.length > 0) {
                text.textContent = labels[score - 1] || '';
                text.style.color = colors[score - 1];
            } else {
                text.textContent = '';
                text.style.color = '#a1a1aa';
            }
        }
    </script>
</body>
</html>
