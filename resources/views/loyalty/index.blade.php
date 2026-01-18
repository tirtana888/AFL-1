@extends('layouts.app')

@section('title', 'Loyalty Points')

@section('content')
<div class="container py-4">
    <h2 class="mb-4"><i class="bi bi-trophy"></i> Loyalty Program</h2>
    
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card shadow-sm border-primary">
                <div class="card-body text-center">
                    <h6 class="text-muted">Your Points Balance</h6>
                    <h1 class="text-primary mb-0">{{ number_format($balance) }}</h1>
                    <small class="text-muted">points</small>
                </div>
            </div>
        </div>
        
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Redeem Rewards</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="card border">
                                <div class="card-body text-center">
                                    <h6>Rp 10,000</h6>
                                    <p class="text-muted small">1,000 points</p>
                                    <form method="POST" action="{{ route('loyalty.redeem') }}">
                                        @csrf
                                        <input type="hidden" name="points" value="1000">
                                        <button type="submit" class="btn btn-sm btn-primary" {{ $balance < 1000 ? 'disabled' : '' }}>
                                            Redeem
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border">
                                <div class="card-body text-center">
                                    <h6>Rp 60,000</h6>
                                    <p class="text-muted small">5,000 points</p>
                                    <form method="POST" action="{{ route('loyalty.redeem') }}">
                                        @csrf
                                        <input type="hidden" name="points" value="5000">
                                        <button type="submit" class="btn btn-sm btn-primary" {{ $balance < 5000 ? 'disabled' : '' }}>
                                            Redeem
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border">
                                <div class="card-body text-center">
                                    <h6>Rp 150,000</h6>
                                    <p class="text-muted small">10,000 points</p>
                                    <form method="POST" action="{{ route('loyalty.redeem') }}">
                                        @csrf
                                        <input type="hidden" name="points" value="10000">
                                        <button type="submit" class="btn btn-sm btn-primary" {{ $balance < 10000 ? 'disabled' : '' }}>
                                            Redeem
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($vouchers->count() > 0)
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-white">
            <h5 class="mb-0">My Vouchers</h5>
        </div>
        <div class="card-body">
            <div class="row g-3">
                @foreach($vouchers as $voucher)
                <div class="col-md-4">
                    <div class="card border-success">
                        <div class="card-body">
                            <h6>{{ $voucher->code }}</h6>
                            <p class="mb-1">Discount: Rp {{ number_format($voucher->discount_amount) }}</p>
                            <small class="text-muted">Expires: {{ $voucher->expires_at->format('d M Y') }}</small>
                            @if($voucher->is_used)
                                <span class="badge bg-secondary">Used</span>
                            @else
                                <span class="badge bg-success">Active</span>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-header bg-white">
            <h5 class="mb-0">Points History</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Date</th>
                            <th>Description</th>
                            <th>Points</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($history as $item)
                        <tr>
                            <td>{{ $item->created_at->format('d M Y H:i') }}</td>
                            <td>{{ $item->description }}</td>
                            <td>
                                <span class="badge {{ $item->type == 'earn' ? 'bg-success' : 'bg-danger' }}">
                                    {{ $item->type == 'earn' ? '+' : '' }}{{ $item->points }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center py-4 text-muted">No history yet</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer bg-white">
            {{ $history->links() }}
        </div>
    </div>
</div>
@endsection
