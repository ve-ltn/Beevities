@extends('organization_admin.layouts.app')

@section('title', 'Edit Artikel')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Edit Artikel</h2>
    <form action="{{ route('organization_admin.articles.update', $article->id) }}" method="POST" enctype="multipart/form-data" class="shadow p-4 bg-light rounded">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label class="m-1 text-secondary form-label fw-bold">Judul Artikel</label>
            <input type="text" name="title" class="form-control" value="{{ $article->title }}" required>
        </div>

        <div class="mb-3">
            <label class="m-1 text-secondary form-label fw-bold">Deskripsi</label>
            <textarea name="description" class="form-control" rows="4" required>{{ $article->description }}</textarea>
        </div>

        <div class="mb-3">
            <label class="m-1 text-secondary form-label fw-bold">Gambar Artikel</label>
            @if($article->image)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" width="150" class="rounded shadow">
                </div>
            @endif
            <input type="file" name="image" class="form-control">
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-success px-4 py-2">Update Artikel</button>
            <a href="{{ route('organization_admin.articles.index') }}" class="btn btn-secondary px-4 py-2">Batal</a>
        </div>
    </form>
</div>
@endsection
