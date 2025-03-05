@extends('user.layouts.app')

@section('title', 'Riwayat Pembelian')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Riwayat Pembelian</h2>

    @if($invoices->isEmpty())
        <div class="alert alert-warning">
            Anda belum melakukan pembelian. 
            <a href="{{ route('user.dashboard') }}">Go Back To Home Page</a>.
        </div>
    @else
        @foreach($invoices as $invoice)
        <div class="card mb-4">
            <div class="card-header">
                <strong>Nomor Faktur:</strong> {{ $invoice->invoice_number }}
                <span class="float-end"><strong>Tanggal:</strong> {{ $invoice->created_at->format('d-m-Y H:i') }}</span>
            </div>
            <div class="card-body">
                <p><strong>Alamat Pengiriman:</strong> {{ $invoice->address }}</p>
                <p><strong>Kode Pos:</strong> {{ $invoice->postal_code }}</p>
                <table class="table table-bordered">
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
                            <td>{{ $detail->product->name ?? 'Produk tidak ditemukan' }}</td>
                            <td>{{ $detail->quantity }}</td>
                            <td>Rp. {{ number_format($detail->product->price ?? 0) }}</td>
                            <td>Rp. {{ number_format($detail->subtotal) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <h5 class="text-end">Total Harga: Rp. {{ number_format($invoice->total_price) }}</h5>
            </div>
        </div>
        @endforeach
    @endif
</div>
@endsection

