<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_products' => Product::count(),
            'low_stock' => Product::where('stock', '<', 10)->count(),
            'total_users' => User::count(),
            'total_orders' => Order::count(),
        ];
        
        return view('admin.dashboard', compact('stats'));
    }
}
