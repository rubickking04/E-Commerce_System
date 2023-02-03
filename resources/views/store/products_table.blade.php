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
                                    <form action="{{ route('search.product') }}" method="GET" role="search" class="d-flex">
                                        @csrf
                                        <input class="form-control me-2 border border-primary" type="search" name="search" placeholder="Search products name or category" aria-label="Search">
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
                                                            <form action="{{ route('search.product') }}" method="GET" role="search" class="d-flex">
                                                                @csrf
                                                                <div class="input-group">
                                                                    <input class="form-control me-2 border border-primary" type="search" name="search" placeholder="Please try again to search by products name or category" aria-label="Search">
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
                                                    <th scope="col">{{ __('Number of Stocks') }}</th>
                                                    <th scope="col">{{ __('Product Unit') }}</th>
                                                    <th scope="col">{{ __('Product Price') }}</th>
                                                    <th scope="col">{{ __('Product Created') }}</th>
                                                    <th scope="col">{{ __('Product Status') }}</th>
                                                    <th scope="col">{{ __('Actions') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ( $products as  $product)
                                                <tr>
                                                    <td class="text-center fw-bold h6 py-3 text-truncate" scope="row">
                                                        <img src="{{ asset('/storage/products/' . $product->product_image) }}" class="img-fluid" alt="" height="50" width="50">
                                                    </td>
                                                    <td class="text-center h6 py-3 text-truncate" scope="row">{{ $product->product_category }}</td>
                                                    <td class="text-center h6 py-3 text-truncate" scope="row">{{ $product->product_name }}</td>
                                                    @if($product->product_stocks['0'])
                                                        <td class="text-center  h6 py-3 text-truncate" scope="row">{{ $product->product_stocks }}</td>
                                                    @else
                                                        <td class="text-center text-danger h6 py-3 text-truncate" scope="row">{{ $product->product_stocks }}</td>
                                                    @endif
                                                    <td class="text-center h6 py-3 text-truncate" scope="row">{{ $product->product_unit }}</td>
                                                    <td class="text-center h6 py-3 text-truncate" scope="row">{{ __('₱ '.number_format($product->product_price)) }}</td>
                                                    <td class="text-center h6 py-3 text-truncate" scope="row">{{ \Carbon\Carbon::createFromTimestamp(strtotime($product->created_at))->isoFormat('MMMM D, YYYY') }}</td>
                                                    @if($product->product_stocks['0'])
                                                        <td class="text-center  h6 py-3 text-truncate text-success" scope="row">{{ __('In Stock') }}</td>
                                                    @else
                                                        <td class="text-center text-danger h6 py-3 text-truncate" scope="row">{{ __('Out of Stock') }}</td>
                                                    @endif
                                                    <td class="text-center" scope="row">
                                                        <button type="button" class=" btn btn-success bi bi-eye-fill" data-bs-toggle="modal"data-bs-target="#exampleModalCenter{{ $product->id }}"></button>
                                                        <button type="button" class=" btn btn-warning bi bi-pencil-square"data-bs-toggle="modal"data-bs-target="#exampleModalCenters{{ $product->id }}"></button>
                                                        {{-- View Profile Modal --}}
                                                        <div class="modal fade modal-alert" id="exampleModalCenter{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog ">
                                                                <div class="modal-content shadow" style="border-radius:20px; ">
                                                                    <div class="modal-header flex-nowrap border-bottom-0">
                                                                        <button type="button" class="btn-close"data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body p-4 text-center">
                                                                        <div class="thumb-lg member-thumb ms-auto mb-3">
                                                                            <img src="{{ asset('/storage/products/' . $product->product_image) }}" class=" img-thumbnail" alt="" height="150px"  width="150px">
                                                                        </div>
                                                                        <h2 class="fw-bold mb-0">{{ $product->product_name }}</h2>
                                                                        {{-- <p class="">{{ __('@Email ') }}<span>|</span><span><a href="#" class=" text-decoration-none">{{ $users->email }}</a></span> --}}
                                                                        </p>
                                                                        <button type="button"class="btn btn-danger col-3" data-bs-dismiss="modal" style="border-radius:20px;">{{ __('Close') }}</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- Update Profile Modal --}}
                                                        <div class="modal fade modal-alert" id="exampleModalCenters{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content shadow" style="border-radius:20px; ">
                                                                    <div class="modal-header flex-nowrap border-bottom-0">
                                                                        <button type="button" class="btn-close"data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body text-center">
                                                                        <div class="thumb-lg member-thumb ms-auto mb-3">
                                                                            <img src="{{ asset('/storage/products/' . $product->product_image) }}" class=" img-thumbnail" alt="" height="150px" width="150px">
                                                                        </div>
                                                                        <h2 class="fw-bold mb-0">{{ $product->product_name }}</h2>
                                                                        <form action="{{ route('update.product',$product->id) }}" method="POST">
                                                                            @csrf
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-6 text-start">
                                                                                    <label for="name" class="col-form-label">{{ __('Product Name') }}</label>
                                                                                    <input id="product_name" type="text" placeholder="Your name" class="form-control @error('product_name') is-invalid @enderror" name="product_name" value="{{ $product->product_name }}" >
                                                                                    @error('product_name')
                                                                                        <span class="invalid-feedback" role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-md-6 text-start">
                                                                                    <label for="email" class="col-form-label">{{ __('Product Category') }}</label>
                                                                                    <div class="input-group">
                                                                                    <select name="product_category" id="product_category" class="form-control form-select my-select  @error('product_category') is-invalid @enderror">
                                                                                        <option disabled selected>{{ $product->product_category }}</option>
                                                                                        <option value="Fruits & Vegetables">{{ __('Fruits & Vegetables') }}</option>
                                                                                        <option value="Seafoods">{{ __('Seafoods') }}</option>
                                                                                        <option value="Condiments & Spices">{{ __('Condiments & Spices') }}</option>
                                                                                        <option value="Bread & Bakery">{{ __('Bread & Bakery') }}</option>
                                                                                        <option value="Beverages">{{ __('Beverages') }}</option>
                                                                                        <option value="Pasta/Rice">{{ __('Pasta/Rice') }}</option>
                                                                                        <option value="Cereal ">{{ __('Cereal ') }}</option>
                                                                                        <option value="Sauces & Oils">{{ __('Sauces & Oils') }}</option>
                                                                                        <option value="Canned Goods">{{ __('Canned Goods') }}</option>
                                                                                        <option value="Frozen Foods ">{{ __('Frozen Foods ') }}</option>
                                                                                        <option value="Meat ">{{ __('Meat ') }}</option>
                                                                                    </select>
                                                                                    @error('email')
                                                                                            <span class="invalid-feedback" role="alert">
                                                                                                <strong>{{ $message }}</strong>
                                                                                            </span>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6 text-start">
                                                                                    <label for="phone" class="col-form-label">{{ __('Product Price') }}</label>
                                                                                    <input id="product_price" type="text" class="form-control @error('product_price') is-invalid @enderror" name="product_price" value="{{ $product->product_price }}">
                                                                                    @error('product_price')
                                                                                        <span class="invalid-feedback" role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-md-6 text-start">
                                                                                    <label for="address" class="col-form-label">{{ __('Product Stocks') }}</label>
                                                                                    <div class="input-group">
                                                                                    <input id="address" type="text" placeholder="R.T. Lim Boulevard, Baliwasan, Zamboanga City" class="form-control @error('product_stocks') is-invalid @enderror" name="product_stocks" value="{{ $product->product_stocks }}">
                                                                                    @error('product_stocks')
                                                                                        <span class="invalid-feedback" role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <button type="submit" class="btn btn-primary col-lg-2 col-5 fw-bolder" style="border-radius:20px;">{{ __('Update') }}</button>
                                                                            <button type="button" class="btn btn-danger col-lg-2 col-5" data-bs-dismiss="modal" style="border-radius:20px;">{{ __('Close') }}</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <a href="{{ route('delete.product', $product->id) }}" class="btn btn-danger " onclick="return confirm('Are you sure to remove this product?')"><i class="bi bi-trash fs-5"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    @endif
                                {{ $products->links() }}
                            </div>
                            @else
                            <div class="col-lg-12 mb-3 ">
                                <div class="mb-3 py-4">
                                    <div class="text-center display-1">
                                        <i class="fa-solid fa-cart-plus display-1"></i>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title fs-3 text-center">{{ __('No Products added yet.') }}</h5>
                                        <div class="text-center">
                                            <a href="{{ route('store.products') }}" class="fs-5 text-decoration-none btn btn-primary"><i class="fa-solid fa-user-plus px-2"></i>{{ __('Add Products') }}</a>
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
