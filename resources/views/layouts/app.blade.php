<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Coffee-Ko ☕</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">Coffee-Ko ☕</a>

            <div class="d-flex">
                @auth
                    <a href="{{ route('cart.index') }}" class="btn btn-outline-light me-2">🛒 Cart</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login.show') }}" class="btn btn-outline-light me-2">Login</a>
                    <a href="{{ route('register.show') }}" class="btn btn-success">Register</a>
                @endauth
            </div>
        </div>
    </nav>

    {{-- Main Content --}}
    <main class="container mt-4">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-dark text-light text-center py-3 mt-5">
        &copy; {{ date('Y') }} Coffee-Ko. All rights reserved.
    </footer>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
