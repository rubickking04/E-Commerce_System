@extends('user.layouts.cart')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">{{ __('My Shopping Cart') }}</div>
        <div class="card-body">
            @if ( $carts->count())
            <div class="table-responsive text-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('Product') }}</th>
                            <th scope="col">{{ __('Unit Price') }}</th>
                            <th scope="col">{{ __('Quantity') }}</th>
                            <th scope="col">{{ __('Total Price') }}</th>
                            <th scope="col">{{ __('Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ( $carts as  $cart)
                        <tr>
                            <th scope="row">
                                <div class="row">
                                    <div class="col-lg-2"><img src="{{ asset('/storage/products/'. $cart->hasProducts->product_image) }}" alt="avatar" class="img-thumbnail text-center mb-3" height="100px" width="100px"></div>
                                    <div class="col-lg-8"><h5 class="mt-3">{{ $cart->hasProducts->product_name }}</h5></div>
                                </div>
                            </th>
                            <td class="mt-5">{{ __('₱ '.$cart->hasProducts->product_price) }}</td>
                            <td>{{ $cart->quantity }}</td>

                            <td>{{ __('₱ '.number_format($cart->hasProducts->product_price * $cart->quantity)) }}</td>
                            <td>
                                <a href="#" class="btn btn-danger" onclick="return confirm('Are you sure to remove this user?')"><i class="bi bi-trash fs-3"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="text-end">
                <h5 class="me-5">{{ __('Total price to checkout:  ₱'.number_format($cart->hasProducts->sum('product_price')* $cart->quantity)) }}</h5>
                <button class="btn btn-warning text-white me-4">{{ __('Checkout now') }}</button>
            </div>
            @else
                <h4 class="text-center">{{ __('No items yet') }}</h4>
            @endif
        </div>
    </div>
</div>
@endsection
