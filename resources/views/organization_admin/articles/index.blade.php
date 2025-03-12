@extends('organization_admin.layouts.app')

@section('title', 'Daftar Artikel')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Daftar Artikel</h2>

    <a href="{{ route('organization_admin.articles.create') }}" class="btn btn-primary mb-3">Tambah Artikel</a>

    <div class="table-responsive">
        <table class="table table-bordered table-hover text-center">
            <thead class="table-dark text-center">
                <tr>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($articles as $article)
                    <tr>
                        <td>
                            @if($article->image)
                                <img src="{{ asset('storage/' . $article->image) }}" width="80" class="rounded shadow">
                            @else
                                <span class="text-muted">Tidak ada gambar</span>
                            @endif
                        </td>
                        <td class="fw-bold">{{ $article->title }}</td>
                        <td>{{ Str::limit($article->description, 50) }}</td>
                        <td>
                            <a href="{{ route('organization_admin.articles.edit', $article->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('organization_admin.articles.destroy', $article->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus artikel ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection