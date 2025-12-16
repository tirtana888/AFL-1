<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * OrderController - Mengelola Checkout dan Riwayat Pembelian
 */
class OrderController extends Controller
{
    /**
     * Menampilkan halaman checkout dengan form alamat dan payment
     */
    public function checkout()
    {
        $cartItems = Cart::with('product')
            ->where('user_id', Auth::id())
            ->get();

        // Redirect jika keranjang kosong
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Cart is empty!');
        }

        $total = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        return view('checkout.index', compact('cartItems', 'total'));
    }

    /**
     * Memproses checkout dan menyimpan order ke database
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'shipping_address' => 'required|string',
            'payment_method' => 'required|string|in:transfer,cod,ewallet'
        ]);

        $cartItems = Cart::with('product')
            ->where('user_id', Auth::id())
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Cart is empty!');
        }

        $total = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        // DATABASE TRANSACTION: Semua operasi berhasil atau gagal bersama
        DB::transaction(function () use ($validated, $cartItems, $total) {

            // 1. Buat Order baru
            $order = Order::create([
                'user_id' => Auth::id(),
                'shipping_address' => $validated['shipping_address'],
                'payment_method' => $validated['payment_method'],
                'total_amount' => $total,
                'status' => 'pending'
            ]);

            // 2. Buat OrderDetail untuk setiap item
            foreach ($cartItems as $item) {
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price_at_purchase' => $item->product->price
                ]);
            }

            // 3. Kosongkan keranjang
            Cart::where('user_id', Auth::id())->delete();
        });

        return redirect()->route('orders.history')->with('success', 'Order placed!');
    }

    /**
     * Menampilkan riwayat pembelian user
     */
    public function history()
    {
        $orders = Order::with('orderDetails.product')
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('orders.history', compact('orders'));
    }
}
