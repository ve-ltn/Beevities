@extends('organization_admin.layouts.app')

@section('title', 'Invoices')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Invoice List</h2>

    @if($invoices->isEmpty())
        <p class="text-muted">No invoices found for your products.</p>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-center">
                <thead class="table-dark text-center">
                    <tr>
                        <th>Invoice Number</th>
                        <th>Buyer Name</th>
                        <th>Total Price</th>
                        <th>Shipping Address</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($invoices as $invoice)
                        <tr>
                            <td class="fw-bold">{{ $invoice->invoice_number }}</td>
                            <td>{{ $invoice->user->name }}</td>
                            <td>Rp. {{ number_format($invoice->total_price) }}</td>
                            <td>{{ $invoice->address }}, {{ $invoice->postal_code }}</td>
                            <td>{{ $invoice->created_at->format('d M Y, H:i') }}</td>
                            <td>
                                <a href="{{ route('organization_admin.invoices.show', $invoice->id) }}" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
