<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
        <nav class="navbar navbar-expand bg-light shadow-lg">
            <div class="container">
                {{-- <a class="navbar-brand" href="{{ url('/') }}"><img class="align-top" src="{{ asset('/storage/images/E-mart-logo.png') }}" height="50" width="80"></a> --}}
                <p class="navbar-brand mb-0 navbar-text fw-bold text-dark">{{ __('Product Name') }}</p>
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
                                    <li><a class="dropdown-item" href="#"><i class="fa-solid fa-cart-plus fs-5 px-2"></i>{{ __('Create Store') }}</a></li>
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
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
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
            </div>
        </nav>
    </div>

    <main class="py-4">
        @yield('content')
    </main>
</body>
<script>
    $(document).ready(function () {

$('.increment-btn').click(function (e) {
    e.preventDefault();
    var incre_value = $(this).parents('.quantity').find('.qty-input').val();
    var value = parseInt(incre_value, 10);
    value = isNaN(value) ? 0 : value;
    if(value<10){
        value++;
        $(this).parents('.quantity').find('.qty-input').val(value);
    }

});

$('.decrement-btn').click(function (e) {
    e.preventDefault();
    var decre_value = $(this).parents('.quantity').find('.qty-input').val();
    var value = parseInt(decre_value, 10);
    value = isNaN(value) ? 0 : value;
    if(value>1){
        value--;
        $(this).parents('.quantity').find('.qty-input').val(value);
    }
});

});

</script>

</html>
