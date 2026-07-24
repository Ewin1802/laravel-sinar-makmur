<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Sinar Makmur')</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @stack('css')

</head>

<body>

    <div class="wrapper">

        {{-- Sidebar --}}
        @include('components.sidebar')

        {{-- Main --}}
        <main class="main">

            <div class="page">

                {{-- Navbar --}}
                @include('components.navbar')

                {{-- Content --}}
                <div class="content">

                    @yield('content')

                </div>

            </div>

        </main>

    </div>

    {{-- ===========================
         TOAST CONTAINER
    ============================ --}}
    <div class="toast-container"></div>

    {{-- ===========================
         GLOBAL LOADING
    ============================ --}}
    <div class="loading">

        <div class="loading-content">

            <div class="spinner"></div>

            <div>

                Sedang memproses...

            </div>

        </div>

    </div>

    {{-- ===========================
         LUCIDE ICON
    ============================ --}}
    <script src="https://unpkg.com/lucide@latest"></script>

    {{-- ===========================
         PROJECT JAVASCRIPT
    ============================ --}}
    <script src="{{ asset('js/sidebar.js') }}"></script>

    <script src="{{ asset('js/dropdown.js') }}"></script>

    <script src="{{ asset('js/modal.js') }}"></script>

    <script src="{{ asset('js/toast.js') }}"></script>

    <script src="{{ asset('js/loading.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script src="{{ asset('js/app.js') }}"></script>

    {{-- ===========================
         LUCIDE INIT
    ============================ --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            lucide.createIcons();

        });
    </script>

    {{-- ===========================
         FLASH MESSAGE
    ============================ --}}

    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                showToast(

                    'success',

                    'Berhasil',

                    @json(session('success'))

                );

            });
        </script>
    @endif

    @if (session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                showToast(

                    'danger',

                    'Gagal',

                    @json(session('error'))

                );

            });
        </script>
    @endif

    @if (session('warning'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                showToast(

                    'warning',

                    'Peringatan',

                    @json(session('warning'))

                );

            });
        </script>
    @endif

    @if (session('info'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                showToast(

                    'info',

                    'Informasi',

                    @json(session('info'))

                );

            });
        </script>
    @endif

    @stack('scripts')

</body>

</html>
