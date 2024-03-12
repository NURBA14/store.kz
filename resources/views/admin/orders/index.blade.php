@extends('admin.layouts.layout')

@section('title')
    Orders
@endsection


@section('header')
    Orders list
@endsection


@section('content')
    @include('admin.layouts.success')
    @include('admin.layouts.error')
    <section class="section">
        <div class="row" id="table-striped">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Orders list</h4>
                    </div>
                    <div class="card-content">

                        @if ($orders)
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>User name</th>
                                            <th>User phone number</th>
                                            <th>Product name</th>
                                            <th>Count</th>
                                            <th>Price</th>
                                            <th>Created At</th>
                                            <th>Delivery location</th>
                                            <th>Delivere date</th>
                                            <th>Token</th>
                                            <th>In delivere</th>
                                            <th>Received</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td>{{ $order->id }}</td>
                                                <td>{{ $order->user->name }}</td>
                                                <td>{{ $order->user->phone_number }}</td>
                                                <td>{{ $order->product->name }}</td>
                                                <td>{{ $order->count }}</td>
                                                <td>{{ $order->price }}</td>
                                                <td>{{ $order->created_at }}</td>
                                                <td>{{ $order->dev_location }}</td>
                                                <td>{{ $order->delivere_date }}</td>
                                                <td>{{ $order->token }}</td>
                                                <td>
                                                    @if ($order->in_delivere == 1)
                                                        <a href="{{ route('orders.show', ['order' => $order->id]) }}">
                                                            <button class="btn btn-success">TRUE</button>
                                                        </a>
                                                    @else
                                                        <a href="{{ route('orders.show', ['order' => $order->id]) }}">
                                                            <button class="btn btn-danger">FALSE</button>
                                                        </a>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($order->received == 1)
                                                        <button class="btn btn-success">TRUE</button>
                                                    @else
                                                        <form
                                                            action="{{ route('orders.destroy', ['order' => $order->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">FALSE</button>
                                                        </form>
                                                    @endif
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif

                    </div>
                    <div class="card-footer">
                        @if ($orders)
                            {{ $orders->links() }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
