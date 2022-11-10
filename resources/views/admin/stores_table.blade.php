@extends('admin.layouts.navbar')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow" style="border-radius: 20px">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-lg-11 col-12">
                                <div class="row border-bottom border-2 border-success">
                                    <div class="col-lg-8 col-md-7 col-sm-6 col-6 d-none d-sm-block">
                                        <div class="text-start py-3 fs-4 fw-bold card-title">{{ __('Stores Table') }}
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-5 col-sm-6 col-12 py-3">
                                        <form action="{{ route('admin.farmers.search') }}" method="GET" role="search" class="d-flex">
                                            @csrf
                                            <input class="form-control me-2 " type="search" name="search" placeholder="Search Name or Email" aria-label="Search">
                                            <button class="btn btn-success" type="submit">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                @if (count($store) > 0)
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
                                                                        <form action="{{ route('admin.farmers.search') }}" method="GET" role="search" class="d-flex">
                                                                            @csrf
                                                                            <div class="input-group">
                                                                                <input class="form-control me-2" type="search" name="search" placeholder="Please try again to search by Name or Email" aria-label="Search">
                                                                                <div class="input-group-text bg-success">
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
                                                        <thead class="table-success">
                                                            <tr class="text-center">
                                                                <th scope="col">{{ __(' ') }}</th>
                                                                <th scope="col">{{ __('Store Name') }}</th>
                                                                <th scope="col">{{ __('Store Owner') }}</th>
                                                                <th scope="col">{{ __('Store Owner Address') }}</th>
                                                                <th scope="col">{{ __('Store Owner Phone Number') }}</th>
                                                                <th scope="col">{{ __('Joined') }}</th>
                                                                <th scope="col">{{ __('Actions') }}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($store as $stores)
                                                                <tr>
                                                                    <td class="text-center col-lg-1 col-md-1 col-sm-1 col-1"
                                                                        scope="row">
                                                                        @if ($stores->image)
                                                                            <img src="{{ asset('/storage/images/' . $stores->image) }}" class="img-fluid" alt="">
                                                                        @else
                                                                            <img src="{{ asset('/storage/images/avatar.png') }}" alt="hugenerd" width="35" height="35" class="rounded-circle">
                                                                        @endif
                                                                    </td>
                                                                    <td class="text-center py-3 text-truncate" scope="row">{{ $stores->store_name }}</td>
                                                                    <td class="text-center" scope="row"> {{ $stores->hasUser->name }}</td>
                                                                    <td class="text-center" scope="row"> {{ $stores->hasUser->address }}</td>
                                                                    <td class="text-center" scope="row"> {{ $stores->hasUser->phone }}</td>
                                                                    <td class="text-center" scope="row">{{ \Carbon\Carbon::createFromTimestamp(strtotime($stores->created_at))->Format('d/m/Y') }}</td>
                                                                    <td class="text-center" scope="row">
                                                                        <button type="button" class=" btn btn-success bi bi-eye-fill" data-bs-toggle="modal"data-bs-target="#exampleModalCenter{{ $stores->id }}"></button>
                                                                        <button type="button" class=" btn btn-warning bi bi-pencil-square"data-bs-toggle="modal"data-bs-target="#exampleModalCenters{{ $stores->id }}"></button>
                                                                        <a href="{{ route('admin.farmers.delete', $stores->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to remove this store?')">
                                                                            <i class="bi bi-trash"></i>
                                                                        </a>
                                                                        {{-- View Profile Modal --}}
                                                                        <div class="modal fade modal-alert" id="exampleModalCenter{{ $stores->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                            <div class="modal-dialog ">
                                                                                <div class="modal-content shadow" style="border-radius:20px; ">
                                                                                    <div class="modal-header flex-nowrap border-bottom-0">
                                                                                        <button type="button" class="btn-close"data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                    </div>
                                                                                    <div class="modal-body p-4 text-center">
                                                                                        <div class="thumb-lg member-thumb ms-auto">
                                                                                            <img src="{{ asset('/storage/images/avatar.png') }}" class="border border-info border-5 rounded-circle img-thumbnail" alt="" height="150px"  width="150px">
                                                                                        </div>
                                                                                        <h2 class="fw-bold mb-0">{{ $stores->store_name }}</h2>
                                                                                        <p class="">{{ __('@Email ') }}<span>|</span><span><a href="#" class=" text-decoration-none">{{ $stores->email }}</a></span>
                                                                                        </p>
                                                                                        <button type="button"class="btn btn-danger col-3" data-bs-dismiss="modal" style="border-radius:20px;">{{ __('Close') }}</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        {{-- Update Profile Modal --}}
                                                                        <div class="modal fade modal-alert" id="exampleModalCenters{{ $stores->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                            <div class="modal-dialog modal-lg">
                                                                                <div class="modal-content shadow" style="border-radius:20px; ">
                                                                                    <div class="modal-header flex-nowrap border-bottom-0">
                                                                                        <button type="button" class="btn-close"data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                    </div>
                                                                                    <div class="modal-body text-center">
                                                                                        <div class="thumb-lg member-thumb ms-auto">
                                                                                            <img src="{{ asset('/storage/images/avatar.png')}}" class="border border-info border-5 rounded-circle img-thumbnail" alt="" height="100px" width="100px">
                                                                                        </div>
                                                                                        <h2 class="fw-bold mb-0">{{ $stores->store_name }}</h2>
                                                                                        <form action="{{ url('/admin/stores/update/'.$stores->id) }}" method="POST">
                                                                                            @csrf
                                                                                            <div class="row mb-3">
                                                                                                <div class="col-md-6 text-start">
                                                                                                    <label for="store_name" class="col-form-label">{{ __('Name') }}</label>
                                                                                                    <input id="store_name" type="text" placeholder="Your name" class="form-control @error('store_name') is-invalid @enderror" name="store_name" value="{{ $stores->store_name }}" >
                                                                                                    @error('store_name')
                                                                                                        <span class="invalid-feedback" role="alert">
                                                                                                            <strong>{{ $message }}</strong>
                                                                                                        </span>
                                                                                                    @enderror
                                                                                                </div>

                                                                                                <div class="col-md-6 text-start">
                                                                                                    <label for="email" class="col-form-label">{{ __('Email Address') }}</label>
                                                                                                    <div class="input-group">
                                                                                                        <div class="input-group-text"><i class="bi bi-envelope-fill"></i></div>
                                                                                                        <input id="email" type="email" placeholder="yourname@gmail.com" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $stores->email }}">
                                                                                                        @error('email')
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
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                        {{ $store->links() }}
                                    </div>
                                @else
                                    <div class="col-lg-12 mb-3 ">
                                        <div class="mb-3 py-4">
                                            <div class="text-center display-1">
                                                <i class="fa-solid fa-users-slash display-1"></i>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title fs-3 text-center">
                                                    {{ __('No Farmers Joined yet.') }}</h5>
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
