@extends('user.layouts.signup')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-9">
                <div class="card shadow" style="border-radius: 40px 0  40px 0">
                    <div class="row">
                        <div class="col-xl-6 col-md-5 col-sm-3 col py-5 d-none d-sm-block align-middle" >
                            <img src="{{ asset('/storage/images/cart.png') }}" class="img-fluid mt-5 py-5 " alt="Phone image">
                        </div>
                        <div class="col-xl-6">
                            <div class="card-body py-4">
                                <div class="text-center">
                                    <img src="{{ asset('/storage/images/logo.png') }}" alt="avatar" class="rounded-circle img-thumbnail  mb-3" height="100px" width="100px">
                                    <h2 >{{ __('Welcome to E-Mart') }}</h2>
                                </div>
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="row mb-2">
                                        <div class="form-outline text-start">
                                            <label for="name" class="col-form-label">{{ __('Name') }}</label>
                                            <div class="input-group">
                                                <input type="text" id="name" placeholder="Juan Dela Cruz" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"/>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-outline text-start">
                                            <label for="email" class="col-form-label">Email</label>
                                            <div class="input-group">
                                                <input type="email" id="email" placeholder="helloworld@gmail.com" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"/>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-outline text-start ">
                                            <label for="username" class="col-form-label">{{ __('Address') }}</label>
                                            <div class="input-group">
                                                <input type="text" id="address" placeholder="Zamboanga City" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}"/>
                                                @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-outline text-start col-lg-6">
                                            <label for="phone_number" class="col-form-label">{{ __('Phone Number') }}</label>
                                            <div class="input-group">
                                                <input type="text" id="address" placeholder="invoker69" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" value="{{ old('phone_number') }}"/>
                                                @error('phone_number')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-outline text-start col-lg-6">
                                            <label for="username" class="col-form-label">{{ __('Username') }}</label>
                                            <div class="input-group">
                                                <input type="text" id="address" placeholder="invoker69" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}"/>
                                                @error('username')
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
                                    <div class="text-center">
                                        <button type="submit"
                                            class=" text-center btn btn-warning mb-2 text-white">{{ __('Sign up') }}</button>
                                    </div>
                                    <div class="text-center">
                                        <p>Already have an account? <a href="{{ route('login') }}">{{ __('Sign in') }}</a></p>
                                    </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
