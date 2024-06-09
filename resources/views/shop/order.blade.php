@extends('layouts.shop')

@section('content')

<style>
    .box {
        padding:15px;
        border:1px solid #f4f4f4;
        margin-bottom: 20px;
        border-radius: 5px;
        font-size:15px;
    }
</style>

<section class="my-3">
    <div class="card">
        <div class="card-body">

            <h5>Pesanan</h5>

            <p>Berikut ini daftar pesanan yang kamu buat.</p>

            @foreach($orders as $order)

            <div class="box">
                <div class="mb-3">
                    <small>Belanja <b>{{ date('d M Y H:i:s', strtotime($order->created_at)) }}</b>&nbsp;&nbsp;&nbsp;<span class="badge {{ ($order->status == 'process') ? 'bg-success' : 'bg-warning' }}">{{ ucfirst($order->status) }}</span>&nbsp;&nbsp;&nbsp;<span>{{ $order->order_code }}</span></small>
                </div>

                <div class="row">
                    <div class="col">
                        <div><b>{{ $order->title }}</b></div>
                    </div>

                    <div class="col">
                        <div class="pull-right" style="padding-left:20px;border-left:1px solid #dedede;">
                            <div>Total Harga</div>
                            <div><b>Rp. {{ number_format($order->amount) }}</b></div>

                            <div class="mt-3">
                                <a href="#" class="">Lihat detail transaksi</a>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>

            @endforeach

        </div>
    </div>
</section>


@endsection