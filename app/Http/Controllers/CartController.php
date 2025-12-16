<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * CartController - Mengelola Keranjang Belanja
 * Route dilindungi middleware 'auth' (harus login)
 */
class CartController extends Controller
{
    /**
     * Menampilkan isi keranjang dengan subtotal dan total
     */
    public function index()
    {
        // Ambil semua item keranjang milik user yang login
        $cartItems = Cart::with('product')
            ->where('user_id', Auth::id())
            ->get();

        // Hitung total: sum(harga x quantity)
        $total = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        return view('cart.index', compact('cartItems', 'total'));
    }

    /**
     * Menambahkan produk ke keranjang
     */
    public function add(Request $request, Product $product)
    {
        // Cek apakah produk sudah ada di keranjang
        $cart = Cart::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->first();

        if ($cart) {
            $cart->increment('quantity'); // Sudah ada: tambah quantity
        } else {
            Cart::create([                // Belum ada: buat baru
                'user_id' => Auth::id(),
                'product_id' => $product->id,
                'quantity' => 1
            ]);
        }

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    /**
     * Mengubah quantity produk di keranjang
     */
    public function update(Request $request, Cart $cart)
    {
        // Validasi kepemilikan: pastikan cart milik user yang login
        if ($cart->user_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $cart->update($validated);

        return redirect()->route('cart.index')->with('success', 'Cart updated!');
    }

    /**
     * Menghapus produk dari keranjang
     */
    public function remove(Cart $cart)
    {
        // Validasi kepemilikan
        if ($cart->user_id !== Auth::id()) {
            abort(403);
        }

        $cart->delete();

        return redirect()->route('cart.index')->with('success', 'Item removed!');
    }
}
