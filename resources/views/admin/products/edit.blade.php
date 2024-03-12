@extends('admin.layouts.layout')

@section('title')
    Product edit
@endsection


@section('header')
    Product edit
@endsection


@section('content')
    @include('admin.layouts.validate')

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ $product->name }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('products.update', ['product' => $product->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="name">Product name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            placeholder="Product name" name="name" value="{{ $product->name }}">
                    </div>

                    <div class="form-group with-title mb-3">
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                            rows="7">{{ $product->description }}</textarea>
                        <label>Product description</label>
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <span class="input-group-text">$</span>
                            <input type="text" class="form-control @error('old_price') is-invalid @enderror"
                                placeholder="Old price" name="old_price" value="{{ $product->old_price }}"
                                aria-label="Dollar amount (with dot and two decimal places)">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <span class="input-group-text">$</span>
                            <input type="text" class="form-control @error('price') is-invalid @enderror"
                                placeholder="Price" name="price" value="{{ $product->price }}"
                                aria-label="Dollar amount (with dot and two decimal places)">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-outline" data-mdb-input-init>
                            <input type="number" id="countr" class="form-control @error('count') is-invalid @enderror"
                                placeholder="Product count" name="count" value="{{ $product->count }}" />
                        </div>
                    </div>

                    @if ($categories)
                        <div class="input-group mb-3">
                            <label class="input-group-text @error('category_id') is-invalid @enderror"
                                for="category_id">Options</label>
                            <select class="form-select" id="category_id" name="category_id">
                                <option value="{{ $product->category->id }}">{{ $product->category->name }}</option>
                                @foreach ($categories as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif

                    <div class="input-group mb-3">
                        <input class="form-control @error('img_1') is-invalid @enderror" type="file" id="img_1"
                            name="img_1">
                    </div>
                    <div class="input-group mb-3">
                        <input class="form-control @error('img_2') is-invalid @enderror" type="file" id="img_2"
                            name="img_2">
                    </div>
                    <div class="input-group mb-3">
                        <input class="form-control @error('img_3') is-invalid @enderror" type="file" id="img_3"
                            name="img_3">
                    </div>

                    <div class="form-check">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox"
                                class="form-check-input form-check-success form-check-glow @error('active') is-invalid @enderror"
                                checked="" name="active" value="1" id="active">
                            <label class="form-check-label" for="checkboxGlow4">Active</label>
                        </div>
                    </div>
                    <br>

                    <div class="card">
                        <div class="card-header">
                            <h4>With controls</h4>
                        </div>
                        <div class="card-body">
                            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item">
                                        <img src="{{ asset($product->getImage1()) }}" class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>Image 1</h5>
                                        </div>
                                    </div>
                                    <div class="carousel-item active">
                                        <img src="{{ asset($product->getImage2()) }}" class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>Image 2</h5>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset($product->getImage3()) }}" class="d-block w-100"
                                            alt="...">
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
                    </div>
                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                </form>
            </div>
        </div>
    </section>
@endsection
