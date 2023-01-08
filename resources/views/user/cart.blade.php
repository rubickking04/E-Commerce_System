@extends('user.layouts.cart')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header ">{{ __('My Shopping Cart - '.App\Models\Cart::where('user_id', Auth::id())->count() .' items' ) }}</div>
        <div class="card-body">
        @if ( $carts->count())
            <div class="row container mb-4 mt-4">
                @foreach ( $carts as  $cart)
                <div class="col-lg-2 col-md-2 mb-4 col-3 mb-4 mb-lg-0">
                    <div class="bg-image hover-overlay hover-zoom mb-4 ripple rounded" data-mdb-ripple-color="light">
                        <img src="{{ asset('/storage/products/'. $cart->hasProducts->product_image) }}" class="w-100" alt="Product Image" />
                        <a href="#!">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-7 mb-4 mb-lg-0">
                    <p class="h4"><strong>{{ $cart->hasProducts->product_name }}</strong></p>
                    <p class="text-danger fs-5 lh-1">{{ __('₱ ' .$cart->hasProducts->product_price) }}</p>
                    <p class="lh-1">{{ __('Quantity: ' .$cart->quantity) }}</p>
                    <p class="lh-1">{{ __('Total Price: ') }} <span class="text-danger">{{ __('₱ '.number_format($cart->hasProducts->product_price * $cart->quantity)) }}</span> </p>
                </div>
                <div class="col-lg-2 col-md-2 col-2 mb-4 mb-lg-0 text-center">
                    <a href="{{ route('cart.checkout', $cart->id) }}" class="btn btn-danger btn-lg me-1 mb-2" data-mdb-toggle="tooltip"
                        title="Remove item">
                        <i class="fas fa-trash"></i>
                    </a>
                </div>
                @endforeach
            </div>
            <hr class="my-4">
            <div class="text-end">
                <h5 class="me-5">{{ __('Total price to checkout: ') }} <span class="text-danger">{{ __('₱ '.number_format($total)) }}</span> </h5>
                <form action="{{ route('order.store') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-warning text-white me-4">{{ __('Checkout') }}</button>
                </form>
            </div>
        </div>
        @else
            <h4 class="text-center">{{ __('There\'s nothing in your cart yet.') }}</h4>
        @endif
    </div>
</div>
@endsection
