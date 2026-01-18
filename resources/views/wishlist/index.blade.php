@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4">
                <i class="bi bi-heart-fill text-danger"></i> Wishlist Saya
            </h2>

            @if($wishlists->isEmpty())
                <div class="alert alert-info text-center py-5">
                    <i class="bi bi-heart" style="font-size: 4rem; opacity: 0.3;"></i>
                    <h4 class="mt-3">Wishlist Anda Kosong</h4>
                    <p class="text-muted">Mulai tambahkan produk favorit Anda!</p>
                    <a href="{{ route('products') }}" class="btn btn-primary mt-3">
                        <i class="bi bi-shop"></i> Belanja Sekarang
                    </a>
                </div>
            @else
                <div class="row">
                    @foreach($wishlists as $wishlist)
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card h-100 shadow-sm hover-lift">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start mb-3">
                                        <span class="badge bg-primary">{{ $wishlist->product->category->name }}</span>
                                        <form action="{{ route('wishlist.destroy', $wishlist) }}" method="POST" onsubmit="return confirm('Hapus dari wishlist?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>

                                    <h5 class="card-title">{{ $wishlist->product->name }}</h5>
                                    <p class="card-text text-muted small">
                                        {{ Str::limit($wishlist->product->description, 100) }}
                                    </p>
                                    
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <h4 class="text-primary mb-0">
                                            Rp {{ number_format($wishlist->product->price, 0, ',', '.') }}
                                        </h4>
                                        <a href="{{ route('products.show', $wishlist->product) }}" class="btn btn-sm btn-outline-primary">
                                            Lihat Detail
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>

<style>
.hover-lift {
    transition: transform 0.2s ease-in-out;
}
.hover-lift:hover {
    transform: translateY(-5px);
}
</style>
@endsection
