@extends('organization_admin.layouts.app')

@section('title', 'Add Product')

@section('content')
<div class="container mt-4 d-flex justify-content-center">
    <div class="w-100" style="max-width: 600px;">
        <h2 class="mb-4 fw-bold text-center">Add Product</h2>

        <form action="{{ route('organization_admin.products.store') }}" method="POST" enctype="multipart/form-data" class="shadow p-4 bg-light rounded">
            @csrf
            
            <div class="mb-3">
                <label class=" m-1 text-secondary form-label fw-bold">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter product name" required>
            </div>

            <div class="mb-3">
                <label class="m-1 text-secondary form-label fw-bold">Category</label>
                <select name="category_id" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="m-1 text-secondary form-label fw-bold">Price</label>
                <input type="number" name="price" class="form-control" placeholder="Enter price" required>
            </div>

            <div class="mb-3">
                <label class="m-1 text-secondary form-label fw-bold">Stock</label>
                <input type="number" name="stock" class="form-control" placeholder="Enter stock quantity" required>
            </div>

            <div class="mb-3">
                <label class="m-1 text-secondary form-label fw-bold">Image</label>
                <input type="file" name="image" class="form-control">
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary px-4 py-2">Save</button>
                <a href="{{ route('organization_admin.products.index') }}" class="btn btn-secondary px-4 py-2">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
