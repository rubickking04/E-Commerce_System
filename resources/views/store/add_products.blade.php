@extends('store.layouts.sidebar')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow" style="border-radius: 20px">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-11 col-12">
                            <div class="row border-bottom border-2 border-warning">
                                <div class="col-lg-8 col-md-7 col-sm-6 col-6 ">
                                    <div class="text-start py-3 fs-4 fw-bold card-title">{{ __('Add Products') }}</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-8 col-lg-8">
                                    <div class="card-body mt-2 container">
                                        <div class="text-center">
                                            <h2 >{{ __('Welcome to E-Mart Sellers') }}</h2>
                                        </div>
                                        <div class="alert alert-warning text-center alert-dismissible fade show d-none d-sm-block" role="alert">
                                            <i class="fa-solid fa-check"></i>
                                            <strong>{{ __('Start selling your products now.') }}</strong>
                                        </div>
                                        <form method="POST" action="{{ route('add_products') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row mb-3">
                                                <div class="form-outline text-start col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                    <label for="product_name" class="col-form-label">{{ __('Product Name') }}</label>
                                                    <input type="text" id="product_name" placeholder="Example: Jasmine Rice" name="product_name" class="form-control  @error('product_name') is-invalid @enderror" />
                                                    @error('product_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-outline text-start col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                    <label for="product_category" class="col-form-label">{{ __('Product Category ') }}</label>
                                                    <select name="product_category" id="product_category"
                                                        class="form-control form-select my-select  @error('product_category') is-invalid @enderror">
                                                        <option disabled selected>Choose...</option>
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
                                                    @error('product_category')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-outline text-start col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                                    <label for="product_price" class="col-form-label">{{ __('Product Price') }}</label>
                                                    <input type="number" id="product_price" placeholder="Example: 2500" name="product_price" class="form-control @error('product_price') is-invalid @enderror" />
                                                    @error('product_price')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-outline text-start col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                                    <label for="product_stocks" class="col-form-label">{{ __('Product Stocks') }}</label>
                                                    <input type="number" id="product_stocks" placeholder="Example: 500" name="product_stocks" class="form-control @error('product_stocks') is-invalid @enderror" />
                                                    @error('product_stocks')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-outline text-start col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                    <label for="product_image" class="col-form-label">{{ __('Product Image') }}</label>
                                                    <input name="product_image" type="file" id="product_image" class="form-control @error('product_image') is-invalid @enderror"/>
                                                    @error('product_image')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-outline text-start">
                                                    <label for="product_definition" class="col-form-label">{{ __('Product Definition') }}</label>
                                                    <textarea type="text" id="product_definition" rows="5" placeholder="{{ __('Write something here '. Auth::user()->store_name) }}" name="product_definition" class="form-control  @error('product_definition') is-invalid @enderror"></textarea>
                                                    @error('product_definition')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-outline text-start">
                                                <div class="text-start">
                                                    <button type="submit" class="text-start text-white btn btn-warning mb-3"><i class="fa-solid fa-plus px-1"></i>{{ __('Add product') }}</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 py-3 d-none d-lg-block" >
                                    <img src="{{ asset('/storage/images/sells.png') }}" class="img-fluid mt-5" alt="product_image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
