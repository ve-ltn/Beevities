@extends('admin.layouts.app')

@section('title', 'Kelola Kategori')

@section('content')

    <div class="card p-4 bg-light text-dark">
        <h2 class="mb-4 text-primary">Kelola Kategori</h2>
        
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mb-3">Tambah Kategori</a>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nama Kategori</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->name }}</td>
                    <td class="text-center">
                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Hapus kategori ini?')">
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