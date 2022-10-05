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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>

    <body class="antialiased" style="background-color: #eceff1">
        <div id="app">
            <nav class="navbar text-muted navbar-dark bg-light">
                <div class="container">
                    <a class="navbar-brand" href="#">
                        <img class="d-inline-block align-top" src="{{ asset('/storage/images/E-mart-logo.png') }}"
                            height="50" width="80">
                    </a>
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
                        <div class="container">
                            <form class="d-flex" role="search">
                                <input class="form-control me-2" type="search" placeholder="Search"
                                    aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                        </div>
                    </ul>
                    {{-- <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
                        <div class="container">
                            <div class="hstack gap-3">
                                <p class="mb-2 ">
                                    {{ __('Sign Up') }}
                                </p>
                                <div class="vr"></div>
                                <p class="mb-2">{{ __('Login') }}
                                </p>
                            </div>
                        </div>
                    </ul> --}}
                </div>
            </nav>
            <main class="py-3">
                <div class="container">
                    <div class="card mb-3">
                        <div class="card-header">Categories</div>
                        <div class="container py-3">
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="card py-5">
                                        <div class="text-center">
                                            <i class="fa-solid fa-mobile fs-1"></i>
                                            <h6>Mobiles</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="card py-5">
                                        <div class="text-center">
                                            <i class="fa-solid fa-shirt fs-1"></i>
                                            <h6>Shirts</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="card py-5">
                                        <div class="text-center">
                                            <i class="fa-solid fa-laptop fs-1"></i>
                                            <h6>Laptops</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="card py-5">
                                        <div class="text-center">
                                            <i class="fa-solid fa-desktop fs-1"></i>
                                            <h6>Monitors</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="card py-5">
                                        <div class="text-center">
                                            <h6>Mobiles</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="card py-5">
                                        <div class="text-center">
                                            <h6>Mobiles</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6 mb-3">
                            <a href="#" class="card shadow text-decoration-none text-dark">
                                <img src="{{ asset('/storage/images/note11.jpg') }}" class="card-img-top" alt="..."
                                    height="270">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Redmi Note 11</h5>
                                    {{-- <hr> --}}
                                    <p class="card-text h5 text-danger">₱8,899</p>
                                    <p class="card-text h5 text-muted "> -10% <span
                                            class="text-decoration-line-through">₱9,999</span></p>
                                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                        class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                        class="fa-solid fa-star"></i>(50)
                                </div>
                            </a>
                        </div>
                        <div class="col-xxl-3 col-lg-3 col-md-6 col-sm-6 col-6 mb-3">
                            <div class="card shadow">
                                <img src="{{ asset('/storage/images/iphone14.jpg') }}" class="card-img-top"
                                    alt="..." height="270">
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
        </div>
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
