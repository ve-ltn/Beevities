@extends('admin.layouts.app')
@section('title', 'Tambah Event')

@section('content')
    <h2>Tambah Event</h2>
    <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
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
            <label for="title" class="form-label">Nama Event</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi Event</label>
            <textarea name="description" class="form-control" rows="5" required></textarea>
        </div>

        <div class="mb-3">
            <label for="event_date" class="form-label">Tanggal Event</label>
            <input type="datetime-local" name="event_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Gambar Event</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Tambah</button>
        <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
    