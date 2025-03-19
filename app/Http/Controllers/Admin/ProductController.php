<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Organization;

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

        // Convert image to binary data
        $imageData = $request->hasFile('image') ? file_get_contents($request->file('image')->getRealPath()) : null;

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'category_id' => $request->category_id,
            'organization_id' => $request->organization_id,
            'image' => $imageData // Store as binary
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
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|min:5|max:80',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'organization_id' => 'required|exists:organizations,id',
            'image' => 'nullable|image|max:2048'
        ]);

        // Update image only if a new one is uploaded
        if ($request->hasFile('image')) {
            $product->image = file_get_contents($request->file('image')->getRealPath());
        }

        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'category_id' => $request->category_id,
            'organization_id' => $request->organization_id,
            'image' => $product->image // Store updated image binary
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy($id) {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus.');
    }
}
