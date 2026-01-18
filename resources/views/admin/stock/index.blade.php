@extends('admin.layouts.app')

@section('title', 'Stock Management')
@section('page-title', 'Stock Management')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Product Stock Levels</h5>
        <form method="GET" class="d-flex gap-2">
            <input type="text" name="search" class="form-control" placeholder="Search products..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-search"></i>
            </button>
            <a href="{{ route('admin.stock.index', ['low_stock' => 1]) }}" class="btn btn-warning">
                <i class="bi bi-exclamation-triangle"></i> Low Stock
            </a>
        </form>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Product</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    @if($product->image)
                                        <img src="{{ $product->image }}" alt="{{ $product->name }}" 
                                             class="rounded me-2" style="width: 40px; height: 40px; object-fit: cover;">
                                    @endif
                                    <div>
                                        <strong>{{ $product->name }}</strong>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-primary">{{ $product->category->name }}</span>
                            </td>
                            <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                            <td>
                                <strong class="{{ $product->stock < 10 ? 'text-danger' : 'text-success' }}">
                                    {{ $product->stock }}
                                </strong>
                            </td>
                            <td>
                                @if($product->stock == 0)
                                    <span class="badge bg-danger">Out of Stock</span>
                                @elseif($product->stock < 10)
                                    <span class="badge bg-warning">Low Stock</span>
                                @else
                                    <span class="badge bg-success">In Stock</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.stock.edit', $product) }}" class="btn btn-sm btn-primary">
                                    <i class="bi bi-pencil"></i> Update
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">
                                No products found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer bg-white">
        {{ $products->links() }}
    </div>
</div>
@endsection
