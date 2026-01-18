<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\PriceAlert;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('category');
        
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        
        if ($request->filled('low_stock')) {
            $query->where('stock', '<', 10);
        }
        
        $products = $query->orderBy('stock', 'asc')->paginate(20);
        
        return view('admin.stock.index', compact('products'));
    }
    
    public function edit(Product $stock)
    {
        return view('admin.stock.edit', ['product' => $stock]);
    }
    
    public function update(Request $request, Product $stock)
    {
        $request->validate([
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
        ]);

        $oldPrice = $stock->price;
        $newPrice = $request->price;
        
        $stock->update([
            'stock' => $request->stock,
            'price' => $newPrice
        ]);

        if ($newPrice < $oldPrice) {
            // Logic for price drop notification
            // Find alerts that match (either no target_price or price hit target_price)
            PriceAlert::where('product_id', $stock->id)
                ->where(function ($query) use ($newPrice) {
                    $query->whereNull('target_price')
                          ->orWhere('target_price', '>=', $newPrice);
                })
                ->update(['is_notified' => true]);
        }
        
        return redirect()->route('admin.stock.index')
            ->with('success', 'Stock & Price updated successfully for ' . $stock->name);
    }
}
