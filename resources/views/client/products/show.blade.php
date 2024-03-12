@extends('client.layouts.layout')


@section('title')
    Product {{ $product->name }}
@endsection

@section('header')
@endsection


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <div class="d-flex justify-content-between">
                            <h1>{{ $product->name }}</h1>
                            <h1 class="">{{ $product->category->name }}</h1>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item">
                                    <img src="{{ asset($product->getImage1()) }}" style="height: 500px;"
                                        class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Image 1</h5>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset($product->getImage2()) }}" style="height: 500px"
                                        class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Image 2</h5>
                                    </div>
                                </div>
                                <div class="carousel-item active">
                                    <img src="{{ asset($product->getImage3()) }}" style="height: 500px"
                                        class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Image 3</h5>
                                    </div>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </a>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-sm btn-outline-warning"><i class="bi bi-box-seam"></i>
                                    {{ $product->count }}</button>
                                <h3>{{ $product->description }}</h3>
                                <button type="button" class="btn btn-outline-warning"><i class="bi bi-eye-fill"></i>
                                    {{ $product->views }}</button>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="d-flex justify-content-between">
                                @auth

                                    @if (auth()->user()->getBankCart())
                                        <button type="button" class="btn btn-xl text-xl btn-outline-success"
                                            data-bs-toggle="modal" data-bs-target="#inlineForm">
                                            Add Cart
                                        </button>
                                    @else
                                        <p>Введите данные банковской карты в профиле</p>
                                    @endif
                                @endauth

                                <h4 class="text-success">{{ $product->price }}тг</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                </div>


                <div class="form-group">
                    <div class="modal fade text-left" id="inlineForm" tabindex="-1" aria-labelledby="myModalLabel33"
                        aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <form action="{{ route('user.cart.store', ['id' => $product->id]) }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <h1>{{ $product->name }} - {{ $product->price }}тг</h1>
                                        <label for="count">Количество: </label>
                                        <div class="form-group">
                                            <input id="count" type="number" max="{{ $product->count }}"
                                                class="form-contro-sm @error('count') is-invalid @enderror" name="count">
                                        </div>
                                        <label for="dev_location">Полный адрес доставки:
                                        </label>
                                        <div class="form-group">
                                            <textarea name="dev_location" id="dev_location" class="form-control @error('dev_location') is-invalid @enderror"
                                                rows="2">{{ old('dev_location') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary ms-1" data-bs-dismiss="modal">
                                            <i class="bx bx-check d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Сохранить в корзину</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
