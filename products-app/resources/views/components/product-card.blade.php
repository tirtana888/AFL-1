<div class="card h-100">
  <div class="card-body d-flex flex-column">
    <h5 class="card-title">{{ $product->name }}</h5>
    <p class="card-text">{{ Str::limit($product->description, 100) }}</p>

    <p class="fw-bold mt-auto">Price: ${{ number_format($product->price, 2) }}</p>

    <a href="{{ route('products.show', ['id'=>$product->id]) }}" class="btn btn-primary btn-sm">View</a>
    <a href="{{ route('products.edit', ['id'=>$product->id]) }}" class="btn btn-secondary btn-sm mt-1">Edit</a>
  </div>
</div>
