@extends('layouts.shop')

@section('content')

<section class="my-3">
    <div class="card">
        <img src="{{ url('storage/image/catalogue/' . $product->image) }}" class="w-100" style="height:300px;object-fit:cover" alt="">
        
        <div class="card-body">

            <p class="p-2 bg-secondary text-black">Kode Pesanan : <b>{{ $order_code }}</b></p>

            <p>Salah langkah lagi! Berikut ini langkah-langkah pembayaran untuk menyelesaikan pesanan ini.
            
            <ol>
                <li>Buka aplikasi Internet Banking atau pergi ke ATM terdekat.</li>
                <li>Pilih transfer ke rekening <b>Bank BCA</b> dengan nomor <b>911 811 555 4</b> atas nama <b>PT. Tani Shop</b></li>
                <li>Transfer dana dengan total tagihan <b>Rp. {{ number_format($amount) }}</b></li>
                <li>Masukan catatan (jika ada), tuliskan kode <b>{{ $order_code }}</b></li>
                <li>Selesai</li>
            </ol>

            <p>Sistem kami akan mengecek pembayaran secara otomatis. Jika sudah merasa membayar namun belum menerima
            konfirmasi Whatsapp, silakan konfirmasi pembayaran pada tautan berikut ini :</p>
                
            <div class="mb-3">
                <a href="#" target="_blank">Konfirmasi Pembayaran</a>
            </div>

            <p>Terimakasih</p>
        </div>
    </div>
</section>


@endsection