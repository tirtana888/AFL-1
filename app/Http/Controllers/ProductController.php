<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

/**
 * =============================================================================
 * PRODUCT CONTROLLER
 * =============================================================================
 * Controller ini menangani semua operasi CRUD (Create, Read, Update, Delete)
 * untuk produk, serta fitur pencarian, filter, dan sorting.
 * 
 * Fitur yang tersedia:
 * - index()  : Menampilkan daftar produk dengan search, filter, sort
 * - show()   : Menampilkan detail satu produk
 * - create() : Menampilkan form tambah produk baru
 * - store()  : Menyimpan produk baru ke database
 * - edit()   : Menampilkan form edit produk
 * - update() : Mengupdate produk di database
 * =============================================================================
 */
class ProductController extends Controller
{
    /**
     * =========================================================================
     * FUNGSI INDEX - MENAMPILKAN DAFTAR PRODUK
     * =========================================================================
     * Fungsi ini menampilkan semua produk dengan fitur:
     * 1. SEARCH   - Mencari produk berdasarkan nama atau deskripsi
     * 2. FILTER   - Filter berdasarkan range harga (min & max)
     * 3. SORTING  - Mengurutkan berdasarkan nama atau harga
     * 4. PAGINATION - Menampilkan 20 produk per halaman
     * 
     * @param Request $request - Data dari form pencarian/filter
     * @return View - Halaman daftar produk
     */
    public function index(Request $request)
    {
        // Mulai query dengan relasi category (eager loading)
        // Eager loading mencegah N+1 query problem
        $query = Product::with('category');

        // =====================================================================
        // FITUR 1: SEARCH (PENCARIAN)
        // =====================================================================
        // Mencari produk berdasarkan nama ATAU deskripsi
        // Menggunakan LIKE untuk partial matching (mencari kata di tengah)
        // Contoh: search "samsung" akan menemukan "Samsung Galaxy A54"
        // =====================================================================
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                // Cari di kolom 'name' (nama produk)
                $q->where('name', 'LIKE', "%{$search}%")
                    // ATAU cari di kolom 'description' (deskripsi produk)
                    ->orWhere('description', 'LIKE', "%{$search}%");
            });
        }

        // =====================================================================
        // FITUR 2: FILTER HARGA MINIMUM
        // =====================================================================
        // Filter produk dengan harga >= nilai minimum yang dimasukkan
        // Contoh: min_price=1000000 akan menampilkan produk >= Rp 1.000.000
        // =====================================================================
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }

        // =====================================================================
        // FITUR 3: FILTER HARGA MAKSIMUM
        // =====================================================================
        // Filter produk dengan harga <= nilai maksimum yang dimasukkan
        // Contoh: max_price=5000000 akan menampilkan produk <= Rp 5.000.000
        // =====================================================================
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        // =====================================================================
        // FITUR 4: SORTING (PENGURUTAN)
        // =====================================================================
        // Mengurutkan hasil berdasarkan pilihan user:
        // - name_asc   : Nama A-Z (ascending)
        // - name_desc  : Nama Z-A (descending)
        // - price_asc  : Harga terendah ke tertinggi
        // - price_desc : Harga tertinggi ke terendah
        // - default    : Produk terbaru (created_at desc)
        // =====================================================================
        if ($request->filled('sort')) {
            switch ($request->sort) {
                case 'name_asc':
                    // Urutkan berdasarkan nama A-Z
                    $query->orderBy('name', 'asc');
                    break;
                case 'name_desc':
                    // Urutkan berdasarkan nama Z-A
                    $query->orderBy('name', 'desc');
                    break;
                case 'price_asc':
                    // Urutkan berdasarkan harga terendah
                    $query->orderBy('price', 'asc');
                    break;
                case 'price_desc':
                    // Urutkan berdasarkan harga tertinggi
                    $query->orderBy('price', 'desc');
                    break;
            }
        } else {
            // Default: urutkan berdasarkan produk terbaru
            $query->orderBy('created_at', 'desc');
        }

        // =====================================================================
        // FITUR 5: PAGINATION
        // =====================================================================
        // Membagi hasil menjadi beberapa halaman (20 produk per halaman)
        // Ini penting untuk performa ketika data produk banyak
        // =====================================================================
        $products = $query->paginate(20);

        // Ambil semua kategori untuk dropdown filter (opsional)
        $categories = Category::all();

        // Kembalikan view dengan data products dan categories
        return view('products.index', compact('products', 'categories'));
    }

    /**
     * =========================================================================
     * FUNGSI SHOW - MENAMPILKAN DETAIL PRODUK
     * =========================================================================
     * Menampilkan informasi lengkap satu produk berdasarkan ID
     * 
     * @param Product $product - Model Product (Route Model Binding)
     * @return View - Halaman detail produk
     */
    public function show(Product $product)
    {
        // Load relasi category untuk produk ini
        $product->load('category');

        return view('products.show', compact('product'));
    }

    /**
     * =========================================================================
     * FUNGSI CREATE - FORM TAMBAH PRODUK BARU
     * =========================================================================
     * Menampilkan form untuk menambahkan produk baru
     * 
     * @return View - Halaman form tambah produk
     */
    public function create()
    {
        // Ambil semua kategori untuk dropdown
        $categories = Category::all();

        return view('products.create', compact('categories'));
    }

    /**
     * =========================================================================
     * FUNGSI STORE - MENYIMPAN PRODUK BARU
     * =========================================================================
     * Memvalidasi input dan menyimpan produk baru ke database
     * 
     * Validasi:
     * - name        : Wajib diisi, maksimal 255 karakter
     * - category_id : Wajib diisi, harus ada di tabel categories
     * - description : Opsional
     * - price       : Wajib diisi, harus angka, minimal 0
     * 
     * @param Request $request - Data dari form
     * @return Redirect - Kembali ke halaman produk dengan pesan sukses
     */
    public function store(Request $request)
    {
        // Validasi input dari form
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0'
        ]);

        // Simpan produk baru ke database
        Product::create($validated);

        // Redirect ke halaman produk dengan pesan sukses
        return redirect()->route('products')
            ->with('success', 'Product created successfully!');
    }

    /**
     * =========================================================================
     * FUNGSI EDIT - FORM EDIT PRODUK
     * =========================================================================
     * Menampilkan form untuk mengedit produk yang sudah ada
     * 
     * @param Product $product - Model Product yang akan diedit
     * @return View - Halaman form edit produk
     */
    public function edit(Product $product)
    {
        // Ambil semua kategori untuk dropdown
        $categories = Category::all();

        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * =========================================================================
     * FUNGSI UPDATE - MENGUPDATE PRODUK
     * =========================================================================
     * Memvalidasi input dan mengupdate produk di database
     * 
     * @param Request $request - Data dari form
     * @param Product $product - Model Product yang akan diupdate
     * @return Redirect - Kembali ke halaman produk dengan pesan sukses
     */
    public function update(Request $request, Product $product)
    {
        // Validasi input dari form
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0'
        ]);

        // Update produk di database
        $product->update($validated);

        // Redirect ke halaman produk dengan pesan sukses
        return redirect()->route('products')
            ->with('success', 'Product updated successfully!');
    }
}
