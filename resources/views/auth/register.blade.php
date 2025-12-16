@extends('layouts.app')

@section('title', 'Register - ShopMini')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="text-center mb-4">
                    <div class="d-inline-flex p-3 rounded-circle mb-3"
                        style="background: linear-gradient(135deg, #11998e20, #38ef7d20);">
                        <i class="bi bi-person-plus" style="font-size: 48px; color: #11998e;"></i>
                    </div>
                    <h2 class="fw-bold">Create Account</h2>
                    <p class="text-muted">Join us and start shopping today</p>
                </div>

                <div class="card border-0 shadow-lg">
                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label fw-semibold">
                                    <i class="bi bi-person me-1"></i>Full Name
                                </label>
                                <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name') }}" placeholder="John Doe" required
                                    autofocus>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold">
                                    <i class="bi bi-envelope me-1"></i>Email Address
                                </label>
                                <input type="email"
                                    class="form-control form-control-lg @error('email') is-invalid @enderror" id="email"
                                    name="email" value="{{ old('email') }}" placeholder="your@email.com" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
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

                            <div class="mb-4">
                                <label for="password_confirmation" class="form-label fw-semibold">
                                    <i class="bi bi-lock-fill me-1"></i>Confirm Password
                                </label>
                                <input type="password" class="form-control form-control-lg" id="password_confirmation"
                                    name="password_confirmation" placeholder="••••••••" required>
                            </div>

                            <div class="d-grid mb-4">
                                <button type="submit" class="btn btn-success btn-lg">
                                    <i class="bi bi-person-plus me-2"></i>Create Account
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <p class="text-muted mb-0">
                        Already have an account?
                        <a href="{{ route('login') }}" class="text-primary fw-semibold text-decoration-none">
                            Sign in <i class="bi bi-arrow-right"></i>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection