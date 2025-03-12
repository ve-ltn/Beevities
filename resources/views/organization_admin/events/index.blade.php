@extends('organization_admin.layouts.app')

@section('title', 'Daftar Event')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Daftar Event</h2>

    <a href="{{ route('organization_admin.events.create') }}" class="btn btn-primary mb-3">Tambah Event</a>

    <div class="table-responsive">
        <table class="table table-bordered table-hover text-center">
            <thead class="table-dark text-center">
                <tr>
                    <th>Gambar</th>
                    <th>Nama Event</th>
                    <th>Deskripsi</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($events as $event)
                    <tr>
                        <td>
                            @if($event->image)
                                <img src="{{ asset('storage/' . $event->image) }}" width="80" class="rounded shadow">
                            @else
                                <span class="text-muted">Tidak ada gambar</span>
                            @endif
                        </td>
                        <td class="fw-bold">{{ $event->title }}</td>
                        <td>{{ Str::limit($event->description, 50) }}</td>
                        <td>{{ \Carbon\Carbon::parse($event->event_date)->format('d M Y, H:i') }}</td>
                        <td>
                            <a href="{{ route('organization_admin.events.edit', $event->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('organization_admin.events.destroy', $event->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus event ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada event yang ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
