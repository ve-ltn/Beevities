@extends('admin.layouts.app')
@section('content')
    <h1>Organization Management</h1>
    <a href="{{ route('admin.organizations.create') }}">Create New Organization</a>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Website</th>
            <th>Actions</th>
        </tr>
        @foreach ($organizations as $organization)
            <tr>
                <td>{{ $organization->name }}</td>
                <td>{{ $organization->email }}</td>
                <td>{{ $organization->phone }}</td>
                <td>{{ $organization->website }}</td>
                <td>
                    <a href="{{ route('admin.organizations.edit', $organization->id) }}">Edit</a>
                    <form action="{{ route('admin.organizations.destroy', $organization->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection