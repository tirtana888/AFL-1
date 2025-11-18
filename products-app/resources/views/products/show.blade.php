@extends('layouts.app')

@section('title','Product Detail')

@section('content')

<h2>{{ $product->name }}</h2>
<p>{{ $product->description }}</p>
<p><strong>Price:</strong> ${{ number_format($product->price,2) }}</p>

<a href="{{ route('products') }}" class="btn btn-secondary">Back</a>

@endsection
