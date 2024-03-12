@extends('admin.layouts.layout')

@section('title')
    Products
@endsection


@section('header')
    {{ $title }}
@endsection


@section('content')
    @include('admin.layouts.success')
    @include('admin.layouts.error')
    <section class="section">
        <div class="row" id="table-striped">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ $title }}</h4>
                    </div>
                    <div class="card-content">
                        @if ($products)
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>name</th>
                                            <th>slug</th>
                                            <th>price</th>
                                            <th>count</th>
                                            <th>Category</th>
                                            <th>active</th>
                                            <th style="width: 200px">Created at</th>
                                            <th>Img 1</th>
                                            <th>Views</th>
                                            <th>Carts</th>
                                            <th>Orders</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>{{ $product->id }}</td>
                                                <td>{{ $product->name }}</td>
                                                <td class="text-success">{{ $product->slug }}</td>
                                                <td>{{ $product->price }}</td>
                                                <td>{{ $product->count }}</td>
                                                <td>{{ $product->category->name }}</td>

                                                <td>
                                                    @if ($product->active == 1)
                                                        <form
                                                            action="{{ route('products.show', ['product' => $product->id]) }}">
                                                            <button type="submit" class="btn btn-success">TRUE</button>
                                                        </form>
                                                    @else
                                                        <form
                                                            action="{{ route('products.show', ['product' => $product->id]) }}"
                                                            method="get">
                                                            <button type="submit" class="btn btn-danger">FALSE</button>
                                                        </form>
                                                    @endif
                                                </td>
                                                <td>{{ $product->created_at }}</td>
                                                <td><a target="blank" href="{{ asset($product->getImage1()) }}">Img 1</a>
                                                </td>
                                                <td>{{ $product->views }}</td>
                                                <td>{{ $product->carts_count }}</td>
                                                <td>{{ $product->orders_count }}</td>
                                                <td>
                                                    <a href="{{ route('products.edit', ['product' => $product->id]) }}">
                                                        <button type="button" class="btn btn-sm btn-warning"><i
                                                                class="bi bi-pencil-square"></i></button>
                                                    </a>
                                                    <form
                                                        action="{{ route('products.destroy', ['product' => $product->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            onclick="return confirm('Confirm the deletion')"
                                                            class="btn btn-sm btn-danger"><i
                                                                class="bi bi-trash3-fill"></i></button>
                                                    </form>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif

                    </div>
                    <div class="card-footer">
                        @if ($products)
                            {{ $products->links() }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
