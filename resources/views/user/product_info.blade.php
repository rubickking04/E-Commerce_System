@extends('user.layouts.navigation_bar')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <p class="fs-6 fw-bold">
                            <i class="fa-solid fa-map-location-dot text-muted fs-4"></i>
                            <span class="px-2 mb-2">{{ __('Reciever : '.Auth::user()->name) }}</span>
                        </p>
                        <p class="px-5 text-muted">{{ __('HB Homes Subdivision Phase II, Block 9 Lot 3, Sinunuc Zamboanga City') }}</p>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="mt-2">
                            <i class="fa-solid fa-store text-muted fs-4"></i>
                            <span class="px-2">{{ $storeName }}</span>
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-lg-2 col-md-2 col-4">
                                <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                                    <img src="{{ asset('/storage/products/'. $prodImage) }}" class="w-100" alt="Product Image" />
                                </div>
                            </div>
                            <div class="col-lg-10 col-md-10 col-8 ">
                                <p class="h6 text-muted">{{ $prodName }}</p>
                                <p class="small text-muted">{{ $prodCategory }}</p>
                                <div class="row">
                                    <div class="col-8 col-xl-10 col-lg-10">
                                        <p class="fs-6">{{ __('₱ ' .number_format($prodPrice)) }}</p>
                                    </div>
                                    <div class="col-4 col-xl-2 col-lg-2">
                                        <p class="fw-bold text-end">{{ __('×'. $qty) }}</p>
                                    </div>
                                </div>

                                {{-- <p class="lh-1">{{ __('Quantity: ' .$qty) }}</p> --}}
                                {{-- <p class="lh-1">{{ __('Total Price: ') }} <span class="text-danger">{{ __('₱ '.number_format($totalPrice)) }}</span> </p> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header">{{ __('Order Summary') }}</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8 col-xl-10 col-lg-10">
                                <p class="fs-6">{{ __('Product Price ') }}</p>
                            </div>
                            <div class="col-4 col-xl-2 col-lg-2">
                                <p class="fs-6 text-end">{{ __('₱ ' .number_format($prodPrice)) }}</p>
                                {{-- <p class="fw-bold text-end">{{ __('×'. $qty) }}</p> --}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8 col-xl-10 col-lg-10">
                                <p class="fs-6">{{ __('Product Quantity ') }}</p>
                            </div>
                            <div class="col-4 col-xl-2 col-lg-2">
                                {{-- <p class="fs-6">{{ __('₱ ' .number_format($prodPrice)) }}</p> --}}
                                <p class="fw-bold text-end">{{ __('×'. $qty) }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8 col-xl-10 col-lg-10">
                                <p class="fs-6">{{ __('Total Price ') }}</p>
                            </div>
                            <div class="col-4 col-xl-2 col-lg-2">
                                {{-- <p class="fs-6">{{ __('₱ ' .number_format($prodPrice)) }}</p> --}}
                                <p class="fw-bold text-end">{{ __('₱ ' .number_format($totalPrice)) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header">
                        {{ __('Order Details') }}
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8 col-xl-10 col-lg-10">
                                <p class="fs-6">{{ __('Order Number ') }}</p>
                            </div>
                            <div class="col-4 col-xl-2 col-lg-2">
                                <p class="fs-6 text-end">{{ $orderNum }}</p>
                                {{-- <p class="fw-bold text-end">{{ __('×'. $qty) }}</p> --}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 col-xl-7 col-lg-5">
                                <p class="fs-6">{{ __('Order Date ') }}</p>
                            </div>
                            <div class="col-8 col-xl-5 col-lg-7">
                                <p class="fs-6 text-end">{{ $orderDate->toDayDateTimeString(); }}</p>
                                {{-- <p class="fw-bold text-end">{{ __('×'. $qty) }}</p> --}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-5 col-xl-10 col-lg-5 col-md-5">
                                <p class="fs-6">{{ __('Payment Method ') }}</p>
                            </div>
                            <div class="col-7 col-xl-2 col-lg-7 col-md-7">
                                <p class="fs-6 text-end">{{ __('Cash on delivery') }}</p>
                                {{-- <p class="fw-bold text-end">{{ __('×'. $qty) }}</p> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{}" class="btn btn-danger">{{ __('Cancel Order') }}</a>
            </div>
        </div>
    </div>
@endsection
