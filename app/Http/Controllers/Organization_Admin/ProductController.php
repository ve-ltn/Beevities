<?php

namespace App\Http\Controllers\Organization_Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('organization_id', Auth::user()->organization_id)->with('category')->get();
        return view('organization_admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('organization_admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:80',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048'
        ]);

        $imagePath = $request->hasFile('image') ? $request->file('image')->store('products', 'public') : null;

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'category_id' => $request->category_id,
            'organization_id' => Auth::user()->organization_id,
            'image' => $imagePath
        ]);

        return redirect()->route('organization_admin.products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $product = Product::where('organization_id', Auth::user()->organization_id)->findOrFail($id);
        $categories = Category::all();
        return view('organization_admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::where('organization_id', Auth::user()->organization_id)->findOrFail($id);

        $request->validate([
            'name' => 'required|min:3|max:80',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            if ($product->image) Storage::delete('public/' . $product->image);
            $imagePath = $request->file('image')->store('products', 'public');
        } else {
            $imagePath = $product->image;
        }

        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'category_id' => $request->category_id,
            'image' => $imagePath
        ]);

        return redirect()->route('organization_admin.products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $product = Product::where('organization_id', Auth::user()->organization_id)->findOrFail($id);
        if ($product->image) Storage::delete('public/' . $product->image);
        $product->delete();

        return redirect()->route('organization_admin.products.index')->with('success', 'Produk berhasil dihapus.');
    }
}
