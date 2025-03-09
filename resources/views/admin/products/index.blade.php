{{-- Product Index Page --}}
@extends('admin.layouts.app')
@section('title', 'Daftar Produk')
@section('content')
    <div class="card p-4 bg-light text-dark">
        <h2 class="mb-4 text-primary">Daftar Produk</h2>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary mb-3">Tambah Produk</a>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Nama</th>
                    <th>Organisasi</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->organization->name }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>Rp. {{ number_format($product->price) }}</td>
                        <td>{{ $product->stock }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection