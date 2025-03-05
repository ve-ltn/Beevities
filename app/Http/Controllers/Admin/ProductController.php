<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Organization;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index() {
        $products = Product::with(['category', 'organization'])->get();
        return view('admin.products.index', compact('products'));
    }

    public function create() {
        $categories = Category::all();
        $organizations = Organization::all();
        return view('admin.products.create', compact('categories', 'organizations'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|min:5|max:80',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'organization_id' => 'required|exists:organizations,id',
            'image' => 'nullable|image|max:2048'
        ]);

        $imagePath = $request->hasFile('image') ? $request->file('image')->store('products', 'public') : null;

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'category_id' => $request->category_id,
            'organization_id' => $request->organization_id,
            'image' => $imagePath
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit($id) {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $organizations = Organization::all();
        return view('admin.products.edit', compact('product', 'categories', 'organizations'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required|min:5|max:80',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'organization_id' => 'required|exists:organizations,id',
            'image' => 'nullable|image|max:2048'
        ]);

        $product = Product::findOrFail($id);

        if($request->hasFile('image')) {
            if ($product->image && Storage::exists('public/' . $product->image)) {
                Storage::delete('public/' . $product->image);
            }
            $imagePath = $request->file('image')->store('products', 'public');
        } else {
            $imagePath = $product->image;
        }

        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'category_id' => $request->category_id,
            'organization_id' => $request->organization_id,
            'image' => $imagePath
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy($id) {
        $product = Product::findOrFail($id);
        if ($product->image && Storage::exists('public/' . $product->image)) {
            Storage::delete('public/' . $product->image);
        }
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus.');
    }
}
