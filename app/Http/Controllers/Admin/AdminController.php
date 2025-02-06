<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $total_products = Product::count(); // Menghitung jumlah produk
        $total_users = User::count(); // Menghitung jumlah user

        return view('admin.dashboard', compact('total_products', 'total_users'));
    }
}
