<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

/**
 * ProductController - Mengelola CRUD Produk dengan Search, Filter, Sort
 */
class ProductController extends Controller
{
    /**
     * Menampilkan daftar produk dengan fitur search, filter harga, dan sorting
     */
    public function index(Request $request)
    {
        $query = Product::with('category'); // Eager loading untuk menghindari N+1 query

        // SEARCH: Cari berdasarkan nama atau deskripsi menggunakan LIKE
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%")
                    ->orWhereHas('category', function($q) use ($search) {
                        $q->where('name', 'LIKE', "%{$search}%");
                    });
            });
        }

        // FILTER HARGA MINIMUM: price >= min_price
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }

        // FILTER HARGA MAKSIMUM: price <= max_price
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        // SORTING: Urutkan berdasarkan nama atau harga (asc/desc)
        if ($request->filled('sort')) {
            switch ($request->sort) {
                case 'name_asc':
                    $query->orderBy('name', 'asc');    // A-Z
                    break;
                case 'name_desc':
                    $query->orderBy('name', 'desc');   // Z-A
                    break;
                case 'price_asc':
                    $query->orderBy('price', 'asc');   // Termurah
                    break;
                case 'price_desc':
                    $query->orderBy('price', 'desc'); // Termahal
                    break;
            }
        } else {
            $query->orderBy('created_at', 'desc'); // Default: terbaru
        }

        // PAGINATION: 20 produk per halaman
        $products = $query->paginate(20);
        $categories = Category::all();

        return view('products.index', compact('products', 'categories'));
    }

    /**
     * Menampilkan detail satu produk
     */
    public function show(Product $product)
    {
        $product->load('category');
        return view('products.show', compact('product'));
    }

    /**
     * Menampilkan form tambah produk
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    /**
     * Menyimpan produk baru ke database
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0'
        ]);

        Product::create($validated);

        return redirect()->route('products')->with('success', 'Product created!');
    }

    /**
     * Menampilkan form edit produk
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Mengupdate produk di database
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0'
        ]);

        $product->update($validated);

        return redirect()->route('products')->with('success', 'Product updated!');
    }
}
