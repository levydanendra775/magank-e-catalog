<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - E-Catalog Magetan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f6f9;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            max-width: 400px;
            width: 100%;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            background: #fff;
        }
    </style>
</head>
<body>

    <div class="login-card">
        <div class="text-center mb-4">
            <h3 class="fw-bold text-dark">E-Catalog Magetan</h3>
            <p class="text-muted">Login untuk mengelola data</p>
        </div>
        
        <!-- Session Status -->
        @if (session('status'))
            <div class="alert alert-success mb-4 text-sm font-medium">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-3">
                <label for="email" class="form-label fw-semibold">Email</label>
                <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="admin@magetan.go.id">
                @error('email')
                    <div class="text-danger mt-1 small">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label fw-semibold">Password</label>
                <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" placeholder="••••••••">
                @error('password')
                    <div class="text-danger mt-1 small">{{ $message }}</div>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="mb-3 form-check">
                <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                <label class="form-check-label" for="remember_me">Ingat saya</label>
            </div>

            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-primary fw-bold py-2">Log in</button>
            </div>
            
            <div class="text-center mt-3">
                <a class="text-decoration-none small text-muted" href="{{ route('password.request') }}">
                    Lupa password?
                </a>
            </div>
            <hr class="my-3">
            <div class="text-center">
                <span class="text-muted small">Belum punya akun? </span>
                <a href="{{ route('register') }}" class="text-decoration-none fw-semibold small" style="color:#1a6b3a;">
                    Daftar sekarang
                </a>
            </div>
        </form>
    </div>

</body>
</html>
