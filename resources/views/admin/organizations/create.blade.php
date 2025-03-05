@extends('admin.layouts.app')
@section('content')
    <h1>Create Organization</h1>
    <form action="{{ route('admin.organizations.store') }}" method="POST">
        @csrf
        <label>Name:</label>
        <input type="text" name="name" required>
        <label>Email:</label>
        <input type="email" name="email" required>
        <label>Phone:</label>
        <input type="text" name="phone">
        <label>Website:</label>
        <input type="text" name="website">
        <label>Banner Image:</label>
        <input type="file" name="banner_image">
        <button type="submit">Create</button>
    </form>
@endsection