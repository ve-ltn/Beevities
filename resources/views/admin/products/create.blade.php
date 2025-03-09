@extends('admin.layouts.app')
@section('title', 'Tambah Produk')
@section('content')
    <div class="card p-4 bg-light text-dark">
        <h2 class="mb-4 text-primary">Tambah Produk</h2>
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="organization_id" class="form-label">Organisasi</label>
                <select name="organization_id" class="form-select" required>
                    @foreach($organizations as $organization)
                        <option value="{{ $organization->id }}">{{ $organization->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Kategori</label>
                <select name="category_id" class="form-select" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nama Produk</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Harga</label>
                <input type="number" name="price" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Stok</label>
                <input type="number" name="stock" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
@endsection