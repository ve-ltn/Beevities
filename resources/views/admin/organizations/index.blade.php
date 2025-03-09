{{-- Organization Management Page --}}
@extends('admin.layouts.app')
@section('title', 'Organization Management')
@section('content')
    <div class="card p-4 bg-light text-dark">
        <h2 class="mb-4 text-primary">Organization Management</h2>
        <a href="{{ route('admin.organizations.create') }}" class="btn btn-primary mb-3">Create New Organization</a>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($organizations as $organization)
                    <tr>
                        <td>{{ $organization->name }}</td>
                        <td>{{ $organization->email }}</td>
                        <td>{{ $organization->phone }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.organizations.edit', $organization->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.organizations.destroy', $organization->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this organization?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection