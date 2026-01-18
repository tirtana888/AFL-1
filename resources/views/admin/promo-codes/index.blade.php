@extends('admin.layouts.app')

@section('title', 'Promo Codes')
@section('page-title', 'Promo Code Management')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Promo Codes</h5>
        <a href="{{ route('admin.promo-codes.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Create Promo Code
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Code</th>
                        <th>Discount</th>
                        <th>Min Purchase</th>
                        <th>Usage</th>
                        <th>Valid Period</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($promoCodes as $promo)
                        <tr>
                            <td><strong>{{ $promo->code }}</strong></td>
                            <td>
                                @if($promo->discount_type === 'percentage')
                                    {{ $promo->discount_value }}%
                                @else
                                    Rp {{ number_format($promo->discount_value) }}
                                @endif
                            </td>
                            <td>Rp {{ number_format($promo->min_purchase) }}</td>
                            <td>
                                {{ $promo->used_count }}
                                @if($promo->usage_limit)
                                    / {{ $promo->usage_limit }}
                                @else
                                    / ∞
                                @endif
                            </td>
                            <td>
                                <small>
                                    {{ $promo->valid_from->format('d M Y') }}<br>
                                    to {{ $promo->valid_until->format('d M Y') }}
                                </small>
                            </td>
                            <td>
                                @if($promo->isValid())
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.promo-codes.edit', $promo) }}" class="btn btn-sm btn-primary">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.promo-codes.destroy', $promo) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this promo code?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">
                                No promo codes yet. Create your first one!
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer bg-white">
        {{ $promoCodes->links() }}
    </div>
</div>
@endsection
