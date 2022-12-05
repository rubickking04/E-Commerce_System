@extends('user.layouts.navigation_bar')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-12">
                <div class="card mb-4 text-center">
                    <div class="card-body">
                        <div class="text-center">
                            <a href="{{ url('/') }}" class="text-white text-decoration-none">
                                <img class="d-inline-block align-top rounded-circle" src="{{ asset('/storage/images/avatar.png') }}" height="150" width="150">
                            </a>
                        </div>
                        <span class="fs-5 fw-bold ">{{ Auth::user()->name }}</span>
                        <a class="nav-link"><span class="text-muted small">{{ __( Auth::user()->username) }}</span></a>
                        <br>
                        <div class="hstack gap-3 px-4 text-center ">
                            <p class="text-decoration-none text-muted mt-2 px-3"><span class="text-warning fw-bold">{{ App\Models\Cart::where('user_id', Auth::id())->count() }}</span>{{ __(' Income') }}</p>
                            <div class="vr"></div>
                            <p class="text-decoration-none text-muted mt-2 px-3"><span class="text-warning fw-bold">{{ App\Models\Cart::where('user_id', Auth::id())->onlyTrashed()->count() }}</span>{{ __(' Order') }}</p>
                            <div class="vr"></div>
                            <p class="text-decoration-none text-muted mt-2 px-3"><span class="text-warning fw-bold">{{ App\Models\Cart::where('user_id', Auth::id())->count() }}</span>{{ __(' Cart') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-12">
                <div class="card mb-4">
                    <div class="card-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
