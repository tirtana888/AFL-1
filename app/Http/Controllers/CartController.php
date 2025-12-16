<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * =============================================================================
 * CART CONTROLLER - PENGATURAN KERANJANG BELANJA
 * =============================================================================
 * Controller ini menangani semua operasi keranjang belanja:
 * - index()  : Menampilkan isi keranjang belanja user
 * - add()    : Menambahkan produk ke keranjang
 * - update() : Mengubah jumlah (quantity) produk di keranjang
 * - remove() : Menghapus produk dari keranjang
 * 
 * CATATAN PENTING:
 * - Semua route cart memerlukan autentikasi (user harus login)
 * - Data keranjang disimpan di tabel 'carts' dalam database
 * - Setiap cart item terhubung dengan user_id dan product_id
 * =============================================================================
 */
class CartController extends Controller
{
    /**
     * =========================================================================
     * FUNGSI INDEX - MENAMPILKAN KERANJANG BELANJA
     * =========================================================================
     * Menampilkan semua item di keranjang belanja milik user yang login
     * 
     * Data yang ditampilkan:
     * - Daftar produk dalam keranjang
     * - Quantity masing-masing produk
     * - Harga per produk
     * - Subtotal per produk (harga x quantity)
     * - Total keseluruhan
     * 
     * @return View - Halaman keranjang belanja
     */
    public function index()
    {
        // =====================================================================
        // MENGAMBIL DATA KERANJANG
        // =====================================================================
        // - with('product') : Eager loading relasi product (mencegah N+1 query)
        // - where('user_id', Auth::id()) : Filter hanya cart milik user login
        // =====================================================================
        $cartItems = Cart::with('product')
            ->where('user_id', Auth::id())
            ->get();

        // =====================================================================
        // MENGHITUNG TOTAL BELANJA
        // =====================================================================
        // Menggunakan fungsi sum() dengan callback untuk menghitung:
        // Total = Σ (harga produk × quantity)
        // =====================================================================
        $total = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        // Kirim data ke view
        return view('cart.index', compact('cartItems', 'total'));
    }

    /**
     * =========================================================================
     * FUNGSI ADD - MENAMBAHKAN PRODUK KE KERANJANG
     * =========================================================================
     * Menambahkan produk ke keranjang belanja
     * 
     * Logika:
     * 1. Cek apakah produk sudah ada di keranjang user
     * 2. Jika sudah ada: tambah quantity +1
     * 3. Jika belum ada: buat cart item baru dengan quantity 1
     * 
     * @param Request $request - Data dari request
     * @param Product $product - Produk yang akan ditambahkan (Route Model Binding)
     * @return Redirect - Kembali ke halaman sebelumnya dengan pesan sukses
     */
    public function add(Request $request, Product $product)
    {
        // =====================================================================
        // CEK APAKAH PRODUK SUDAH ADA DI KERANJANG
        // =====================================================================
        // Mencari cart item dengan user_id dan product_id yang sama
        // =====================================================================
        $cart = Cart::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->first();

        if ($cart) {
            // =================================================================
            // PRODUK SUDAH ADA DI KERANJANG
            // =================================================================
            // Jika produk sudah ada, tambahkan quantity +1
            // Menggunakan increment() untuk menambah nilai kolom
            // =================================================================
            $cart->increment('quantity');
        } else {
            // =================================================================
            // PRODUK BELUM ADA DI KERANJANG
            // =================================================================
            // Buat cart item baru dengan:
            // - user_id: ID user yang login
            // - product_id: ID produk yang ditambahkan
            // - quantity: 1 (default pertama kali)
            // =================================================================
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $product->id,
                'quantity' => 1
            ]);
        }

        // Redirect kembali dengan pesan sukses
        return redirect()->back()
            ->with('success', 'Product added to cart!');
    }

    /**
     * =========================================================================
     * FUNGSI UPDATE - MENGUBAH QUANTITY PRODUK
     * =========================================================================
     * Mengubah jumlah (quantity) produk di keranjang
     * 
     * Validasi:
     * - User harus pemilik cart item tersebut
     * - Quantity harus angka positif (minimal 1)
     * 
     * @param Request $request - Data dari form (quantity baru)
     * @param Cart $cart - Cart item yang akan diupdate (Route Model Binding)
     * @return Redirect - Kembali ke halaman keranjang dengan pesan sukses
     */
    public function update(Request $request, Cart $cart)
    {
        // =====================================================================
        // VALIDASI KEPEMILIKAN
        // =====================================================================
        // Pastikan cart item milik user yang login
        // Mencegah user lain mengubah keranjang orang lain
        // =====================================================================
        if ($cart->user_id !== Auth::id()) {
            abort(403); // Forbidden - tidak punya akses
        }

        // =====================================================================
        // VALIDASI INPUT
        // =====================================================================
        // - required : Quantity wajib diisi
        // - integer  : Harus angka bulat
        // - min:1    : Minimal 1 (tidak boleh 0 atau negatif)
        // =====================================================================
        $validated = $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        // Update quantity di database
        $cart->update($validated);

        // Redirect ke halaman keranjang dengan pesan sukses
        return redirect()->route('cart.index')
            ->with('success', 'Cart updated!');
    }

    /**
     * =========================================================================
     * FUNGSI REMOVE - MENGHAPUS PRODUK DARI KERANJANG
     * =========================================================================
     * Menghapus produk dari keranjang belanja
     * 
     * Validasi:
     * - User harus pemilik cart item tersebut
     * 
     * @param Cart $cart - Cart item yang akan dihapus (Route Model Binding)
     * @return Redirect - Kembali ke halaman keranjang dengan pesan sukses
     */
    public function remove(Cart $cart)
    {
        // =====================================================================
        // VALIDASI KEPEMILIKAN
        // =====================================================================
        // Pastikan cart item milik user yang login
        // =====================================================================
        if ($cart->user_id !== Auth::id()) {
            abort(403); // Forbidden
        }

        // Hapus cart item dari database
        $cart->delete();

        // Redirect ke halaman keranjang dengan pesan sukses
        return redirect()->route('cart.index')
            ->with('success', 'Item removed from cart!');
    }
}
