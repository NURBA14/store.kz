@extends('client.layouts.layout')


@section('title')
    Cart
@endsection

@section('header')
    Cart
@endsection


@section('content')
    @include('admin.layouts.success')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <p class="card-text ">
                                Это ваша корзинка, данные кроссовки в данный момент не в доставке. Дождитесь одобрения
                                вашего заказа. При получения одобрения на заказ, выбранный вами товар будет присутствовать в
                                Orders (заказах)
                            </p>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Product name</th>
                                        <th>Product Count</th>
                                        <th>Image</th>
                                        <th>Delivere location</th>
                                        <th>Created At</th>
                                        <th>price</th>
                                        <th>Approved</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($carts)
                                        @foreach ($carts as $cart)
                                            <tr>
                                                <td>{{ $cart->id }}</td>
                                                <td>{{ $cart->product->name }}</td>
                                                <td>{{ $cart->count }}</td>
                                                <td><a target="blank"
                                                        href="{{ asset($cart->product->getImage1()) }}">Image</a></td>
                                                <td>{{ $cart->dev_location }}</td>
                                                <td>{{ $cart->created_at }}</td>
                                                <td>{{ $cart->price }}</td>
                                                <td>
                                                    <button class="btn btn-warning">In process</button>
                                                </td>
                                                <td>
                                                    <a href="{{ route('user.cart.delete', ['id' => $cart->id]) }}">
                                                        <button onclick="confirm('Delete this order')"
                                                            class="btn btn-danger">
                                                            <i class="bi bi-trash-fill"></i>
                                                        </button>
                                                    </a>
                                                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                                        data-bs-target="#inlineForm{{ $cart->id }}">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <div class="modal fade text-left" id="inlineForm{{ $cart->id }}"
                                                tabindex="-1" aria-labelledby="myModalLabel33" aria-hidden="true"
                                                style="display: none;">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                    role="document">
                                                    <div class="modal-content">
                                                        <form action="{{ route('user.cart.update', ['id' => $cart->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body">
                                                                <h1>{{ $cart->product->name }} -
                                                                    {{ $cart->product->price }}тг</h1>
                                                                <hr>
                                                                <label for="count">Full price:
                                                                    {{ $cart->price }}</label>
                                                                <br>
                                                                <label for="count">Count: </label>
                                                                <div class="form-group">
                                                                    <input id="count" type="number"
                                                                        placeholder="Product count"
                                                                        max="{{ $cart->product->count }}"
                                                                        value="{{ $cart->count }}"
                                                                        class="form-control-sm @error('count') is-invalid @enderror"
                                                                        name="count">
                                                                </div>

                                                                <label for="dev_location">Delivery location:
                                                                </label>
                                                                <div class="form-group">
                                                                    <textarea name="dev_location" id="dev_location" class="form-control @error('dev_location') is-invalid @enderror"
                                                                        rows="2">{{ $cart->dev_location }}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary ms-1"
                                                                    data-bs-dismiss="modal">
                                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Изменить корзинку</span>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
