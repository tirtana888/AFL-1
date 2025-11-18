<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id','desc')->get();
        return view('products.list', compact('products'));
    }

    public function show(Request $request)
    {
        $id = $request->query('id');
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function edit(Request $request)
    {
        $id = $request->query('id');
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }
