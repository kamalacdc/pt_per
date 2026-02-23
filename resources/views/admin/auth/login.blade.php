<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #cedeff;
        }
        .login-card {
            max-width: 400px;
            margin: 100px auto;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            background: #fff;
        }
        .login-title {
            font-weight: 700;
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }
        .btn-login {
            width: 100%;
        }
    </style>
</head>
<body>

    <div class="login-card">
        <h3 class="login-title">Masuk Admin</h3>

        {{-- Notifikasi error / sukses --}}
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" name="email" id="email"
                       class="form-control @error('email') is-invalid @enderror"
                       value="{{ old('email') }}" required autofocus>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Kata Sandi</label>
                <input type="password" name="password" id="password"
                       class="form-control @error('password') is-invalid @enderror"
                       required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary btn-login">Login</button>
        </form>

        <div class="text-center mt-3">
            <a href="{{ route('admin.forgot.password') }}" class="text-decoration-none">Lupa Password?</a>
        </div>
    </div>

</body>
</html>
