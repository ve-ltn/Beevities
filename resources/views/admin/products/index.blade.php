@extends('admin.layouts.app')

@section('title', 'Kelola Produk')

@section('content')
    <h2 class="mb-4">Daftar Produk (Total: {{ $total_products }})</h2>
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary mb-3">Tambah Produk</a>
    
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Gambar</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" width="50">
                    @else
                        <span>Tidak Ada Gambar</span>
                    @endif
                </td>
                <td>{{ $product->name }}</td>
                <td>Rp. {{ number_format($product->price) }}</td>
                <td>{{ $product->stock }}</td>
                <td>{{ $product->category->name }}</td>
                <td>
                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
