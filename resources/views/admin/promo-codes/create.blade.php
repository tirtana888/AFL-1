@extends('admin.layouts.app')

@section('title', 'Create Promo Code')
@section('page-title', 'Create New Promo Code')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h5 class="mb-0">Create Promo Code</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.promo-codes.store') }}">
                    @csrf
                    
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Promo Code *</label>
                            <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" 
                                   value="{{ old('code') }}" required placeholder="e.g., NEWYEAR2026">
                            @error('code')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Will be converted to uppercase</small>
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label">Discount Type *</label>
                            <select name="discount_type" class="form-select @error('discount_type') is-invalid @enderror" required>
                                <option value="percentage" {{ old('discount_type') == 'percentage' ? 'selected' : '' }}>Percentage (%)</option>
                                <option value="fixed" {{ old('discount_type') == 'fixed' ? 'selected' : '' }}>Fixed Amount (Rp)</option>
                            </select>
                            @error('discount_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label">Discount Value *</label>
                            <input type="number" name="discount_value" class="form-control @error('discount_value') is-invalid @enderror" 
                                   value="{{ old('discount_value') }}" step="0.01" min="0" required>
                            @error('discount_value')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">For percentage: 1-100, For fixed: amount in Rp</small>
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label">Minimum Purchase</label>
                            <input type="number" name="min_purchase" class="form-control @error('min_purchase') is-invalid @enderror" 
                                   value="{{ old('min_purchase', 0) }}" step="1000" min="0">
                            @error('min_purchase')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Leave 0 for no minimum</small>
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label">Usage Limit</label>
                            <input type="number" name="usage_limit" class="form-control @error('usage_limit') is-invalid @enderror" 
                                   value="{{ old('usage_limit') }}" min="1">
                            @error('usage_limit')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Leave empty for unlimited</small>
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label">Valid From *</label>
                            <input type="datetime-local" name="valid_from" class="form-control @error('valid_from') is-invalid @enderror" 
                                   value="{{ old('valid_from') }}" required>
                            @error('valid_from')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label">Valid Until *</label>
                            <input type="datetime-local" name="valid_until" class="form-control @error('valid_until') is-invalid @enderror" 
                                   value="{{ old('valid_until') }}" required>
                            @error('valid_until')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="mt-4 d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle"></i> Create Promo Code
                        </button>
                        <a href="{{ route('admin.promo-codes.index') }}" class="btn btn-secondary">
                            <i class="bi bi-x-circle"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
