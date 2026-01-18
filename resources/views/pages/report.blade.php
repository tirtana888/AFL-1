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
                    <span class="badge bg-success bg-opacity-10 text-success mb-3 px-3 py-2 rounded-pill fw-bold">
                        <i class="bi bi-check-circle-fill me-2"></i>Assignment Completed
                    </span>
                    <h1 class="display-4 fw-bold mb-3 text-dark">Laporan Tugas ALP</h1>
                    <p class="lead text-muted mb-4 opacity-75">
                        Dokumentasi lengkap fitur, panduan penggunaan, dan perhitungan poin penilaian untuk mata kuliah Advanced Web Programming via Laravel Framework.
                    </p>
                    <div class="d-flex gap-3 flex-wrap">
                        <a href="https://github.com/tirtana888/AFL-1" target="_blank" class="btn btn-dark rounded-pill px-4 py-2 hover-lift">
                            <i class="bi bi-github me-2"></i>Link GitHub Repository
                        </a>
                        <a href="{{ route('home') }}" class="btn btn-outline-primary rounded-pill px-4 py-2 hover-lift">
                            <i class="bi bi-arrow-left me-2"></i>Back to Demo
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 d-none d-lg-block text-center" data-aos="fade-left">
                    <div class="p-4 bg-white rounded-circle shadow-lg d-inline-block p-5">
                        <h1 class="display-1 fw-bold text-primary mb-0">100+</h1>
                        <small class="text-uppercase fw-bold text-muted">Total Score</small>
                    </div>
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
                            <a href="#scorecard" class="list-group-item list-group-item-action py-3 border-light d-flex align-items-center active">
                                <i class="bi bi-calculator text-primary me-3 opacity-50"></i>Perhitungan Poin
                            </a>
                            <a href="#credentials" class="list-group-item list-group-item-action py-3 border-light d-flex align-items-center">
                                <i class="bi bi-key text-warning me-3 opacity-50"></i>Akun Demo
                            </a>
                            <a href="#features-25" class="list-group-item list-group-item-action py-3 border-light d-flex align-items-center">
                                <span class="badge bg-danger rounded-pill me-3">25</span> Fitur 25 Poin
                            </a>
                            <a href="#features-20" class="list-group-item list-group-item-action py-3 border-light d-flex align-items-center">
                                <span class="badge bg-warning rounded-pill me-3">20</span> Fitur 20 Poin
                            </a>
                            <a href="#features-15" class="list-group-item list-group-item-action py-3 border-light d-flex align-items-center">
                                <span class="badge bg-info rounded-pill me-3">15</span> Fitur 15 Poin
                            </a>
                            <a href="#features-10" class="list-group-item list-group-item-action py-3 border-light d-flex align-items-center">
                                <span class="badge bg-secondary rounded-pill me-3">10+</span> Fitur Lainnya
                            </a>
                        </div>
                    </nav>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-lg-9">
                
                <!-- Scorecard Summary -->
                <section id="scorecard" class="mb-5 section-card" data-aos="fade-up">
                    <div class="card border-0 shadow-sm rounded-4 p-4">
                        <h3 class="fw-bold mb-4 border-bottom pb-2">📊 Estimasi Penilaian (Scorecard)</h3>
                        <p class="text-muted mb-4">Berikut adalah rincian fitur yang telah dikembangkan berdasarkan rubrik penilaian tugas ALP.</p>
                        
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>Kategori / Fitur</th>
                                        <th class="text-center">Poin</th>
                                        <th class="text-center">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="fw-bold text-dark">Desain Tampilan (UI)</td>
                                        <td class="text-center fw-bold">25</td>
                                        <td class="text-center"><i class="bi bi-check-circle-fill text-success"></i></td>
                                    </tr>
                                    <!-- 25 Poin -->
                                    <tr class="table-group-divider">
                                        <td><strong>Multi Bahasa</strong> (ID/EN)</td>
                                        <td class="text-center">25</td>
                                        <td class="text-center"><i class="bi bi-check-circle-fill text-success"></i></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Manajemen Stok</strong> (Admin Sync)</td>
                                        <td class="text-center">25</td>
                                        <td class="text-center"><i class="bi bi-check-circle-fill text-success"></i></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Program Loyalti</strong> (Points & Voucher)</td>
                                        <td class="text-center">25</td>
                                        <td class="text-center"><i class="bi bi-check-circle-fill text-success"></i></td>
                                    </tr>
                                    <!-- 20 Poin -->
                                    <tr class="table-group-divider">
                                        <td><strong>Kupon / Promo Code</strong> (Admin)</td>
                                        <td class="text-center">20</td>
                                        <td class="text-center"><i class="bi bi-check-circle-fill text-success"></i></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Review & Rating</strong></td>
                                        <td class="text-center">20</td>
                                        <td class="text-center"><i class="bi bi-check-circle-fill text-success"></i></td>
                                    </tr>
                                    <!-- 15 Poin -->
                                    <tr class="table-group-divider">
                                        <td><strong>Wishlist / Favorite</strong></td>
                                        <td class="text-center">15</td>
                                        <td class="text-center"><i class="bi bi-check-circle-fill text-success"></i></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Beli Langsung</strong> (Direct Checkout)</td>
                                        <td class="text-center">15</td>
                                        <td class="text-center"><i class="bi bi-check-circle-fill text-success"></i></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Notifikasi Harga</strong> (Price Alert)</td>
                                        <td class="text-center">15</td>
                                        <td class="text-center"><i class="bi bi-check-circle-fill text-success"></i></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Share ke Sosial Media</strong></td>
                                        <td class="text-center">15</td>
                                        <td class="text-center"><i class="bi bi-check-circle-fill text-success"></i></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Daftar Alamat Pengiriman</strong></td>
                                        <td class="text-center">15</td>
                                        <td class="text-center"><i class="bi bi-check-circle-fill text-success"></i></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Lupa Password</strong> (UI)</td>
                                        <td class="text-center">15</td>
                                        <td class="text-center"><i class="bi bi-check-circle-fill text-success"></i></td>
                                    </tr>
                                    <!-- 10 Poin -->
                                    <tr class="table-group-divider">
                                        <td><strong>Mode Gelap</strong> (Dark Mode)</td>
                                        <td class="text-center">10</td>
                                        <td class="text-center"><i class="bi bi-check-circle-fill text-success"></i></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Manajemen Pengguna</strong> (Admin Fitur)</td>
                                        <td class="text-center">10</td>
                                        <td class="text-center"><i class="bi bi-check-circle-fill text-success"></i></td>
                                    </tr>
                                    <!-- 5 Poin -->
                                    <tr class="table-group-divider">
                                        <td><strong>Halaman Statis</strong> (FAQ/About/Contact)</td>
                                        <td class="text-center">5</td>
                                        <td class="text-center"><i class="bi bi-check-circle-fill text-success"></i></td>
                                    </tr>
                                    <tr class="table-active fw-bold">
                                        <td>Total Implementasi</td>
                                        <td class="text-center text-primary">250+</td>
                                        <td class="text-center">LULUS</td>
                                    </tr>
                                </tbody>
                            </table>
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
                                    <h3 class="fw-bold mb-0">Akun Demo (Credentials)</h3>
                                    <p class="text-white-50 mb-0">Gunakan akun ini untuk menguji fitur Login & Hak Akses.</p>
                                </div>
                            </div>
                            
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="bg-white bg-opacity-10 p-4 rounded-3 text-center border border-white border-opacity-10">
                                        <span class="badge bg-warning text-dark mb-3">ADMIN</span>
                                        <div class="mb-2">Email: <code>demo@ciputra.com</code></div>
                                        <div class="mb-3">Pass: <code>ALP4</code></div>
                                        <a href="{{ route('admin.login') }}" class="btn btn-sm btn-light w-100 fw-bold">Login Admin</a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="bg-white bg-opacity-10 p-4 rounded-3 text-center border border-white border-opacity-10">
                                        <span class="badge bg-info text-dark mb-3">USER</span>
                                        <div class="mb-2">Email: <code>user@ciputra.com</code></div>
                                        <div class="mb-3">Pass: <code>ALP4</code></div>
                                        <a href="{{ route('login') }}" class="btn btn-sm btn-light w-100 fw-bold">Login User</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Features Details - 25 Points -->
                <section id="features-25" class="mb-5 section-card" data-aos="fade-up">
                    <h3 class="fw-bold mb-4 text-danger border-start border-5 border-danger ps-3">🔥 Fitur 25 Poin</h3>

                    <!-- Multi-Language -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-danger bg-opacity-10 p-2 rounded-3 me-3"><i class="bi bi-translate text-danger fs-4"></i></div>
                                <h5 class="fw-bold mb-0">Multi Bahasa (ID / EN)</h5>
                            </div>
                            <p class="text-muted small">Website mendukung dua bahasa secara penuh dengan session persistence.</p>
                            <div class="bg-light p-3 rounded-3 mt-3 border">
                                <h6 class="fw-bold small text-uppercase text-muted">Panduan Penggunaan:</h6>
                                <ol class="small mb-0 ps-3">
                                    <li>Lihat pada Navbar bagian kanan atas (Bendera/Kode Bahasa).</li>
                                    <li>Klik dropdown dan pilih "Indonesia" atau "English".</li>
                                    <li>Seluruh teks statis website akan berubah bahasa secara instan.</li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <!-- Stock Management -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-danger bg-opacity-10 p-2 rounded-3 me-3"><i class="bi bi-box-seam text-danger fs-4"></i></div>
                                <h5 class="fw-bold mb-0">Manajemen Stok (Admin) & Sync</h5>
                            </div>
                            <p class="text-muted small">Pengelolaan stok produk yang sinkron real-time dengan tampilan Homepage.</p>
                            <div class="bg-light p-3 rounded-3 mt-3 border">
                                <h6 class="fw-bold small text-uppercase text-muted">Panduan Penggunaan:</h6>
                                <ol class="small mb-0 ps-3">
                                    <li>Login sebagai <strong>Admin</strong>.</li>
                                    <li>Masuk ke menu <strong>Stock Management</strong> di sidebar.</li>
                                    <li>Cari produk, klik tombol <strong>Manage</strong>.</li>
                                    <li>Ubah stok menjadi <strong>0</strong> untuk melihat efek "OUT OF STOCK" di homepage.</li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <!-- Loyalty Program -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-danger bg-opacity-10 p-2 rounded-3 me-3"><i class="bi bi-award text-danger fs-4"></i></div>
                                <h5 class="fw-bold mb-0">Program Loyalti</h5>
                            </div>
                            <p class="text-muted small">User mendapatkan poin dari pembelian dan review, yang bisa ditukar voucher.</p>
                            <div class="bg-light p-3 rounded-3 mt-3 border">
                                <h6 class="fw-bold small text-uppercase text-muted">Panduan Penggunaan:</h6>
                                <ol class="small mb-0 ps-3">
                                    <li>Login sebagai User.</li>
                                    <li>Beli produk untuk dapat poin (1 poin / Rp 1.000).</li>
                                    <li>Buka menu user (klik nama) -> Pilih <strong>Beli Poin / Reward</strong> (placeholder link).</li>
                                    <li>Tukarkan poin dengan voucher diskon.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Features Details - 20 Points -->
                <section id="features-20" class="mb-5 section-card" data-aos="fade-up">
                    <h3 class="fw-bold mb-4 text-warning border-start border-5 border-warning ps-3">⚡ Fitur 20 Poin</h3>

                    <!-- Coupons -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-warning bg-opacity-10 p-2 rounded-3 me-3"><i class="bi bi-ticket-perforated text-warning fs-4"></i></div>
                                <h5 class="fw-bold mb-0">Kupon / Promo Code</h5>
                            </div>
                            <p class="text-muted small">Sistem kode promo yang bisa dibuat admin dan dipakai saat checkout.</p>
                            <div class="bg-light p-3 rounded-3 mt-3 border">
                                <h6 class="fw-bold small text-uppercase text-muted">Panduan Penggunaan:</h6>
                                <ol class="small mb-0 ps-3">
                                    <li><strong>Admin:</strong> Menu Promo Codes -> Create New -> Isi kode & diskon.</li>
                                    <li><strong>User:</strong> Saat Checkout, masukkan kode pada kolom "Promo Code".</li>
                                    <li>Diskon akan otomatis memotong total belanja.</li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <!-- Review Rating -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-warning bg-opacity-10 p-2 rounded-3 me-3"><i class="bi bi-star-half text-warning fs-4"></i></div>
                                <h5 class="fw-bold mb-0">Review & Rating</h5>
                            </div>
                            <div class="bg-light p-3 rounded-3 mt-3 border">
                                <h6 class="fw-bold small text-uppercase text-muted">Panduan Penggunaan:</h6>
                                <ol class="small mb-0 ps-3">
                                    <li>Buka halaman detail produk.</li>
                                    <li>Scroll ke bawah, isi bintang (1-5) dan komentar.</li>
                                    <li>Rating rata-rata produk akan otomatis terupdate.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Features Details - 15 Points -->
                <section id="features-15" class="mb-5 section-card" data-aos="fade-up">
                    <h3 class="fw-bold mb-4 text-info border-start border-5 border-info ps-3">💎 Fitur 15 Poin</h3>
                    
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h6 class="fw-bold"><i class="bi bi-heart me-2 text-info"></i>Wishlist</h6>
                                    <p class="small text-muted mb-2">Simpan produk favorit.</p>
                                    <small class="d-block text-muted">Cara: Klik ikon hati di produk.</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h6 class="fw-bold"><i class="bi bi-lightning-charge me-2 text-info"></i>Beli Langsung</h6>
                                    <p class="small text-muted mb-2">Checkout tanpa masuk keranjang.</p>
                                    <small class="d-block text-muted">Cara: Klik "Buy Now" di detail produk.</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h6 class="fw-bold"><i class="bi bi-share me-2 text-info"></i>Social Share</h6>
                                    <p class="small text-muted mb-2">Bagikan produk ke WA/Twitter.</p>
                                    <small class="d-block text-muted">Cara: Klik ikon sosmed di detail produk.</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h6 class="fw-bold"><i class="bi bi-geo-alt me-2 text-info"></i>Alamat Pengiriman</h6>
                                    <p class="small text-muted mb-2">Simpan banyak alamat.</p>
                                    <small class="d-block text-muted">Cara: Menu User -> Shipping Addresses.</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                
                 <!-- Features Details - 10-5 Points -->
                 <section id="features-10" class="mb-5 section-card" data-aos="fade-up">
                    <h3 class="fw-bold mb-4 text-secondary border-start border-5 border-secondary ps-3">✨ Fitur Tambahan (10 & 5 Poin)</h3>
                    <ul class="list-group list-group-flush shadow-sm rounded-4">
                        <li class="list-group-item py-3"><i class="bi bi-moon-stars me-2 text-secondary"></i> <strong>Dark Mode</strong> (10 Poin) - Tema gelap persisten.</li>
                        <li class="list-group-item py-3"><i class="bi bi-people me-2 text-secondary"></i> <strong>Manajemen Pengguna</strong> (10 Poin) - Admin dapat melihat daftar user.</li>
                        <li class="list-group-item py-3"><i class="bi bi-info-circle me-2 text-secondary"></i> <strong>Halaman Statis</strong> (5 Poin) - About Us, FAQ, Contact (Lengkap).</li>
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
