<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Organization Admin')</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        body {
            background: linear-gradient(to right, #021c30, #042a45);
            color: white;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background: #021c30;
            padding: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);
        }

        .navbar-brand {
            font-size: 1.6rem;
            font-weight: bold;
            letter-spacing: 1px;
            color: #1abc9c;
            text-decoration: none;
        }

        .navbar-nav{
            gap: 20px;
        }
        .navbar-nav .nav-link {
            color: white;
            font-weight: bold;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background 0.3s, color 0.3s;
        }

        .navbar-nav .nav-link:hover {
            background: #1abc9c;
            color: #021c30;
        }

        .container {
            margin: 20px auto;
            padding: 20px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            backdrop-filter: blur(10px);
        }

        .btn-primary {
            background: #1abc9c;
            border: none;
        }

        .btn-primary:hover {
            background: #16a085;
        }
    </style>
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('organization_admin.dashboard') }}">Organization Admin</a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('organization_admin.dashboard') }}">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('organization_admin.products.index') }}">Produk</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('organization_admin.events.index') }}">Event</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('organization_admin.articles.index') }}">Artikel</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('organization_admin.invoices.index') }}">Invoice</a></li>
                    <li class="nav-item">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger">Logout</button>
                    </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-4">
        <h2 class="m-4 fw-bold">Welcome, {{ Auth::user()->name }}!</h2>
        <p class="m-4 fw-bold">Anda telah login sebagai admin organisasi: <strong>{{ Auth::user()->organization->name ?? 'Tanpa Organisasi' }}</strong></p>
        @yield("content")
    </div>

    <footer class="text-center py-3 mt-5 bg-dark text-light">
        <p class="mb-0">&copy; {{ date('Y') }} Organization Admin Panel</p>
    </footer>

</body>
</html>
