@extends('admin.layouts.app')
@section('title', 'Daftar Artikel')
@section('content')
    <h2>Daftar Artikel</h2>
    <a href="{{ route('admin.articles.create') }}" class="btn btn-primary mb-3">Tambah Artikel</a>
    <table class="table">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Organisasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
                <tr>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->organization->name }}</td>
                    <td>
                        <a href="{{ route('admin.articles.edit', $article->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection