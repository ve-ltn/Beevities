{{-- Dashboard Admin Page --}}
@extends('admin.layouts.app')
@section('title', 'Dashboard Admin')
@section('content')
    <div class="card p-4 bg-light text-dark">
        <h1 class="mb-4 text-primary">Dashboard Admin</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="card text-bg-primary mb-3">
                    <div class="card-header">Total Produk</div>
                    <div class="card-body">
                        <h4 class="card-title">{{ $total_products ?? 0 }} Produk</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-bg-success mb-3">
                    <div class="card-header">Total Pengguna</div>
                    <div class="card-body">
                        <h4 class="card-title">{{ $total_users ?? 0 }} User</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4">
            <a href="{{ route('admin.products.index') }}" class="btn btn-primary me-2">Kelola Produk</a>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Kelola Kategori</a>
            <a href="{{ route('admin.organizations.index') }}" class="btn btn-info">Kelola Organisasi</a>
            <a href="{{ route('admin.events.index') }}" class="btn btn-warning">Kelola Event</a>
            <a href="{{ route('admin.articles.index') }}" class="btn btn-danger">Kelola Artikel</a>
        </div>
    </div>
@endsection