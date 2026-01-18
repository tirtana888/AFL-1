<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
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
        ]);
        
        $stock->update(['stock' => $request->stock]);
        
        return redirect()->route('admin.stock.index')
            ->with('success', 'Stock updated successfully for ' . $stock->name);
    }
}
