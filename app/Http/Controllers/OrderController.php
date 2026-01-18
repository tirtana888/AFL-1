<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\PromoCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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

        $discount = 0;
        $promoCode = null;
        if (Session::has('applied_promo')) {
            $promoCode = PromoCode::where('code', Session::get('applied_promo'))->first();
            if ($promoCode && $promoCode->isValid() && $total >= $promoCode->min_purchase) {
                $discount = $promoCode->calculateDiscount($total);
            } else {
                Session::forget('applied_promo');
            }
        }

        return view('checkout.index', compact('cartItems', 'total', 'discount', 'promoCode'));
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

        $discount = 0;
        $promoCodeId = null;
        if (Session::has('applied_promo')) {
            $promo = PromoCode::where('code', Session::get('applied_promo'))->first();
            if ($promo && $promo->isValid() && $total >= $promo->min_purchase) {
                $discount = $promo->calculateDiscount($total);
                $promoCodeId = $promo->id;
            }
        }

        $finalTotal = $total - $discount;

        // DATABASE TRANSACTION: Semua operasi berhasil atau gagal bersama
        DB::transaction(function () use ($validated, $cartItems, $total, $discount, $promoCodeId, $finalTotal) {

            // 1. Buat Order baru
            $order = Order::create([
                'user_id' => Auth::id(),
                'shipping_address' => $validated['shipping_address'],
                'payment_method' => $validated['payment_method'],
                'total_amount' => $finalTotal,
                'discount_amount' => $discount,
                'promo_code_id' => $promoCodeId,
                'status' => 'pending'
            ]);

            // If promo code used, increment used_count
            if ($promoCodeId) {
                PromoCode::find($promoCodeId)->increment('used_count');
            }

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

    public function applyPromoCode(Request $request)
    {
        $request->validate([
            'code' => 'required|string|max:50'
        ]);

        $promo = PromoCode::where('code', strtoupper($request->code))->first();

        if (!$promo || !$promo->isValid()) {
            return back()->with('error', 'Invalid or expired promo code.');
        }

        $cartItems = Cart::with('product')
            ->where('user_id', Auth::id())
            ->get();
        
        $total = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        if ($total < $promo->min_purchase) {
            return back()->with('error', 'Minimum purchase of Rp ' . number_format($promo->min_purchase) . ' required.');
        }

        Session::put('applied_promo', $promo->code);

        return back()->with('success', 'Promo code applied!');
    }

    public function removePromoCode()
    {
        Session::forget('applied_promo');
        return back()->with('success', 'Promo code removed.');
    }
}
