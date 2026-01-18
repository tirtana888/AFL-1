<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
     * Display wishlist page.
     */
    public function index()
    {
        $wishlists = Auth::user()->wishlists()->with('product.category')->get();
        return view('wishlist.index', compact('wishlists'));
    }

    /**
     * Toggle wishlist (add or remove).
     */
    public function toggle(Product $product)
    {
        $wishlist = Wishlist::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->first();

        if ($wishlist) {
            // Remove from wishlist
            $wishlist->delete();
            return response()->json([
                'success' => true,
                'action' => 'removed',
                'message' => 'Dihapus dari wishlist'
            ]);
        } else {
            // Add to wishlist
            Wishlist::create([
                'user_id' => Auth::id(),
                'product_id' => $product->id,
            ]);
            return response()->json([
                'success' => true,
                'action' => 'added',
                'message' => 'Ditambahkan ke wishlist'
            ]);
        }
    }

    /**
     * Remove from wishlist.
     */
    public function destroy(Wishlist $wishlist)
    {
        // Check if user owns this wishlist
        if ($wishlist->user_id !== Auth::id()) {
            abort(403);
        }

        $wishlist->delete();

        return back()->with('success', 'Produk dihapus dari wishlist!');
    }
}
