<?php

namespace App\Http\Controllers\Organization_Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('organization_id', Auth::user()->organization_id)->get();
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
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // ✅ Prepare form fields
        $productData = $request->except(['image']);

        // ✅ Store image as binary if uploaded
        if ($request->hasFile('image')) {
            $productData['image'] = file_get_contents($request->file('image')->getRealPath());
        }

        // ✅ Create Product with organization_id
        Product::create(array_merge($productData, ['organization_id' => Auth::user()->organization_id]));

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
        $organizationId = Auth::user()->organization_id;
        $product = Product::where('organization_id', $organizationId)->findOrFail($id);

        $request->validate([
            'name' => 'required|min:3|max:80',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // ✅ Prepare form fields except image
        $updateData = $request->except(['image']);

        // ✅ Update image if a new one is uploaded
        if ($request->hasFile('image')) {
            $updateData['image'] = file_get_contents($request->file('image')->getRealPath());
        }

        // ✅ Update event with the new data
        try {
            $product->update($updateData);
        } catch (\Exception $e) {
            dd($e->getMessage()); // Show the actual error message
        }        

        return redirect()->route('organization_admin.products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $product = Product::where('organization_id', Auth::user()->organization_id)->findOrFail($id);
        $product->delete();

        return redirect()->route('organization_admin.products.index')->with('success', 'Produk berhasil dihapus.');
    }
}
