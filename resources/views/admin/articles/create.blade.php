@extends('admin.layouts.app')
@section('title', 'Tambah Artikel')
@section('content')
    <h2>Tambah Artikel</h2>
    <form action="{{ route('admin.articles.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="organization_id" class="form-label">Organisasi</label>
            <select name="organization_id" class="form-control" required>
                @foreach($organizations as $organization)
                    <option value="{{ $organization->id }}">{{ $organization->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Judul Artikel</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
@endsection
