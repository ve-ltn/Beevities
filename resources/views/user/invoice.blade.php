@extends('user.layouts.app')

@section('title', 'Faktur Pembelian')

@section('content')
<div class="container mt-4" id="invoice">
    <div class="text-center">
        <h2>Faktur Pembelian</h2>
        <hr>
    </div>
    <div class="mb-4">
        <p><strong>Nomor Faktur:</strong> {{ $invoice->invoice_number }}</p>
        <p><strong>Nama Pelanggan:</strong> {{ Auth::user()->name }}</p>
        <p><strong>Alamat Pengiriman:</strong> {{ $invoice->address }}</p>
        <p><strong>Kode Pos:</strong> {{ $invoice->postal_code }}</p>
        <p><strong>Tanggal Pembelian:</strong> {{ $invoice->created_at->format('d-m-Y H:i') }}</p>
    </div>

    <table class="table table-bordered mt-4">
        <thead class="table-dark">
            <tr>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Harga Satuan</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoice->details as $detail)
            <tr>
                <td>{{ $detail->product->name }}</td>
                <td>{{ $detail->quantity }}</td>
                <td>Rp. {{ number_format($detail->product->price) }}</td>
                <td>Rp. {{ number_format($detail->subtotal) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        <h3 class="text-end">Total Harga: Rp. {{ number_format($invoice->total_price) }}</h3>
    </div>

    <div class="d-print-none mt-4 text-center">
        <button class="btn btn-primary" onclick="window.print()">Cetak Faktur</button>
        <a href="{{ route('user.dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
    </div>
</div>
@endsection

@section('styles')
<style>
    /* Gaya untuk tampilan cetak */
    @media print {
        body {
            font-family: Arial, sans-serif;
        }

        #invoice {
            padding: 20px;
        }

        .navbar, .d-print-none, .sidebar {
            display: none !important;
        }

        h2 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }

        table thead {
            background-color: #f2f2f2;
        }

        .text-end {
            text-align: right;
        }
    }

    /* Gaya untuk tampilan layar */
    #invoice {
        background-color: #fff;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    h2 {
        font-size: 28px;
        margin-bottom: 20px;
    }

    table {
        margin-top: 20px;
    }

    .text-end {
        text-align: right;
    }
</style>
@endsection
