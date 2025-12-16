@extends('layouts.app')

@section('title', 'Order History - Laravel E-commerce')

@section('content')
    <div class="container">
        <h2><i class="bi bi-clock-history"></i> Order History</h2>

        @if($orders->count() > 0)
            <div class="mt-4">
                @foreach($orders as $order)
                    <div class="card mb-3">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <strong>Order #{{ $order->id }}</strong>
                                <span class="badge bg-{{ $order->status == 'pending' ? 'warning' : 'success' }} ms-2">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </div>
                            <small class="text-muted">{{ $order->created_at->format('d M Y, H:i') }}</small>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <h6>Items:</h6>
                                    <ul class="list-unstyled">
                                        @foreach($order->orderDetails as $detail)
                                            <li class="mb-2">
                                                <strong>{{ $detail->product->name }}</strong>
                                                <span class="text-muted">(x{{ $detail->quantity }})</span>
                                                <br>
                                                <small class="text-muted">
                                                    @ Rp {{ number_format($detail->price_at_purchase, 0, ',', '.') }} =
                                                    Rp {{ number_format($detail->price_at_purchase * $detail->quantity, 0, ',', '.') }}
                                                </small>
                                            </li>
                                        @endforeach
                                    </ul>

                                    <div class="mt-3">
                                        <strong>Shipping Address:</strong>
                                        <p class="text-muted mb-0">{{ $order->shipping_address }}</p>
                                    </div>

                                    <div class="mt-2">
                                        <strong>Payment Method:</strong>
                                        <span class="text-muted">
                                            @if($order->payment_method == 'transfer')
                                                Bank Transfer
                                            @elseif($order->payment_method == 'cod')
                                                Cash on Delivery
                                            @else
                                                E-Wallet
                                            @endif
                                        </span>
                                    </div>
                                </div>

                                <div class="col-md-4 text-end">
                                    <h5 class="text-success">
                                        Total: Rp {{ number_format($order->total_amount, 0, ',', '.') }}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-info mt-4">
                <i class="bi bi-info-circle"></i> You haven't placed any orders yet.
                <a href="{{ route('products') }}" class="alert-link">Start shopping!</a>
            </div>
        @endif
    </div>
@endsection