@extends('layouts.app')

@section('title','Edit Product')

@section('content')
<h2>Edit Product</h2>

@include('products.form', [
    'action' => route('products.update'),
    'product' => $product
])

@endsection
