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
                                <div class="col-lg-8 col-md-7 col-sm-6 col-6 d-none d-sm-block">
                                    <div class="text-start py-3 fs-4 fw-bold card-title">{{ __('Products Table') }}</div>
                                </div>
                                <div class="col-lg-4 col-md-5 col-sm-6 col-12 py-3">
                                    <form action="#" method="GET" role="search" class="d-flex">
                                        @csrf
                                        <input class="form-control me-2 border border-primary" type="search" name="search" placeholder="Search Products" aria-label="Search">
                                        <button class="btn btn-primary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                                    </form>
                                </div>
                            </div>
                            @if(count($products)>0)
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
                                                <p class="card-text fw-bold text-center text-muted">{{ __('Sorry, but the query you were looking for was either not found or does not exist.') }}</p>
                                                <div class="row justify-content-center">
                                                    <div class="col-lg-5 col-md-5 col-sm-10 col-12">
                                                        <div class="row">
                                                            <form action="#" method="GET" role="search" class="d-flex">
                                                                @csrf
                                                                <div class="input-group">
                                                                    <input class="form-control me-2 border border-primary" type="search" name="search" placeholder="Please try again to search by Name or Email" aria-label="Search">
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
                                        <table class="table table-bordered">
                                            <thead class="table-primary">
                                                <tr class="text-center">
                                                    <th scope="col">{{ __('Product Image') }}</th>
                                                    <th scope="col">{{ __('Product Category') }}</th>
                                                    <th scope="col">{{ __('Product Name') }}</th>
                                                    <th scope="col">{{ __('Product Price') }}</th>
                                                    <th scope="col">{{ __('Product Created') }}</th>
                                                    <th scope="col">{{ __('Actions') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ( $products as  $product)
                                                <tr>
                                                    <td class="text-center fw-bold h6 py-3 text-truncate" scope="row">
                                                        <img src="{{ asset('/storage/products/' . $product->product_image) }}" class="img-fluid" alt="" height="100" width="100">
                                                    </td>
                                                    <td class="text-center h6 py-3 text-truncate" scope="row">{{ $product->product_category }}</td>
                                                    <td class="text-center h6 py-3 text-truncate" scope="row">{{ $product->product_name }}</td>
                                                    <td class="text-center h6 py-3 text-truncate" scope="row">{{ __('₱ '.$product->product_price) }}</td>
                                                    <td class="text-center h6 py-3 text-truncate" scope="row">{{ $product->created_at }}</td>
                                                    <td class="text-center" scope="row">
                                                        <button type="button" class=" btn btn-success bi bi-eye-fill fs-5" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"></button>
                                                        <button type="button" class=" btn btn-warning bi bi-pencil-square fs-5" data-bs-toggle="modal" data-bs-target="#exampleModalCenters"></button>
                                                        <a href="#" class="btn btn-danger " onclick="return confirm('Are you sure to remove this user?')"><i class="bi bi-trash fs-5"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    @endif
                                    {{-- {{ $products->links() }} --}}
                            </div>
                            @else
                            <div class="col-lg-12 mb-3 ">
                                <div class="mb-3 py-4">
                                    <div class="text-center display-1">
                                        <i class="fa-solid fa-users-slash display-1"></i>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title fs-3 text-center">{{ __('No Students Enrolled yet.') }}</h5>
                                        <div class="text-center">
                                            <a href="#" class="fs-5 text-decoration-none btn btn-primary"><i class="fa-solid fa-user-plus px-2"></i>{{ __('Add Students') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
