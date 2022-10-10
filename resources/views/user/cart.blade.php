@extends('user.layouts.navbar')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">{{ __('My Shopping Cart') }}</div>
        <div class="card-body">
            <div class="table-responsive text-center d-none d-sm-block">
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
                        <tr>
                            <th scope="row">
                                <div class="row">
                                    <div class="col-lg-2"><img src="{{ asset('/storage/images/note11.jpg') }}" alt="avatar" class="img-thumbnail text-center mb-3" height="100px" width="100px"></div>
                                    <div class="col-lg-8"><h5 class="mt-3">Redmi Note 11</h5></div>
                                </div>
                            </th>
                            <td class="mt-5">₱8,899</td>
                            <td>1</td>
                            <td>₱8,899</td>
                            <td>
                                <a href="#" class="btn btn-danger" onclick="return confirm('Are you sure to remove this user?')"><i class="bi bi-trash fs-3"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <div class="row">
                                    <div class="col-lg-2"><img src="{{ asset('/storage/images/iphone14.jpg') }}" alt="avatar" class="img-thumbnail text-center mb-3" height="100px" width="100px"></div>
                                    <div class="col-lg-8"><h5 class="mt-3">iPhone 14 Pro Max</h5></div>
                                </div>
                            </th>
                            <td class="mt-5">₱60,500</td>
                            <td>2</td>
                            <td>₱130,000</td>
                            <td>
                                <a href="#" class="btn btn-danger" onclick="return confirm('Are you sure to remove this user?')"><i class="bi bi-trash fs-3"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="text-end">
                <button class="btn btn-warning text-white ">{{ __('Checkout now') }}</button>
            </div>
        </div>
    </div>
</div>
@endsection
