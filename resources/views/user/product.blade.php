@extends('user.layouts.product')
@section('content')
    <div class="container">
        <div class="card shadow">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 g-0">
                        <img src="{{ asset('/storage/images/note11.jpg') }}" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title lh-base">{{ __('Redmi Note 11') }}</h5>
                            <p class="card-text lh-base h5 text-danger">₱8,899</p>
                            <p class="card-text">-10% <span class="text-decoration-line-through">₱9,999</span></p>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <div class="row g-1 quantity align-items-center">
                                <div class="col-auto">
                                  <label for="myquantity" class="col-form-label">Quantity</label>
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-secondary decrement-btn" type="button"><i class="fa-solid fa-minus"></i></button>
                                </div>
                                <div class="col-2">
                                    <input class="form-control qty-input text-center form-control-lg" type="number" maxlength="2" max="10" value="1">
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-secondary increment-btn" type="button"><i class="fa-solid fa-plus"></i></button>
                                </div>
                            {{-- <p>Quantity</p> <button class="btn btn-secondary fs-5"><i class="fa-solid fa-minus fs-6"></i></button> <input class="form-control" type="number"> <button class="btn btn-secondary "><i class="fa-solid fa-plus fs-6"></i></button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
