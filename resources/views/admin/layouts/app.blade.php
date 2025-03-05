// resources/views/admin/layouts/app.blade.php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <nav>
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{ route('admin.products.index') }}">Products</a>
        <a href="{{ route('admin.categories.index') }}">Categories</a>
        <a href="{{ route('admin.organizations.index') }}">Organizations</a>
        <a href="{{ route('admin.events.index') }}">Events</a>
        <a href="{{ route('admin.articles.index') }}">Articles</a>
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