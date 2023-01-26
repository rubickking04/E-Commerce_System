@extends('store.layouts.navbar')
@section('content')
<div class="row">
    <div class="col-12 mt-3">
        <h4>{{  __('Newly Users')  }}</h4>
    </div>
    <div class="col-6">
        <div class="card container" >
            <div class="card-body ">
                <div class="row border-bottom border-2 border-dark">
                    <div class="col-lg-8 col-md-7 col-sm-6 col-6 d-none d-sm-block">
                        <div class="text-start py-1 fs-4 fw-bold card-title roboto">{{ __('Students Table') }}
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="text-end mt-2 fs-6 fw-bold roboto">{{ $user->count() }} {{ Str::plural(' student',$user->count())}}</div>
                    </div>
                </div>
                @if (count($user) > 0)
                <div class="table-responsive py-2 overflow-auto h-25">
                    <table>
                        <tbody>
                            @foreach ($user as $users)
                            <tr>
                                <td  class="text-end col-lg-1 col-md-1 col-sm-1 col-1 px-2" scope="row">
                                @if($users->image)
                                    <img src="{{ asset('/storage/images/'.$user->image)}}" class="img-fluid" alt="">
                                @else
                                    <img src="{{ asset('/storage/images/avatar.png')}}" alt="hugenerd" width="30" height="30" class="rounded-circle">
                                @endif
                                </td>
                                <td  class="text-start fw-bold h6 py-3 text-truncate roboto" scope="row">{{ $users->name }}</td>
                                <td  class="text-end text-muted small fw-bold h6 py-3 roboto text-truncate" scope="row">{{ $users->created_at->diffForhumans() }}</td>
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
                            <h5 class="card-title fs-3 text-center">{{ __('No Teachers Joined yet.') }}</h5>
                        </div>
                    </div>
                </div>
                @endif
                <div class="text-end">
                    <a href="{{ route('admin.students') }}" class="btn btn-primary roboto ">
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
                        <div class="text-start py-1 fs-4 fw-bold card-title roboto">{{ __('Teachers Table') }}
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="text-end mt-2 fs-6 fw-bold roboto">{{ $teacher->count() }} {{ Str::plural(' teacher',$teacher->count())}}</div>
                    </div>
                </div>
                @if (count($teacher) > 0)
                <div class="table-responsive py-2 overflow-auto h-25">
                    <table>
                        <tbody>
                            @foreach ($teacher as $users)
                            <tr>
                                <td  class="text-end col-lg-1 col-md-1 col-sm-1 col-1 px-2" scope="row">
                                @if($users->image)
                                    <img src="{{ asset('/storage/images/'.$user->image)}}" class="img-fluid" alt="">
                                @else
                                    <img src="{{ asset('/storage/images/avatar.png')}}" alt="hugenerd" width="30" height="30" class="rounded-circle">
                                @endif
                                </td>
                                <td  class="text-start fw-bold h6 py-3 text-truncate roboto" scope="row">{{ $users->name }}</td>
                                <td  class="text-end text-muted small fw-bold h6 py-3 text-truncate roboto" scope="row">{{ $users->created_at->diffForhumans() }}</td>
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
                            <h5 class="card-title fs-3 text-center">{{ __('No Teachers on data yet.') }}</h5>
                        </div>
                    </div>
                </div>
                @endif
                <div class="text-end">
                    <a href="{{ route('admin.teachers') }}" class="btn btn-primary roboto">
                        <i class="fa-solid fa-up-right-from-square mx-2"></i>
                        <span>{{ __('View all data') }}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
