@extends('layouts.shop')

@section('content')

<section class="my-3">
    <div class="card">
        <img src="{{ url('storage/image/catalogue/' . $product->image) }}" class="w-100" style="height:300px;object-fit:cover" alt="">
        <div class="card-body">
            
            <h6>Informasi Barang</h6>

            <table class="table table-bordered">
                <tr><th>Produk</th><th>Jumlah</th><th>Subtotal</th></tr>
                <tr><td>{{ $product->title }}</td><td>1</td><td>Rp {{ number_format($product->price) }}</td></tr>
                <tr><td>Total</td><td></td><td><b>Rp {{ number_format($product->price) }}</b></td></tr>
            </table>

            <form action="/shop/purchase" method="POST">
                <div>
                    <h6>Informasi Pembeli</h6>

                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="amount" value="{{ $product->price }}">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Email</label>
                        <input type="text" class="form-control" name="email" value="{{ Auth::user()->email }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Whatsapp</label>
                        <input type="text" class="form-control" name="phone" placeholder="Co : 087778086140" required/>
                    </div>
                </div>
                
                <p class="small"><b>Note</b>: Pastikan email dan nomor whatsapp yang kamu masukkan adalah benar. Sebab kami akan gunakan data tersebut untuk mengirimkan barang atau melakukan konfirmasi terkait pembayaran.</p>

                <button type="submit" class="btn btn-primary pull-right" onclick="return confirm('Semua pesanan sudah benar?')">Process</button>
            </form>
        </div>
    </div>
</section>


@endsection