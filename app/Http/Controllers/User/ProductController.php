<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category; 

class ProductController extends Controller
{
    public function catalog(Request $request){
        $products = Product::with('category')->get(); 
        $categories = Category::all(); 

        return view('user.catalog', compact('products', 'categories'));
    }

    public function filterByCategory(Request $request){
        $categoryId = $request->input('category_id');

        $products = Product::with('category')->when($categoryId, function ($query, $categoryId)
        {
            return $query->where('category_id', $categoryId);
            })->get();

        $categories = Category::all();

        return view('user.catalog', compact('products', 'categories', 'categoryId'));
    }
}
