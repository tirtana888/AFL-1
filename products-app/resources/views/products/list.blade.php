@extends('layouts.app')

@section('title','Products List')

@section('content')

<div class="d-flex justify-content-between mb-3">
  <h2>Products</h2>
  <a href="{{ route('products.create') }}" class="btn btn-success">Add new product</a>
</div>

<div class="row row-cols-1 row-cols-md-4 g-3">
  @foreach($products as $product)
    <div class="col">
      @include('components.product-card', ['product'=>$product])
    </div>
  @endforeach
</div>

@endsection
