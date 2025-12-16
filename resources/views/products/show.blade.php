@extends('layouts.app')

@section('title', $product->name . ' - Laravel E-commerce')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('products') }}">Products</a></li>
                <li class="breadcrumb-item active">{{ $product->name }}</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body text-center bg-light"
                        style="min-height: 400px; display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-image" style="font-size: 100px; color: #ccc;"></i>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <span class="badge bg-secondary mb-2">{{ $product->category->name }}</span>
                <h2>{{ $product->name }}</h2>
                <h3 class="text-primary mb-4">Rp {{ number_format($product->price, 0, ',', '.') }}</h3>

                <div class="mb-4">
                    <h5>Description</h5>
                    <p class="text-muted">{{ $product->description }}</p>
                </div>

                <div class="d-grid gap-2">
                    @auth
                        <form method="POST" action="{{ route('cart.add', $product) }}">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-lg w-100">
                                <i class="bi bi-cart-plus"></i> Add to Cart
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary btn-lg">
                            <i class="bi bi-box-arrow-in-right"></i> Login to Add to Cart
                        </a>
                    @endauth

                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">
                        <i class="bi bi-pencil"></i> Edit Product
                    </a>
                </div>

                <div class="mt-3">
                    <small class="text-muted">
                        <i class="bi bi-clock"></i> Added {{ $product->created_at->diffForHumans() }}
                    </small>
                </div>
            </div>
        </div>
    </div>
@endsection