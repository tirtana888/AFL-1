<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Store a new review.
     */
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review_text' => 'nullable|string|max:1000',
        ]);

        // Check if user already reviewed this product
        $existingReview = Review::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->first();

        if ($existingReview) {
            return back()->with('error', 'Anda sudah memberikan review untuk produk ini!');
        }

        Review::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'rating' => $request->rating,
            'review_text' => $request->review_text,
        ]);

        return back()->with('success', 'Review berhasil ditambahkan!');
    }

    /**
     * Update existing review.
     */
    public function update(Request $request, Review $review)
    {
        // Check if user owns this review
        if ($review->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review_text' => 'nullable|string|max:1000',
        ]);

        $review->update([
            'rating' => $request->rating,
            'review_text' => $request->review_text,
        ]);

        return back()->with('success', 'Review berhasil diupdate!');
    }

    /**
     * Delete review.
     */
    public function destroy(Review $review)
    {
        // Check if user owns this review
        if ($review->user_id !== Auth::id()) {
            abort(403);
        }

        $review->delete();

        return back()->with('success', 'Review berhasil dihapus!');
    }
}
