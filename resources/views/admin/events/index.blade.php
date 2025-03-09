{{-- Event Index Page --}}
@extends('admin.layouts.app')
@section('title', 'Daftar Event')
@section('content')
    <div class="card p-4 bg-light text-dark">
        <h2 class="mb-4 text-primary">Daftar Event</h2>
        <a href="{{ route('admin.events.create') }}" class="btn btn-primary mb-3">Tambah Event</a>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Judul</th>
                    <th>Organisasi</th>
                    <th>Tanggal</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                    <tr>
                        <td>{{ $event->title }}</td>
                        <td>{{ $event->organization->name }}</td>
                        <td>{{ $event->event_date }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.events.edit', $event->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus event ini?');">
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
