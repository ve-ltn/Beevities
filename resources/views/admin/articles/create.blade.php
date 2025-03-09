@extends('admin.layouts.app')
@section('title', 'Tambah Artikel')
@section('content')
    <div class="card p-4 bg-light text-dark">
        <h2 class="mb-4 text-primary">Tambah Artikel</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Organisasi</label>
                <select name="organization_id" class="form-select" required>
                    @foreach($organizations as $organization)
                        <option value="{{ $organization->id }}">{{ $organization->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Judul Artikel</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi Artikel</label>
                <textarea name="description" class="form-control" rows="5" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Gambar Artikel</label>
                <input type="file" name="image" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
            <a href="{{ route('admin.articles.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection