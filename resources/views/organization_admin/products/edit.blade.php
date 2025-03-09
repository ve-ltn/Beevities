@extends('organization_admin.layouts.app')

@section('title', 'Edit Product')

@section('content')
    <h2>Edit Product</h2>

    <form action="{{ route('organization_admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Name:</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" required>

        <label>Category:</label>
        <select name="category_id" class="form-control">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        <label>Price:</label>
        <input type="number" name="price" class="form-control" value="{{ old('price', $product->price) }}" required>

        <label>Stock:</label>
        <input type="number" name="stock" class="form-control" value="{{ old('stock', $product->stock) }}" required>

        <label>Current Image:</label>
        @if($product->image)
            <br>
            <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" style="width: 150px; height: auto;">
            <br>
        @else
            <p>No image available</p>
        @endif

        <label>Upload New Image:</label>
        <input type="file" name="image" class="form-control">

        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
@endsection
