@extends('admin.layouts.app')
@section('title', 'Edit Organization')
@section('content')
    <div class="card p-4 bg-light text-dark">
        <h2 class="mb-4 text-primary">Edit Organization</h2>
        <form action="{{ route('admin.organizations.update', $organization->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Name:</label>
                <input type="text" name="name" value="{{ $organization->name }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email:</label>
                <input type="email" name="email" value="{{ $organization->email }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Phone:</label>
                <input type="text" name="phone" value="{{ $organization->phone }}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Banner Image:</label>
                <input type="file" name="banner_image" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.organizations.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection