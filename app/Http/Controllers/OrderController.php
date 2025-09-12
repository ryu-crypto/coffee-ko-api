<?php

namespace App\Http\Controllers;

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

        Order::create([
            'user_id'     => auth()->id(),
            'product_id'  => $product->id,
            'quantity'    => $request->quantity,
            'total_price' => $totalPrice,
            'status'      => 'pending',
        ]);

        return redirect()->route('orders.index')->with('success', 'Order placed successfully!');
    }

    public function index()
    {
        $orders = Order::with('product')->where('user_id', auth()->id())->get();
        return view('orders.index', compact('orders'));
    }
}
