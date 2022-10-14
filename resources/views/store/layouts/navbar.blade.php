<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{ asset('storage/images/logo1.png') }}" type="image/x-icon">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="antialiased" style="background-color: #eceff1">
    @include('sweetalert::alert')
    <div id="app">
        <nav class="navbar navbar-light bg-dark shadow sticky-top">
            <div class="container">
                <a class=" navbar-nav navbar-brand" data-bs-toggle="offcanvas" data-bs-target="#offcanvas"
                    role="button">
                    <lord-icon src="https://cdn.lordicon.com/wgwcqouc.json" trigger="morph"
                        colors="primary:#ffffff,secondary:#ffffff" stroke="60" style="width:30px;height:30px"
                        data-bs-toggle="offcanvas" data-bs-target="#offcanvas">
                    </lord-icon>
                </a>
                <p class="navbar-brand mb-0 navbar-text text-truncate text-white">{{ __('E-Mart Store Owner\'s Portal') }}
                </p>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-none d-sm-block">
                    <li class="nav-item text-white">
                        <img src="{{ asset('/storage/images/avatar.png') }}" alt="" width="30"
                            height="30" class="rounded-circle">
                        {{ Auth::user()->name }}
                    </li>
                </ul>
            </div>
        </nav>
        <div class="offcanvas offcanvas-start w-auto text-white container bg-dark" tabindex="-1" id="offcanvas"
            data-bs-keyboard="true" data-bs-backdrop="true">
            <div class="offcanvas-header">
                <h6 class="offcanvas-title" id="offcanvas">
                    <a href="{{ url('/') }}"
                        class="d-flex justify-content-center align-items-center mb-auto mb-md-0 text-center me-md-auto text-white text-decoration-none">
                        <img class="d-inline-block align-top rounded-circle border border-info border-3"
                            src="{{ asset('/storage/images/avatar.png') }}" height="60" width="60">
                    </a>
                    <span class="container fs-4">{{ Auth::user()->store_name }}</span>
                    <a class="nav-link">
                        <span class="text-info d-flex justify-content-center  text-uppercase small">{{ __('My Store Name') }}</span>
                    </a>
                </h6>
            </div>
            <hr>
            <div class="offcanvas-body px-0 ">
                <ul class="nav nav-pills flex-column mb-sm-auto mb-auto mb-0 align-items-start" id="menu">
                    <li class="nav-item">
                        <a class="nav-link"><span
                                class="text-white text-muted text-uppercase small">{{ __('Navigation') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.home') }}" class="nav-link text-truncate">
                            <i class="fs-5 bi bi-graph-up-arrow  text-white"></i><span class="ms-2 text-white"
                                aria-current="page">{{ __('Dashboard') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"><span
                                class="text-white text-muted text-uppercase small">{{ __('Add new') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.home') }}"class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#table-collapses" aria-expanded="true">
                        <i class="fs-5 fa-solid fa-cart-plus text-white"></i><span class="ms-2  text-white">{{ __('Create new products') }}</span></a>
                        <div class="collapse container" id="table-collapses">
                            <ul class="btn-toggle-nav nav nav-pills flex-column mb-sm-auto mb-auto mb-0 align-items-start list-unstyled fw-normal pb-2">
                                <li class="nav-item"><a href="{{ route('store.products') }}" class="ms-2 nav-link  text-white text-decoration-none rounded"><i class="fs-5 fa-solid fa-angles-right"></i><span class="ms-2  text-white">{{ __('Add new products ') }}</span></a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"><span
                                class="text-white text-muted text-uppercase small">{{ __('Tables') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.home') }}"class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#table-collapse" aria-expanded="true">
                        <i class="fs-5 fa-solid fa-table text-white"></i><span class="ms-2  text-white">{{ __('Data Tables') }}</span></a>
                        <div class="collapse container" id="table-collapse">
                            <ul class="btn-toggle-nav nav nav-pills flex-column mb-sm-auto mb-auto mb-0 align-items-start list-unstyled fw-normal pb-2">
                                <li class="nav-item"><a href="#" class="ms-2 nav-link  text-white text-decoration-none rounded"><i class="fs-5 fa-solid fa-angles-right"></i><span class="ms-2  text-white">{{ __('Products Table ') }}<span class="badge text-bg-primary">{{__('(34)')}}</span> </span></a></li>
                                <li class="nav-item"><a href="#" class="ms-2 nav-link  text-white text-decoration-none rounded"><i class="fs-5 fa-solid fa-angles-right"></i><span class="ms-2  text-white">{{ __('Carts Table ') }} <span class="badge text-bg-primary">{{__('(32)')}}</span> </span></a></li>
                                <li class="nav-item"><a href="#" class="ms-2 nav-link  text-white text-decoration-none rounded"><i class="fs-5 fa-solid fa-angles-right"></i><span class="ms-2  text-white">{{ __('Orders Table ') }} <span class="badge text-bg-primary">{{__('(32)')}}</span> </span></a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
                <hr>
                <div class="dropdown">
                    <a href="{{ route('admin.logout') }}" class="d-flex px-3 align-items-center nav-link text-truncate"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt fs-5 text-white"></i><span
                            class="ms-2 text-white">{{ __('Sign out') }}</span> </a>
                </div>
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="py-2">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                                <div class="card text-white bg-primary mb-3 shadow" >
                                    <div class="card-body h-100">
                                        <div class="row">
                                            <div class="col-lg-8 col-sm-6 col-6 col-md-auto">
                                                <h2 class="users-count" id="users-count">
                                                    {{ App\Models\User::all()->count() }}</h2>
                                                <h5>{{ __('Products') }}</h5>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-auto col-6 mt-3 text-end">
                                                <i class="fa-solid fa-user fs-1"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                                <div class="card text-white bg-success mb-3 shadow">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-7 col-sm-6 col-6 col-md-auto">
                                                <h2>2</h2>
                                                <h5>{{ __('Stores') }}</h5>
                                            </div>
                                            <div class="col-lg-5 col-sm-6 col-md-auto text-end col-6 mt-3 ">
                                                <i class="fa-solid fa-store fs-1"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                                <div class="card bg-warning mb-3 text-white shadow ">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-7 col-sm-6 col-6 col-md-auto">
                                                <h2>3</h2>
                                                <h5>{{ __('Orders') }}</h5>
                                            </div>
                                            <div class="col-lg-5 col-sm-6 col-md-auto col-6 text-end col-6 mt-3 ">
                                                <i class="fa-solid fa-bag-shopping fs-1"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                                <div class="card text-white bg-danger mb-3 shadow">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-7 col-sm-6 col-6 col-md-auto">
                                                <h2>2</h2>
                                                <h5>{{ __('Carts') }}</h5>
                                            </div>
                                            <div class="col-lg-5 col-sm-6 col-md-auto col-6 text-end col-6 mt-3 ">
                                                <i class="fa-solid fa-cart-shopping fs-1"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.lordicon.com/lusqsztk.js"></script>

</html>
