<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    // Show home page
    public function home()
    {
        $products = $this->getProductsByCategory();
        return view('home', compact('products'));
    }

    // Show cart page
    public function index()
    {
        $cart = session()->get('cart', []);
        $loyalty_discount = session()->get('loyalty_discount', 0);
        return view('cart.index', compact('cart', 'loyalty_discount'));
    }

    // Add item to cart
    public function add(Request $request)
    {
        $allProducts = $this->getProducts();
        $id = $request->product_id;

        if (!isset($allProducts[$id])) {
            return redirect()->back()->with('error', 'Invalid product.');
        }

        $product = $allProducts[$id];

        // Temperature only for Espresso Blends
        $isEspresso = ($product['category'] ?? '') === 'Espresso Blends';

        // Validation rules
        $rules = [
            'product_id' => 'required|integer',
            'quantity' => 'required|integer|min:1',
        ];

        if ($isEspresso) {
            $rules['temperature'] = 'required|string';
        }

        $request->validate($rules);

        $cart = session()->get('cart', []);

        $item = [
            'id' => $id,
            'name' => $product['name'],
            'price' => $product['price'],
            'quantity' => $request->quantity,
            'image' => $product['image'],
        ];

        if ($isEspresso) {
            $item['temperature'] = $request->temperature;
        }

        $cart[] = $item;
        session(['cart' => $cart]);

        return back()->with('success', "{$product['name']} added to cart!");
    }

    // Remove item from cart
    public function remove($index)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$index])) {
            unset($cart[$index]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Item removed!');
    }

    // Checkout
    public function checkout()
    {
        session()->forget('cart');
        session()->forget('loyalty_discount');
        return redirect()->route('cart.index')->with('success', '✅ Order placed successfully!');
    }

    // Apply Voucher
    public function applyVoucher(Request $request)
    {
        $request->validate([
            'voucher_code' => 'required|string'
        ]);

        $code = strtoupper($request->voucher_code);

        $vouchers = [
            'COFFEE10' => 10,
            'COFFEE20' => 20,
            'COFFEE50' => 50,
        ];

        if (!isset($vouchers[$code])) {
            return redirect()->back()->with('error', 'Invalid voucher code.');
        }

        session(['loyalty_discount' => $vouchers[$code]]);

        return redirect()->back()->with('success', "Voucher applied! You got ₱{$vouchers[$code]} off.");
    }

    // ✅ Single Product List
    private function getProducts()
    {
        return [
            1 => ['name' => 'Americano', 'price' => 100, 'image' => 'https://images.unsplash.com/photo-1559042625-cd48b94f5b3f?auto=format&fit=crop&w=800&q=80', 'category' => 'Espresso Blends'],
            2 => ['name' => 'Cafe Latte', 'price' => 120, 'image' => 'https://images.unsplash.com/photo-1509042239860-f550ce710b93?auto=format&fit=crop&w=800&q=80', 'category' => 'Espresso Blends'],
            3 => ['name' => 'Spanish Latte', 'price' => 130, 'image' => 'https://images.unsplash.com/photo-1507914372361-1c86f20a1c8f?auto=format&fit=crop&w=800&q=80', 'category' => 'Espresso Blends'],
            4 => ['name' => 'Vanilla Latte', 'price' => 130, 'image' => 'https://images.unsplash.com/photo-1536520002442-39764a41e86a?auto=format&fit=crop&w=800&q=80', 'category' => 'Espresso Blends'],
            5 => ['name' => 'Hazelnut Latte', 'price' => 140, 'image' => 'https://images.unsplash.com/photo-1572188863110-47c49c3f0a32?auto=format&fit=crop&w=800&q=80', 'category' => 'Espresso Blends'],
            6 => ['name' => 'Dirty Matcha', 'price' => 150, 'image' => 'https://images.unsplash.com/photo-1617196036988-82f7965d0df6?auto=format&fit=crop&w=800&q=80', 'category' => 'Matcha Series'],
            7 => ['name' => 'Mocha Latte', 'price' => 140, 'image' => 'https://images.unsplash.com/photo-1511920170033-f8396924c348?auto=format&fit=crop&w=800&q=80', 'category' => 'Espresso Blends'],
            8 => ['name' => 'Caramel Macchiato', 'price' => 150, 'image' => 'https://images.unsplash.com/photo-1529446486093-7c8f74f66d62?auto=format&fit=crop&w=800&q=80', 'category' => 'Espresso Blends'],
            // Add more products here...
        ];
    }

    // ✅ Products grouped by category for home page
    private function getProductsByCategory()
    {
        $allProducts = $this->getProducts();
        $products = [];
        foreach ($allProducts as $id => $product) {
            $products[$product['category']][$id] = $product;
        }
        return $products;
    }
}
