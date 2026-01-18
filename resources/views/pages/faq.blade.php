@extends('layouts.app')

@section('title', 'FAQ - ShopMini')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            {{-- Header --}}
            <div class="text-center mb-5">
                <h1 class="display-4 fw-bold mb-3">
                    <i class="bi bi-question-circle text-primary"></i> Frequently Asked Questions
                </h1>
                <p class="lead text-muted">Find answers to common questions about ShopMini</p>
            </div>

            {{-- FAQ Accordion --}}
            <div class="accordion" id="faqAccordion">
                {{-- General Questions --}}
                <div class="card mb-3 border-0 shadow-sm">
                    <div class="card-header bg-white" id="heading1">
                        <h5 class="mb-0">
                            <button class="btn btn-link text-decoration-none w-100 text-start collapsed" type="button" 
                                    data-bs-toggle="collapse" data-bs-target="#collapse1">
                                <i class="bi bi-chevron-right me-2"></i>
                                Bagaimana cara berbelanja di ShopMini?
                            </button>
                        </h5>
                    </div>
                    <div id="collapse1" class="collapse" data-bs-parent="#faqAccordion">
                        <div class="card-body">
                            <ol>
                                <li>Buat akun atau login ke ShopMini</li>
                                <li>Pilih produk yang Anda inginkan</li>
                                <li>Tambahkan ke keranjang belanja</li>
                                <li>Lakukan checkout dan pilih metode pembayaran</li>
                                <li>Konfirmasi pesanan dan tunggu produk dikirim</li>
                            </ol>
                        </div>
                    </div>
                </div>

                {{-- Payment --}}
                <div class="card mb-3 border-0 shadow-sm">
                    <div class="card-header bg-white" id="heading2">
                        <h5 class="mb-0">
                            <button class="btn btn-link text-decoration-none w-100 text-start collapsed" type="button" 
                                    data-bs-toggle="collapse" data-bs-target="#collapse2">
                                <i class="bi bi-chevron-right me-2"></i>
                                Metode pembayaran apa saja yang tersedia?
                            </button>
                        </h5>
                    </div>
                    <div id="collapse2" class="collapse" data-bs-parent="#faqAccordion">
                        <div class="card-body">
                            <p>Kami menerima berbagai metode pembayaran:</p>
                            <ul>
                                <li>Transfer Bank (BCA, Mandiri, BNI, BRI)</li>
                                <li>E-Wallet (GoPay, OVO, Dana, ShopeePay)</li>
                                <li>Kartu Kredit/Debit (Visa, Mastercard)</li>
                                <li>Cicilan 0% untuk produk tertentu</li>
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- Shipping --}}
                <div class="card mb-3 border-0 shadow-sm">
                    <div class="card-header bg-white" id="heading3">
                        <h5 class="mb-0">
                            <button class="btn btn-link text-decoration-none w-100 text-start collapsed" type="button" 
                                    data-bs-toggle="collapse" data-bs-target="#collapse3">
                                <i class="bi bi-chevron-right me-2"></i>
                                Berapa lama waktu pengiriman?
                            </button>
                        </h5>
                    </div>
                    <div id="collapse3" class="collapse" data-bs-parent="#faqAccordion">
                        <div class="card-body">
                            <p>Waktu pengiriman tergantung lokasi Anda:</p>
                            <ul>
                                <li><strong>Jabodetabek:</strong> 1-2 hari kerja</li>
                                <li><strong>Jawa:</strong> 2-4 hari kerja</li>
                                <li><strong>Luar Jawa:</strong> 3-7 hari kerja</li>
                            </ul>
                            <p class="mb-0">Anda dapat melacak pesanan melalui halaman "Orders" setelah login.</p>
                        </div>
                    </div>
                </div>

                {{-- Returns --}}
                <div class="card mb-3 border-0 shadow-sm">
                    <div class="card-header bg-white" id="heading4">
                        <h5 class="mb-0">
                            <button class="btn btn-link text-decoration-none w-100 text-start collapsed" type="button" 
                                    data-bs-toggle="collapse" data-bs-target="#collapse4">
                                <i class="bi bi-chevron-right me-2"></i>
                                Bagaimana kebijakan pengembalian barang?
                            </button>
                        </h5>
                    </div>
                    <div id="collapse4" class="collapse" data-bs-parent="#faqAccordion">
                        <div class="card-body">
                            <p>Kami menerima pengembalian barang dengan syarat:</p>
                            <ul>
                                <li>Produk masih dalam kondisi baru dan segel belum dibuka</li>
                                <li>Pengajuan pengembalian maksimal 7 hari setelah barang diterima</li>
                                <li>Barang cacat produksi dapat diklaim garansi</li>
                                <li>Biaya pengiriman return ditanggung pembeli (kecuali kesalahan toko)</li>
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- Warranty --}}
                <div class="card mb-3 border-0 shadow-sm">
                    <div class="card-header bg-white" id="heading5">
                        <h5 class="mb-0">
                            <button class="btn btn-link text-decoration-none w-100 text-start collapsed" type="button" 
                                    data-bs-toggle="collapse" data-bs-target="#collapse5">
                                <i class="bi bi-chevron-right me-2"></i>
                                Apakah produk bergaransi?
                            </button>
                        </h5>
                    </div>
                    <div id="collapse5" class="collapse" data-bs-parent="#faqAccordion">
                        <div class="card-body">
                            <p>Ya! Semua produk elektronik di ShopMini dilengkapi dengan:</p>
                            <ul>
                                <li>Garansi resmi dari distributor/brand (1-2 tahun)</li>
                                <li>Garansi toko untuk produk tertentu</li>
                                <li>Sertifikat garansi dan invoice pembelian</li>
                            </ul>
                            <p class="mb-0">Detail garansi dapat dilihat pada deskripsi masing-masing produk.</p>
                        </div>
                    </div>
                </div>

                {{-- Account --}}
                <div class="card mb-3 border-0 shadow-sm">
                    <div class="card-header bg-white" id="heading6">
                        <h5 class="mb-0">
                            <button class="btn btn-link text-decoration-none w-100 text-start collapsed" type="button" 
                                    data-bs-toggle="collapse" data-bs-target="#collapse6">
                                <i class="bi bi-chevron-right me-2"></i>
                                Bagaimana cara reset password?
                            </button>
                        </h5>
                    </div>
                    <div id="collapse6" class="collapse" data-bs-parent="#faqAccordion">
                        <div class="card-body">
                            <ol>
                                <li>Klik "Forgot Password" di halaman login</li>
                                <li>Masukkan email yang terdaftar</li>
                                <li>Cek email untuk link reset password</li>
                                <li>Klik link dan buat password baru</li>
                            </ol>
                            <p class="mb-0">Jika tidak menerima email, cek folder spam atau hubungi customer service.</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Contact Section --}}
            <div class="card bg-light border-0 mt-5">
                <div class="card-body p-4 text-center">
                    <h4 class="mb-3">Still have questions?</h4>
                    <p class="text-muted mb-4">Our customer support team is ready to help you</p>
                    <a href="{{ route('contact') }}" class="btn btn-primary">
                        <i class="bi bi-chat-dots"></i> Contact Support
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.accordion .btn-link {
    color: #212529;
    font-weight: 500;
}
.accordion .btn-link:hover {
    color: #667eea;
}
.accordion .btn-link i {
    transition: transform 0.3s;
}
.accordion .btn-link:not(.collapsed) i {
    transform: rotate(90deg);
}
</style>
@endsection
