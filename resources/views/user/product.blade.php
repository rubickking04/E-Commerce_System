@extends('user.layouts.product')
@section('content')
    <div class="container">
        <div class="card mb-4">
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
                            <p class="card-text mt-2">{{ __('Category: '.$product->product_category) }}</p>
                            <p class="card-text">{{ __('Product Definition: '.$product->product_definition) }}</p>
                            <form action="{{ route('add.cart', $product->id) }}" method="POST">
                                @csrf
                            <div class="row g-1 mb-5 quantity align-items-center">
                                <div class="col-auto">
                                    <label for="quantity" class="col-form-label me-2">{{ __('Quantity: ') }}</label>
                                </div>
                                <div class="col-2">
                                    <input class="form-control qty-input text-center" name="quantity" type="number"  value="1">
                                </div>
                            </div>
                            <div class="row g-1">
                                <a href="{{ url('/') }}" class="col-xl-2 col-5 ms-1 btn btn-secondary">{{ __('Back') }}</a>
                                <button type="submit" class="col-xl-2 col-5 ms-1 btn btn-warning">{{ __('Add to Cart') }}</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-body">
                <div class="row g-0">
                    <div class="col-xl-1 col-lg-1 col-md-2 col-sm-3 col-3 mt-1 ms-3">
                        <img class="rounded-circle border border-info border-1" src="{{asset('/storage/images/avatar.png')}}" height="80" width="80">
                    </div>
                    <div class="col-xl-4 col-lg-7 col-md-8 col-sm-8 ms-lg-3 col-8 mt-3 ">
                        <p class="h4">{{ $product->hasStore->store_name }}</p>
                        <p class="fs-6 lh-1">{{ $product->hasStore->email }}</p>
                        <a href="{{ route('storeviewer', $product->hasStore->id) }}" class="btn btn-outline-warning"><i class="fa-solid fa-store fs-5 me-2"></i>{{ __('View Shop') }}</a>
                    </div>
                    <div class="vr me-4 d-none d-lg-block"></div>
                    <div class="col-xl-4 col-lg-3 col-md-12 col-sm-12 col-12 d-none d-lg-block">
                        <p class="text-muted lh-base">{{ __('Joined:') }} <span class="text-danger ms-3">{{ $product->hasStore->created_at->diffForHumans()}}</span> </p>
                        <p class="text-muted">{{ __('Products: ') }} <span class="text-danger ms-3">{{ App\Models\Product::where('store_id', '=', $product->store_id)->count() }}</span> </p>
                    </div>
                </div>
            </div>
        </div>
        <h4 class="text-capitalize text-muted">{{ __('From the same shop') }}</h4>
        <div class="row">
            @foreach ( $prod as $product)
            <div class="col-xl-2 col-lg-3 col-md-6 col-sm-6 col-6 mb-3 " style="max-width: 230px;">
                <a href="#" class="card text-decoration-none text-dark h-100" data-bs-toggle="modal" data-bs-target="#productModal{{ $product->id }}">
                    <img src="{{ asset('/storage/products/'. $product->product_image) }}" class="card-img-top mt-3" alt="..." height="170">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $product->product_name }}</h5>
                        {{-- <hr> --}}
                        <p class="card-text h5 text-danger">{{ __('₱'. number_format($product->product_price)) }}</p>
                        <p class="card-text h5 text-muted small">{{ $product->product_category }}</p>
                        {{-- <p>Xiaomi Store Global</p> --}}
                        {{-- <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i lass="fa-solid fa-star"></i>(50) --}}
                    </div>
                </a>
            </div>
            {{-- Product Modal --}}
            <div class="modal fade" id="productModal{{ $product->id }}" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $product->product_name }}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3 mt-3" style="max-width: 540px;">
                                <div class="row g-3">
                                    <div class="col-md-5">
                                        <img src="{{ asset('/storage/products/'. $product->product_image) }}" class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-md-7">
                                        <div class="card-body">
                                        <h5 class="card-title lh-base">{{ $product->product_name }}</h5>
                                        <p class="card-text lh-base h5 text-danger">{{ __('₱'. number_format($product->product_price)) }}</p>
                                        <p class="card-text">{{ $product->product_definition }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-warning ">{{ __('Add to cart') }}</button>
                            <a href="{{ route('show.product', $product->id) }}" class="btn btn-success">{{ __('View more') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
@endsection
