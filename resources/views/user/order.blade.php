@extends('user.layouts.order')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header ">{{ __('My Orders - '.App\Models\Order::where('user_id', Auth::id())->count() .' items' ) }}</div>
        <div class="card-body">
        @if ( $carts->count())
            <div class="row container mb-4 mt-4">
                @foreach ( $carts as  $cart)
                <div class="col-lg-2 col-md-2 mb-4 col-4 mb-4 mb-lg-0">
                    <div class="bg-image hover-overlay hover-zoom mb-4 ripple rounded" data-mdb-ripple-color="light">
                        <img src="{{ asset('/storage/products/'. $cart->hasProducts->product_image) }}" class="w-100" alt="Product Image" />
                        <a href="#!">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-10 col-md-10 col-8 mb-4 mb-lg-0">
                    <a href="{{ route('prod.info', $cart->id) }}" class="h4 text-decoration-none text-dark"><strong>{{ $cart->hasProducts->product_name }}</strong></a>
                    <p class="text-danger fs-5 lh-1">{{ __('₱ ' .$cart->hasProducts->product_price) }}</p>
                    <p class="lh-1">{{ __('Quantity: ' .$cart->qty) }}</p>
                    <p class="lh-1">{{ __('Total Price: ') }} <span class="text-danger">{{ __('₱ '.number_format($cart->total_price)) }}</span> </p>
                </div>
                @endforeach
            </div>
            <hr class="my-4">
            <div class="text-end">
                <h5 class="me-5">{{ __('Total price to pay: ') }} <span class="text-danger">{{ __('₱ '.number_format($total)) }}</span> </h5>
                {{-- <a href="{{ route('cart.checkout-all') }}" class="btn btn-warning text-white me-4">{{ __('Checkout now') }}</a> --}}
            </div>
        </div>
        @else
            <h4 class="text-center">{{ __('There\'s nothing in your orders yet.') }}</h4>
        @endif
    </div>
</div>
@endsection
