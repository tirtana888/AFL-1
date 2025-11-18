<form action="{{ $action }}" method="POST">
  @csrf

  @if(!empty($product))
    <input type="hidden" name="id" value="{{ $product->id }}">
  @endif

  <div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" name="name" class="form-control" value="{{ $product->name ?? '' }}" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Description</label>
    <textarea name="description" class="form-control">{{ $product->description ?? '' }}</textarea>
  </div>

  <div class="mb-3">
    <label class="form-label">Price</label>
    <input type="number" step="0.01" name="price" class="form-control" value="{{ $product->price ?? '' }}" required>
  </div>

  <button class="btn btn-primary">Submit</button>
</form>
