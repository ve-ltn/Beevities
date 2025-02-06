@extends('admin.layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
    <h1 class="mb-4">Dashboard Admin</h1>
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
@endsection
