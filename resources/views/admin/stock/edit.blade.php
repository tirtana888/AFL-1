@extends('admin.layouts.app')

@section('title', 'Update Stock')
@section('page-title', 'Update Stock - ' . $product->name)

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h5 class="mb-0">Update Stock Level</h5>
            </div>
            <div class="card-body">
                <div class="text-center mb-4">
                    @if($product->image)
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" 
                             class="rounded" style="max-width: 200px;">
                    @endif
                    <h5 class="mt-3">{{ $product->name }}</h5>
                    <p class="text-muted">{{ $product->category->name }}</p>
                </div>
                
                <form method="POST" action="{{ route('admin.stock.update', $product) }}">
                    @csrf
                    @method('PUT')
                    
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Current Stock</label>
                            <input type="text" class="form-control" value="{{ $product->stock }}" disabled>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Current Price</label>
                            <input type="text" class="form-control" value="Rp {{ number_format($product->price, 0) }}" disabled>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">New Stock Level *</label>
                        <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror" 
                               value="{{ old('stock', $product->stock) }}" min="0" required autofocus>
                        @error('stock')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">New Price (Rp) *</label>
                        <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" 
                               value="{{ old('price', (int)$product->price) }}" min="0" required>
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Enter the new price for this product</small>
                    </div>
                    
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle"></i> Update Stock & Price
                        </button>
                        <a href="{{ route('admin.stock.index') }}" class="btn btn-secondary">
                            <i class="bi bi-x-circle"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
