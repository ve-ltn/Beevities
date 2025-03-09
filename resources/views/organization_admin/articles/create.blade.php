@extends('organization_admin.layouts.app')

@section('title', 'Tambah Artikel')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Tambah Artikel</h2>
    
    <form action="{{ route('organization_admin.articles.store') }}" method="POST" enctype="multipart/form-data" class="shadow p-4 bg-light rounded">
        @csrf
        <div class="mb-3">
            <label class="form-label fw-bold">Judul Artikel</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Deskripsi</label>
            <textarea name="description" class="form-control" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Gambar</label>
            <input type="file" name="image" class="form-control">
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary px-4 py-2">Tambah Artikel</button>
            <a href="{{ route('organization_admin.articles.index') }}" class="btn btn-secondary px-4 py-2">Batal</a>
        </div>
    </form>
</div>
@endsection