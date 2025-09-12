@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="fw-bold">🛒 My Cart</h2>

    {{-- Alerts --}}
    @if(session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger mt-3">{{ session('error') }}</div>
    @endif

    {{-- Cart Table --}}
    @if(!empty($cart))
    <table class="table table-bordered mt-3">
        <thead class="table-dark">
            <tr>
                <th>Product</th>
                <th>Image</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @php $total = 0; @endphp
        @foreach($cart as $id => $item)
            @php 
                $subtotal = $item['price'] * $item['quantity']; 
                $total += $subtotal; 
            @endphp
            <tr>
                <td>{{ $item['name'] }}</td>
                <td><img src="{{ $item['image'] }}" width="60"></td>
                <td>₱{{ number_format($item['price'], 2) }}</td>
                <td>{{ $item['quantity'] }}</td>
                <td>₱{{ number_format($subtotal, 2) }}</td>
                <td>
                    <form method="POST" action="{{ route('cart.remove', $id) }}">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                    </form>
                </td>
            </tr>
        @endforeach

        {{-- Total --}}
        <tr>
            <td colspan="4" class="text-end fw-bold">Total:</td>
            <td colspan="2" class="fw-bold">₱{{ number_format($total, 2) }}</td>
        </tr>

        {{-- Loyalty Voucher --}}
        @php
            $loyaltyDiscount = session('loyalty_discount', 0);
            $totalAfterDiscount = $total - $loyaltyDiscount;
        @endphp
        @if($loyaltyDiscount > 0)
        <tr>
            <td colspan="4" class="text-end fw-bold">Loyalty Voucher:</td>
            <td colspan="2" class="text-success fw-bold">-₱{{ number_format($loyaltyDiscount, 2) }}</td>
        </tr>
        <tr>
            <td colspan="4" class="text-end fw-bold">Total after Discount:</td>
            <td colspan="2" class="fw-bold">₱{{ number_format($totalAfterDiscount, 2) }}</td>
        </tr>
        @endif
        </tbody>
    </table>

    {{-- Voucher Code Form --}}
    <div class="mb-3">
        <form method="POST" action="{{ route('cart.applyVoucher') }}" class="d-flex gap-2">
            @csrf
            <input type="text" name="voucher_code" class="form-control" placeholder="Enter voucher code" required>
            <button type="submit" class="btn btn-primary">Apply</button>
        </form>
    </div>

    {{-- Checkout Button --}}
    <form method="POST" action="{{ route('cart.checkout') }}">
        @csrf
        <button type="submit" class="btn btn-success w-100">✅ Order Now</button>
    </form>

    @else
        <div class="alert alert-info mt-3">Your cart is empty.</div>
    @endif
</div>
@endsection
