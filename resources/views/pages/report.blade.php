@extends('layouts.app')

@section('title', 'Laporan Tugas & Dokumentasi - ShopMini')

@section('content')
<div class="container py-5">
    <!-- Header Section -->
    <div class="text-center mb-5" data-aos="fade-down">
        <h1 class="fw-bold display-4 mb-3">Laporan Tugas ALP - Web Programming</h1>
        <p class="lead text-muted mb-4">Dokumentasi Fitur & Panduan Penggunaan</p>
        <div class="d-flex justify-content-center gap-3">
            <a href="https://github.com/tirtana888/AFL-1" target="_blank" class="btn btn-dark btn-lg rounded-pill px-4">
                <i class="bi bi-github me-2"></i>GitHub Repository
            </a>
            <a href="{{ route('home') }}" class="btn btn-outline-primary btn-lg rounded-pill px-4">
                <i class="bi bi-house me-2"></i>Live Demo
            </a>
        </div>
    </div>

    <div class="row g-4">
        <!-- Sidebar Navigation -->
        <div class="col-lg-3">
            <div class="card border-0 shadow-sm sticky-top" style="top: 100px;">
                <div class="card-body p-0">
                    <div class="list-group list-group-flush rounded-3">
                        <a href="#summary" class="list-group-item list-group-item-action py-3 fw-bold active" data-bs-toggle="list">
                            <i class="bi bi-grid me-2"></i>Ringkasan Proyek
                        </a>
                        <a href="#features" class="list-group-item list-group-item-action py-3" data-bs-toggle="list">
                            <i class="bi bi-stars me-2"></i>Fitur Utama (User)
                        </a>
                        <a href="#admin" class="list-group-item list-group-item-action py-3" data-bs-toggle="list">
                            <i class="bi bi-shield-lock me-2"></i>Fitur Admin
                        </a>
                        <a href="#advanced" class="list-group-item list-group-item-action py-3" data-bs-toggle="list">
                            <i class="bi bi-lightning me-2"></i>Fitur Advanced
                        </a>
                        <a href="#technical" class="list-group-item list-group-item-action py-3" data-bs-toggle="list">
                            <i class="bi bi-code-slash me-2"></i>Implementasi Teknis
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Area -->
        <div class="col-lg-9">
            
            <!-- Ringkasan -->
            <section id="summary" class="mb-5" data-aos="fade-up">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h3 class="fw-bold text-primary mb-3">Ringkasan Proyek</h3>
                        <p class="lead">ShopMini adalah platform e-commerce modern yang dibangun menggunakan Laravel 10. Proyek ini mencakup fitur lengkap mulai dari sisi pengguna (User) hingga panel administrasi (Admin) dengan fokus pada UI/UX yang premium.</p>
                        
                        <div class="row mt-4 g-3">
                            <div class="col-md-4">
                                <div class="p-3 bg-light rounded-3 text-center h-100">
                                    <h2 class="fw-bold text-primary">13+</h2>
                                    <p class="mb-0 small">Fitur Utama</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="p-3 bg-light rounded-3 text-center h-100">
                                    <h2 class="fw-bold text-success">100%</h2>
                                    <p class="mb-0 small">Responsive & Modern</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="p-3 bg-light rounded-3 text-center h-100">
                                    <h2 class="fw-bold text-warning">Realtime</h2>
                                    <p class="mb-0 small">Admin Sync</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Fitur User -->
            <section id="features" class="mb-5" data-aos="fade-up">
                <h3 class="fw-bold mb-4 border-bottom pb-2">🚀 Fitur Utama (User Features)</h3>
                
                <!-- Review System -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-warning bg-opacity-10 p-2 rounded-circle text-warning me-3">
                                <i class="bi bi-star-fill fs-4"></i>
                            </div>
                            <h4 class="fw-bold mb-0">1. Review & Rating System</h4>
                        </div>
                        <p class="text-muted">Memungkinkan pengguna memberikan ulasan bintang 1-5 dan komentar pada produk.</p>
                        <h6 class="fw-bold mt-3">Panduan Penggunaan:</h6>
                        <ol class="small text-muted">
                            <li>Login sebagai user.</li>
                            <li>Buka halaman detail produk.</li>
                            <li>Scroll ke bagian "Reviews".</li>
                            <li>Isi rating bintang dan komentar, lalu klik "Submit Review".</li>
                        </ol>
                    </div>
                </div>

                <!-- Wishlist -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-danger bg-opacity-10 p-2 rounded-circle text-danger me-3">
                                <i class="bi bi-heart-fill fs-4"></i>
                            </div>
                            <h4 class="fw-bold mb-0">2. Wishlist / Favorites</h4>
                        </div>
                        <p class="text-muted">Simpan produk favorit tanpa harus masuk ke keranjang.</p>
                        <h6 class="fw-bold mt-3">Panduan Penggunaan:</h6>
                        <ol class="small text-muted">
                            <li>Klik ikon <i class="bi bi-heart"></i> pada kartu produk atau halaman detail.</li>
                            <li>Buka menu "Wishlist" di navbar untuk melihat daftar simpanan.</li>
                            <li>Klik ikon sampah untuk menghapus item.</li>
                        </ol>
                    </div>
                </div>

                <!-- Dark Mode -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-dark bg-opacity-10 p-2 rounded-circle text-dark me-3">
                                <i class="bi bi-moon-stars-fill fs-4"></i>
                            </div>
                            <h4 class="fw-bold mb-0">3. Dark Mode Theme</h4>
                        </div>
                        <p class="text-muted">Tema gelap yang nyaman di mata dengan persistensi (jika di-refresh tetap gelap).</p>
                        <h6 class="fw-bold mt-3">Panduan Penggunaan:</h6>
                        <ul class="small text-muted">
                            <li>Klik ikon Bulan/Matahari di pojok kanan atas navbar.</li>
                        </ul>
                    </div>
                </div>
            </section>

            <!-- Fitur Admin -->
            <section id="admin" class="mb-5" data-aos="fade-up">
                <h3 class="fw-bold mb-4 border-bottom pb-2">🛡️ Panel Admin & Keamanan</h3>
                
                <div class="alert alert-info">
                    <strong>Admin Credentials:</strong><br>
                    Email: <code>demo@ciputra.com</code><br>
                    Password: <code>ALP4</code>
                </div>

                <!-- Stock Management -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <h5 class="fw-bold"><i class="bi bi-box-seam me-2 text-primary"></i>Stock Management & Homepage Sync</h5>
                        <p class="text-muted mt-2">Sinkronisasi stok real-time. Jika admin mengubah stok, tampilan di homepage ("New Arrivals") akan berubah otomatis.</p>
                        <ul class="small text-muted">
                            <li><strong>Stok = 0:</strong> Tampil badge "OUT OF STOCK" (Merah) & tombol beli disable.</li>
                            <li><strong>Stok < 5:</strong> Tampil badge "Low Stock" (Kuning).</li>
                        </ul>
                    </div>
                </div>

                <!-- Promo Codes -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <h5 class="fw-bold"><i class="bi bi-ticket-perforated me-2 text-primary"></i>Promo Code System</h5>
                        <p class="text-muted mt-2">Admin dapat membuat kode promo (Diskon Tetap atau Persen) yang bisa dipakai user saat checkout.</p>
                    </div>
                </div>
            </section>

            <!-- Fitur Advanced -->
            <section id="advanced" class="mb-5" data-aos="fade-up">
                <h3 class="fw-bold mb-4 border-bottom pb-2">⚡ Fitur Advanced (Phase 3 & 4)</h3>
                
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body">
                                <h6 class="fw-bold">🌐 Multi-Language (ID/EN)</h6>
                                <p class="small text-muted">Ganti bahasa Indonesia/Inggris secara instan lewat navbar.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body">
                                <h6 class="fw-bold">🏆 Loyalty Points</h6>
                                <p class="small text-muted">Dapat poin setiap beli barang. Tukar poin jadi Voucher Diskon.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body">
                                <h6 class="fw-bold">⚡ Buy Now</h6>
                                <p class="small text-muted">Beli langsung tanpa masuk keranjang (Direct Checkout).</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body">
                                <h6 class="fw-bold">📢 Social Share</h6>
                                <p class="small text-muted">Tombol share produk ke WA/Twitter/FB di halaman detail.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

             <!-- Teknis -->
             <section id="technical" class="mb-5" data-aos="fade-up">
                <h3 class="fw-bold mb-4 border-bottom pb-2">💻 Implementasi Teknis</h3>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Komponen</th>
                                <th>Teknologi / Library</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Framework</td>
                                <td>Laravel 10</td>
                            </tr>
                            <tr>
                                <td>Frontend</td>
                                <td>Bootstrap 5, Custom CSS, Glassmorphism</td>
                            </tr>
                            <tr>
                                <td>Animations</td>
                                <td>AOS (Animate On Scroll) Library</td>
                            </tr>
                            <tr>
                                <td>Database</td>
                                <td>MySQL (Relational Tables: Users, Products, Orders, Reviews, etc)</td>
                            </tr>
                            <tr>
                                <td>Authentication</td>
                                <td>Laravel Auth (Multi-Guard: Web & Admin)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>

        </div>
    </div>
</div>

<script>
    // Smooth scroll for sidebar links
    document.querySelectorAll('.list-group-item').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelectorAll('.list-group-item').forEach(el => el.classList.remove('active'));
            this.classList.add('active');
            
            const targetId = this.getAttribute('href');
            document.querySelector(targetId).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
</script>
@endsection
