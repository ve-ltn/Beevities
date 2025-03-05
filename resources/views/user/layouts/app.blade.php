<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Panel</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <nav>
        <a href="{{ route('user.dashboard') }}">Dashboard</a>
        <a href="{{ route('organizations.index') }}">Organizations</a>
        <a href="{{ route('user.history') }}">Order History</a>
        <a href="{{ route('user.cart') }}">Cart</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
    @csrf
    <button type="submit" class="btn btn-link" style="border: none; background: none; cursor: pointer;">Logout</button>
</form>
    </nav>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>