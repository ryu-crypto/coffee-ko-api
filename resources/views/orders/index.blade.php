@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>My Orders</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{ $order->product->name }}</td>
                <td>{{ $order->quantity }}</td>
                <td>₱{{ number_format($order->total_price, 2) }}</td>
                <td>{{ ucfirst($order->status) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
