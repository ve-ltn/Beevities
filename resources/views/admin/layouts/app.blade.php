<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            background: linear-gradient(to right, #0a3d62, #3c6382);
            color: white;
            font-family: Arial, sans-serif;
        }
        nav {
            background: #0a3d62;
            padding: 15px;
            display: flex;
            gap: 15px;
            align-items: center;
        }
        nav a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background 0.3s;
        }
        nav a:hover {
            background: #3c6382;
        }
        .container {
            margin: 20px auto;
            padding: 20px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            backdrop-filter: blur(10px);
        }
        button {
            color: white;
            font-weight: bold;
        }
        button:hover {
            color: #3c6382;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Admin Panel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.products.index') }}">Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.categories.index') }}">Categories</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.organizations.index') }}">Organizations</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.events.index') }}">Events</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.articles.index') }}">Articles</a></li>
                </ul>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-light">Logout</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>