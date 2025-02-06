<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category; // Pastikan namespace Category ditambahkan

class ProductController extends Controller
{
    public function catalog(Request $request)
    {
        $products = Product::with('category')->get(); // Ambil semua produk
        $categories = Category::all(); // Ambil semua kategori untuk filter

        return view('user.catalog', compact('products', 'categories'));
    }

    public function filterByCategory(Request $request)
    {
        $categoryId = $request->input('category_id');

        $products = Product::with('category')
            ->when($categoryId, function ($query, $categoryId) {
                return $query->where('category_id', $categoryId); // Filter berdasarkan kategori
            })
            ->get();

        $categories = Category::all(); // Ambil semua kategori untuk filter

        return view('user.catalog', compact('products', 'categories', 'categoryId'));
    }
}
