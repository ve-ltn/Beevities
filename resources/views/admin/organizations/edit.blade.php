@extends('admin.layouts.app')
@section('content')
    <h1>Edit Organization</h1>
    <form action="{{ route('admin.organizations.update', $organization->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Name:</label>
        <input type="text" name="name" value="{{ $organization->name }}" required>
        <label>Email:</label>
        <input type="email" name="email" value="{{ $organization->email }}" required>
        <label>Phone:</label>
        <input type="text" name="phone" value="{{ $organization->phone }}">
        <label>Website:</label>
        <input type="text" name="website" value="{{ $organization->website }}">
        <label>Banner Image:</label>
        <input type="file" name="banner_image">
        <button type="submit">Update</button>
    </form>
@endsection
