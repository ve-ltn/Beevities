<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category; 


class ProductController extends Controller
{
    public function catalog($organizationId)
    {
        $organization = Organization::findOrFail($organizationId);
        return view('user.merchandise.catalog', [
            'organization' => $organization,
            'products' => $organization->products()->with('category')->get(),
            'categories' => Category::all()
        ]);
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
