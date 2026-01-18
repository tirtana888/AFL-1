@extends('layouts.app')

@section('title', 'Login - ShopMini')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="text-center mb-4">
                    <div class="d-inline-flex p-3 rounded-circle mb-3"
                        style="background: linear-gradient(135deg, #667eea20, #764ba220);">
                        <i class="bi bi-person-circle" style="font-size: 48px; color: #667eea;"></i>
                    </div>
                    <h2 class="fw-bold">Welcome Back!</h2>
                    <p class="text-muted">Sign in to continue shopping</p>
                </div>

                <div class="card border-0 shadow-lg">
                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-4">
                                <label for="email" class="form-label fw-semibold">
                                    <i class="bi bi-envelope me-1"></i>Email Address
                                </label>
                                <input type="email"
                                    class="form-control form-control-lg @error('email') is-invalid @enderror" id="email"
                                    name="email" value="{{ old('email') }}" placeholder="your@email.com" required autofocus>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label fw-semibold">
                                    <i class="bi bi-lock me-1"></i>Password
                                </label>
                                <input type="password"
                                    class="form-control form-control-lg @error('password') is-invalid @enderror"
                                    id="password" name="password" placeholder="••••••••" required>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4 form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember">Remember me</label>
                            </div>

                            <div class="d-grid mb-4">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="bi bi-box-arrow-in-right me-2"></i>Sign In
                                </button>
                            </div>
                        </form>
                        <div class="d-grid mb-3">
                            <button type="button" onclick="fillUserDemo()" class="btn btn-outline-secondary">
                                <i class="bi bi-magic me-2"></i>Fill Demo Credentials
                            </button>
                        </div>

                        <script>
                            function fillUserDemo() {
                                document.getElementById('email').value = 'user@ciputra.com';
                                document.getElementById('password').value = 'ALP4';
                            }
                        </script>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <p class="text-muted mb-0">
                        Don't have an account?
                        <a href="{{ route('register') }}" class="text-primary fw-semibold text-decoration-none">
                            Create one now <i class="bi bi-arrow-right"></i>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection