@extends('user.layouts.navigation_bar')
@section('content')
<div class="container">
    @if ($products->count())
        @if (Session::has('success'))
            <p>{{ Session::get('success') }}</p>
        @endif
        @if (session('msg'))
            <div class="col-lg-12 py-3">
                <div class="text-center justify-content-center">
                    <i class="bi bi-exclamation-triangle-fill fs-1 text-warning text-center"></i>
                </div>
                <div class="card-body">
                    <p class="h2 fw-bold text-danger text-center">{{ __('ERROR 404 | Not Found!') }}</p>
                    <h5 class="card-title fw-bold text-center">{{ session('msg') }}</h5>
                    <p class="card-text fw-bold text-center text-muted">{{ __('Sorry, but the query you were looking for was either not found or does not exist.') }}</p>
                    <div class="row justify-content-center">
                        <div class="col-lg-5 col-md-5 col-sm-10 col-12">
                            <div class="row">
                                <form action="{{ route('search_product_or_store_controller') }}" method="GET" role="search" class="d-flex">
                                    @csrf
                                    <div class="input-group">
                                        <input class="form-control me-2 border border-primary" type="search" name="search" placeholder="Please try again to search by Product or Category" aria-label="Search">
                                        <div class="input-group-text bg-primary">
                                            <button class="btn " type="submit"><i class="fa-solid fa-magnifying-glass text-white"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
        <div class="row g-2">
            @foreach ( $products as $product)
                <div class="col-xl-2 col-lg-3 col-md-6 col-sm-6 col-6 mb-3 " style="max-width: 230px;">
                    <a href="{{ route('show.product', $product->id) }}" class="card shadow text-decoration-none text-dark h-100">
                        <img src="{{ asset('/storage/products/'. $product->product_image) }}" class="card-img-top mt-3" alt="..." height="170">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{ $product->product_name }}</h5>
                            <p class="card-text h5 text-danger">{{ __('₱'. number_format($product->product_price)) }}</p>
                            <p class="card-text h5 text-muted small">{{ $product->product_category }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        @endif
    @else
    <h4 class="text-center mt-5 text-muted">{{ __('No products') }}</h4>
    @endif
</div>
@endsection
