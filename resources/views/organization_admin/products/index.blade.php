@extends('organization_admin.layouts.app')

@section('title', 'Manage Products')

@section('content')
    <h2>Product Management</h2>
    
    <a href="{{ route('organization_admin.products.create') }}" class="btn btn-success mb-3">Add New Product</a>
    
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>Rp. {{ number_format($product->price) }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        <a href="{{ route('organization_admin.products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('organization_admin.products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
