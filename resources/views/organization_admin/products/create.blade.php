@extends('organization_admin.layouts.app')

@section('title', 'Add Product')

@section('content')
    <h2>Add Product</h2>

    <form action="{{ route('organization_admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Name:</label>
        <input type="text" name="name" class="form-control" required>

        <label>Category:</label>
        <select name="category_id" class="form-control">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>

        <label>Price:</label>
        <input type="number" name="price" class="form-control" required>

        <label>Stock:</label>
        <input type="number" name="stock" class="form-control" required>

        <label>Image:</label>
        <input type="file" name="image" class="form-control">

        <button type="submit" class="btn btn-primary mt-3">Save</button>
    </form>
@endsection
