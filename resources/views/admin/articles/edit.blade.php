@extends('admin.layouts.app')
@section('title', 'Edit Artikel')
@section('content')
    <h2>Edit Artikel</h2>
    <form action="{{ route('admin.articles.update', $article->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="organization_id" class="form-label">Organisasi</label>
            <select name="organization_id" class="form-control" required>
                @foreach($organizations as $organization)
                    <option value="{{ $organization->id }}" {{ $article->organization_id == $organization->id ? 'selected' : '' }}>{{ $organization->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Judul Artikel</label>
            <input type="text" name="title" value="{{ $article->title }}" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
@endsection
