@props(['product'])

<div class="card h-100 shadow-sm">
    <div class="card-body">
        <span class="badge bg-secondary mb-2">{{ $product->category->name }}</span>
        <h5 class="card-title">{{ $product->name }}</h5>
        <p class="card-text text-muted small">{{ Str::limit($product->description, 80) }}</p>
        <p class="card-text">
            <strong class="text-primary fs-5">Rp {{ number_format($product->price, 0, ',', '.') }}</strong>
        </p>
    </div>
    <div class="card-footer bg-white border-0">
        <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary btn-sm w-100">
            <i class="bi bi-eye"></i> View Details
        </a>
    </div>
</div>