@extends('admin.layouts.app')

@section('title', 'Profile')
@section('page-title', 'Edit Profile')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h5 class="mb-0">Admin Profile</h5>
            </div>
            <div class="card-body">
                <div class="text-center mb-4">
                    <i class="bi bi-person-circle" style="font-size: 5rem; color: #ccc;"></i>
                </div>
                
                <form>
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" value="{{ Auth::guard('admin')->user()->name }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" value="{{ Auth::guard('admin')->user()->email }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Role</label>
                        <input type="text" class="form-control" value="{{ Auth::guard('admin')->user()->role }}" readonly>
                    </div>
                    
                    <p class="text-muted"><small>Profile editing feature will be available soon.</small></p>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
