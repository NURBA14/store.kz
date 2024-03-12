@extends('admin.layouts.layout')

@section('title')
    Category edit
@endsection


@section('header')
    Category {{ $category->name }} Edit
@endsection


@section('content')
    @include('admin.layouts.validate')

    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('categories.update', ['category' => $category->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Category name</label>
                        <br><br>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            placeholder="Product name" name="name" value="{{ $category->name }}">
                    </div>
                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                </form>
            </div>
        </div>
    </section>
@endsection
