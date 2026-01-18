@extends('layouts.app')

@section('title', $product->name . ' - Laravel E-commerce')

@section('content')
    <div class="container py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('products') }}">Products</a></li>
                <li class="breadcrumb-item active">{{ $product->name }}</li>
            </ol>
        </nav>

        <div class="row">
            {{-- Product Image --}}
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center bg-light p-0 position-relative overflow-hidden"
                        style="min-height: 400px; display: flex; align-items: center; justify-content: center;">
                        @if($product->image)
                            <img src="{{ $product->image }}" alt="{{ $product->name }}" class="img-fluid w-100 h-100 object-fit-cover">
                        @else
                            <i class="bi bi-image" style="font-size: 100px; color: #ccc;"></i>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Product Details --}}
            <div class="col-md-6">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <span class="badge bg-secondary">{{ $product->category->name }}</span>
                    @auth
                        <button onclick="toggleWishlist({{ $product->id }})" id="wishlist-btn-{{ $product->id }}" 
                                class="btn btn-sm {{ auth()->user()->wishlists()->where('product_id', $product->id)->exists() ? 'btn-danger' : 'btn-outline-danger' }}">
                            <i class="bi bi-heart{{ auth()->user()->wishlists()->where('product_id', $product->id)->exists() ? '-fill' : '' }}"></i>
                            <span id="wishlist-text-{{ $product->id }}">
                                {{ auth()->user()->wishlists()->where('product_id', $product->id)->exists() ? 'Wishlist' : 'Add to Wishlist' }}
                            </span>
                        </button>
                    @endauth
                </div>

                <h2>{{ $product->name }}</h2>
                
                {{-- Rating Display --}}
                <div class="mb-3">
                    @php
                        $avgRating = $product->averageRating();
                        $reviewCount = $product->reviewCount();
                    @endphp
                    <div class="d-flex align-items-center">
                        <div class="stars me-2">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="bi bi-star{{ $i <= round($avgRating) ? '-fill text-warning' : '' }}"></i>
                            @endfor
                        </div>
                        <span class="text-muted">
                            {{ number_format($avgRating, 1) }} ({{ $reviewCount }} {{ $reviewCount == 1 ? 'review' : 'reviews' }})
                        </span>
                    </div>
                </div>

                <h3 class="text-primary mb-4">Rp {{ number_format($product->price, 0, ',', '.') }}</h3>

                <div class="mb-4">
                    <h5>Description</h5>
                    <p class="text-muted">{{ $product->description }}</p>
                </div>

                <div class="d-grid gap-2">
                    @auth
                        <div class="row g-2">
                            <div class="col-md-6">
                                <form method="POST" action="{{ route('cart.add', $product) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-primary btn-lg w-100">
                                        <i class="bi bi-cart-plus"></i> Add to Cart
                                    </button>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <form method="POST" action="{{ route('checkout.direct', $product) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-primary btn-lg w-100">
                                        <i class="bi bi-lightning-charge"></i> Buy Now
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary btn-lg">
                            <i class="bi bi-box-arrow-in-right"></i> Login to Buy
                        </a>
                    @endauth

                    @auth
                        @if(Auth::guard('admin')->check())
                        <a href="{{ route('admin.stock.edit', $product->id) }}" class="btn btn-warning">
                            <i class="bi bi-pencil"></i> Edit Product (Admin)
                        </a>
                        @endif
                    @endauth
                </div>

                {{-- Social Share --}}
                <div class="mt-4 pt-3 border-top">
                    <h6>Share this product:</h6>
                    <div class="d-flex gap-2">
                        <a href="https://wa.me/?text={{ urlencode($product->name . ' - ' . route('products.show', $product)) }}" 
                           target="_blank" class="btn btn-sm btn-success rounded-circle" title="Share to WhatsApp">
                            <i class="bi bi-whatsapp"></i>
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('products.show', $product)) }}" 
                           target="_blank" class="btn btn-sm btn-primary rounded-circle" title="Share to Facebook">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?text={{ urlencode($product->name) }}&url={{ urlencode(route('products.show', $product)) }}" 
                           target="_blank" class="btn btn-sm btn-info text-white rounded-circle" title="Share to X (Twitter)">
                            <i class="bi bi-twitter-x"></i>
                        </a>
                        <a href="https://t.me/share/url?url={{ urlencode(route('products.show', $product)) }}&text={{ urlencode($product->name) }}" 
                           target="_blank" class="btn btn-sm btn-primary rounded-circle" style="background-color: #0088cc;" title="Share to Telegram">
                            <i class="bi bi-telegram"></i>
                        </a>
                    </div>
                </div>

                {{-- Price Alert --}}
                @auth
                    <div class="mt-3">
                        @php
                            $hasAlert = \App\Models\PriceAlert::where('user_id', Auth::id())->where('product_id', $product->id)->first();
                        @endphp
                        
                        @if($hasAlert)
                            <form action="{{ route('price-alerts.destroy', $hasAlert) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-secondary w-100">
                                    <i class="bi bi-bell-slash"></i> Remove Price Alert
                                </button>
                            </form>
                        @else
                            <button type="button" class="btn btn-sm btn-outline-info w-100" data-bs-toggle="modal" data-bs-target="#priceAlertModal">
                                <i class="bi bi-bell"></i> Notify me of price drops
                            </button>
                        @endif
                    </div>
                @endauth

                <div class="mt-3">
                    <small class="text-muted">
                        <i class="bi bi-clock"></i> Added {{ $product->created_at->diffForHumans() }}
                    </small>
                </div>
            </div>
        </div>

        {{-- Reviews Section --}}
        <div class="row mt-5">
            <div class="col-12">
                <h4 class="mb-4">
                    <i class="bi bi-chat-left-text"></i> Customer Reviews
                </h4>

                {{-- Write Review Form (Only for logged in users who haven't reviewed) --}}
                @auth
                    @php
                        $userReview = $product->reviews()->where('user_id', auth()->id())->first();
                    @endphp
                    
                    @if($userReview)
                        {{-- Edit existing review --}}
                        <div class="card mb-4 border-warning">
                            <div class="card-header bg-warning text-white">
                                <i class="bi bi-pencil"></i> Your Review
                            </div>
                            <div class="card-body">
                                <form action="{{ route('reviews.update', $userReview) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label class="form-label">Rating</label>
                                        <div class="star-rating">
                                            @for($i = 5; $i >= 1; $i--)
                                                <input type="radio" name="rating" value="{{ $i }}" id="edit-star{{ $i }}" 
                                                       {{ $userReview->rating == $i ? 'checked' : '' }} required>
                                                <label for="edit-star{{ $i }}">★</label>
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Review (Optional)</label>
                                        <textarea name="review_text" class="form-control" rows="3" 
                                                  placeholder="Share your experience...">{{ $userReview->review_text }}</textarea>
                                    </div>
                                    <div class="d-flex gap-2">
                                        <button type="submit" class="btn btn-warning">
                                            <i class="bi bi-save"></i> Update Review
                                        </button>
                                        <button type="button" class="btn btn-outline-danger" 
                                                onclick="if(confirm('Delete your review?')) document.getElementById('delete-review-form').submit();">
                                            <i class="bi bi-trash"></i> Delete
                                        </button>
                                    </div>
                                </form>
                                <form id="delete-review-form" action="{{ route('reviews.destroy', $userReview) }}" method="POST" class="d-none">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </div>
                    @else
                        {{-- Create new review --}}
                        <div class="card mb-4 border-primary">
                            <div class="card-header bg-primary text-white">
                                <i class="bi bi-star"></i> Write a Review
                            </div>
                            <div class="card-body">
                                <form action="{{ route('reviews.store', $product) }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Rating *</label>
                                        <div class="star-rating">
                                            @for($i = 5; $i >= 1; $i--)
                                                <input type="radio" name="rating" value="{{ $i }}" id="star{{ $i }}" required>
                                                <label for="star{{ $i }}">★</label>
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Review (Optional)</label>
                                        <textarea name="review_text" class="form-control" rows="3" 
                                                  placeholder="Share your experience with this product..."></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-send"></i> Submit Review
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endif
                @else
                    <div class="alert alert-info">
                        <i class="bi bi-info-circle"></i> 
                        <a href="{{ route('login') }}">Login</a> to write a review
                    </div>
                @endauth

                {{-- Display All Reviews --}}
                <div class="reviews-list">
                    @forelse($product->reviews()->latest()->get() as $review)
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h6 class="mb-1">{{ $review->user->name }}</h6>
                                        <div class="stars-display mb-2">
                                            @for($i = 1; $i <= 5; $i++)
                                                <i class="bi bi-star{{ $i <= $review->rating ? '-fill text-warning' : '' }}"></i>
                                            @endfor
                                        </div>
                                    </div>
                                    <small class="text-muted">{{ $review->created_at->diffForHumans() }}</small>
                                </div>
                                @if($review->review_text)
                                    <p class="mb-0 mt-2">{{ $review->review_text }}</p>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="text-center text-muted py-4">
                            <i class="bi bi-chat" style="font-size: 3rem; opacity: 0.3;"></i>
                            <p class="mt-2">No reviews yet. Be the first to review!</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    {{-- Star Rating CSS --}}
    <style>
        .star-rating {
            display: flex;
            flex-direction: row-reverse;
            justify-content: flex-end;
            font-size: 2rem;
        }
        .star-rating input {
            display: none;
        }
        .star-rating label {
            color: #ddd;
            cursor: pointer;
            transition: color 0.2s;
        }
        .star-rating input:checked ~ label,
        .star-rating label:hover,
        .star-rating label:hover ~ label {
            color: #ffc107;
        }
    </style>

    {{-- Wishlist Toggle Script --}}
    <script>
        function toggleWishlist(productId) {
            fetch(`/wishlist/toggle/${productId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                const btn = document.getElementById(`wishlist-btn-${productId}`);
                const icon = btn.querySelector('i');
                const text = document.getElementById(`wishlist-text-${productId}`);
                
                if(data.action === 'added') {
                    btn.classList.remove('btn-outline-danger');
                    btn.classList.add('btn-danger');
                    icon.classList.add('bi-heart-fill');
                    icon.classList.remove('bi-heart');
                    text.textContent = 'Wishlist';
                } else {
                    btn.classList.remove('btn-danger');
                    btn.classList.add('btn-outline-danger');
                    icon.classList.remove('bi-heart-fill');
                    icon.classList.add('bi-heart');
                    text.textContent = 'Add to Wishlist';
                }
                
                // Show toast notification
                alert(data.message);
            });
        }
    </script>
@endsection