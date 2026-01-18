<?php

namespace App\Http\Controllers;

use App\Models\PriceAlert;
use App\Models\Product;
| use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PriceAlertController extends Controller
{
    public function store(Request $request, Product $product)
    {
        PriceAlert::updateOrCreate(
            ['user_id' => Auth::id(), 'product_id' => $product->id],
            ['target_price' => $request->target_price, 'is_notified' => false]
        );

        return back()->with('success', 'Price alert set! We will notify you when the price drops.');
    }

    public function destroy(PriceAlert $alert)
    {
        if ($alert->user_id !== Auth::id()) abort(403);
        $alert->delete();
        return back()->with('success', 'Price alert removed.');
    }
}
