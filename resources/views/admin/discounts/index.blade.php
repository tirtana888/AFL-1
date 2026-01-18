@extends('admin.layouts.app')

@section('title', 'Discounts')
@section('page-title', 'Discount Management')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Product Discounts</h5>
        <a href="{{ route('admin.discounts.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Add Discount
        </a>
    </div>
    <div class="card-body">
        <p class="text-muted text-center py-4">
            <i class="bi bi-percent" style="font-size: 3rem; opacity: 0.3;"></i><br>
            Discount feature coming soon. You can manage product discounts here.
        </p>
    </div>
</div>
@endsection
