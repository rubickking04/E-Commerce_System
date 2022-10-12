@extends('user.layouts.navigation_bar')
@section('content')
<div class="container">
    <div class="row g-1">
        <div class="col-lg-3 col-md-6 col-sm-6 col-6 mb-3 " style="max-width: 250px;">
            <a href="{{ route('product') }}" class="card shadow text-decoration-none text-dark h-100" data-bs-toggle="modal" data-bs-target="#productModal">
                <img src="{{ asset('/storage/images/note11.jpg') }}" class="card-img-top" alt="..." height="220">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Redmi Note 11</h5>
                    {{-- <hr> --}}
                    <p class="card-text h5 text-danger">₱8,899</p>
                    <p class="card-text h5 text-muted "> -10% <span class="text-decoration-line-through">₱9,999</span></p>
                    {{-- <p>Xiaomi Store Global</p> --}}
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i lass="fa-solid fa-star"></i>(50)
                </div>
            </a>
        </div>
        {{-- Product Modal --}}
        <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('Redmi Note 11') }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-5">
                                    <img src="{{ asset('/storage/images/note11.jpg') }}" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">
                                    <h5 class="card-title lh-base">{{ __('Redmi Note 11') }}</h5>
                                    <p class="card-text lh-base h5 text-danger">₱8,899</p>
                                    <p class="card-text">-10% <span class="text-decoration-line-through">₱9,999</span></p>
                                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-warning ">{{ __('Add to cart') }}</button>
                        <a href="{{ route('product') }}" class="btn btn-success">{{ __('View more') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-lg-3 col-md-6 col-sm-6 col-6  mb-3" style="max-width: 250px;">
            <div class="card shadow h-100">
                <img src="{{ asset('/storage/images/iphone14.jpg') }}" class="card-img-top" alt="..." height="220">
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
@endsection
