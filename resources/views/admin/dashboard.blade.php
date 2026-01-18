@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard Overview')

@section('content')
<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card stat-card border-primary shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Total Products</h6>
                        <h2 class="mb-0">{{ $stats['total_products'] }}</h2>
                    </div>
                    <i class="bi bi-box-seam text-primary" style="font-size: 3rem; opacity: 0.3;"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="card stat-card border-warning shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Low Stock</h6>
                        <h2 class="mb-0 text-warning">{{ $stats['low_stock'] }}</h2>
                    </div>
                    <i class="bi bi-exclamation-triangle text-warning" style="font-size: 3rem; opacity: 0.3;"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="card stat-card border-success shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Total Users</h6>
                        <h2 class="mb-0">{{ $stats['total_users'] }}</h2>
                    </div>
                    <i class="bi bi-people text-success" style="font-size: 3rem; opacity: 0.3;"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="card stat-card border-info shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Total Orders</h6>
                        <h2 class="mb-0">{{ $stats['total_orders'] }}</h2>
                    </div>
                    <i class="bi bi-cart-check text-info" style="font-size: 3rem; opacity: 0.3;"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h5 class="mb-0">Quick Actions</h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <a href="{{ route('admin.stock.index') }}" class="btn btn-outline-primary w-100 p-3">
                            <i class="bi bi-box-seam d-block mb-2" style="font-size: 2rem;"></i>
                            Manage Stock
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('admin.discounts.index') }}" class="btn btn-outline-warning w-100 p-3">
                            <i class="bi bi-percent d-block mb-2" style="font-size: 2rem;"></i>
                            Add Discount
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('admin.blogs.create') }}" class="btn btn-outline-success w-100 p-3">
                            <i class="bi bi-plus-circle d-block mb-2" style="font-size: 2rem;"></i>
                            New Blog Post
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h5 class="mb-0">System Info</h5>
            </div>
            <div class="card-body">
                <ul class="list-unstyled mb-0">
                    <li class="mb-2">
                        <i class="bi bi-check-circle text-success"></i> System Online
                    </li>
                    <li class="mb-2">
                        <i class="bi bi-calendar"></i> {{ now()->format('d M Y') }}
                    </li>
                    <li class="mb-2">
                        <i class="bi bi-clock"></i> {{ now()->format('H:i') }}
                    </li>
                    <li>
                        <i class="bi bi-person-badge"></i> Logged in as: {{ Auth::guard('admin')->user()->email }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
