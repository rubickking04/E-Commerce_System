@extends('store.layouts.navbar')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow" style="border-radius: 20px">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-lg-11 col-12">
                                <div class="row border-bottom border-2 border-primary">
                                    <div class="col-lg-7 col-md-7 col-sm-6 col-6 d-none d-sm-block">
                                        <div class="text-start py-3 fs-4 fw-bold card-title">{{ __('Ordered Items Table') }}
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-6 col-12 py-3">
                                        <form action="{{ route('search.order') }}" method="GET" role="search" class="d-flex">
                                            @csrf
                                            <input class="form-control me-2 " type="search" name="search" placeholder="Search by Order Number, Product Name or Name of buyer" aria-label="Search">
                                            <button class="btn btn-primary" type="submit">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                @if (count($cart) > 0)
                                    <div class="table-responsive py-3">
                                        <table class="table">
                                            <tbody>
                                                @if (session('msg'))
                                                    <div class="col-lg-12 py-3">
                                                        <div class="text-center justify-content-center">
                                                            <i class="bi bi-exclamation-triangle-fill fs-1 text-warning text-center"></i>
                                                        </div>
                                                        <div class="card-body">
                                                            <p class="h2 fw-bold text-danger text-center">{{ __('ERROR 404 | Not Found!') }}</p>
                                                            <h5 class="card-title fw-bold text-center">{{ session('msg') }}</h5>
                                                            <p class="card-text fw-bold text-center text-muted">{{ __('Sorry, but the query you were looking for was either not found or does not exist.') }} </p>
                                                            <div class="row justify-content-center">
                                                                <div class="col-lg-5 col-md-5 col-sm-10 col-12">
                                                                    <div class="row">
                                                                        <form action="{{ route('search.order') }}" method="GET" role="search" class="d-flex">
                                                                            @csrf
                                                                            <div class="input-group">
                                                                                <input class="form-control me-2 border border-primary" type="search" name="search" placeholder="Please try again to search by Name or Email" aria-label="Search">
                                                                                <div class="input-group-text bg-primary">
                                                                                    <button class="btn " type="submit">
                                                                                        <i class="fa-solid fa-magnifying-glass text-white"></i>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    @if (Session::has('message'))
                                                        <div class="alert alert-success" role="alert">
                                                            <i class="fa-solid fa-check"></i>
                                                            <span class="px-2">{{ Session::get('message') }}</span>
                                                        </div>
                                                    @endif
                                                    <table class="table table-bordered">
                                                        <thead class="table-primary">
                                                            <tr class="text-center">
                                                                <th scope="col">{{ __(' ') }}</th>
                                                                <th scope="col">{{ __('Order Number') }}</th>
                                                                <th scope="col">{{ __('Recipient\'s Name') }}</th>
                                                                <th scope="col">{{ __('Recipient\'s Item') }}</th>
                                                                <th scope="col">{{ __('Recipient\'s Number') }}</th>
                                                                <th scope="col">{{ __('Order Placed') }}</th>
                                                                {{-- <th scope="col">{{ __('Order Confirmed') }}</th> --}}
                                                                <th scope="col">{{ __('Actions') }}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($cart as $carts )
                                                                <tr>
                                                                    <td class="text-center col-lg-1 col-md-1 col-sm-1 col-1"
                                                                        scope="row">
                                                                        @if ($carts->hasUser->image)
                                                                            <img src="{{ asset('/storage/images/' . $carts->hasUser->image) }}" class="img-fluid" alt="">
                                                                        @else
                                                                            <img src="{{ asset('/storage/images/avatar.png') }}" alt="hugenerd" width="35" height="35" class="rounded-circle">
                                                                        @endif
                                                                    </td>
                                                                    <td class="text-center py-3 fw-bold text-truncate" scope="row">{{ $carts->order_number }}</td>
                                                                    <td class="text-center py-3 fw-bold text-truncate" scope="row">{{ $carts->hasUser->name }}</td>
                                                                    <td class="text-center py-3" scope="row"> {{ $carts->hasProducts->product_name }}</td>
                                                                    <td class="text-center py-3 fw-bold text-truncate" scope="row">{{ $carts->hasUser->name }}</td>
                                                                    <td class="text-center py-3" scope="row">{{ $carts->created_at->toDayDateTimeString() }}</td>
                                                                    {{-- <td class="text-center" scope="row">
                                                                        <a href="{{ route('order.confirm', $carts->id) }}" class=" btn btn-success ">{{ __('Confirm Order') }}</a>
                                                                    </td> --}}
                                                                    <td class="text-center" scope="row">
                                                                        <button type="button" class=" btn btn-success bi bi-eye-fill" data-bs-toggle="modal"data-bs-target="#exampleModalCenter{{ $carts->id }}"></button>
                                                                        <div class="modal text-start fade modal-alert" id="exampleModalCenter{{ $carts->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                            <div class="modal-dialog modal-lg">
                                                                                <div class="modal-content shadow" style="border-radius:20px; ">
                                                                                    <div class="modal-header flex-nowrap border-bottom-0">
                                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <div class="row justify-content-center">
                                                                                            <div class="col-md-10">
                                                                                                <div class="card mb-3">
                                                                                                    <div class="card-body">
                                                                                                        <p class="fs-6 fw-bold">
                                                                                                            <i class="fa-solid fa-map-location-dot text-muted fs-4"></i>
                                                                                                            <span class="px-2 mb-2">{{ __('Reciever : '.$carts->hasUser->name) }}</span>
                                                                                                        </p>
                                                                                                        <div class="row">
                                                                                                            <div class="col-8 col-xl-4 col-lg-3">
                                                                                                                <p class="fs-6">{{ __('Reciever\'s Name ') }}</p>
                                                                                                            </div>
                                                                                                            <div class="col-4 col-xl-8 col-lg-9">
                                                                                                                <p class="fs-6 text-end">{{ $carts->hasUser->name }}</p>
                                                                                                                {{-- <p class="fw-bold text-end">{{ __('×'. $qty) }}</p> --}}
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="row">
                                                                                                            <div class="col-8 col-xl-3 col-lg-2">
                                                                                                                <p class="fs-6">{{ __('Reciever\'s Address ') }}</p>
                                                                                                            </div>
                                                                                                            <div class="col-4 col-xl-9 col-lg-10">
                                                                                                                <p class="fs-6 text-end">{{ __('HB Homes Subdivision Phase II, Block 9 Lot 3, Sinunuc Zamboanga City') }}</p>
                                                                                                                {{-- <p class="fs-6 text-end">{{ $carts->hasUser->address}}</p> --}}
                                                                                                                {{-- <p class="fw-bold text-end">{{ __('×'. $qty) }}</p> --}}
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="row">
                                                                                                            <div cla ss="col-8 col-xl-10 col-lg-10">
                                                                                                                <p class="fs-6">{{ __('Reciever\'s Number ') }}</p>
                                                                                                            </div>
                                                                                                            <div class="col-4 col-xl-2 col-lg-2">
                                                                                                                <p class="fs-6 text-end">{{ $carts->hasUser->phone }}</p>
                                                                                                                {{-- <p class="fw-bold text-end">{{ __('×'. $qty) }}</p> --}}
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="card mb-3">
                                                                                                    <div class="card-body">
                                                                                                        @foreach ($carts->hasStatus as $items)
                                                                                                        <div class="row">
                                                                                                            <div class="col-4 col-xl-4 col-lg-4">
                                                                                                                <p class="fs-6">{{ $items->created_at->toDayDateTimeString() }}</p>
                                                                                                            </div>
                                                                                                            <div class="col-8 col-xl-8 col-lg-8">
                                                                                                                <p class="fs-6 text-end">{{ $items->status }}</p>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        @endforeach
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="card mb-3">
                                                                                                    <div class="card-header">
                                                                                                        <h5 class="mt-2">
                                                                                                            <i class="fa-solid fa-store text-muted fs-4"></i>
                                                                                                            <span class="px-2">{{ Auth::user()->store_name }}</span>
                                                                                                        </h5>
                                                                                                    </div>
                                                                                                    <div class="card-body">
                                                                                                        <div class="row ">
                                                                                                            <div class="col-lg-2 col-md-2 col-4">
                                                                                                                <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                                                                                                                    <img src="{{ asset('/storage/products/'. $carts->hasProducts->product_image) }}" class="w-100" alt="Product Image" />
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-lg-10 col-md-10 col-8 ">
                                                                                                                <p class="h6 text-muted">{{ $carts->hasProducts->product_name }}</p>
                                                                                                                <p class="small text-muted">{{ $carts->hasProducts->product_category }}</p>
                                                                                                                <div class="row">
                                                                                                                    <div class="col-8 col-xl-10 col-lg-10">
                                                                                                                        <p class="fs-6">{{ __('₱ ' .number_format($carts->hasProducts->product_price)) }}</p>
                                                                                                                    </div>
                                                                                                                    <div class="col-4 col-xl-2 col-lg-2">
                                                                                                                        <p class="fw-bold text-end">{{ __('×'. $carts->qty) }}</p>
                                                                                                                    </div>
                                                                                                                </div>
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
                                                                                                                <p class="fs-6 text-end">{{ __('₱ ' .number_format($carts->hasProducts->product_price)) }}</p>
                                                                                                                {{-- <p class="fw-bold text-end">{{ __('×'. $qty) }}</p> --}}
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="row">
                                                                                                            <div class="col-8 col-xl-10 col-lg-10">
                                                                                                                <p class="fs-6">{{ __('Product Quantity ') }}</p>
                                                                                                            </div>
                                                                                                            <div class="col-4 col-xl-2 col-lg-2">
                                                                                                                {{-- <p class="fs-6">{{ __('₱ ' .number_format($prodPrice)) }}</p> --}}
                                                                                                                <p class="fw-bold text-end">{{ __('×'. $carts->qty) }}</p>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="row">
                                                                                                            <div class="col-8 col-xl-10 col-lg-10">
                                                                                                                <p class="fs-6">{{ __('Total Price ') }}</p>
                                                                                                            </div>
                                                                                                            <div class="col-4 col-xl-2 col-lg-2">
                                                                                                                {{-- <p class="fs-6">{{ __('₱ ' .number_format($prodPrice)) }}</p> --}}
                                                                                                                <p class="fw-bold text-end">{{ __('₱ ' .number_format($carts->total_price)) }}</p>
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
                                                                                                                <p class="fs-6 text-end">{{ $carts->order_number }}</p>
                                                                                                                {{-- <p class="fw-bold text-end">{{ __('×'. $qty) }}</p> --}}
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="row">
                                                                                                            <div class="col-4 col-xl-7 col-lg-5">
                                                                                                                <p class="fs-6">{{ __('Order Date ') }}</p>
                                                                                                            </div>
                                                                                                            <div class="col-8 col-xl-5 col-lg-7">
                                                                                                                <p class="fs-6 text-end">{{ $carts->created_at->toDayDateTimeString(); }}</p>
                                                                                                                {{-- <p class="fw-bold text-end">{{ __('×'. $qty) }}</p> --}}
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="row">
                                                                                                            <div class="col-5 col-xl-8 col-lg-5 col-md-5">
                                                                                                                <p class="fs-6">{{ __('Payment Method ') }}</p>
                                                                                                            </div>
                                                                                                            <div class="col-7 col-xl-4 col-lg-7 col-md-7">
                                                                                                                <p class="fs-6 text-end">{{ __('Cash on delivery') }}</p>
                                                                                                                {{-- <p class="fw-bold text-end">{{ __('×'. $qty) }}</p> --}}
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <a href="#" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">{{ __('Close') }}</a>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        @if ( $carts->hasStatus )
                                                                        <button type="button" class=" btn btn-warning  bi bi-upload" data-bs-toggle="modal"data-bs-target="#exampleModalCenters{{ $carts->id }}"></button>
                                                                        <div class="modal text-start fade" id="exampleModalCenters{{ $carts->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('Delivery Update for '.$carts->hasUser->name ) }}</h1>
                                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                    <form action="{{ route('store.delivery_status') }}" method="POST">
                                                                                        @csrf
                                                                                        <div class="mb-3">
                                                                                            <input type="hidden" name="order_id" value="{{ $carts->id }}">
                                                                                            <input type="hidden" name="user_id" value="{{ $carts->hasUser->id }}">
                                                                                            <input type="hidden" name="product_id" value="{{ $carts->hasProducts->id }}">
                                                                                            <label for="recipient-name" class="col-form-label">{{ __('Status of Delivery') }}</label>
                                                                                            <select class="form-select @error('status') is-invalid @enderror" aria-label="Default select example" name="status">
                                                                                                {{-- <option selected disabled>{{ $carts->hasStatus?->status }}</option> --}}
                                                                                                <option value="{{ __('Packed and Ready to deliver') }}">{{ __('Packed and Ready to deliver') }}</option>
                                                                                                <option value="{{ __('Out of delivery') }}">{{ __('Out of delivery') }}</option>
                                                                                                <option value="{{ __('Unsuccessful Delivery') }}">{{ __('Unsuccessful Delivery') }}</option>
                                                                                            </select>
                                                                                            @error('status')
                                                                                                <span class="invalid-feedback" role="alert">
                                                                                                    <strong>{{ $message }}</strong>
                                                                                                </span>
                                                                                            @enderror
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        @else
                                                                        <button type="button" class=" btn btn-warning  bi bi-upload" data-bs-toggle="modal"data-bs-target="#exampleModalCenters{{ $carts->id }}"></button>
                                                                        <div class="modal text-start fade" id="exampleModalCenters{{ $carts->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('Delivery Update for '.$carts->hasUser->name ) }}</h1>
                                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                    <form action="{{ route('store.delivery_status') }}" method="POST">
                                                                                        @csrf
                                                                                        <div class="mb-3">
                                                                                            <input type="hidden" name="order_id" value="{{ $carts->id }}">
                                                                                            <input type="hidden" name="user_id" value="{{ $carts->hasUser->id }}">
                                                                                            <input type="hidden" name="product_id" value="{{ $carts->hasProducts->id }}">
                                                                                            <label for="recipient-name" class="col-form-label">{{ __('Status of Delivery') }}</label>
                                                                                            <select class="form-select @error('status') is-invalid @enderror" aria-label="Default select example" name="status">
                                                                                                <option selected disabled>Open this select menu</option>
                                                                                                <option value="{{ __('Packed and Ready to deliver') }}">{{ __('Packed and Ready to deliver') }}</option>
                                                                                                <option value="{{ __('Out of delivery') }}">{{ __('Out of delivery') }}</option>
                                                                                                <option value="{{ __('Unsuccessful Delivery') }}">{{ __('Unsuccessful Delivery') }}</option>
                                                                                            </select>
                                                                                            @error('status')
                                                                                                <span class="invalid-feedback" role="alert">
                                                                                                    <strong>{{ $message }}</strong>
                                                                                                </span>
                                                                                            @enderror
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                        <button type="submit" class="btn btn-primary">Send message</button>
                                                                                    </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        @endif
                                                                        {{-- <button type="button" class=" btn btn-warning  bi bi-upload" data-bs-toggle="modal"data-bs-target="#exampleModalCenters{{ $carts->id }}"></button>
                                                                        <div class="modal text-start fade" id="exampleModalCenters{{ $carts->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('Delivery Update for '.$carts->hasUser->name ) }}</h1>
                                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                    <form action="{{ route('store.delivery_status') }}" method="POST">
                                                                                        @csrf
                                                                                        <div class="mb-3">
                                                                                            <input type="hidden" name="order_id" value="{{ $carts->id }}">
                                                                                            <input type="hidden" name="user_id" value="{{ $carts->hasUser->id }}">
                                                                                            <input type="hidden" name="product_id" value="{{ $carts->hasProducts->id }}">
                                                                                            <label for="recipient-name" class="col-form-label">{{ __('Status of Delivery') }}</label>
                                                                                            <select class="form-select @error('status') is-invalid @enderror" aria-label="Default select example" name="status">
                                                                                                <option selected disabled>Open this select menu</option>
                                                                                                <option value="{{ __('Packed and Ready to deliver') }}">{{ __('Packed and Ready to deliver') }}</option>
                                                                                                <option value="{{ __('Out of delivery') }}">{{ __('Out of delivery') }}</option>
                                                                                                <option value="{{ __('Unsuccessful Delivery') }}">{{ __('Unsuccessful Delivery') }}</option>
                                                                                            </select>
                                                                                            @error('status')
                                                                                                <span class="invalid-feedback" role="alert">
                                                                                                    <strong>{{ $message }}</strong>
                                                                                                </span>
                                                                                            @enderror
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                        <button type="submit" class="btn btn-primary">Send message</button>
                                                                                    </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div> --}}
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                        {{ $cart->links() }}
                                    </div>
                                @else
                                    <div class="col-lg-12 mb-3 ">
                                        <div class="mb-3 py-4">
                                            <div class="text-center display-1">
                                                <i class="fa-solid fa-users-slash display-1"></i>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title fs-3 text-center">
                                                    {{ __('No orders yet.') }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <button class="btn btn-primary text-end">{{ __('Download Report') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
