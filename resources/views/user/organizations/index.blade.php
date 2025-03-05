@extends('user.layouts.app')
@section('content')
    <h1>Organizations</h1>
    <ul>
        @foreach ($organizations as $organization)
            <li>
                <a href="{{ route('organizations.show', $organization->id) }}">{{ $organization->name }}</a>
            </li>
        @endforeach
    </ul>
@endsection