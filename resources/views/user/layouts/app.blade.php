<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            margin: 0;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background-color: #f8f9fa;
            border-right: 1px solid #ddd;
            padding: 20px;
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease-in-out;
            position: fixed;
            top: 0;
            bottom: 0;
        }

        .sidebar.hidden {
            transform: translateX(-100%);
        }

        .content {
            flex: 1;
            padding: 20px;
            margin-left: 250px;
            transition: margin-left 0.3s ease-in-out;
        }

        .content.full-width {
            margin-left: 0;
        }

        .toggle-btn {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
        }

        .navbar .toggle-btn {
            margin-right: 10px;
        }

        @media print {
            .sidebar, .navbar, .d-print-none {
                display: none !important;
            }

            .content {
                margin-left: 0 !important;
                padding: 20px;
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }

            table th, table td {
                border: 1px solid black;
                padding: 8px;
                text-align: left;
            }

            table thead {
                background-color: #f2f2f2;
            }

            h2 {
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar" id="sidebar">
        <a href="{{ route('user.dashboard') }}" class="btn btn-light mb-2">Dashboard</a>
        <a href="{{ route('user.catalog') }}" class="btn btn-light mb-2">Katalog</a>
        <a href="{{ route('user.cart') }}" class="btn btn-light mb-2">Keranjang</a>
        <a href="{{ route('user.history') }}" class="btn btn-light mb-2">Riwayat Pembelian</a>
    </div>

    <div class="flex-column flex-grow-1">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <button class="toggle-btn" id="toggle-btn"><<</button>
                <a class="navbar-brand" href="{{ route('user.dashboard') }}">Toko Online</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <span class="nav-link text-white">Halo, {{ Auth::user()->name }}</span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-primary text-white" href="{{ route('user.cart') }}">
                                Cart <span class="badge bg-light text-dark" id="cart-count">
                                    {{ \App\Models\Cart::where('user_id', Auth::id())->count() }}
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-danger text-white" href="#" 
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content" id="main-content">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sidebar = document.getElementById('sidebar');
            const toggleBtn = document.getElementById('toggle-btn');
            const mainContent = document.getElementById('main-content');

            toggleBtn.addEventListener('click', function () {
                const sidebarIsHidden = sidebar.classList.toggle('hidden');
                mainContent.classList.toggle('full-width', sidebarIsHidden);
                toggleBtn.textContent = sidebarIsHidden ? '>>' : '<<';
            });
        });
    </script>
    @yield('scripts')
</body>
</html>

<!-- ni gpt btw -->
