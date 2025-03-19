@extends('organization_admin.layouts.app')

@section('title', 'Edit Product')

@section('content')
<div class="container mt-4 d-flex justify-content-center">
    <div class="w-100" style="max-width: 600px;">
        <h2 class="mb-4 text-center">Edit Product</h2>

        <form action="{{ route('organization_admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="shadow p-4 bg-light rounded">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label class="m-1 text-secondary form-label fw-bold">Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" required>
            </div>

            <div class="mb-3">
                <label class="m-1 text-secondary form-label fw-bold">Category</label>
                <select name="category_id" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="m-1 text-secondary form-label fw-bold">Price</label>
                <input type="number" name="price" class="form-control" value="{{ old('price', $product->price) }}" required>
            </div>

            <div class="mb-3">
                <label class="m-1 text-secondary form-label fw-bold">Stock</label>
                <input type="number" name="stock" class="form-control" value="{{ old('stock', $product->stock) }}" required>
            </div>

            <div class="mb-3">
                <label class="m-1 text-secondary form-label fw-bold">Current Image</label>
                @if($product->image)
                    <br>
                    <img src="{{ $product->image }}" alt="Product Image" class="rounded shadow" style="width: 150px; height: auto;">
                    <br>
                @else
                    <p class="text-muted">No image available</p>
                @endif
            </div>

            <div class="mb-3">
                <label class="m-1 text-secondary form-label fw-bold">Upload New Image</label>
                <input type="file" name="image" class="form-control">
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary px-4 py-2">Update</button>
                <a href="{{ route('organization_admin.products.index') }}" class="btn btn-secondary px-4 py-2">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection