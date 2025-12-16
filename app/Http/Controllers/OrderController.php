<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * =============================================================================
 * ORDER CONTROLLER - PENGATURAN CHECKOUT & PESANAN
 * =============================================================================
 * Controller ini menangani proses checkout dan riwayat pembelian:
 * - checkout() : Menampilkan halaman checkout dengan form pengiriman
 * - store()    : Memproses pemesanan dan menyimpan ke database
 * - history()  : Menampilkan riwayat pembelian user
 * 
 * CATATAN PENTING:
 * - Semua route order memerlukan autentikasi (user harus login)
 * - Data pesanan disimpan di tabel 'orders' dan 'order_details'
 * - Setelah checkout, keranjang dikosongkan
 * =============================================================================
 */
class OrderController extends Controller
{
    /**
     * =========================================================================
     * FUNGSI CHECKOUT - MENAMPILKAN HALAMAN CHECKOUT
     * =========================================================================
     * Menampilkan halaman checkout dengan:
     * - Daftar item yang akan dibeli
     * - Form alamat pengiriman
     * - Pilihan metode pembayaran
     * - Total yang harus dibayar
     * 
     * Validasi:
     * - Keranjang tidak boleh kosong
     * 
     * @return View|Redirect - Halaman checkout atau redirect jika cart kosong
     */
    public function checkout()
    {
        // =====================================================================
        // MENGAMBIL DATA KERANJANG
        // =====================================================================
        // Ambil semua item di keranjang milik user yang login
        // dengan relasi product untuk menampilkan detail produk
        // =====================================================================
        $cartItems = Cart::with('product')
            ->where('user_id', Auth::id())
            ->get();

        // =====================================================================
        // CEK KERANJANG KOSONG
        // =====================================================================
        // Jika keranjang kosong, redirect ke halaman cart dengan pesan error
        // User tidak bisa checkout jika tidak ada item di keranjang
        // =====================================================================
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')
                ->with('error', 'Your cart is empty!');
        }

        // =====================================================================
        // MENGHITUNG TOTAL BELANJA
        // =====================================================================
        // Total = Σ (harga produk × quantity)
        // =====================================================================
        $total = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        // Kirim data ke view checkout
        return view('checkout.index', compact('cartItems', 'total'));
    }

    /**
     * =========================================================================
     * FUNGSI STORE - MEMPROSES PEMESANAN
     * =========================================================================
     * Memproses checkout dan menyimpan pesanan ke database
     * 
     * Proses yang dilakukan:
     * 1. Validasi input (alamat & metode pembayaran)
     * 2. Ambil data keranjang
     * 3. Hitung total belanja
     * 4. Simpan data order ke tabel 'orders'
     * 5. Simpan detail order ke tabel 'order_details'
     * 6. Kosongkan keranjang belanja
     * 
     * Menggunakan DATABASE TRANSACTION untuk memastikan:
     * - Semua operasi berhasil, atau
     * - Semua operasi dibatalkan (rollback) jika ada error
     * 
     * @param Request $request - Data dari form checkout
     * @return Redirect - Ke halaman order history dengan pesan sukses
     */
    public function store(Request $request)
    {
        // =====================================================================
        // VALIDASI INPUT
        // =====================================================================
        // - shipping_address : Alamat pengiriman (wajib diisi)
        // - payment_method   : Metode pembayaran (transfer/cod/ewallet)
        // =====================================================================
        $validated = $request->validate([
            'shipping_address' => 'required|string',
            'payment_method' => 'required|string|in:transfer,cod,ewallet'
        ]);

        // Ambil data keranjang
        $cartItems = Cart::with('product')
            ->where('user_id', Auth::id())
            ->get();

        // Cek keranjang kosong
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')
                ->with('error', 'Your cart is empty!');
        }

        // Hitung total belanja
        $total = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        // =====================================================================
        // DATABASE TRANSACTION
        // =====================================================================
        // Transaction memastikan semua operasi database berhasil
        // Jika ada error di tengah proses, semua perubahan dibatalkan
        // Ini penting untuk menjaga konsistensi data
        // =====================================================================
        DB::transaction(function () use ($validated, $cartItems, $total) {

            // =================================================================
            // LANGKAH 1: BUAT ORDER BARU
            // =================================================================
            // Simpan data order ke tabel 'orders'
            // =================================================================
            $order = Order::create([
                'user_id' => Auth::id(),           // ID user yang order
                'shipping_address' => $validated['shipping_address'],  // Alamat pengiriman
                'payment_method' => $validated['payment_method'],      // Metode pembayaran
                'total_amount' => $total,          // Total harga
                'status' => 'pending'              // Status awal: pending
            ]);

            // =================================================================
            // LANGKAH 2: BUAT ORDER DETAILS
            // =================================================================
            // Simpan detail setiap item ke tabel 'order_details'
            // Ini mencatat produk apa saja yang dibeli
            // =================================================================
            foreach ($cartItems as $item) {
                OrderDetail::create([
                    'order_id' => $order->id,              // ID order (relasi)
                    'product_id' => $item->product_id,     // ID produk
                    'quantity' => $item->quantity,          // Jumlah yang dibeli
                    'price_at_purchase' => $item->product->price  // Harga saat pembelian
                ]);
            }

            // =================================================================
            // LANGKAH 3: KOSONGKAN KERANJANG
            // =================================================================
            // Hapus semua item di keranjang setelah checkout berhasil
            // =================================================================
            Cart::where('user_id', Auth::id())->delete();
        });

        // Redirect ke halaman order history dengan pesan sukses
        return redirect()->route('orders.history')
            ->with('success', 'Order placed successfully!');
    }

    /**
     * =========================================================================
     * FUNGSI HISTORY - MENAMPILKAN RIWAYAT PEMBELIAN
     * =========================================================================
     * Menampilkan daftar semua pesanan yang pernah dibuat oleh user
     * 
     * Data yang ditampilkan:
     * - Daftar order (tanggal, status, total)
     * - Detail produk yang dibeli per order
     * - Alamat pengiriman
     * - Metode pembayaran
     * 
     * @return View - Halaman riwayat pembelian
     */
    public function history()
    {
        // =====================================================================
        // MENGAMBIL DATA ORDERS
        // =====================================================================
        // - with('orderDetails.product') : Eager loading nested relation
        //   (order -> orderDetails -> product)
        // - where('user_id', Auth::id()) : Filter hanya order milik user login
        // - orderBy('created_at', 'desc') : Urutkan dari yang terbaru
        // =====================================================================
        $orders = Order::with('orderDetails.product')
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        // Kirim data ke view
        return view('orders.history', compact('orders'));
    }
}
