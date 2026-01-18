@extends('layouts.app')

@section('title', 'Project Report & Documentation - ShopMini')

@section('content')
<div class="bg-light min-vh-100 pb-5">
    <!-- Hero Header -->
    <div class="position-relative overflow-hidden bg-white shadow-sm mb-5">
        <div class="position-absolute top-0 start-0 w-100 h-100" 
             style="background: linear-gradient(135deg, rgba(102, 126, 234, 0.05) 0%, rgba(118, 75, 162, 0.05) 100%);"></div>
        
        <div class="container py-5 position-relative">
            <div class="row align-items-center">
                <div class="col-lg-8" data-aos="fade-right">
                    <span class="badge bg-primary bg-opacity-10 text-primary mb-3 px-3 py-2 rounded-pill fw-bold">
                        <i class="bi bi-file-earmark-text me-2"></i>Assignment Report
                    </span>
                    <h1 class="display-4 fw-bold mb-3 text-dark">ShopMini Documentation</h1>
                    <p class="lead text-muted mb-4 opacity-75">
                        Comprehensive guide covering features, implementation details, and user manuals for the Advanced Web Programming assignment.
                    </p>
                    <div class="d-flex gap-3 flex-wrap">
                        <a href="https://github.com/tirtana888/AFL-1" target="_blank" class="btn btn-dark rounded-pill px-4 py-2 hover-lift">
                            <i class="bi bi-github me-2"></i>View Source Code
                        </a>
                        <a href="{{ route('home') }}" class="btn btn-outline-primary rounded-pill px-4 py-2 hover-lift">
                            <i class="bi bi-arrow-left me-2"></i>Back to Demo
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 d-none d-lg-block text-center" data-aos="fade-left">
                    <i class="bi bi-journal-richtext text-primary opacity-25" style="font-size: 10rem;"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row g-5">
            <!-- Table of Contents Sidebar -->
            <div class="col-lg-3">
                <div class="sticky-top" style="top: 100px; z-index: 10;">
                    <nav id="toc-nav" class="card border-0 shadow-sm rounded-4 overflow-hidden">
                        <div class="card-header bg-white border-bottom border-light p-3">
                            <h6 class="fw-bold mb-0 text-uppercase small text-muted letter-spacing-1">Table of Contents</h6>
                        </div>
                        <div class="list-group list-group-flush">
                            <a href="#summary" class="list-group-item list-group-item-action py-3 border-light d-flex align-items-center active">
                                <i class="bi bi-grid-1x2 text-primary me-3 opacity-50"></i>Overview
                            </a>
                            <a href="#credentials" class="list-group-item list-group-item-action py-3 border-light d-flex align-items-center">
                                <i class="bi bi-key text-warning me-3 opacity-50"></i>Credentials
                            </a>
                            <a href="#features" class="list-group-item list-group-item-action py-3 border-light d-flex align-items-center">
                                <i class="bi bi-stars text-danger me-3 opacity-50"></i>Core Features
                            </a>
                            <a href="#admin" class="list-group-item list-group-item-action py-3 border-light d-flex align-items-center">
                                <i class="bi bi-shield-lock text-success me-3 opacity-50"></i>Admin Panel
                            </a>
                            <a href="#advanced" class="list-group-item list-group-item-action py-3 border-light d-flex align-items-center">
                                <i class="bi bi-lightning text-info me-3 opacity-50"></i>Advanced
                            </a>
                        </div>
                    </nav>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-lg-9">
                
                <!-- Project Summary -->
                <section id="summary" class="mb-5 section-card" data-aos="fade-up">
                    <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5">
                        <h2 class="fw-bold mb-4 position-relative d-inline-block">
                            Project Overview
                            <div class="position-absolute bottom-0 start-0 w-50 h-1 bg-primary rounded"></div>
                        </h2>
                        <p class="text-muted fs-5 mb-4">
                            ShopMini is a full-stack e-commerce solution built with <strong>Laravel 10</strong>. 
                            It demonstrates modern web development practices including role-based authentication, 
                            real-time data synchronization, and a polished, responsive user interface.
                        </p>
                        
                        <div class="row g-4 mt-2">
                            <div class="col-md-4">
                                <div class="p-4 rounded-4 bg-primary bg-opacity-10 h-100 transition-hover">
                                    <h1 class="display-4 fw-bold text-primary mb-0">13+</h1>
                                    <span class="text-uppercase small fw-bold text-muted letter-spacing-1">Total Features</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="p-4 rounded-4 bg-success bg-opacity-10 h-100 transition-hover">
                                    <h1 class="display-4 fw-bold text-success mb-0">98</h1>
                                    <span class="text-uppercase small fw-bold text-muted letter-spacing-1">Performance Score</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="p-4 rounded-4 bg-info bg-opacity-10 h-100 transition-hover">
                                    <h1 class="display-4 fw-bold text-info mb-0">100%</h1>
                                    <span class="text-uppercase small fw-bold text-muted letter-spacing-1">Responsiveness</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Credentials -->
                <section id="credentials" class="mb-5 section-card" data-aos="fade-up">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                        <div class="card-body p-4 p-md-5 bg-gradient-dark text-white" style="background: linear-gradient(135deg, #2c3e50 0%, #3498db 100%);">
                            <div class="d-flex align-items-center mb-4">
                                <i class="bi bi-shield-lock-fill fs-1 me-3 text-white-50"></i>
                                <div>
                                    <h3 class="fw-bold mb-0">Access Credentials</h3>
                                    <p class="text-white-50 mb-0">Use these accounts to test the application.</p>
                                </div>
                            </div>
                            
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="bg-white bg-opacity-10 p-4 rounded-3 border border-white border-opacity-10">
                                        <div class="d-flex align-items-center mb-3">
                                            <span class="badge bg-warning text-dark me-2">ADMIN</span>
                                            <span class="small text-white-50">For Dashboard Access</span>
                                        </div>
                                        <div class="mb-2">
                                            <small class="text-white-50 d-block mb-1">Email</small>
                                            <code class="text-white fs-5 user-select-all">demo@ciputra.com</code>
                                        </div>
                                        <div>
                                            <small class="text-white-50 d-block mb-1">Password</small>
                                            <code class="text-white fs-5 user-select-all">ALP4</code>
                                        </div>
                                        <a href="{{ route('admin.login') }}" class="btn btn-sm btn-light mt-3 w-100 text-primary fw-bold">Go to Admin Login</a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="bg-white bg-opacity-10 p-4 rounded-3 border border-white border-opacity-10">
                                        <div class="d-flex align-items-center mb-3">
                                            <span class="badge bg-info text-dark me-2">USER</span>
                                            <span class="small text-white-50">For Customer Experience</span>
                                        </div>
                                        <div class="mb-2">
                                            <small class="text-white-50 d-block mb-1">Email</small>
                                            <code class="text-white fs-5 user-select-all">user@ciputra.com</code>
                                        </div>
                                        <div>
                                            <small class="text-white-50 d-block mb-1">Password</small>
                                            <code class="text-white fs-5 user-select-all">ALP4</code>
                                        </div>
                                        <a href="{{ route('login') }}" class="btn btn-sm btn-light mt-3 w-100 text-primary fw-bold">Go to User Login</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Core Features -->
                <section id="features" class="mb-5 section-card" data-aos="fade-up">
                    <h3 class="fw-bold mb-4 text-dark">User Features</h3>
                    
                    <div class="card border-0 shadow-sm rounded-4 mb-4 overflow-hidden hover-card">
                        <div class="row g-0">
                            <div class="col-md-1 bg-warning bg-opacity-10 d-flex align-items-center justify-content-center">
                                <i class="bi bi-star-fill text-warning fs-3"></i>
                            </div>
                            <div class="col-md-11">
                                <div class="card-body p-4">
                                    <h5 class="fw-bold">Review & Rating System</h5>
                                    <p class="text-muted mb-3">Interactive 5-star rating system with comment capability.</p>
                                    <div class="bg-light p-3 rounded-3 border dashed-border">
                                        <h6 class="fw-bold text-uppercase small mb-2 text-muted">How to test:</h6>
                                        <ol class="mb-0 small ps-3">
                                            <li>Login as a user.</li>
                                            <li>Navigate to any product detail page.</li>
                                            <li>Scroll down to the Reviews section and submit a rating.</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm rounded-4 mb-4 overflow-hidden hover-card">
                        <div class="row g-0">
                            <div class="col-md-1 bg-danger bg-opacity-10 d-flex align-items-center justify-content-center">
                                <i class="bi bi-heart-fill text-danger fs-3"></i>
                            </div>
                            <div class="col-md-11">
                                <div class="card-body p-4">
                                    <h5 class="fw-bold">Wishlist System (AJAX)</h5>
                                    <p class="text-muted mb-3">Add items to favorites instantly without page reloads.</p>
                                    <div class="bg-light p-3 rounded-3 border dashed-border">
                                        <h6 class="fw-bold text-uppercase small mb-2 text-muted">How to test:</h6>
                                        <ol class="mb-0 small ps-3">
                                            <li>Click the heart icon <i class="bi bi-heart"></i> on any product card.</li>
                                            <li>Observe the instant visual feedback (icon fill).</li>
                                            <li>Check the "Wishlist" page in the navbar.</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Admin Features -->
                <section id="admin" class="mb-5 section-card" data-aos="fade-up">
                    <h3 class="fw-bold mb-4 text-dark">Admin Capabilities</h3>
                    
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="card h-100 border-0 shadow-sm rounded-4 hover-lift">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="rounded-circle bg-primary bg-opacity-10 p-3 me-3">
                                            <i class="bi bi-arrow-repeat text-primary fs-4"></i>
                                        </div>
                                        <h5 class="fw-bold mb-0">Real-time Stock Sync</h5>
                                    </div>
                                    <p class="text-muted small">
                                        Changes in Admin Stock immediately reflect on the Homepage.
                                        Products with <strong>0 stock</strong> show a red badge. 
                                        Products with <strong>< 5 stock</strong> show a warning badge.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100 border-0 shadow-sm rounded-4 hover-lift">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="rounded-circle bg-success bg-opacity-10 p-3 me-3">
                                            <i class="bi bi-ticket-perforated text-success fs-4"></i>
                                        </div>
                                        <h5 class="fw-bold mb-0">Promo Codes</h5>
                                    </div>
                                    <p class="text-muted small">
                                        Create and manage discount coupons (Fixed or Percentage).
                                        Users can apply these codes at checkout instantly.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Advanced Features -->
                <section id="advanced" class="mb-5 section-card" data-aos="fade-up">
                    <h3 class="fw-bold mb-4 text-dark">Advanced Implementation</h3>
                    
                    <div class="card border-0 shadow-sm rounded-4 bg-dark text-white p-4">
                        <div class="row text-center g-4">
                            <div class="col-6 col-md-3">
                                <div class="py-2">
                                    <i class="bi bi-translate fs-1 mb-2 text-info"></i>
                                    <h6 class="fw-bold">Multi-Lang</h6>
                                    <small class="text-white-50">ID / EN Switcher</small>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="py-2">
                                    <i class="bi bi-award fs-1 mb-2 text-warning"></i>
                                    <h6 class="fw-bold">Loyalty Pts</h6>
                                    <small class="text-white-50">Earn & Redeem</small>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="py-2">
                                    <i class="bi bi-moon-stars fs-1 mb-2 text-light"></i>
                                    <h6 class="fw-bold">Dark Mode</h6>
                                    <small class="text-white-50">Persistent Theme</small>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="py-2">
                                    <i class="bi bi-lightning-charge fs-1 mb-2 text-danger"></i>
                                    <h6 class="fw-bold">Direct Buy</h6>
                                    <small class="text-white-50">Skip Cart</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
</div>

<style>
    .letter-spacing-1 { letter-spacing: 1px; }
    .dashed-border { border-style: dashed !important; }
    .transition-hover { transition: transform 0.3s ease; }
    .transition-hover:hover { transform: translateY(-5px); }
    .hover-card { transition: all 0.3s ease; }
    .hover-card:hover { transform: translateY(-3px); box-shadow: 0 10px 20px rgba(0,0,0,0.05) !important; }
    
    /* Active State for TOC */
    .list-group-item.active {
        background-color: transparent;
        color: var(--bs-primary);
        border-right: 3px solid var(--bs-primary) !important;
        font-weight: 600;
        border-left: none;
        border-top: none;
        border-bottom: none;
    }
    .list-group-item.active i { opacity: 1 !important; }
</style>

<script>
    // Intersection Observer for ScrollSpy
    const sections = document.querySelectorAll('.section-card');
    const navLinks = document.querySelectorAll('#toc-nav .list-group-item');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const id = entry.target.getAttribute('id');
                navLinks.forEach(link => {
                    link.classList.remove('active');
                    if (link.getAttribute('href') === '#' + id) {
                        link.classList.add('active');
                    }
                });
            }
        });
    }, { threshold: 0.5 });

    sections.forEach(section => observer.observe(section));
</script>
@endsection
