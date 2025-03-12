@extends('organization_admin.layouts.app')

@section('title', 'Manage Products')

@section('content')
    <div class="container">
        <h2 class="mb-4 text-center fw-bold">Product Management</h2>
        
        <div class="d-flex justify-content-between mb-3">
            <a href="{{ route('organization_admin.products.create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Add New Product
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($products as $product)
                    <tr class="table-primary">
                            <td class="fw-bold">{{ $product->name }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>Rp. {{ number_format($product->price) }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>
                                <a href="{{ route('organization_admin.products.edit', $product->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('organization_admin.products.destroy', $product->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
