<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register | Sinar Makmur POS</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">

</head>

<body>

    <div class="auth-wrapper">

        {{-- LEFT --}}
        <div class="auth-left">

            <div class="auth-overlay"></div>

            <div class="auth-inner">

                <div class="auth-brand">

                    <div class="brand-logo">

                        SM

                    </div>

                    <div>

                        <h1>Sinar Makmur POS</h1>

                        <p>Modern Point Of Sales</p>

                    </div>

                </div>

                <div class="auth-content">

                    <span class="auth-badge">

                        Point Of Sales Dashboard

                    </span>

                    <h2>

                        Mulai
                        <br>
                        Bersama Kami

                    </h2>

                    <p>

                        Buat akun baru untuk mulai
                        mengelola produk, transaksi,
                        pelanggan, dan laporan.

                    </p>

                </div>

                <div class="auth-version">

                    Version 1.0

                </div>

            </div>

        </div>

        {{-- RIGHT --}}

        <div class="auth-right">

            <div class="login-card">

                <div class="login-header">

                    <h2>

                        Buat Akun

                    </h2>

                    <p>

                        Lengkapi data berikut.

                    </p>

                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">

                        {{ $errors->first() }}

                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}">

                    @csrf

                    <div class="form-group">

                        <label>Nama Lengkap</label>

                        <div class="input-group">

                            <span class="input-icon">

                                <i data-lucide="user"></i>

                            </span>

                            <input type="text" name="name" value="{{ old('name') }}" required>

                        </div>

                    </div>

                    <div class="form-group">

                        <label>Email</label>

                        <div class="input-group">

                            <span class="input-icon">

                                <i data-lucide="mail"></i>

                            </span>

                            <input type="email" name="email" value="{{ old('email') }}" required>

                        </div>

                    </div>

                    <div class="form-group">

                        <label>Password</label>

                        <div class="input-group">

                            <span class="input-icon">

                                <i data-lucide="lock"></i>

                            </span>

                            <input id="password" type="password" name="password" required>

                            <button type="button" class="password-toggle" data-target="password">

                                <i data-lucide="eye"></i>

                            </button>

                        </div>

                    </div>

                    <div class="form-group">

                        <label>Konfirmasi Password</label>

                        <div class="input-group">

                            <span class="input-icon">

                                <i data-lucide="shield-check"></i>

                            </span>

                            <input id="password_confirmation" type="password" name="password_confirmation" required>

                            <button type="button" class="password-toggle" data-target="password_confirmation">

                                <i data-lucide="eye"></i>

                            </button>

                        </div>

                    </div>

                    <button class="btn btn-primary btn-block">

                        Daftar

                    </button>

                </form>

                <div class="auth-footer">

                    Sudah punya akun?

                    <a href="{{ route('login') }}">

                        Login

                    </a>

                </div>

            </div>

        </div>

    </div>

    <script src="https://unpkg.com/lucide@latest"></script>

    <script>
        lucide.createIcons();
    </script>

    <script src="{{ asset('js/auth.js') }}"></script>

</body>

</html>
