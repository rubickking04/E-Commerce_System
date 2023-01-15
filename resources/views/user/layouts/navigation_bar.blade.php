<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#fff"/>
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
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Left Side Of Navbar -->
                <div class="offcanvas offcanvas-start w-75 container" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                    <div class="offcanvas-header text-center">
                        @auth
                            <h6 class="offcanvas-title" id="offcanvas">
                                <div class="text-center">
                                    <a href="{{ url('/') }}" class="text-white text-decoration-none">
                                        <img class="d-inline-block align-top rounded-circle" src="{{ asset('/storage/images/avatar.png') }}" height="90" width="90">
                                    </a>
                                </div>
                                <span class="fs-5 fw-bold ">{{ Auth::user()->name }}</span>
                                <br>
                                <div class="hstack gap-3 mb-3 text-center ms-4">
                                    <p class="text-decoration-none text-muted ms-3 mt-2"><span class="text-warning fw-bold">{{ App\Models\Cart::where('user_id', Auth::id())->count() }}</span>{{ __(' My Cart') }}</p>
                                    <div class="vr"></div>
                                    <p class="text-decoration-none text-muted mt-2"><span class="text-warning fw-bold">{{ App\Models\Order::where('user_id', Auth::id())->count() }}</span>{{ __(' My Order') }}</p>
                                </div>
                                <form action="{{ route('search_product_or_store_controller') }}" method="GET" role="search" class="d-flex">
                                    @csrf
                                    <input class="form-control me-2 border " type="search" name="search" placeholder="Search products or store" aria-label="Search">
                                    <button class="btn btn-warning" type="submit"><i class="fa-solid text-white fa-magnifying-glass"></i></button>
                                </form>
                            </h6>
                        @endauth
                        @guest
                        <h6 class="offcanvas-title" id="offcanvas">
                            <div class="mx-auto">
                                <a href="{{ url('/') }}" class="text-white text-decoration-none">
                                    <img class="d-inline-block align-top ms-5" src="{{ asset('/storage/images/E-Mart-logo.png') }}" height="90" width="130">
                                </a>
                            </div>
                        </h6>
                        @endguest
                    </div>
                    <div class="offcanvas-body">
                        @guest
                        <form action="{{ route('search_product_or_store_controller') }}" method="GET" role="search" class="d-flex d-md-none">
                            @csrf
                            <input class="form-control me-2 border " type="search" name="search" placeholder="Search products or store" aria-label="Search">
                            <button class="btn btn-warning" type="submit"><i class="fa-solid text-white fa-magnifying-glass"></i></button>
                        </form>
                        <hr>
                        @endguest
                        @auth
                            <hr>
                        @endauth
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item px-2 d-none d-md-block">
                                <a class="nav-link active" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="fa-solid fa-magnifying-glass fs-4 "></i>
                                    <span class="ms-3 d-md-none h5" aria-current="page">{{ __('Search') }}</span>
                                </a>
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="col-md-12">
                                                    <form action="{{ route('search_product_or_store_controller') }}" method="GET" role="search" role="search">
                                                        @csrf
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
                                    <a class="nav-link active" href="{{ route('profile', Auth::user()->username) }}">
                                        <i class="fa-solid fa-user fs-4"></i>
                                        <span class="ms-3 d-md-none h5" aria-current="page">{{ __('Profile') }}</span>
                                    </a>
                                </li>
                                <li class="nav-item px-2 dropdown-center">
                                    @if (App\Models\DeliveryStatus::where('user_id', Auth::id())->count())
                                    <a class="nav-link active position-relative" href="{{ route('profile', Auth::user()->username) }}" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="position-absolute d-none d-md-block top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                            {{ App\Models\DeliveryStatus::where('user_id', Auth::id())->count() }}
                                            <span class="visually-hidden">unread messages</span>
                                        </span>
                                        <i class="fa-solid fa-bell fs-4"></i>
                                        <span class="ms-3 d-md-none h5" aria-current="page">{{ __('Notification') }}
                                            <span class="badge bg-danger ms-2">{{ App\Models\DeliveryStatus::where('user_id', Auth::id())->count() }}</span>
                                        </span>
                                        <ul class="dropdown-menu container" style="width: 300px;">
                                            <h4 class="text-muted px-2">{{ __('Notifications') }}</h4>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <div class="row">
                                                        <div class="col-lg-2 col-md-2 col-sm-1 col-3 d-none d-sm-block py-3">
                                                            <img class="rounded-circle border border-info border-3" src="{{asset('/storage/images/avatar.png')}}" height="50" width="50">
                                                        </div>
                                                        <div class="col-lg-9 col-md-8 col-sm-8 ms-lg-3 col-12 mt-3">
                                                            <div class="row">
                                                                <div class="col-lg-10">
                                                                    <p class="fw-bold lh-1">{{ __('Unsuccessful delivery!') }}</p>
                                                                </div>
                                                                {{-- <div class="col-lg-1 text-end">
                                                                    <i class="fa-solid fs-5 fa-ellipsis-vertical"></i>
                                                                </div> --}}
                                                            </div>
                                                            <p class="small text-muted lh-1">{{ __('Apr 21, 2015') }}</p>
                                                            <p class="small lh-1">{{ __('2 minutes ago') }}</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </a>
                                    @else
                                    <a class="nav-link active position-relative" href="{{ route('order') }}" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-bell fs-4"></i>
                                        <span class="ms-3 d-md-none h5" aria-current="page">{{ __('Notification') }}
                                            <span class="badge bg-danger ms-2">{{ App\Models\DeliveryStatus::where('user_id', Auth::id())->count() }}</span>
                                        </span>
                                        <ul class="dropdown-menu container" style="width: 300px;">
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <p class="text-center">{{ __('No Notifications yet.') }}</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </a>
                                    @endif
                                </li>
                                <li class="nav-item px-2 ">
                                    @if (App\Models\Cart::where('user_id', Auth::id())->count() > 0)
                                        <a class="nav-link active position-relative" href="{{ route('cart') }}">
                                            <span class="position-absolute d-none d-md-block top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                                {{ App\Models\Cart::where('user_id', Auth::id())->count() }}
                                                <span class="visually-hidden">unread messages</span>
                                            </span>
                                            <i class="fa-solid  fa-cart-shopping fs-4"></i>
                                            <span class="ms-3 d-md-none h5" aria-current="page">{{ __('Cart') }}
                                                <span class="badge bg-danger ms-2">{{ App\Models\Cart::where('user_id', Auth::id())->count() }}</span>
                                            </span>
                                        </a>
                                    @else
                                    <a class="nav-link active " href="{{ route('cart') }}">
                                        <i class="fa-solid  fa-cart-shopping fs-4"></i>
                                        <span class="ms-3 d-md-none h5" aria-current="page">{{ __('Cart') }}
                                            <span class="badge bg-danger ms-2">{{ App\Models\Cart::where('user_id', Auth::id())->count() }}</span>
                                        </span>
                                    </a>
                                    @endif
                                </li>
                                <li class="nav-item px-2">
                                    @if (App\Models\Order::where('user_id', Auth::id())->count() > 0)
                                        <a class="nav-link active position-relative" href="{{ route('order') }}">
                                            <span class="position-absolute d-none d-md-block top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                                {{ App\Models\Order::where('user_id', Auth::id())->count() }}
                                                <span class="visually-hidden"></span>
                                            </span>
                                            <i class="fa-solid  fa-truck-fast fs-4 position-relative"></i>
                                            <span class="ms-3 d-md-none h5" aria-current="page">{{ __('Order') }}
                                                <span class="badge bg-danger ms-2">{{ App\Models\Order::where('user_id', Auth::id())->count() }}</span>
                                            </span>
                                        </a>
                                    @else
                                    <a class="nav-link active" href="{{ route('order') }}">
                                        <i class="fa-solid fa-truck-fast fs-4"></i>
                                        <span class="ms-3 d-md-none h5" aria-current="page">{{ __('Order') }}
                                            <span class="badge bg-danger ms-2">{{ App\Models\Order::where('user_id', Auth::id())->count() }}</span>
                                        </span>
                                    </a>
                                    @endif
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
                                        <a class="nav-link active" href="{{ route('store.home') }}">
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

</html> --}}
