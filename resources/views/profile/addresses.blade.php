@extends('layouts.app')

@section('title', 'Manage Addresses - ShopMini')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold mb-0">My Addresses</h2>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAddressModal">
                    <i class="bi bi-plus-circle"></i> Add New Address
                </button>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-4">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="row g-3">
                @forelse($addresses as $address)
                    <div class="col-12">
                        <div class="card border-0 shadow-sm {{ $address->is_default ? 'border-start border-4 border-success' : '' }}">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <div class="d-flex align-items-center mb-2">
                                            <span class="badge bg-secondary me-2">{{ $address->name }}</span>
                                            <h5 class="mb-0 fw-bold">{{ $address->recipient_name }}</h5>
                                            @if($address->is_default)
                                                <span class="badge bg-success ms-2">Default</span>
                                            @endif
                                        </div>
                                        <p class="mb-1 text-muted">{{ $address->phone }}</p>
                                        <p class="mb-0">{{ $address->address }}</p>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn btn-link text-dark p-0" data-bs-toggle="dropdown">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            @if(!$address->is_default)
                                                <li>
                                                    <form action="{{ route('addresses.default', $address) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="dropdown-item">Set as Default</button>
                                                    </form>
                                                </li>
                                            @endif
                                            <li>
                                                <form action="{{ route('addresses.destroy', $address) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item text-danger" onclick="return confirm('Delete this address?')">Delete</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <div class="mb-3">
                            <i class="bi bi-geo-alt text-muted" style="font-size: 3rem; opacity: 0.3;"></i>
                        </div>
                        <h5 class="text-muted">No addresses saved yet</h5>
                        <p class="text-muted">Add your shipping addresses for a faster checkout experience.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

<!-- Add Address Modal -->
<div class="modal fade" id="addAddressModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content border-0 shadow">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Add New Address</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('addresses.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Address Name (e.g., Home, Office) *</label>
                        <input type="text" name="name" class="form-control" placeholder="Home" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Recipient Name *</label>
                        <input type="text" name="recipient_name" class="form-control" placeholder="Full Name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone Number *</label>
                        <input type="text" name="phone" class="form-control" placeholder="0812..." required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Complete Address *</label>
                        <textarea name="address" class="form-control" rows="3" placeholder="Street, City, Postal Code" required></textarea>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="is_default" id="is_default">
                        <label class="form-check-label" for="is_default">
                            Set as default address
                        </label>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary px-4">Save Address</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
