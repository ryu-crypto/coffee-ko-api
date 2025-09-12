<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Coffee-Ko | Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">Coffee-Ko ☕</a>

            <div class="d-flex">
                @auth
                    <a href="{{ route('cart.index') }}" class="btn btn-outline-light ms-2">
                        🛒 View Cart
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger ms-2">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login.show') }}" class="btn btn-outline-light ms-2">Login</a>
                    <a href="{{ route('register.show') }}" class="btn btn-primary ms-2">Register</a>
                @endauth
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="text-center mb-4">
            <h1 class="fw-bold">Welcome to Coffee-Ko</h1>
            <p class="text-muted">Order your favorite coffee and pastries anytime, anywhere.</p>
        </div>

        {{-- Success Notification --}}
        @if(session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif
    </div>

    {{-- Cafe Menu --}}
    <div class="container mt-5">
        @if(!empty($products))
            @foreach($products as $category => $items)
                <h2 class="fw-bold mt-5">{{ $category }}</h2>
                <div class="row">
                    @foreach($items as $index => $product)
                        <div class="col-md-3 mb-4">
                            <div class="card shadow-sm">
                                <img src="{{ $product['image'] }}" class="card-img-top" alt="{{ $product['name'] }}">
                                <div class="card-body text-center">
                                    <h5 class="card-title">{{ $product['name'] }}</h5>
                                    <p class="text-muted">₱{{ number_format($product['price'], 2) }}</p>

                                    @auth
                                    <form method="POST" action="{{ route('cart.add') }}">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $index }}">

                                        {{-- Quantity --}}
                                        <input type="number" name="quantity" class="form-control mb-2" value="1" min="1">

                                        {{-- Temperature only for Espresso Blends --}}
                                        @if($category === 'Espresso Blends')
                                            <label class="form-label">Temperature</label>
                                            <select name="temperature" class="form-select mb-2" required>
                                                <option value="Hot">Hot</option>
                                                <option value="Iced">Iced</option>
                                            </select>
                                        @endif

                                        <button type="submit" class="btn btn-dark w-100">Add to Cart</button>
                                    </form>
                                    @else
                                        <a href="{{ route('login.show') }}" class="btn btn-outline-dark w-100">Login to Order</a>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        @else
            <div class="alert alert-info text-center mt-3">No products available.</div>
        @endif
    </div>

    <footer class="bg-dark text-light text-center py-3 mt-5">
        &copy; {{ date('Y') }} Coffee-Ko. All rights reserved.
    </footer>

</body>
</html>
