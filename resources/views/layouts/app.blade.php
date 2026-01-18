<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Laravel E-commerce Mini')</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    
    <link href="{{ asset('css/darkmode.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom-product.css') }}" rel="stylesheet">
    
    <!-- Dark Mode Script (Load early to prevent flash) -->
    <script src="{{ asset('js/darkmode.js') }}"></script>

    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --success-gradient: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            --dark-gradient: linear-gradient(135deg, #232526 0%, #414345 100%);
        }

        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-color: #f8f9fa;
        }

        main {
            flex: 1;
        }

        /* Navbar Styling */
        .navbar-custom {
            background: var(--primary-gradient) !important;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
            padding: 15px 0;
        }

        .navbar-custom .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            letter-spacing: -0.5px;
        }

        .navbar-custom .nav-link {
            font-weight: 500;
            transition: all 0.3s ease;
            padding: 10px 15px !important;
            border-radius: 8px;
            margin: 0 2px;
        }

        .navbar-custom .nav-link:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        /* Card Styling */
        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        /* Button Styling */
        .btn-primary {
            background: var(--primary-gradient);
            border: none;
            border-radius: 10px;
            padding: 12px 24px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: var(--primary-gradient);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }

        .btn-success {
            background: var(--success-gradient);
            border: none;
            border-radius: 10px;
            font-weight: 600;
        }

        .btn-success:hover {
            background: var(--success-gradient);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(17, 153, 142, 0.4);
        }

        /* Footer */
        .footer-custom {
            background: var(--dark-gradient);
            color: #fff;
            padding: 40px 0;
        }

        /* Form Styling */
        .form-control,
        .form-select {
            border-radius: 10px;
            padding: 12px 16px;
            border: 2px solid #e9ecef;
            transition: all 0.3s ease;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #667eea;
            box-shadow: 0 0 20px rgba(102, 126, 234, 0.15);
        }

        /* Badge */
        .badge {
            padding: 8px 12px;
            border-radius: 8px;
            font-weight: 500;
        }

        /* Alert */
        .alert {
            border-radius: 12px;
            border: none;
        }

        /* Product Card */
        .product-card {
            overflow: hidden;
        }

        .product-card .card-img-top {
            height: 200px;
            object-fit: cover;
            background: linear-gradient(135deg, #667eea20 0%, #764ba220 100%);
        }

        .price-tag {
            font-size: 1.25rem;
            font-weight: 700;
            color: #667eea;
        }

        /* Hero Section */
        .hero-section {
            background: var(--primary-gradient);
            padding: 80px 0;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        /* Animate */
        .fade-in {
            animation: fadeIn 0.6s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="bi bi-bag-heart-fill me-2"></i>ShopMini
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">
                            <i class="bi bi-house-door me-1"></i>Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products') }}">
                            <i class="bi bi-grid me-1"></i>Products
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cart.index') }}">
                                <i class="bi bi-cart3 me-1"></i>Cart
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('wishlist.index') }}">
                                <i class="bi bi-heart me-1"></i>Wishlist
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('orders.history') }}">
                                <i class="bi bi-receipt me-1"></i>Orders
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                <i class="bi bi-person-circle me-1"></i>{{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="{{ route('addresses.index') }}">
                                        <i class="bi bi-geo-alt me-2"></i>Shipping Addresses
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="bi bi-box-arrow-right me-2"></i>Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                <i class="bi bi-box-arrow-in-right me-1"></i>Login
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-light text-primary px-3 ms-2" href="{{ route('register') }}">
                                <i class="bi bi-person-plus me-1"></i>Register
                            </a>
                        </li>
                    @endauth
                    
                    <!-- Language Switcher -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <i class="bi bi-translate"></i> {{ strtoupper(app()->getLocale()) }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <form action="{{ route('locale.switch') }}" method="POST" class="d-inline">
                                    @csrf
                                    <input type="hidden" name="locale" value="id">
                                    <button type="submit" class="dropdown-item {{ app()->getLocale() == 'id' ? 'active' : '' }}">
                                        🇮🇩 Indonesia
                                    </button>
                                </form>
                            </li>
                            <li>
                                <form action="{{ route('locale.switch') }}" method="POST" class="d-inline">
                                    @csrf
                                    <input type="hidden" name="locale" value="en">
                                    <button type="submit" class="dropdown-item {{ app()->getLocale() == 'en' ? 'active' : '' }}">
                                        🇬🇧 English
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    
                    <!-- Dark Mode Toggle -->
                    <li class="nav-item">
                        <button onclick="toggleDarkMode()" class="dark-mode-toggle ms-2" title="Toggle Dark Mode">
                            <span class="toggle-icon">
                                <i class="bi bi-moon-fill"></i>
                            </span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Flash Messages -->
    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show fade-in" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show fade-in" role="alert">
                <i class="bi bi-exclamation-circle-fill me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
    </div>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer-custom mt-auto">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5><i class="bi bi-bag-heart-fill me-2"></i>ShopMini</h5>
                    <p class="text-white-50">Your one-stop destination for amazing products at great prices.</p>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <h6>Quick Links</h6>
                    <ul class="list-unstyled text-white-50">
                        <li><a href="{{ route('products') }}" class="text-white-50 text-decoration-none hover-link">Products</a></li>
                        <li><a href="{{ route('about') }}" class="text-white-50 text-decoration-none hover-link">About Us</a></li>
                        <li><a href="{{ route('faq') }}" class="text-white-50 text-decoration-none hover-link">FAQ</a></li>
                        <li><a href="{{ route('contact') }}" class="text-white-50 text-decoration-none hover-link">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h6>Contact</h6>
                    <ul class="list-unstyled text-white-50">
                        <li><i class="bi bi-envelope me-2"></i>support@shopmini.com</li>
                        <li><i class="bi bi-phone me-2"></i>+62 812 3456 7890</li>
                    </ul>
                </div>
            </div>
            <hr class="my-4 bg-white-50">
            <div class="text-center text-white-50">
                <small>&copy; {{ date('Y') }} ShopMini. Made with <i class="bi bi-heart-fill text-danger"></i> using
                    Laravel</small>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>