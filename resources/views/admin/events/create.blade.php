@extends('admin.layouts.app')
@section('title', 'Tambah Event')
@section('content')
    <h2>Tambah Event</h2>
    <form action="{{ route('admin.events.store') }}" method="POST">
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
            <label for="event_date" class="form-label">Tanggal Event</label>
            <input type="datetime-local" name="event_date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
@endsection