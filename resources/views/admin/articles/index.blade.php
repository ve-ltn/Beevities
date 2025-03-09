@extends('admin.layouts.app')
@section('title', 'Daftar Artikel')
@section('content')
    <div class="card p-4 bg-light text-dark">
        <h2 class="mb-4 text-primary">Daftar Artikel</h2>
        <a href="{{ route('admin.articles.create') }}" class="btn btn-primary mb-3">Tambah Artikel</a>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Judul</th>
                    <th>Organisasi</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($articles as $article)
                    <tr>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->organization->name }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.articles.edit', $article->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection