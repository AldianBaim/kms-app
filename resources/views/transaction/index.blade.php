@extends('layouts.app')

@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<section class="p-3">

    @if(Session::has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get('message') }}
    </div>
    @endif

    <h4 class="mb-4">Manajemen Transaksi.</h4>

    <div class="row mb-4">
        <div class="col-lg-4">
            <div class="card text-center bg-secondary p-4">
                <h5 class="mb-2">50</h5>
                <h6 class="m-0">Transanksi Bulan Ini</h6>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card text-center bg-secondary p-4">
                <h5 class="mb-2">Rp 2.000.000</h5>
                <h6 class="m-0">Pendapatan Bulan Ini</h6>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card text-center bg-secondary p-4">
                <h5 class="mb-2">100</h5>
                <h6 class="m-0">Stok Tanaman</h6>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Pesanan</th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Catatan</th>
                    <th>Nama Customer</th>
                    <th>Status</th>
                    <th>Total</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $transaction)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $transaction->order_code }}</td>
                    <td>{{ $transaction->product_name }}</td>
                    <td>{{ number_format($transaction->product_price) }}</td>
                    <td>{{ $transaction->qty }}</td>
                    <td>{{ $transaction->note }}</td>
                    <td>{{ $transaction->customer_name }}</td>
                    <td>
                        {{ ucfirst($transaction->status) }}
                    </td>
                    <td>{{ number_format($transaction->product_price * $transaction->qty) }}</td>
                    <td width="20%">
                        <a href="{{ url('transactions/changeStatus?id=' . $transaction->id . '&status=cancel') }}" class="btn btn-sm btn-danger mb-2">Batalkan</a>
                        @if($transaction->status != 'process')
                        <a href="{{ url('transactions/changeStatus?id=' . $transaction->id . '&status=process') }}" class="btn btn-sm btn-warning">Proses</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</section>

@endsection