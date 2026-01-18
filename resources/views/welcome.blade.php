@extends('layouts.app')

@section('title', 'Welcome - ShopMini E-commerce')

@section('content')
    <!-- Hero Section 2.0 -->
    <div class="position-relative overflow-hidden pt-5 mt-5">
        <!-- Animated Background Mesh -->
        <div class="position-absolute top-0 start-0 w-100 h-100" style="z-index: -1;">
            <div class="position-absolute top-0 end-0 bg-primary opacity-25 rounded-circle blur-3xl" style="width: 600px; height: 600px; filter: blur(100px); transform: translate(30%, -30%);"></div>
            <div class="position-absolute bottom-0 start-0 bg-info opacity-20 rounded-circle blur-3xl" style="width: 500px; height: 500px; filter: blur(80px); transform: translate(-30%, 30%);"></div>
        </div>

        <div class="container py-5">
            <div class="row align-items-center min-vh-75">
                <div class="col-lg-6" data-aos="fade-right">
                    <span class="badge bg-white text-primary border border-primary-subtle rounded-pill px-3 py-2 mb-3 shadow-sm">
                        <i class="bi bi-stars me-1"></i> New Collection 2026
                    </span>
                    <h1 class="display-3 fw-bolder mb-3 lh-tight">
                        Elevate Your <br>
                        <span class="text-transparent bg-clip-text bg-gradient-primary">Lifestyle Today.</span>
                    </h1>
                    <p class="lead text-muted mb-4 opacity-75" style="max-width: 90%;">
                        Discover a curated selection of premium products designed to enhance your everyday life. Quality meets aesthetics.
                    </p>
                    <div class="d-flex gap-3">
                        <a href="{{ route('products') }}" class="btn btn-primary btn-lg rounded-pill px-5 shadow-lg hover-lift">
                            Shop Now
                        </a>
                        <a href="#categories" class="btn btn-outline-dark btn-lg rounded-pill px-4 hover-lift">
                            Explore
                        </a>
                    </div>
                    
                    <div class="mt-5 d-flex gap-4 align-items-center">
                        <div class="d-flex">
                            @foreach([1,2,3,4] as $i)
                            <div class="rounded-circle border border-2 border-white bg-secondary" 
                                 style="width: 40px; height: 40px; margin-left: -10px; background-image: url('https://i.pravatar.cc/100?img={{$i}}'); background-size: cover;"></div>
                            @endforeach
                            <div class="rounded-circle border border-2 border-white bg-dark text-white d-flex align-items-center justify-content-center" 
                                 style="width: 40px; height: 40px; margin-left: -10px; font-size: 12px;">+2k</div>
                        </div>
                        <div>
                            <div class="fw-bold">4.9/5 Rating</div>
                            <small class="text-muted">Trusted by 2,000+ customers</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 position-relative" data-aos="fade-left" data-aos-delay="200">
                    <div class="position-relative z-1 hover-float">
                        <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?q=80&w=1000&auto=format&fit=crop" 
                             alt="Premium Watch" class="img-fluid rounded-4 shadow-2xl" 
                             style="transform: rotate(-3deg); border: 8px solid rgba(255,255,255,0.5);">
                    </div>
                    <!-- Floating Cards -->
                    <div class="position-absolute top-50 start-0 translate-middle-y z-2 bg-white p-3 rounded-3 shadow-lg animate-float-y d-none d-md-block" style="left: -40px !important;">
                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-success bg-opacity-10 p-2 rounded-circle text-success">
                                <i class="bi bi-cart-check fs-4"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 fw-bold">Item Sold</h6>
                                <small class="text-muted">Just now</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bento Grid Categories -->
    <div class="container py-5" id="categories">
        <div class="row mb-5" data-aos="fade-up">
            <div class="col-12 text-center">
                <h2 class="fw-bold mb-2">Curated Categories</h2>
                <p class="text-muted">Find exactly what you're looking for</p>
            </div>
        </div>
        
        <div class="row g-4">
            <!-- Large Card (Left) -->
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                <a href="{{ route('products', ['search' => 'Electronics']) }}" class="card border-0 shadow-sm h-100 overflow-hidden hover-zoom text-white">
                    <img src="https://images.unsplash.com/photo-1498049860654-af1a5c5668ba?auto=format&fit=crop&q=80&w=800" class="card-img w-100 h-100 object-fit-cover transition-transform" alt="Electronics">
                    <div class="card-img-overlay d-flex flex-column justify-content-end bg-gradient-to-t p-4">
                        <h3 class="fw-bold text-white mb-1">Electronics</h3>
                        <p class="text-white-50 mb-0">Latest gadgets & gear</p>
                    </div>
                </a>
            </div>
            
            <!-- Right Column Grid -->
            <div class="col-md-6">
                <div class="row g-4 h-100">
                    <div class="col-6" data-aos="fade-up" data-aos-delay="200">
                        <a href="{{ route('products', ['search' => 'Fashion']) }}" class="card border-0 shadow-sm h-100 overflow-hidden hover-zoom text-white" style="min-height: 200px;">
                            <img src="https://images.unsplash.com/photo-1445205170230-053b83016050?auto=format&fit=crop&q=80&w=600" class="card-img w-100 h-100 object-fit-cover transition-transform" alt="Fashion">
                            <div class="card-img-overlay d-flex flex-column justify-content-end bg-gradient-to-t p-3">
                                <h5 class="fw-bold text-white mb-0">Fashion</h5>
                            </div>
                        </a>
                    </div>
                    <div class="col-6" data-aos="fade-up" data-aos-delay="300">
                        <a href="{{ route('products', ['search' => 'Home']) }}" class="card border-0 shadow-sm h-100 overflow-hidden hover-zoom text-white" style="min-height: 200px;">
                            <img src="https://images.unsplash.com/photo-1484101403633-562f891dc89a?auto=format&fit=crop&q=80&w=600" class="card-img w-100 h-100 object-fit-cover transition-transform" alt="Home">
                            <div class="card-img-overlay d-flex flex-column justify-content-end bg-gradient-to-t p-3">
                                <h5 class="fw-bold text-white mb-0">Home</h5>
                            </div>
                        </a>
                    </div>
                    <div class="col-12" data-aos="fade-up" data-aos-delay="400">
                        <a href="{{ route('products', ['search' => 'Books']) }}" class="card border-0 shadow-sm h-100 overflow-hidden hover-zoom text-white bg-dark">
                            <div class="row g-0 h-100">
                                <div class="col-7 position-relative">
                                    <div class="card-body d-flex flex-column justify-content-center h-100 bg-dark text-white p-4">
                                        <h4 class="fw-bold">Knowledge & Books</h4>
                                        <p class="text-white-50 mb-0">Expand your mind with our collection</p>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <img src="https://images.unsplash.com/photo-1495446815901-a7297e633e8d?auto=format&fit=crop&q=80&w=600" class="w-100 h-100 object-fit-cover" alt="Books">
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section (Modern) -->
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up">
                <div class="p-4 rounded-4 bg-light bg-opacity-50 border border-light h-100 text-center hover-lift transition-all">
                    <div class="d-inline-flex p-3 rounded-circle bg-white shadow-sm text-primary mb-3">
                        <i class="bi bi-truck fs-2"></i>
                    </div>
                    <h5 class="fw-bold">Global Shipping</h5>
                    <p class="text-muted small mb-0">Fast & reliable delivery to 100+ countries.</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="p-4 rounded-4 bg-light bg-opacity-50 border border-light h-100 text-center hover-lift transition-all">
                    <div class="d-inline-flex p-3 rounded-circle bg-white shadow-sm text-success mb-3">
                        <i class="bi bi-shield-check fs-2"></i>
                    </div>
                    <h5 class="fw-bold">Secure Payments</h5>
                    <p class="text-muted small mb-0">Encrypted transactions for peace of mind.</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="p-4 rounded-4 bg-light bg-opacity-50 border border-light h-100 text-center hover-lift transition-all">
                    <div class="d-inline-flex p-3 rounded-circle bg-white shadow-sm text-warning mb-3">
                        <i class="bi bi-headset fs-2"></i>
                    </div>
                    <h5 class="fw-bold">24/7 Support</h5>
                    <p class="text-muted small mb-0">Expert assistance whenever you need it.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="container py-5 mb-5">
        <div class="position-relative rounded-5 overflow-hidden p-5 text-center text-white" data-aos="zoom-in">
            <div class="position-absolute top-0 start-0 w-100 h-100" 
                 style="background: linear-gradient(45deg, #667eea, #764ba2); z-index: -1;"></div>
            <div class="position-absolute top-0 start-0 w-100 h-100 bg-white opacity-10" 
                 style="background-image: url('data:image/svg+xml,...'); opacity: 0.1;"></div>
            
            <h2 class="display-5 fw-bold mb-3">Ready to Upgrade?</h2>
            <p class="lead opacity-90 mb-4">Join our community and experience shopping like never before.</p>
            <a href="{{ route('products') }}" class="btn btn-light btn-lg rounded-pill px-5 fw-bold text-primary shadow-lg hover-scale">
                Start Shopping
            </a>
        </div>
    </div>

    <style>
        /* Custom Animations & Utils */
        .text-transparent { color: transparent; }
        .bg-clip-text { -webkit-background-clip: text; background-clip: text; }
        .bg-gradient-primary { background-image: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .bg-gradient-to-t { background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0) 100%); }
        
        .blur-3xl { filter: blur(3rem); }
        .shadow-2xl { box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); }
        
        .hover-lift { transition: transform 0.3s ease; }
        .hover-lift:hover { transform: translateY(-5px); }
        
        .hover-zoom .card-img { transition: transform 0.5s ease; }
        .hover-zoom:hover .card-img { transform: scale(1.05); }
        
        .hover-float { annotation: floating 3s ease-in-out infinite; }
        
        @keyframes floating {
            0% { transform: translateY(0px) rotate(-3deg); }
            50% { transform: translateY(-10px) rotate(-3deg); }
            100% { transform: translateY(0px) rotate(-3deg); }
        }
    </style>
@endsection