@extends('client.layouts.layout')


@section('title')
    Search
@endsection

@section('header')
    <div class="container">
        <div class="d-flex justify-content-between">
            @if ($products_count)
                <p>{{ $products_count }} Products</p>
            @endif
            <div class="form-group mb-3">
                <form action="{{ route('user.search.store') }}" method="GET">
                    <input class="form-control-sm" placeholder="Search..." type="text" aria-describedby="button-addon2"
                        name="s">
                    <button class="btn btn-sm btn-outline-secondary" type="submit" id="button-addon2">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            @if ($products)
                @foreach ($products as $product)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-content">
                                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <a href="{{ route('client.product.show', ['id' => $product->id]) }}">
                                            <div class="carousel-item active">
                                                <img src="{{ asset($product->getImage1()) }}" style="height: 250px"
                                                    class="d-block w-100" alt="...">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="{{ asset($product->getImage2()) }}" style="height: 250px"
                                                    class="d-block w-100" alt="...">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="{{ asset($product->getImage3()) }}" style="height: 250px"
                                                    class="d-block w-100" alt="...">
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('client.product.show', ['id' => $product->id]) }}">
                                            <h5 class="card-title">{{ $product->name }}</h5>
                                        </a>
                                        <button class="btn btn-sm btn-outline-primary"><i class="bi bi-eye-fill"></i>
                                            {{ $product->views }}</button>
                                    </div>
                                    <br>
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('client.product.show', ['id' => $product->id]) }}"><button
                                                type="button" class="btn btn-outline-warning">
                                                <i class="bi bi-eye-fill"></i> View
                                            </button>
                                        </a>
                                        <button class="btn btn-sm btn-outline-warning"><i class="bi bi-box-seam"></i>
                                            {{ $product->count }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-center">
                @if ($products)
                    {{ $products->links() }}
                @endif
            </div>
        </div>
    </div>
@endsection
