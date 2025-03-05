@extends('admin.layouts.app')
@section('title', 'Daftar Event')
@section('content')
    <h2>Daftar Event</h2>
    <a href="{{ route('admin.events.create') }}" class="btn btn-primary mb-3">Tambah Event</a>
    <table class="table">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Organisasi</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
                <tr>
                    <td>{{ $event->title }}</td>
                    <td>{{ $event->organization->name }}</td>
                    <td>{{ $event->event_date }}</td>
                    <td>
                        <a href="{{ route('admin.events.edit', $event->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" style="display:inline-block;">
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