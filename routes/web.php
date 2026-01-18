<?php

/**
 * =============================================================================
 * ROUTES WEB - DEFINISI ROUTING APLIKASI
 * =============================================================================
 * File ini berisi semua route (URL) yang bisa diakses di aplikasi.
 * 
 * Struktur Route:
 * - Public Routes    : Bisa diakses tanpa login
 * - Protected Routes : Harus login (middleware 'auth')
 * =============================================================================
 */

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

// =============================================================================
// PUBLIC ROUTES (Tidak perlu login)
// =============================================================================

/**
 * HOME PAGE
 * URL: / (root)
 * Menampilkan landing page dengan hero section dan kategori
 */
Route::get('/', function () {
    return view('welcome');
})->name('home');

/**
 * STATIC PAGES
 * Halaman informatif (About, FAQ, Contact)
 */
Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/faq', function () {
    return view('pages.faq');
})->name('faq');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

/**
 * PRODUCT ROUTES
 * Semua route untuk mengelola produk (CRUD)
 */

// Menampilkan daftar produk dengan search, filter, sort
Route::get('/products', [ProductController::class, 'index'])->name('products');

// Form tambah produk baru
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

// Menyimpan produk baru ke database
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');

// Menampilkan detail satu produk
Route::get('/products/show/{product}', [ProductController::class, 'show'])->name('products.show');

// Form edit produk
Route::get('/products/edit/{product}', [ProductController::class, 'edit'])->name('products.edit');

// Update produk di database
Route::post('/products/update/{product}', [ProductController::class, 'update'])->name('products.update');

// =============================================================================
// PROTECTED ROUTES (Harus login)
// =============================================================================
// Semua route di dalam group ini memerlukan autentikasi
// Jika user belum login, akan diarahkan ke halaman login

Route::middleware('auth')->group(function () {

    /**
     * CART ROUTES - Keranjang Belanja
     */

    // Menampilkan isi keranjang (dengan subtotal dan total)
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

    // Menambahkan produk ke keranjang
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');

    // Mengubah quantity produk di keranjang
    Route::patch('/cart/update/{cart}', [CartController::class, 'update'])->name('cart.update');

    // Menghapus produk dari keranjang
    Route::delete('/cart/remove/{cart}', [CartController::class, 'remove'])->name('cart.remove');

    /**
     * CHECKOUT ROUTES - Proses Pembelian
     */

    // Menampilkan form checkout (alamat pengiriman & metode pembayaran)
    Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');

    // Memproses checkout dan menyimpan order ke database
    Route::post('/checkout', [OrderController::class, 'store'])->name('checkout.store');

    /**
     * ORDER HISTORY - Riwayat Pembelian
     */

    // Menampilkan daftar semua order yang pernah dibuat user
    Route::get('/orders', [OrderController::class, 'history'])->name('orders.history');

    /**
     * WISHLIST - Produk Favorit
     */
    Route::get('/wishlist', [\App\Http\Controllers\WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('/wishlist/toggle/{product}', [\App\Http\Controllers\WishlistController::class, 'toggle'])->name('wishlist.toggle');
    Route::delete('/wishlist/{wishlist}', [\App\Http\Controllers\WishlistController::class, 'destroy'])->name('wishlist.destroy');

    /**
     * REVIEWS - Rating & Review Produk
     */
    Route::post('/products/{product}/reviews', [\App\Http\Controllers\ReviewController::class, 'store'])->name('reviews.store');
    Route::put('/reviews/{review}', [\App\Http\Controllers\ReviewController::class, 'update'])->name('reviews.update');
    Route::delete('/reviews/{review}', [\App\Http\Controllers\ReviewController::class, 'destroy'])->name('reviews.destroy');
});

// =============================================================================
// AUTH ROUTES (Login, Register, Logout)
// =============================================================================
// Route ini disediakan oleh Laravel Breeze

require __DIR__ . '/auth.php';
