@extends('user.layouts.navigation_bar')
@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-3 col-12">
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
                        <div class="hstack gap-2 px-2 text-center ">
                            <p class="text-decoration-none text-muted mt-2 px-3"><span class="text-warning fw-bold">{{ number_format($total_sales) }}</span>{{ __(' Income') }}</p>
                            <div class="vr"></div>
                            <p class="text-decoration-none text-muted mt-2 px-3"><span class="text-warning fw-bold">{{ App\Models\Cart::where('user_id', Auth::id())->onlyTrashed()->count() }}</span>{{ __(' Order') }}</p>
                            <div class="vr"></div>
                            <p class="text-decoration-none text-muted mt-2 px-3"><span class="text-warning fw-bold">{{ App\Models\Cart::where('user_id', Auth::id())->count() }}</span>{{ __(' Cart') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-12">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                        <div class="card  mb-3 " >
                            <div class="card-body h-100">
                                <div class="row">
                                    <div class="col-lg-8 col-sm-6 col-6 col-md-auto">
                                        <h2 class="users-count" id="users-count">{{ __('₱ '.number_format($total_sales)) }}</h2>
                                        <h6>{{ __('Total Sales') }}</h6>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 col-md-auto col-6 mt-3 text-end">
                                        <i class="fa-solid fa-store fs-1"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                        <div class="card  mb-3 " >
                            <div class="card-body h-100">
                                <div class="row">
                                    <div class="col-lg-8 col-sm-6 col-6 col-md-auto">
                                        <h2 class="users-count" id="users-count">{{ $total_orders }}</h2>
                                        <h6 >{{ __('Total Orders') }}</h6>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 col-md-auto col-6 mt-3 text-end">
                                        <i class="fa-solid fa-store fs-1"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                        <div class="card  mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-8 col-sm-6 col-6 col-md-auto">
                                        <h2 class="users-count" id="users-count">{{ $product_sold }}</h2>
                                        <h6 >{{ __('Products Sold') }}</h6>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 col-md-auto text-end col-6 mt-3 ">
                                        <i class="fa-solid fa-store fs-1"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-8 col-sm-6 col-6 col-md-auto">
                                        <h2 class="users-count" id="users-count">{{ number_format(App\Models\Product::where('store_id', Auth::id())->count()) }}</h2>
                                        <h6 >{{ __('Total Poducts') }}</h6>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 col-md-auto col-6 mt-3 text-end">
                                        <i class="fa-solid fa-store fs-1"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                {!! $chart->container() !!}
                                {!! $chart->script() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
