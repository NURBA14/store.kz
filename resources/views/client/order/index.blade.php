@extends('client.layouts.layout')


@section('title')
    Order
@endsection

@section('header')
    Orders
@endsection


@section('content')
    @include('admin.layouts.success')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">

                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Product name</th>
                                        <th>Product Count</th>
                                        <th>Price</th>
                                        <th>Delivere location</th>
                                        <th>Created At</th>
                                        <th>Delivere date</th>
                                        <th>Token</th>
                                        <th>In Deliver</th>
                                        <th>Received</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($orders)
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td>{{ $order->id }}</td>
                                                <td>{{ $order->product->name }}</td>
                                                <td>{{ $order->count }}</td>
                                                <td>{{ $order->price }}</td>
                                                <td>{{ $order->dev_location }}</td>
                                                <td>{{ $order->created_at }}</td>
                                                <td class="bg-success text-dark">{{ $order->delivere_date }}</td>
                                                <td class="bg-success text-dark">{{ $order->token }}</td>
                                                @if ($order->in_delivere == 0)
                                                    <td class="bg-danger text-dark">FALSE</td>
                                                @else
                                                    <td class="bg-success text-dark">TRUE</td>
                                                @endif
                                                @if ($order->received == 0)
                                                    <td class="bg-danger text-dark">FALSE</td>
                                                @else
                                                    <td class="bg-success text-dark">TRUE</td>
                                                @endif
                                            </tr>
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
