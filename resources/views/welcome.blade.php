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
        <div id="app">
            <nav class="navbar navbar-expand bg-light shadow-lg">
                <div class="container">
                    <a class="navbar-brand" href="#"><img class="align-top" src="{{ asset('/storage/images/E-mart-logo.png') }}" height="50" width="80"></a>
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
                                    <li><a class="dropdown-item" href="#"><i class="fa-solid fa-right-from-bracket px-2 fs-5"></i>{{ __('Logout') }}</a></li>
                                @endauth
                                <li><a class="dropdown-item" href="{{ route('login') }}"><i class="fa-solid fa-right-to-bracket  fs-5 px-2"></i>{{ __('Sign up') }}</a></li>
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
                                            <input id="search" type="search" aria-label="Search" placeholder="Search a product or a store" class="form-control form-control-lg @error('search') is-invalid @enderror" >
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

        <main class="py-3">
            <div class="container">
                <div class="row g-1">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-6 mb-3 " style="max-width: 250px;">
                        <a href="#" class="card shadow text-decoration-none text-dark h-100" data-bs-toggle="modal" data-bs-target="#productModal">
                            <img src="{{ asset('/storage/images/note11.jpg') }}" class="card-img-top" alt="..." height="220">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">Redmi Note 11</h5>
                                {{-- <hr> --}}
                                <p class="card-text h5 text-danger">₱8,899</p>
                                <p class="card-text h5 text-muted "> -10% <span class="text-decoration-line-through">₱9,999</span></p>
                                <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i lass="fa-solid fa-star"></i>(50)
                            </div>
                        </a>
                    </div>
                    {{-- Product Modal --}}
                    <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('Redmi Note 11') }}</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3" style="max-width: 540px;">
                                        <div class="row g-0">
                                            <div class="col-md-5">
                                                <img src="{{ asset('/storage/images/note11.jpg') }}" class="img-fluid rounded-start" alt="...">
                                            </div>
                                            <div class="col-md-7">
                                                <div class="card-body">
                                                <h5 class="card-title lh-base">{{ __('Redmi Note 11') }}</h5>
                                                <p class="card-text lh-base h5 text-danger">₱8,899</p>
                                                <p class="card-text">-10% <span class="text-decoration-line-through">₱9,999</span></p>
                                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-warning ">{{ __('Add to cart') }}</button>
                                    <button type="button" class="btn btn-success">{{ __('View more') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-lg-3 col-md-6 col-sm-6 col-6  mb-3" style="max-width: 250px;">
                        <div class="card shadow h-100">
                            <img src="{{ asset('/storage/images/iphone14.jpg') }}" class="card-img-top" alt="..." height="220">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">iPhone 14 Pro Max</h5>
                                <p class="card-text h5 text-danger">₱60,500</p>
                                <p class="card-text h5 text-muted "> -25% <span
                                        class="text-decoration-line-through">₱65,909</span></p>
                                <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                    class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                    class="fa-regular fa-star"></i>(652)
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @yield('content')
        </main>
    </body>

    </html>
