<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#6777ef"/>
    <link rel="apple-touch-icon" href="{{ asset('storage/images/logo.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{ asset('storage/images/logo.png') }}" type="image/x-icon">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="antialiased" style="background-color: #eceff1">
    @include('sweetalert::alert')
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}"><img class="align-top" src="{{ asset('/storage/images/E-mart-logo.png') }}" height="50" width="80"></a>
                {{-- <p class="navbar-brand mb-0 navbar-text text-dark"> <span class="text-danger fw-bold">Laravel</span></p> --}}
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="offcanvas offcanvas-start w-75 container" tabindex="-1" id="offcanvasExample"
                    aria-labelledby="offcanvasExampleLabel">
                    <!-- Left Side Of Navbar -->
                    <div class="offcanvas-header">
                        @auth
                            <h6 class="offcanvas-title" id="offcanvas">
                                <div class="justify-content-center">
                                    <a href="{{ url('/') }}" class="d-flex  mb-auto mb-md-0 me-md-auto text-white text-decoration-none">
                                        <img class="d-inline-block align-top rounded-circle " src="{{ asset('/storage/images/avatar.png') }}" height="90" width="90">
                                    </a>
                                </div>
                                <span class="fs-5 fw-bold ">{{ Auth::user()->name }}</span>
                                <a class="nav-link"><span
                                        class="text-muted small">{{ __('@' . Auth::user()->username) }}</span></a>
                                <br>
                                <div class="hstack gap-3">
                                    <a href="https://www.facebook.com/alfhaigar.usman.1/" class="text-decoration-none text-muted"><span class="text-dark fw-bold">{{ App\Models\Cart::where('user_id', Auth::id())->count() }}</span>{{ __(' Cart') }}</a>
                                    <a href="https://github.com/rubickking04" class="text-decoration-none text-muted"><span class="text-dark fw-bold">{{ App\Models\Cart::where('user_id', Auth::id())->onlyTrashed()->count() }}</span>{{ __(' Order') }}</a>
                                </div>
                            </h6>
                        @endauth
                    </div>
                    <div class="offcanvas-body">
                        @auth
                            <hr>
                        @endauth
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item px-2 ">
                                <a class="nav-link active" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="fa-solid fa-magnifying-glass fs-4 "></i>
                                    <span class="ms-3 d-md-none h5" aria-current="page">{{ __('Search') }}</span>
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div class="col-md-12">
                                                        <form action="#" method="GET" role="search" role="search">
                                                            <div class="input-group py-2">
                                                                <span class="input-group-text">
                                                                    <i class="fa-solid fa-magnifying-glass fs-4 "></i>
                                                                </span>
                                                            <input id="search" type="search" aria-label="Search" placeholder="Search a product or a store" class="form-control form-control-lg @error('search') is-invalid @enderror" name="search">
                                                            </div>
                                                        <div class="text-center py-3">
                                                            <p>{{ __('No Recent Searches') }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                                                    <button type="submit" class="btn btn-primary">{{ __('Search') }}</button>
                                                </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item px-2">
                                <a class="nav-link active" href="{{ route('cart') }}">
                                    <i class="fa-solid fa-cart-shopping fs-4"></i>
                                    <span class="ms-3 d-md-none h5" aria-current="page">{{ __('Cart') }}</span>
                                </a>
                            </li>
                            @guest
                                <li class="nav-item px-2">
                                    <a class="nav-link active" href="{{ route('login') }}">
                                        <i class="fa-solid fa-user fs-4"></i>
                                        <span class="ms-3 d-md-none h5" aria-current="page">{{ __('Login or Sign up') }}</span>
                                    </a>
                                </li>
                            @endguest
                            @auth
                                <li class="nav-item px-2">
                                    <a class="nav-link active" href="{{ route('cart') }}">
                                        <i class="fa-solid fa-truck-fast fs-4"></i>
                                        <span class="ms-3 d-md-none h5" aria-current="page">{{ __('Order') }}</span>
                                    </a>
                                </li>
                                @if ( App\Models\Store::where('user_id', '=', Auth::user()->id)->doesntExist())
                                <li class="nav-item px-2">
                                    <a class="nav-link active" href="{{ route('store') }}">
                                        <i class="fa-solid fa-store fs-4"></i>
                                        <span class="ms-3 d-md-none h5" aria-current="page">{{ __('Start Selling') }}</span>
                                    </a>
                                </li>
                                @endif
                                @if ( App\Models\Store::where('user_id', '=', Auth::user()->id)->exists())
                                    <li class="nav-item px-2">
                                        <a class="nav-link active" href="{{ route('store.home') }}" target="_blank">
                                            <i class="fa-solid fa-store fs-4"></i>
                                            <span class="ms-3 d-md-none h5" aria-current="page">{{ __('My Store') }}</span>
                                        </a>
                                    </li>
                                @endif
                                <hr>
                                <li class="nav-item px-2">
                                    <a class="nav-link active" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        <i class="fa-solid fa-right-from-bracket fs-4"></i>
                                        <span class="ms-3 d-md-none h5" aria-current="page">{{ __('Logout') }}</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        {{-- <nav class="navbar navbar-expand bg-light shadow-lg">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}"><img class="align-top" src="{{ asset('/storage/images/E-mart-logo.png') }}" height="50" width="80"></a>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item px-2 mx-auto">
                        <a class="nav-link active" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-magnifying-glass fs-4 "></i></a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link active" href="{{ route('cart') }}"><i class="fa-solid fa-cart-shopping fs-4"></i></a>
                    </li>
                    <li class="nav-item dropdown px-2">
                        <a class="nav-link active " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-user fs-4"></i></a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                @auth
                                    <li><a class="dropdown-item" href="#"><i class="fa-solid fa-user fs-5 px-2"></i>{{ __('Profile') }}</a></li>
                                    @if ( App\Models\Store::where('user_id', '=', Auth::user()->id)->doesntExist())
                                        <li><a class="dropdown-item" href="{{ route('store') }}"><i class="fa-solid fa-cart-plus fs-5 px-2"></i>{{ __('Sell Products') }}</a></li>
                                    @endif
                                    @if ( App\Models\Store::where('user_id', '=', Auth::user()->id)->exists())
                                        <li><a class="dropdown-item" href="{{ route('store.home') }}" target="_blank"><i class="fa-solid fa-cart-plus fs-5 px-2"></i>{{ __('My Store') }}</a></li>
                                    @endif
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa-solid fa-right-from-bracket px-2 fs-5"></i>{{ __('Logout') }}</a></li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                @endauth
                                @guest
                                <li><a class="dropdown-item" href="{{ route('login') }}"><i class="fa-solid fa-right-to-bracket  fs-5 px-2"></i>{{ __('Sign up') }}</a></li>
                                @endguest
                            </ul>
                    </li>
                </ul>

            </div>
        </nav> --}}
    </div>

    <main class="py-4">
        @yield('content')
    </main>
    <script src="{{ asset('/sw.js') }}"></script>
<script>
    if (!navigator.serviceWorker.controller) {
        navigator.serviceWorker.register("/sw.js").then(function (reg) {
            console.log("Service worker has been registered for scope: " + reg.scope);
        });
    }
</script>
</body>
<script>
    function password_show_hide() {
        var x = document.getElementById("password");
        var show_eye = document.getElementById("show_eye");
        var hide_eye = document.getElementById("hide_eye");
        hide_eye.classList.remove("d-none");
        if (x.type === "password") {
            x.type = "text";
            show_eye.style.display = "none";
            hide_eye.style.display = "block";
        } else {
            x.type = "password";
            show_eye.style.display = "block";
            hide_eye.style.display = "none";
        }
    }

    function password_show_hides() {
        var x = document.getElementById("password-confirm");
        var show_eye = document.getElementById("show_eyes");
        var hide_eye = document.getElementById("hide_eyes");
        hide_eye.classList.remove("d-none");
        if (x.type === "password") {
            x.type = "text";
            show_eye.style.display = "none";
            hide_eye.style.display = "block";
        } else {
            x.type = "password";
            show_eye.style.display = "block";
            hide_eye.style.display = "none";
        }
    }
</script>

</html>
