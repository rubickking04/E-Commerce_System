@extends('store.layouts.navbar')
@section('content')
<div class="row">
    <div class="col-12 mt-3">
        <h4>{{  __('Newly Updated')  }}</h4>
    </div>
    <div class="col-6">
        <div class="card container" >
            <div class="card-body ">
                <div class="row border-bottom border-2 border-dark">
                    <div class="col-lg-8 col-md-7 col-sm-6 col-6 d-none d-sm-block">
                        <div class="text-start py-1 fs-4 fw-bold card-title roboto">{{ __('Products Table') }}
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="text-end mt-2 fs-6 fw-bold roboto">{{ $products->count() }} {{ Str::plural(' product',$products->count())}}</div>
                    </div>
                </div>
                @if (count($products) > 0)
                <div class="table-responsive py-2 overflow-auto h-25">
                    <table>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td  class="text-end col-lg-2 px-2" scope="row">
                                @if($product->product_image)
                                    <img src="{{ asset('/storage/images/'.$product->product_image)}}" class="img-fluid" alt="">
                                @else
                                    <img src="{{ asset('/storage/images/avatar.png')}}" alt="hugenerd" width="30" height="30" class="rounded-circle">
                                @endif
                                </td>
                                <td  class="text-start fw-bold h6 py-3 text-truncate roboto" scope="row">{{ $product->product_name }}</td>
                                <td  class="text-end text-muted small fw-bold h6 py-3 roboto text-truncate" scope="row">{{ $product->created_at->diffForhumans() }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="col-lg-12 mb-3 ">
                    @if (Session::has('message'))
                        <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                            <i class="fa-solid fa-check"></i>
                            <span class="px-2 roboto">{{ Session::get('message') }}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="mb-3 py-4">
                        <div class="card-body">
                            <h5 class="card-title fs-3 text-center">{{ __('No Products yet.') }}</h5>
                        </div>
                    </div>
                </div>
                @endif
                <div class="text-end">
                    <a href="{{ route('store.products.table') }}" class="btn btn-primary roboto ">
                        <i class="fa-solid fa-up-right-from-square mx-2"></i>
                        <span>{{ __('View all data') }}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card container">
            <div class="card-body">
                <div class="row border-bottom border-2 border-dark">
                    <div class="col-lg-8 col-md-7 col-sm-6 col-6 d-none d-sm-block">
                        <div class="text-start py-1 fs-4 fw-bold card-title roboto">{{ __('Orders Table') }}
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="text-end mt-2 fs-6 fw-bold roboto">{{ $orders->count() }} {{ Str::plural(' order',$orders->count())}}</div>
                    </div>
                </div>
                @if (count($orders) > 0)
                <div class="table-responsive py-2 overflow-auto h-25">
                    <table>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <td  class="text-end col-lg-1 col-md-1 col-sm-1 col-1 px-2" scope="row">
                                    <img src="{{ asset('/storage/images/avatar.png')}}" alt="hugenerd" width="30" height="30" class="rounded-circle">
                                </td>
                                <td  class="text-start fw-bold h6 py-3 text-truncate roboto" scope="row">{{ $order->hasUser->name }}</td>
                                <td  class="text-end text-muted small fw-bold h6 py-3 text-truncate roboto" scope="row">{{ $order->created_at->diffForhumans() }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="col-lg-12 mb-3 ">
                    @if (Session::has('message'))
                        <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                            <i class="fa-solid fa-check"></i>
                            <span class="px-2 roboto">{{ Session::get('message') }}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="mb-2 py-3">
                        <div class="card-body">
                            <h5 class="card-title fs-3 text-center">{{ __('No Orders yet.') }}</h5>
                        </div>
                    </div>
                </div>
                @endif
                <div class="text-end">
                    <a href="{{ route('store.orders') }}" class="btn btn-primary roboto">
                        <i class="fa-solid fa-up-right-from-square mx-2"></i>
                        <span>{{ __('View all data') }}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
