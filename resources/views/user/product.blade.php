@extends('user.layouts.product')
@section('content')
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5 col-12">
                        <img src="{{ asset('/storage/products/'. $product->product_image) }}" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-7 col-12">
                        <div class="card-body">
                            <h5 class="card-title h4 lh-base">{{ $product->product_name }}</h5>
                            <div class="text-bg-light">
                                <p class="card-text px-2 lh-lg h3 text-danger ">{{ __('₱ '. number_format($product->product_price)) }}</p>
                            </div>
                            <p class="card-text">{{ $product->product_category }}</p>
                            <p class="card-text">{{ $product->product_definition }}</p>
                            <div class="row g-1 mb-5 quantity align-items-center">
                                <div class="col-auto">
                                    <label for="myquantity" class="col-form-label me-2">Quantity</label>
                                </div>
                                <div class="col-2">
                                    <input class="form-control qty-input text-center form-control-lg" type="number"  value="1">
                                </div>
                            </div>
                            <div class="row g-1">
                                <a href="{{ URL::previous() }}" class="col-xl-2 col-5 ms-1 btn btn-secondary">{{ __('Back') }}</a>
                                <button class="col-xl-2 col-5 ms-1 btn btn-warning">{{ __('Add to Cart') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow">
            <div class="card-body">
                <div class="row g-0">
                    <div class="col-xl-1 col-lg-1 col-md-2 col-sm-3 col-3 mt-1 ms-3">
                        <img class="rounded-circle border border-info border-1" src="{{asset('/storage/images/avatar.png')}}" height="80" width="80">
                    </div>
                    <div class="col-xl-4 col-lg-7 col-md-8 col-sm-8 ms-lg-3 col-8 mt-3 ">
                        <p class="h4">{{ $product->hasStore->store_name }}</p>
                        <p class="fs-6 lh-1">{{ Auth::user()->email }}</p>
                        <button class="btn btn-outline-warning"><i class="fa-solid fa-store fs-5 me-2"></i>{{ __('View Shop') }}</button>
                    </div>
                    <div class="vr me-4 d-none d-lg-block"></div>
                    <div class="col-xl-4 col-lg-3 col-md-12 col-sm-12 col-12 d-none d-lg-block">
                        <p class="text-muted lh-base">{{ __('Joined:') }} <span class="text-danger ms-3">{{ $product->hasStore->created_at->diffForHumans()}}</span> </p>
                        <p class="text-muted">{{ __('Products: ') }} <span class="text-danger ms-3">{{ App\Models\Product::where('store_id', '=', $product->store_id)->count() }}</span> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
