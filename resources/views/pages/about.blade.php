@extends('layouts.app')

@section('title', 'About Us - ShopMini')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            {{-- Header --}}
            <div class="text-center mb-5">
                <h1 class="display-4 fw-bold mb-3">
                    <i class="bi bi-info-circle text-primary"></i> About ShopMini
                </h1>
                <p class="lead text-muted">Your trusted online electronics marketplace</p>
            </div>

            {{-- Mission Section --}}
            <div class="card mb-4 border-0 shadow-sm">
                <div class="card-body p-5">
                    <h3 class="mb-4"><i class="bi bi-bullseye text-primary"></i> Our Mission</h3>
                    <p class="lead">
                        ShopMini adalah platform e-commerce yang berkomitmen menyediakan produk elektronik berkualitas 
                        dengan harga terbaik untuk pelanggan di seluruh Indonesia.
                    </p>
                    <p>
                        Kami percaya bahwa teknologi harus dapat diakses oleh semua orang. Oleh karena itu, 
                        kami menawarkan berbagai pilihan produk dari smartphone, laptop, hingga peralatan rumah tangga 
                        dengan sistem pembayaran yang mudah dan pengiriman yang cepat.
                    </p>
                </div>
            </div>

            {{-- Why Choose Us --}}
            <div class="card mb-4 border-0 shadow-sm">
                <div class="card-body p-5">
                    <h3 class="mb-4"><i class="bi bi-star text-warning"></i> Why Choose Us?</h3>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <i class="bi bi-shield-check text-success fs-3"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5>100% Original Products</h5>
                                    <p class="text-muted">Semua produk dijamin original dengan garansi resmi.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <i class="bi bi-truck text-primary fs-3"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5>Fast Delivery</h5>
                                    <p class="text-muted">Pengiriman cepat ke seluruh Indonesia dengan tracking real-time.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <i class="bi bi-credit-card text-info fs-3"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5>Secure Payment</h5>
                                    <p class="text-muted">Sistem pembayaran aman dengan berbagai metode pilihan.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <i class="bi bi-headset text-danger fs-3"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5>24/7 Support</h5>
                                    <p class="text-muted">Tim customer service siap membantu Anda kapan saja.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Statistics --}}
            <div class="row g-4 mb-4">
                <div class="col-md-3 col-6">
                    <div class="card text-center border-0 shadow-sm">
                        <div class="card-body">
                            <h2 class="text-primary mb-0">10K+</h2>
                            <p class="text-muted mb-0">Happy Customers</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="card text-center border-0 shadow-sm">
                        <div class="card-body">
                            <h2 class="text-success mb-0">500+</h2>
                            <p class="text-muted mb-0">Products</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="card text-center border-0 shadow-sm">
                        <div class="card-body">
                            <h2 class="text-warning mb-0">50+</h2>
                            <p class="text-muted mb-0">Brands</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="card text-center border-0 shadow-sm">
                        <div class="card-body">
                            <h2 class="text-info mb-0">4.8★</h2>
                            <p class="text-muted mb-0">Average Rating</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Contact CTA --}}
            <div class="card bg-primary text-white border-0 shadow-sm">
                <div class="card-body p-5 text-center">
                    <h3 class="mb-3">Have Questions?</h3>
                    <p class="mb-4">Our team is here to help you find the perfect product.</p>
                    <a href="{{ route('contact') }}" class="btn btn-light btn-lg">
                        <i class="bi bi-envelope"></i> Contact Us
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
