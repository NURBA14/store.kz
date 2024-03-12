@extends('admin.layouts.layout')

@section('title')
    Carts
@endsection


@section('header')
    Cart list
@endsection


@section('content')
    @include('admin.layouts.success')
    @include('admin.layouts.error')
    <section class="section">
        <div class="row" id="table-striped">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Carts list</h4>
                    </div>
                    <div class="card-content">

                        @if ($carts)
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>User name</th>
                                            <th>Product name</th>
                                            <th>Count</th>
                                            <th>Price</th>
                                            <th>Delivery location</th>
                                            <th>Approved</th>
                                            <th>Created At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($carts as $cart)
                                            <tr>
                                                <td>{{ $cart->id }}</td>
                                                <td>{{ $cart->user->name }}</td>
                                                <td>{{ $cart->product->name }}</td>
                                                <td>{{ $cart->count }}</td>
                                                <td>{{ $cart->price }}</td>
                                                <td>{{ $cart->dev_location }}</td>
                                                <td>
                                                    <form action="{{ route('carts.show', ['cart' => $cart->id]) }}"
                                                        method="get">
                                                        <button type="submit" class="btn btn-danger">FALSE</button>
                                                    </form>
                                                </td>
                                                <td>{{ $cart->created_at }}</td>
                                                <td>
                                                    <form action="{{ route('carts.destroy', ['cart' => $cart->id]) }}"
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
                        @if ($carts)
                            {{ $carts->links() }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
