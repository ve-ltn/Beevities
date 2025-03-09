@extends('admin.layouts.app')
@section('title', 'Edit Event')
@section('content')
    <div class="card p-4 bg-light text-dark">
        <h2 class="mb-4 text-primary">Edit Event</h2>
        <form action="{{ route('admin.events.update', $event->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="organization_id" class="form-label">Organisasi</label>
                <select name="organization_id" class="form-select" required>
                    @foreach($organizations as $organization)
                        <option value="{{ $organization->id }}" {{ $event->organization_id == $organization->id ? 'selected' : '' }}>{{ $organization->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Nama Event</label>
                <input type="text" name="title" value="{{ $event->title }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="event_date" class="form-label">Tanggal Event</label>
                <input type="datetime-local" name="event_date" value="{{ $event->event_date }}" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Perbarui</button>
        </form>
    </div>
@endsection