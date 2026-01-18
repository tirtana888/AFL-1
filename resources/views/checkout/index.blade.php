@extends('layouts.app')

@section('title', 'Checkout - ShopMini')

@section('content')
    <div class="container py-4">
        <div class="d-flex align-items-center mb-4">
            <div class="d-inline-flex p-3 rounded-circle me-3"
                style="background: linear-gradient(135deg, #11998e20, #38ef7d20);">
                <i class="bi bi-credit-card" style="font-size: 32px; color: #11998e;"></i>
            </div>
            <div>
                <h2 class="fw-bold mb-0">Checkout</h2>
                <p class="text-muted mb-0">Complete your order</p>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-transparent border-0 pt-4 pb-0">
                        <h5 class="fw-bold mb-0">
                            <i class="bi bi-truck me-2 text-primary"></i>Shipping Information
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('checkout.store') }}">
                            @csrf

                            <div class="mb-4">
                                <label for="shipping_address" class="form-label fw-semibold">
                                    Shipping Address <span class="text-danger">*</span>
                                </label>
                                <textarea class="form-control @error('shipping_address') is-invalid @enderror"
                                    id="shipping_address" name="shipping_address" rows="4"
                                    placeholder="Enter your complete shipping address including street, city, postal code..."
                                    required>{{ old('shipping_address') }}</textarea>
                                @error('shipping_address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-semibold">
                                    Payment Method <span class="text-danger">*</span>
                                </label>
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <input type="radio" class="btn-check" name="payment_method" id="transfer"
                                            value="transfer" {{ old('payment_method') == 'transfer' ? 'checked' : '' }}
                                            required>
                                        <label class="btn btn-outline-primary w-100 py-3" for="transfer">
                                            <i class="bi bi-bank d-block mb-2" style="font-size: 24px;"></i>
                                            Bank Transfer
                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="radio" class="btn-check" name="payment_method" id="cod" value="cod" {{ old('payment_method') == 'cod' ? 'checked' : '' }}>
                                        <label class="btn btn-outline-primary w-100 py-3" for="cod">
                                            <i class="bi bi-cash-coin d-block mb-2" style="font-size: 24px;"></i>
                                            Cash on Delivery
                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="radio" class="btn-check" name="payment_method" id="ewallet"
                                            value="ewallet" {{ old('payment_method') == 'ewallet' ? 'checked' : '' }}>
                                        <label class="btn btn-outline-primary w-100 py-3" for="ewallet">
                                            <i class="bi bi-phone d-block mb-2" style="font-size: 24px;"></i>
                                            E-Wallet
                                        </label>
                                    </div>
                                </div>
                                @error('payment_method')
                                    <div class="text-danger small mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <hr class="my-4">

                            <div class="d-flex gap-3">
                                <a href="{{ route('cart.index') }}" class="btn btn-outline-secondary btn-lg">
                                    <i class="bi bi-arrow-left me-2"></i>Back to Cart
                                </a>
                                <button type="submit" class="btn btn-success btn-lg flex-grow-1">
                                    <i class="bi bi-check-circle me-2"></i>Place Order
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-transparent border-0 pt-4 pb-2">
                        <h5 class="fw-bold mb-0">Order Summary</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            @foreach($cartItems as $item)
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <div>
                                        <span class="small">{{ Str::limit($item->product->name, 20) }}</span>
                                        <span class="badge bg-light text-dark ms-1">x{{ $item->quantity }}</span>
                                    </div>
                                    <span class="small">Rp
                                        {{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}</span>
                                </div>
                            @endforeach
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Subtotal</span>
                            <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                        @if($discount > 0)
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Discount ({{ $promoCode->code }})</span>
                                <span class="text-danger">-Rp {{ number_format($discount, 0, ',', '.') }}</span>
                            </div>
                        @endif
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Shipping</span>
                            <span class="text-success">Free</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <span class="fw-bold">Total</span>
                            <span class="fw-bold text-success fs-4">Rp {{ number_format($total - $discount, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm mt-3">
                    <div class="card-header bg-transparent border-0 pt-3 pb-0">
                        <h6 class="fw-bold mb-0">Promo Code</h6>
                    </div>
                    <div class="card-body">
                        @if(session('applied_promo'))
                            <div class="d-flex align-items-center justify-content-between bg-light p-2 rounded">
                                <span class="fw-bold text-success">{{ session('applied_promo') }}</span>
                                <form action="{{ route('checkout.removePromo') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-link text-danger p-0">Remove</button>
                                </form>
                            </div>
                        @else
                            <form action="{{ route('checkout.applyPromo') }}" method="POST">
                                @csrf
                                <div class="input-group">
                                    <input type="text" name="code" class="form-control" placeholder="Enter code">
                                    <button class="btn btn-outline-primary" type="submit">Apply</button>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>

                <div class="card border-0 shadow-sm mt-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center text-success mb-2">
                            <i class="bi bi-shield-check me-2"></i>
                            <span class="small fw-semibold">Secure Payment</span>
                        </div>
                        <p class="text-muted small mb-0">Your payment information is encrypted and secure.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection