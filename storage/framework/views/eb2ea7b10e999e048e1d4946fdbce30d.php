

<?php $__env->startSection('title', 'Welcome - ShopMini E-commerce'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Hero Section -->
    <div class="hero-section text-white">
        <div class="container position-relative">
            <div class="row align-items-center">
                <div class="col-lg-6 fade-in">
                    <span class="badge bg-warning text-dark mb-3 px-3 py-2">
                        <i class="bi bi-lightning-fill"></i> Best Deals Today
                    </span>
                    <h1 class="display-4 fw-bold mb-3">
                        Discover Amazing Products
                    </h1>
                    <p class="lead opacity-75 mb-4">
                        Shop the latest trends with up to 50% off on selected items.
                        Fast delivery & secure payment guaranteed!
                    </p>
                    <div class="d-flex gap-3 flex-wrap">
                        <a href="<?php echo e(route('products')); ?>" class="btn btn-light btn-lg px-4">
                            <i class="bi bi-grid me-2"></i>Browse Products
                        </a>
                        <a href="<?php echo e(route('register')); ?>" class="btn btn-outline-light btn-lg px-4">
                            <i class="bi bi-person-plus me-2"></i>Join Now
                        </a>
                    </div>

                    <!-- Stats -->
                    <div class="row mt-5 pt-3">
                        <div class="col-4">
                            <h3 class="fw-bold mb-0">30+</h3>
                            <small class="opacity-75">Products</small>
                        </div>
                        <div class="col-4">
                            <h3 class="fw-bold mb-0">5</h3>
                            <small class="opacity-75">Categories</small>
                        </div>
                        <div class="col-4">
                            <h3 class="fw-bold mb-0">24/7</h3>
                            <small class="opacity-75">Support</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 text-center d-none d-lg-block">
                    <div style="font-size: 280px; opacity: 0.15;">
                        <i class="bi bi-bag-heart"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Categories Section -->
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Shop by Category</h2>
            <p class="text-muted">Explore our wide range of product categories</p>
        </div>
        <div class="row row-cols-2 row-cols-md-5 g-4">
            <div class="col fade-in">
                <a href="<?php echo e(route('products')); ?>" class="text-decoration-none">
                    <div class="card text-center h-100 border-0 shadow-sm">
                        <div class="card-body py-4">
                            <div class="rounded-circle bg-primary bg-opacity-10 d-inline-flex p-3 mb-3">
                                <i class="bi bi-laptop" style="font-size: 32px; color: #667eea;"></i>
                            </div>
                            <h6 class="card-title mb-0 text-dark">Electronics</h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col fade-in">
                <a href="<?php echo e(route('products')); ?>" class="text-decoration-none">
                    <div class="card text-center h-100 border-0 shadow-sm">
                        <div class="card-body py-4">
                            <div class="rounded-circle bg-danger bg-opacity-10 d-inline-flex p-3 mb-3">
                                <i class="bi bi-bag" style="font-size: 32px; color: #f5576c;"></i>
                            </div>
                            <h6 class="card-title mb-0 text-dark">Fashion</h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col fade-in">
                <a href="<?php echo e(route('products')); ?>" class="text-decoration-none">
                    <div class="card text-center h-100 border-0 shadow-sm">
                        <div class="card-body py-4">
                            <div class="rounded-circle bg-success bg-opacity-10 d-inline-flex p-3 mb-3">
                                <i class="bi bi-book" style="font-size: 32px; color: #11998e;"></i>
                            </div>
                            <h6 class="card-title mb-0 text-dark">Books</h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col fade-in">
                <a href="<?php echo e(route('products')); ?>" class="text-decoration-none">
                    <div class="card text-center h-100 border-0 shadow-sm">
                        <div class="card-body py-4">
                            <div class="rounded-circle bg-warning bg-opacity-10 d-inline-flex p-3 mb-3">
                                <i class="bi bi-house" style="font-size: 32px; color: #f5af19;"></i>
                            </div>
                            <h6 class="card-title mb-0 text-dark">Home</h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col fade-in">
                <a href="<?php echo e(route('products')); ?>" class="text-decoration-none">
                    <div class="card text-center h-100 border-0 shadow-sm">
                        <div class="card-body py-4">
                            <div class="rounded-circle bg-info bg-opacity-10 d-inline-flex p-3 mb-3">
                                <i class="bi bi-dribbble" style="font-size: 32px; color: #17a2b8;"></i>
                            </div>
                            <h6 class="card-title mb-0 text-dark">Sports</h6>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="bg-light py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Why Shop With Us?</h2>
                <p class="text-muted">We provide the best shopping experience</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 fade-in">
                    <div class="card h-100 text-center border-0">
                        <div class="card-body p-4">
                            <div class="rounded-circle d-inline-flex p-4 mb-3"
                                style="background: linear-gradient(135deg, #667eea20, #764ba220);">
                                <i class="bi bi-truck" style="font-size: 40px; color: #667eea;"></i>
                            </div>
                            <h5 class="fw-bold">Fast Delivery</h5>
                            <p class="text-muted mb-0">Get your products delivered within 1-3 business days</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 fade-in">
                    <div class="card h-100 text-center border-0">
                        <div class="card-body p-4">
                            <div class="rounded-circle d-inline-flex p-4 mb-3"
                                style="background: linear-gradient(135deg, #11998e20, #38ef7d20);">
                                <i class="bi bi-shield-check" style="font-size: 40px; color: #11998e;"></i>
                            </div>
                            <h5 class="fw-bold">Secure Payment</h5>
                            <p class="text-muted mb-0">Multiple payment options with bank-level security</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 fade-in">
                    <div class="card h-100 text-center border-0">
                        <div class="card-body p-4">
                            <div class="rounded-circle d-inline-flex p-4 mb-3"
                                style="background: linear-gradient(135deg, #f5576c20, #f093fb20);">
                                <i class="bi bi-headset" style="font-size: 40px; color: #f5576c;"></i>
                            </div>
                            <h5 class="fw-bold">24/7 Support</h5>
                            <p class="text-muted mb-0">Our customer service team is always here to help</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="py-5" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
        <div class="container text-center text-white py-4">
            <h2 class="fw-bold mb-3">Ready to Start Shopping?</h2>
            <p class="lead opacity-75 mb-4">Join thousands of satisfied customers today!</p>
            <a href="<?php echo e(route('products')); ?>" class="btn btn-light btn-lg px-5">
                <i class="bi bi-bag me-2"></i>Shop Now
            </a>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lenovo\Downloads\AFL 3\resources\views/welcome.blade.php ENDPATH**/ ?>