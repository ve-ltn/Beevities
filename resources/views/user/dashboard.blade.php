@extends('user.layouts.app')

@section('title', 'Dashboard User')

@section('content')
<div class="container mt-5">
    <div class="text-center">
        <h1 class="display-4">Selamat Datang di Toko Kami!</h1>
        <p class="lead">Toko {{ config('app.name', 'Toko Online') }} menyediakan berbagai macam barang berkualitas dengan harga terjangkau.</p>
    </div>

    <div class="row mt-5">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Jelajahi Produk</h5>
                    <p class="card-text">Lihat katalog produk kami dan temukan barang yang Anda butuhkan.</p>
                    <a href="{{ route('user.catalog') }}" class="btn btn-primary">Katalog Produk</a>
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
        <h3 class="mb-3">Tentang Toko Kami</h3>
        <p class="text-muted">
            Kami adalah toko online yang berkomitmen untuk memberikan pelayanan terbaik kepada pelanggan kami. 
            Dengan berbagai pilihan produk dan harga yang kompetitif, kami berharap dapat memenuhi kebutuhan Anda.
        </p>
    </div>
</div>
@endsection
