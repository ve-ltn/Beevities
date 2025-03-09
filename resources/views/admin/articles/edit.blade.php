@extends('admin.layouts.app')
@section('title', 'Edit Artikel')
@section('content')
    <div class="card p-4 bg-light text-dark">
        <h2 class="mb-4 text-primary">Edit Artikel</h2>
        <form action="{{ route('admin.articles.update', $article->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Organisasi</label>
                <select name="organization_id" class="form-select" required>
                    @foreach($organizations as $organization)
                        <option value="{{ $organization->id }}" {{ $article->organization_id == $organization->id ? 'selected' : '' }}>{{ $organization->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Judul Artikel</label>
                <input type="text" name="title" value="{{ $article->title }}" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Perbarui</button>
        </form>
    </div>
@endsection