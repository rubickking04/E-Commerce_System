@extends('user.layouts.store')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-9">
                <div class="card shadow" style="border-radius: 40px 0  40px 0">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 py-5 d-none d-lg-block" >
                            <img src="{{ asset('/storage/images/sell.png') }}" class="img-fluid py-5 mt-5" alt="Phone image">
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="card-body py-5 container">
                                <div class="text-center">
                                    <img src="{{ asset('/storage/images/logo.png') }}" alt="avatar" class="rounded-circle img-thumbnail mb-2" height="150px" width="150px">
                                    <h2 >{{ __('Welcome to E-Mart Sellers') }}</h2>
                                </div>
                                <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
                                    <i class="fa-solid fa-check"></i>
                                    <strong>{{ __('Create your own business and sell your products.') }}</strong>
                                </div>
                                <form method="POST" action="{{ route('my-store') }}">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="form-outline text-start">
                                            <label for="name" class="col-form-label">{{ __('Store Name') }}</label>
                                            <div class="input-group">
                                                <input type="text" id="store_name" placeholder="Example: Juan Dela Cruz"
                                                    name="store_name" class="form-control @error('store_name') is-invalid @enderror" />
                                                @error('store_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-outline text-start">
                                            <label for="email" class="col-form-label">{{ __('Store Email') }}</label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="bi bi-envelope-fill"></i></div>
                                                <input type="email" id="store_email" placeholder="Example: rubickking04@gmail.com"
                                                    name="email" class="form-control @error('email') is-invalid @enderror" />
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-outline text-start ">
                                            <label for="password" class="col-form-label">{{ __('Password') }}</label>
                                            <div class="input-group">
                                                <span class="input-group-text" onclick="password_show_hide();">
                                                    <i class="fas fa-eye" id="show_eye"></i>
                                                    <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                                </span>
                                                <input id="password" type="password" placeholder="Must be 8-20 characters long."
                                                    class="form-control @error('password') is-invalid @enderror" name="password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-outline text-start mb-3">
                                            <label for="password-confirm"
                                                class="col-form-label">{{ __('Confirm Password') }}</label>
                                            <div class="input-group">
                                                <span class="input-group-text" onclick="password_show_hides();">
                                                    <i class="fas fa-eye" id="show_eyes"></i>
                                                    <i class="fas fa-eye-slash d-none" id="hide_eyes"></i>
                                                </span>
                                                <input id="password-confirm" type="password" placeholder="Confirm your password"
                                                    class="form-control @error('password-confirm') is-invalid @enderror"
                                                    name="password_confirmation" autocomplete="new-password">
                                            </div>
                                            @error('password-confirm')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-outline text-start">
                                        <div class="text-center">
                                            <button type="submit" class="text-center text-white btn btn-warning mb-3">Sign in</button>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
