@extends('layouts.app')

@section('title', 'Products - ShopMini E-commerce')

@section('content')
    <div class="container py-4">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold mb-1">
                    <i class="bi bi-grid me-2 text-primary"></i>Our Products
                </h2>
                <p class="text-muted mb-0">Discover our amazing collection</p>
            </div>
            @if(Auth::guard('admin')->check())
            <a href="{{ route('products.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg me-2"></i>Add Product
            </a>
            @endif
        </div>

        <!-- Search & Filter Card -->
        <div class="card mb-4 border-0 shadow-sm">
            <div class="card-body p-4">
                <form method="GET" action="{{ route('products') }}">
                    <div class="row g-3 align-items-end">
                        <!-- Search -->
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">
                                <i class="bi bi-search me-1"></i>Search
                            </label>
                            <input type="text" class="form-control" name="search" placeholder="Search products..."
                                value="{{ request('search') }}">
                        </div>

                        <!-- Price Range -->
                        <div class="col-md-2">
                            <label class="form-label fw-semibold">Min Price</label>
                            <input type="number" class="form-control" name="min_price" placeholder="Rp Min"
                                value="{{ request('min_price') }}">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label fw-semibold">Max Price</label>
                            <input type="number" class="form-control" name="max_price" placeholder="Rp Max"
                                value="{{ request('max_price') }}">
                        </div>

                        <!-- Sort -->
                        <div class="col-md-2">
                            <label class="form-label fw-semibold">Sort By</label>
                            <select class="form-select" name="sort">
                                <option value="">Default</option>
                                <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Name A-Z
                                </option>
                                <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Name Z-A
                                </option>
                                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price: Low to
                                    High</option>
                                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price: High
                                    to Low</option>
                            </select>
                        </div>

                        <!-- Buttons -->
                        <div class="col-md-2">
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary flex-grow-1">
                                    <i class="bi bi-funnel"></i> Filter
                                </button>
                                <a href="{{ route('products') }}" class="btn btn-outline-secondary">
                                    <i class="bi bi-x-lg"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Products Grid -->
        @if($products->count() > 0)
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 mb-4">
                @foreach($products as $product)
                    <div class="col fade-in">
                        <div class="card h-100 product-card border-0 shadow-sm">
                            <!-- Product Image -->
                            <div class="card-img-top position-relative overflow-hidden" style="height: 200px;">
                                @if($product->image)
                                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-100 h-100 object-fit-cover transition-transform">
                                @else
                                    <div class="w-100 h-100 d-flex align-items-center justify-content-center bg-light"
                                         style="background: linear-gradient(135deg, #667eea15 0%, #764ba215 100%);">
                                        <i class="bi bi-box-seam" style="font-size: 60px; color: #667eea40;"></i>
                                    </div>
                                @endif
                                
                                {{-- Hover Overlay --}}
                                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center bg-dark bg-opacity-25 opacity-0 hover-opacity transition-opacity">
                                    <a href="{{ route('products.show', $product) }}" class="btn btn-light rounded-circle shadow-sm">
                                        <i class="bi bi-eye text-primary"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="card-body">
                                <span class="badge bg-primary bg-opacity-10 text-primary mb-2">
                                    {{ $product->category->name ?? 'General' }}
                                </span>
                                <h6 class="card-title fw-bold mb-2">
                                    <a href="{{ route('products.show', $product) }}"
                                        class="text-decoration-none text-dark stretched-link">
                                        {{ Str::limit($product->name, 25) }}
                                    </a>
                                </h6>
                                <p class="card-text text-muted small mb-3">
                                    {{ Str::limit($product->description, 50) }}
                                </p>
                            </div>

                            <div class="card-footer bg-transparent border-0 pt-0">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="price-tag">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                    @auth
                                        <form method="POST" action="{{ route('cart.add', $product) }}" class="position-relative"
                                            style="z-index: 2;">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-success rounded-circle" title="Add to Cart">
                                                <i class="bi bi-cart-plus"></i>
                                            </button>
                                        </form>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center">
                {{ $products->withQueryString()->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <div class="mb-4">
                    <i class="bi bi-inbox" style="font-size: 80px; color: #dee2e6;"></i>
                </div>
                <h4 class="text-muted">No products found</h4>
                <p class="text-muted">Try adjusting your search or filter criteria</p>
                <a href="{{ route('products') }}" class="btn btn-primary">
                    <i class="bi bi-arrow-left me-2"></i>Clear Filters
                </a>
            </div>
        @endif
    </div>
@endsection