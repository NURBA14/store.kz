@extends('admin.layouts.layout')

@section('title')
    Category create
@endsection


@section('header')
    Category create
@endsection


@section('content')
    @include('admin.layouts.validate')

    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Category name</label>
                        <br><br>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            placeholder="Product name" name="name" value="{{ old('name') }}">
                    </div>
                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                </form>
            </div>
        </div>
    </section>
@endsection
