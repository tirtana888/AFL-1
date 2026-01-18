@extends('admin.layouts.app')

@section('title', 'Blog Posts')
@section('page-title', 'Blog Management')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Blog Posts</h5>
        <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> New Post
        </a>
    </div>
    <div class="card-body">
        <p class="text-muted text-center py-4">
            <i class="bi bi-newspaper" style="font-size: 3rem; opacity: 0.3;"></i><br>
            Blog feature coming soon. You can create and manage blog posts here.
        </p>
    </div>
</div>
@endsection
