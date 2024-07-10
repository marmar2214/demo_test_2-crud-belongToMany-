<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    @stack('css')
</head>

<body>
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">
            <a href="{{ route('home') }}" class="logo d-flex align-items-center">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" />
                <span class="d-none d-lg-block">
                    {{ config('app.name') }}
                </span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <img src="{{ asset('assets/img/account.png') }}" alt="Profile" class="rounded-circle" />
                        <span class="d-none d-md-block dropdown-toggle text-capitalize ps-2">
                            {{ auth()->user()->name }}
                        </span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header text-capitalize">
                            <h6>{{ auth()->user()->name }}</h6>
                        </li>

                        <li>
                            <hr class="dropdown-divider" />
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>

    <x-navbar :active="$active" />

    <main id="main" class="main">
        <div class="pagetitle d-md-flex justify-content-between align-items-center mb-0 mb-md-4">
            <h1 class="text-capitalize">{{ $title ?? 'Blank Page' }}</h1>
            <div>
                @isset($create_btn)
                    <a href="{{ $create_btn }}" class="btn btn-primary rounded-pill mt-3 mt-md-0">
                        <i class="bi bi-plus-circle"></i> Create
                    </a>
                @endisset
                @isset($canvas_btn)
                    <a class="btn btn-primary rounded-pill mt-3 mt-md-0" data-bs-toggle="offcanvas" href="#offcanvasOpened"
                        role="button" aria-controls="offcanvasOpened">
                        <i class="bi bi-plus-circle"></i> Create
                    </a>
                @endisset
                @isset($back_btn)
                    <a href="{{ $back_btn }}" class="btn btn-dark rounded-pill mt-3 mt-md-0">
                        <i class="bi bi-arrow-left"></i> Back
                    </a>
                @endisset
            </div>
        </div>

        @if (config('app.env') !== 'production')
            <div class="alert alert-primary" role="alert">
                <h4 class="mb-0">Local Development</h4>
            </div>
        @endif

        <section class="section">
            @yield('content')
        </section>
    </main>

    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>{{ date('Y') }}</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            Designed by <a href="" onclick="return false;">BootstrapMade</a>
        </div>
    </footer>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    <script src="{{ asset('assets/js/main.js') }}"></script>
    @stack('js')
</body>

</html>
