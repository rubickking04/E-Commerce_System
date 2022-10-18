@extends('user.layouts.product')
@section('content')
    <div class="container">
        <div class="card shadow">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 g-0">
                        <img src="{{ asset('/storage/products/'. $prodImg) }}" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title lh-base">{{ $prodName }}</h5>
                            <p class="card-text lh-base h5 text-danger">{{ __('₱ '. $prodPrice) }}</p>
                            <p class="card-text">{{ $prodCat }}</p>
                            <p class="card-text">{{ $prodDef }}</p>
                            <div class="row g-1 quantity align-items-center">
                                <div class="col-auto">
                                    <label for="myquantity" class="col-form-label me-2">Quantity</label>
                                </div>
                                <div class="col-2">
                                    <input class="form-control qty-input text-center form-control-lg" type="number" maxlength="2" max="10" value="1">
                                </div>
                            {{-- <p>Quantity</p> <button class="btn btn-secondary fs-5"><i class="fa-solid fa-minus fs-6"></i></button> <input class="form-control" type="number"> <button class="btn btn-secondary "><i class="fa-solid fa-plus fs-6"></i></button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
