@extends('admin.layouts.app')
@section('title', 'Tambah Kategori')
@section('content')
    <div class="card p-4 bg-light text-dark">
        <h2 class="mb-4 text-primary">Tambah Kategori</h2>
        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Kategori</label>
                <input type="text" name="name" class="form-control" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
