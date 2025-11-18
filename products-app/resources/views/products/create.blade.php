@extends('layouts.app')

@section('title','Create Product')

@section('content')
<h2>Create Product</h2>

@include('products.form', [
    'action' => route('products.store'),
    'product' => null
])

@endsection
