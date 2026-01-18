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
                        <i class="bi bi-code-slash me-2"></i>Technical Documentation
                    </span>
                    <h1 class="display-4 fw-bold mb-3 text-dark">Laporan Pengembangan Sistem</h1>
                    <p class="lead text-muted mb-4 opacity-75">
                        Dokumentasi teknis dan panduan penggunaan fitur-fitur yang telah dikembangkan pada platform E-Commerce ShopMini menggunakan Laravel Framework.
                    </p>
                    <div class="d-flex gap-3 flex-wrap">
                        <a href="https://github.com/tirtana888/AFL-1" target="_blank" class="btn btn-dark rounded-pill px-4 py-2 hover-lift">
                            <i class="bi bi-github me-2"></i>Repository GitHub
                        </a>
                        <a href="{{ route('home') }}" class="btn btn-outline-primary rounded-pill px-4 py-2 hover-lift">
                            <i class="bi bi-arrow-left me-2"></i>Demo Website
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 d-none d-lg-block text-center" data-aos="fade-left">
                     <i class="bi bi-laptop text-primary opacity-25" style="font-size: 10rem;"></i>
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
                            <h6 class="fw-bold mb-0 text-uppercase small text-muted letter-spacing-1">Daftar Isi</h6>
                        </div>
                        <div class="list-group list-group-flush">
                            <a href="#credentials" class="list-group-item list-group-item-action py-3 border-light d-flex align-items-center active">
                                <i class="bi bi-key text-primary me-3 opacity-50"></i>Akses Demo
                            </a>
                            <a href="#major" class="list-group-item list-group-item-action py-3 border-light d-flex align-items-center">
                                <i class="bi bi-stars text-danger me-3 opacity-50"></i>Fitur Utama
                            </a>
                            <a href="#core" class="list-group-item list-group-item-action py-3 border-light d-flex align-items-center">
                                <i class="bi bi-hdd-stack text-warning me-3 opacity-50"></i>Fitur Inti
                            </a>
                            <a href="#essential" class="list-group-item list-group-item-action py-3 border-light d-flex align-items-center">
                                <i class="bi bi-check-circle text-info me-3 opacity-50"></i>Fitur Esensial
                            </a>
                            <a href="#additional" class="list-group-item list-group-item-action py-3 border-light d-flex align-items-center">
                                <i class="bi bi-plus-circle text-secondary me-3 opacity-50"></i>Fitur Tambahan
                            </a>
                        </div>
                    </nav>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-lg-9">
                
                <!-- Credentials -->
                <section id="credentials" class="mb-5 section-card" data-aos="fade-up">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                        <div class="card-body p-4 p-md-5 bg-gradient-dark text-white" style="background: linear-gradient(135deg, #2c3e50 0%, #3498db 100%);">
                            <div class="d-flex align-items-center mb-4">
                                <i class="bi bi-shield-lock-fill fs-1 me-3 text-white-50"></i>
                                <div>
                                    <h3 class="fw-bold mb-0">Akun Demo (Credentials)</h3>
                                    <p class="text-white-50 mb-0">Gunakan akun ini untuk pengujian hak akses (Privilege).</p>
                                </div>
                            </div>
                            
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="bg-white bg-opacity-10 p-4 rounded-3 text-center border border-white border-opacity-10">
                                        <span class="badge bg-warning text-dark mb-3">ADMIN ACCESS</span>
                                        <div class="mb-2">Email: <code>demo@ciputra.com</code></div>
                                        <div class="mb-3">Pass: <code>ALP4</code></div>
                                        <a href="{{ route('admin.login') }}" class="btn btn-sm btn-light w-100 fw-bold">Login Dashboard Admin</a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="bg-white bg-opacity-10 p-4 rounded-3 text-center border border-white border-opacity-10">
                                        <span class="badge bg-info text-dark mb-3">USER ACCESS</span>
                                        <div class="mb-2">Email: <code>user@ciputra.com</code></div>
                                        <div class="mb-3">Pass: <code>ALP4</code></div>
                                        <a href="{{ route('login') }}" class="btn btn-sm btn-light w-100 fw-bold">Login Customer</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Major Features -->
                <section id="major" class="mb-5 section-card" data-aos="fade-up">
                    <h3 class="fw-bold mb-4 text-danger border-start border-5 border-danger ps-3">🌟 Pengembangan Utama (Major Development)</h3>

                    <!-- Multi-Language -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-danger bg-opacity-10 p-2 rounded-3 me-3"><i class="bi bi-translate text-danger fs-4"></i></div>
                                <h5 class="fw-bold mb-0">Multi Bahasa (Localization)</h5>
                            </div>
                            <p class="text-muted small">Implementasi lokalisasi penuh (ID/EN) menggunakan Laravel Localization dan Session Persistence.</p>
                            <div class="bg-light p-3 rounded-3 mt-3 border">
                                <h6 class="fw-bold small text-uppercase text-muted">Panduan Penggunaan:</h6>
                                <ol class="small mb-0 ps-3">
                                    <li>Akses switcher bahasa pada Navbar bagian kanan atas.</li>
                                    <li>Pilih "Indonesia" atau "English".</li>
                                    <li>Sistem akan mengingat preferensi bahasa user walaupun browser ditutup.</li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <!-- Stock Management -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-danger bg-opacity-10 p-2 rounded-3 me-3"><i class="bi bi-box-seam text-danger fs-4"></i></div>
                                <h5 class="fw-bold mb-0">Real-time Stock Synchronization</h5>
                            </div>
                            <p class="text-muted small">Integrasi manajemen stok admin dengan frontend user secara real-time. Perubahan stok di dashboard admin langsung berdampak pada ketersediaan produk di halaman publik.</p>
                            <div class="bg-light p-3 rounded-3 mt-3 border">
                                <h6 class="fw-bold small text-uppercase text-muted">Panduan Penggunaan:</h6>
                                <ol class="small mb-0 ps-3">
                                    <li>Login Admin -> Menu <strong>Stock Management</strong>.</li>
                                    <li>Ubah stok produk menjadi 0.</li>
                                    <li>Cek Homepage: Produk akan otomatis menampilkan label "OUT OF STOCK" dan menonaktifkan tombol beli.</li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <!-- Loyalty Program -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-danger bg-opacity-10 p-2 rounded-3 me-3"><i class="bi bi-award text-danger fs-4"></i></div>
                                <h5 class="fw-bold mb-0">Sistem Loyalti User</h5>
                            </div>
                            <p class="text-muted small">Sistem reward points terintegrasi. User mendapatkan poin dari setiap transaksi (Rp 1.000 = 1 Poin) dan dapat menukarkannya dengan voucher diskon.</p>
                            <div class="bg-light p-3 rounded-3 mt-3 border">
                                <h6 class="fw-bold small text-uppercase text-muted">Panduan Penggunaan:</h6>
                                <ol class="small mb-0 ps-3">
                                    <li>Lakukan transaksi pembelian produk.</li>
                                    <li>Poin akan bertambah otomatis ke akun user.</li>
                                    <li>User dapat menukar poin dengan kode voucher di halaman profil/rewards.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Core Features -->
                <section id="core" class="mb-5 section-card" data-aos="fade-up">
                    <h3 class="fw-bold mb-4 text-warning border-start border-5 border-warning ps-3">🚀 Fitur Inti (Core Features)</h3>

                    <!-- Coupons -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-warning bg-opacity-10 p-2 rounded-3 me-3"><i class="bi bi-ticket-perforated text-warning fs-4"></i></div>
                                <h5 class="fw-bold mb-0">Manajemen Kupon & Promo</h5>
                            </div>
                            <p class="text-muted small">Fitur CRUD Promo Codes untuk Admin dan aplikasi kode promo pada sistem Checkout.</p>
                            <div class="bg-light p-3 rounded-3 mt-3 border">
                                <h6 class="fw-bold small text-uppercase text-muted">Panduan Penggunaan:</h6>
                                <ol class="small mb-0 ps-3">
                                    <li><strong>Admin:</strong> Buat kode promo baru (Tipe: Fixed/Percentage).</li>
                                    <li><strong>User:</strong> Masukkan kode saat Checkout. Sistem akan memvalidasi dan memotong total harga.</li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <!-- Review Rating -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-warning bg-opacity-10 p-2 rounded-3 me-3"><i class="bi bi-star-half text-warning fs-4"></i></div>
                                <h5 class="fw-bold mb-0">Sistem Review & Rating</h5>
                            </div>
                            <p class="text-muted small">User dapat memberikan ulasan dan rating bintang pada produk. Rata-rata rating dihitung otomatis.</p>
                            <div class="bg-light p-3 rounded-3 mt-3 border">
                                <h6 class="fw-bold small text-uppercase text-muted">Panduan Penggunaan:</h6>
                                <ol class="small mb-0 ps-3">
                                    <li>Buka detail produk -> Scroll ke bagian Reviews.</li>
                                    <li>Input rating dan komentar -> Submit.</li>
                                    <li>Rating produk akan terupdate secara real-time.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Essential Features -->
                <section id="essential" class="mb-5 section-card" data-aos="fade-up">
                    <h3 class="fw-bold mb-4 text-info border-start border-5 border-info ps-3">💎 Fitur Esensial (Essential Features)</h3>
                    
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h6 class="fw-bold"><i class="bi bi-heart me-2 text-info"></i>Wishlist / Favorit</h6>
                                    <p class="small text-muted mb-2">Simpan produk tanpa masuk keranjang. Menggunakan AJAX untuk UX yang seamless.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h6 class="fw-bold"><i class="bi bi-lightning-charge me-2 text-info"></i>Direct Checkout</h6>
                                    <p class="small text-muted mb-2">Fitur "Buy Now" untuk mempercepat proses pembelian (Skip Cart).</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h6 class="fw-bold"><i class="bi bi-share me-2 text-info"></i>Social Sharing</h6>
                                    <p class="small text-muted mb-2">Integrasi share button ke WhatsApp, Twitter, dan Facebook.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h6 class="fw-bold"><i class="bi bi-geo-alt me-2 text-info"></i>Multi Address</h6>
                                    <p class="small text-muted mb-2">Manajemen banyak alamat pengiriman per user.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                
                 <!-- Additional Features -->
                 <section id="additional" class="mb-5 section-card" data-aos="fade-up">
                    <h3 class="fw-bold mb-4 text-secondary border-start border-5 border-secondary ps-3">✨ Fitur Tambahan & UI</h3>
                    <ul class="list-group list-group-flush shadow-sm rounded-4">
                        <li class="list-group-item py-3">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-moon-stars me-3 text-secondary fs-5"></i> 
                                <div>
                                    <strong>Dark Mode Theme</strong>
                                    <div class="small text-muted">Tema gelap persisten yang nyaman di mata.</div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item py-3">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-shield-lock me-3 text-secondary fs-5"></i> 
                                <div>
                                    <strong>Role-Based Access Control</strong>
                                    <div class="small text-muted">Pemisahan ketat antara sesi User dan Admin (Multi-Guard Auth).</div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item py-3">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-info-circle me-3 text-secondary fs-5"></i> 
                                <div>
                                    <strong>Halaman Statis Informatif</strong>
                                    <div class="small text-muted">Halaman About Us, FAQ, dan Contact Us yang lengkap.</div>
                                </div>
                            </div>
                        </li>
                    </ul>
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
    .hover-lift:hover { transform: translateY(-2px); box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
    
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
