@extends('layouts.shop')

@section('content')

<section class="my-3">
    <div class="card">
        <img src="{{ url('storage/image/catalogue/' . $order->image) }}" class="w-100" style="height:300px;object-fit:cover" alt="">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div class="text-muted">Kode Pesanan</div>
                    <div class="mb-3">{{ $order->order_code}}</div>

                    <div class="text-muted">Produk</div>
                    <div class="mb-3">{{ $order->title}}</div>

                    <div class="text-muted">Tanggal Transaksi</div>
                    <div class="mb-3">{{ date("d M Y H:i:s", strtotime($order->created_at)) }}</div>
                </div>
                <div class="col">
                    <div class="pull-right">
                        <a href="/shop/product/{{ $order->slug }}" class="btn btn-success btn-sm">Beli lagi</a>
                        <br/>
                        <a href="#"><small>Bantuan masalah</small></a>
                    </div>
                </div>
            </div>

            <div style="border-bottom:1px solid #f4f4f4;margin-bottom:15px;"></div>

            <div class="row">
                <div class="col">
                    <div class="text-muted">Pemesan</div>
                    <div class="mb-3">{{ $order->customer_name }}</div>

                    <div class="text-muted">Email</div>
                    <div class="mb-3">{{ $order->customer_email }}</div>

                    <div class="text-muted">Status</div>
                    <div class="mb-3">{{ ucfirst($order->status) }}</div>
                </div>
                <div class="col">
                    <div class="text-muted">Qty</div>
                    <div class="mb-3">{{ $order->qty }}</div>

                    <div class="text-muted">Total Harga</div>
                    <div class="mb-3">{{ $order->amount }}</div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection