@extends('admin.layouts.app')

@section('title', 'Tambah Kategori')

@section('content')
    <h2>Tambah Kategori</h2>

    <form action="{{ route('admin.category.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama Kategori</label>
            <input type="text" name="name" class="form-control" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.category.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
