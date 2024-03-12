@extends('admin.layouts.layout')

@section('title')
    Home
@endsection


@section('header')
    Home page
@endsection


@section('content')
    @include('admin.layouts.success')
    @include('admin.layouts.error')
    <div class="row">
        @if ($users)
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <button class="btn btn-xl btn-primary rounded-4">
                                    <i class="bi bi-person-fill"></i>
                                </button>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Users</h6>
                                <h6 class="font-extrabold mb-0">{{ $users }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if ($views)
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <button class="btn btn-xl btn-danger rounded-4">
                                    <i class="bi bi-eye-fill"></i>
                                </button>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Views</h6>
                                <h6 class="font-extrabold mb-0">{{ $views }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if ($carts)
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <button class="btn btn-xl btn-success rounded-4">
                                    <i class="bi bi-cart-fill"></i>
                                </button>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Carts</h6>
                                <h6 class="font-extrabold mb-0">{{ $carts }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if ($orders)
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <button class="btn btn-xl btn-info rounded-4">
                                    <i class="bi bi-truck"></i>
                                </button>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Orders</h6>
                                <h6 class="font-extrabold mb-0">{{ $orders }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if ($products)
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <button class="btn btn-xl btn-dark rounded-4">
                                    <i class="bi bi-box-seam"></i>
                                </button>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Products</h6>
                                <h6 class="font-extrabold mb-0">{{ $products }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if ($categories)
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <button class="btn btn-xl btn-warning rounded-4">
                                    <i class="bi bi-bookmarks-fill"></i>
                                </button>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Categories</h6>
                                <h6 class="font-extrabold mb-0">{{ $categories }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
