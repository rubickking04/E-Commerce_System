@extends('admin.layouts.login')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-9">
                <div class="card shadow" style="border-radius: 40px 0  40px 0">
                    <div class="row">
                        <div class="col-xl-6 col-md-5 col-sm-3 col py-5 d-none d-sm-block" >
                            <img src="{{ asset('/storage/images/cart.png') }}" class="img-fluid py-5" alt="Phone image">
                        </div>
                        <div class="col-xl-6">
                            <div class="card-body py-5">
                                <div class="text-center">
                                    <img src="{{ asset('/storage/images/logo.png') }}" alt="avatar" class="rounded-circle img-thumbnail  mb-3" height="150px" width="150px">
                                    <h2 >{{ __('Welcome to E-Mart') }}</h2>
                                </div>
                                <div class="alert alert-warning text-center alert-dismissible fade show" role="alert">
                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                    <strong>{{ __('This is only for Administrators') }}</strong>
                                    {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
                                </div>
                                <form method="POST" action="{{ route('admin.login') }}">
                                    @csrf
                                    <div class="row mb-3">

                                        <div class="form-outline text-start">
                                            <label for="email" class="col-form-label">Email</label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="bi bi-envelope-fill"></i></div>
                                                <input type="email" id="email" placeholder="Example: rubickking04@gmail.com"
                                                    name="email" class="form-control @error('email') is-invalid @enderror"  value="{{ old('email') }}"/>
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
                                                    class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}"/>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-outline text-start">
                                        <div class="row mb-2">
                                            <div class="col-lg-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                                        {{ old('remember') ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="remember">
                                                        {{ __('Remember me') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="text-center text-white btn btn-warning mb-3">Sign in</button>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <p>Not a member? <a href="{{ route('sign-up') }}">{{ __('Sign Up') }}</a></p>
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
