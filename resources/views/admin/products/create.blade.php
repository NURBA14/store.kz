@extends('admin.layouts.layout')

@section('title')
    Product create
@endsection


@section('header')
    Product create
@endsection


@section('content')
    @include('admin.layouts.validate')

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Default Layout</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Product name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            placeholder="Product name" name="name" value="{{ old('name') }}">
                    </div>

                    <div class="form-group with-title mb-3">
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                            rows="7">{{ old('description') }}</textarea>
                        <label>Product description</label>
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <span class="input-group-text">$</span>
                            <input type="text" class="form-control @error('old_price') is-invalid @enderror"
                                placeholder="Old price" name="old_price" value="{{ old('old_price') }}"
                                aria-label="Dollar amount (with dot and two decimal places)">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <span class="input-group-text">$</span>
                            <input type="text" class="form-control @error('price') is-invalid @enderror"
                                placeholder="Price" name="price" value="{{ old('price') }}"
                                aria-label="Dollar amount (with dot and two decimal places)">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-outline" data-mdb-input-init>
                            <input type="number" id="countr" class="form-control @error('count') is-invalid @enderror"
                                placeholder="Product count" name="count" value="{{ old('count') }}" />
                        </div>
                    </div>

                    @if ($categories)
                        <div class="input-group mb-3">
                            <label class="input-group-text @error('category_id') is-invalid @enderror"
                                for="category_id">Options</label>
                            <select class="form-select" id="category_id" name="category_id">
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
                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                </form>
            </div>
        </div>
    </section>
@endsection
