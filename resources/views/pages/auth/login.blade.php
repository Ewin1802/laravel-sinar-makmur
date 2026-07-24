<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | Sinar Makmur POS</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">

</head>

<body>

    <div class="auth-wrapper">

        {{-- ==========================================================
        LEFT PANEL
    =========================================================== --}}
        <div class="auth-left">

            <div class="auth-overlay"></div>

            <div class="auth-inner">

                {{-- Logo --}}
                <div class="auth-brand">

                    <div class="brand-logo">
                        SM
                    </div>

                    <div>

                        <h1>Sinar Makmur POS</h1>

                        <p>
                            Modern Point of Sales System
                        </p>

                    </div>

                </div>

                {{-- Hero --}}
                <div class="auth-content">

                    <span class="auth-badge">

                        Point Of Sales Dashboard

                    </span>

                    <h2>

                        Kelola Bisnis
                        <br>
                        Lebih Mudah

                    </h2>

                    <p>

                        Seluruh aktivitas penjualan,
                        produk,
                        transaksi,
                        pelanggan,
                        laporan,
                        dan manajemen user
                        berada dalam satu dashboard.

                    </p>

                    <div class="feature-list">

                        <div class="feature-item">

                            <i data-lucide="package"></i>

                            <span>Manajemen Produk</span>

                        </div>

                        <div class="feature-item">

                            <i data-lucide="shopping-cart"></i>

                            <span>Transaksi Penjualan</span>

                        </div>

                        <div class="feature-item">

                            <i data-lucide="users"></i>

                            <span>Manajemen Pengguna</span>

                        </div>

                        <div class="feature-item">

                            <i data-lucide="chart-column"></i>

                            <span>Laporan Penjualan</span>

                        </div>

                    </div>

                </div>

                <div class="auth-version">

                    Version 1.0

                </div>

            </div>

        </div>

        {{-- ==========================================================
        RIGHT PANEL
    =========================================================== --}}

        <div class="auth-right">

            <div class="login-card">

                <div class="login-header">

                    <h2>

                        Selamat Datang

                    </h2>

                    <p>

                        Silakan login menggunakan akun Anda.

                    </p>

                </div>

                {{-- Validation --}}
                @if ($errors->any())
                    <div class="alert alert-danger">

                        {{ $errors->first() }}

                    </div>
                @endif

                {{-- Form --}}
                <form method="POST" action="{{ route('login') }}" id="loginForm">

                    @csrf

                    {{-- Email --}}
                    <div class="form-group">

                        <label>

                            Email

                        </label>

                        <div class="input-group">

                            <span class="input-icon">

                                <i data-lucide="mail"></i>

                            </span>

                            <input type="email" name="email" value="{{ old('email') }}"
                                placeholder="Masukkan email" required autofocus>

                        </div>

                    </div>

                    {{-- Password --}}
                    <div class="form-group">

                        <label>

                            Password

                        </label>

                        <div class="input-group">

                            <span class="input-icon">

                                <i data-lucide="lock"></i>

                            </span>

                            <input id="password" type="password" name="password" placeholder="Masukkan password"
                                required>

                            <button type="button" id="togglePassword" class="password-toggle">

                                <i id="passwordIcon" data-lucide="eye">
                                </i>

                            </button>

                        </div>

                    </div>

                    {{-- Option --}}
                    <div class="auth-options">

                        <label class="remember">

                            <input type="checkbox" name="remember">

                            <span>

                                Remember Me

                            </span>

                        </label>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">

                                Lupa Password?

                            </a>
                        @endif

                    </div>

                    {{-- Button --}}
                    <button type="submit" id="loginButton" class="btn btn-primary btn-block">

                        <span class="btn-text">

                            Login

                        </span>

                    </button>

                    <div class="account-info">

                        <div class="account-icon">

                            <i data-lucide="shield-check"></i>

                        </div>

                        <div class="account-text">

                            <h4>Akun dikelola Administrator</h4>

                            <p>
                                Jika Anda belum memiliki akun,
                                silakan hubungi administrator untuk
                                pembuatan akun dan pemberian hak akses.
                            </p>

                        </div>

                    </div>

                </form>

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
