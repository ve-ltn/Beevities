@extends('user.layouts.app')

@section('title', 'Dashboard User')

@section('content')
<div class="container mt-5">
    <div class="text-center">
        <h1 class="display-4">Selamat Datang di Platform Kami!</h1>
        <p class="lead">Jelajahi organisasi, event, artikel, dan merchandise yang tersedia.</p>
    </div>

    <div class="row mt-5">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Jelajahi Organisasi</h5>
                    <p class="card-text">Lihat daftar organisasi dan cari tahu kegiatan mereka.</p>
                    <a href="{{ route('organizations.index') }}" class="btn btn-primary">Lihat Organisasi</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Keranjang Belanja</h5>
                    <p class="card-text">Lihat barang yang sudah Anda tambahkan ke keranjang belanja Anda.</p>
                    <a href="{{ route('user.cart') }}" class="btn btn-success">Lihat Keranjang</a>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5 text-center">
        <h3 class="mb-3">Tentang Platform Kami</h3>
        <p class="text-muted">
            Kami menyediakan informasi tentang berbagai organisasi, event, dan artikel,
            serta penjualan merchandise eksklusif dari masing-masing organisasi.
        </p>
    </div>
</div>
@endsection