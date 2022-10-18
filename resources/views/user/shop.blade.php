@extends('user.layouts.navigation_bar')
@section('content')
<div class="container">
    <div class="row g-2">
        @foreach ( $products as $product)
            <div class="col-lg-3 col-md-6 col-sm-6 col-6 mb-3 " style="max-width: 250px;">
                <a href="{{ route('product') }}" class="card shadow text-decoration-none text-dark h-100" data-bs-toggle="modal" data-bs-target="#productModal{{ $product->id }}">
                    <img src="{{ asset('/storage/products/'. $product->product_image) }}" class="card-img-top mt-3" alt="..." height="220">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $product->product_name }}</h5>
                        {{-- <hr> --}}
                        <p class="card-text h5 text-danger">{{ __('₱'. $product->product_price) }}</p>
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
                                <div class="row g-0">
                                    <div class="col-md-5">
                                        <img src="{{ asset('/storage/products/'. $product->product_image) }}" class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-md-7">
                                        <div class="card-body">
                                        <h5 class="card-title lh-base">{{ $product->product_name }}</h5>
                                        <p class="card-text lh-base h5 text-danger">{{ __('₱'. $product->product_price) }}</p>
                                        <p class="card-text">-10% <span class="text-decoration-line-through">₱9,999</span></p>
                                        <p class="card-text">{{ $product->product_definition }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-warning ">{{ __('Add to cart') }}</button>
                            <a href="{{ route('product', $product->product_name) }}" class="btn btn-success">{{ __('View more') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
