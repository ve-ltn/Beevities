@extends('admin.layouts.app')

@section('content')
    <h1>Create Organization</h1>

    <!-- Display validation errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.organizations.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description:</label>
            <textarea name="description" class="form-control" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Phone:</label>
            <input type="text" name="phone" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Website:</label>
            <input type="text" name="website" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Banner Image:</label>
            <input type="file" name="banner_image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{ route('admin.organizations.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
