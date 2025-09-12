<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);
        $totalPrice = $product->price * $request->quantity;

        $order = Order::create([
            'user_id'     => $request->user()->id,
            'product_id'  => $product->id,
            'quantity'    => $request->quantity,
            'total_price' => $totalPrice,
            'status'      => 'pending',
        ]);

        return response()->json([
            'message' => 'Order placed successfully!',
            'order'   => $order
        ], 201);
    }

    public function index(Request $request)
    {
        $orders = Order::with('product')
            ->where('user_id', $request->user()->id)
            ->get();

        return response()->json($orders);
    }
}
