@extends('layouts.shop')

@section('content')

<section class="my-3">
    <div class="form-group mb-4">
        <input type="text" class="form-control" placeholder="Cari produk terjadwal">
    </div>
    <div class="mb-5">
        <h5 class="mb-4">Kategori</h5>
        <div class="row text-center">
            <div class="col-lg-2 mb-3">
                <img src="https://ik.imagekit.io/dcjlghyytp1/29543f925c099f319d3c93364d051ef2?tr=f-auto,w-60" class="w-100" alt="">
                <small>Sayur</small>
            </div>
            <div class="col-lg-2 mb-3">
                <img src="https://ik.imagekit.io/dcjlghyytp1/7360fc8ec40646282b410f476955a791?tr=f-auto,w-60" class="w-100" alt="">
                <small>Protein</small>
            </div>
            <div class="col-lg-2 mb-3">
                <img src="https://ik.imagekit.io/dcjlghyytp1/29543f925c099f319d3c93364d051ef2?tr=f-auto,w-60" class="w-100" alt="">
                <small>Sayur</small>
            </div>
            <div class="col-lg-2 mb-3">
                <img src="https://ik.imagekit.io/dcjlghyytp1/7360fc8ec40646282b410f476955a791?tr=f-auto,w-60" class="w-100" alt="">
                <small>Protein</small>
            </div>
            <div class="col-lg-2 mb-3">
                <img src="https://ik.imagekit.io/dcjlghyytp1/29543f925c099f319d3c93364d051ef2?tr=f-auto,w-60" class="w-100" alt="">
                <small>Sayur</small>
            </div>
            <div class="col-lg-2 mb-3">
                <img src="https://ik.imagekit.io/dcjlghyytp1/7360fc8ec40646282b410f476955a791?tr=f-auto,w-60" class="w-100" alt="">
                <small>Protein</small>
            </div>
            <div class="col-lg-2 mb-3">
                <img src="https://ik.imagekit.io/dcjlghyytp1/208e4b58a90235001b0a95652195968e?tr=f-auto,w-60" class="w-100" alt="">
                <small>Buah</small>
            </div>
            <div class="col-lg-2 mb-3">
                <img src="https://ik.imagekit.io/dcjlghyytp1/7360fc8ec40646282b410f476955a791?tr=f-auto,w-60" class="w-100" alt="">
                <small>Protein</small>
            </div>
            <div class="col-lg-2 mb-3">
                <img src="https://ik.imagekit.io/dcjlghyytp1/208e4b58a90235001b0a95652195968e?tr=f-auto,w-60" class="w-100" alt="">
                <small>Buah</small>
            </div>
            <div class="col-lg-2 mb-3">
                <img src="https://ik.imagekit.io/dcjlghyytp1/7360fc8ec40646282b410f476955a791?tr=f-auto,w-60" class="w-100" alt="">
                <small>Protein</small>
            </div>
            <div class="col-lg-2 mb-3">
                <img src="https://ik.imagekit.io/dcjlghyytp1/208e4b58a90235001b0a95652195968e?tr=f-auto,w-60" class="w-100" alt="">
                <small>Buah</small>
            </div>
            <div class="col-lg-2 mb-3">
                <img src="https://ik.imagekit.io/dcjlghyytp1/7360fc8ec40646282b410f476955a791?tr=f-auto,w-60" class="w-100" alt="">
                <small>Protein</small>
            </div>
        </div>
    </div>
    <div>
        <h5 class="mb-3">Produk Terlaris</h5>
        <div class="row">
            @foreach($products as $product)
            <div class="col-lg-6 mb-4">
                <a href="{{ url('/shop/product/' . $product->slug) }}">
                    <div class="card card-hover h-100">
                        <img src="{{ url('storage/image/catalogue/' . $product->image) }}" class="card-img-top" alt="{{ $product->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->title }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="card-text text-right"><b>Rp {{ number_format($product->price) }}</b></p>
                            <p class="card-text text-right">
                            <div class="row">
                                <div class="col"><span class="text-muted small">Kota Bandung</span></div>
                                <div class="col"><span class="text-muted small">Stok : {{ $product->stock }} Buah</span></div>
                            </div>
                            </p>
                            <div class="d-grid mt-4">
                                <a href="" class="btn btn-success">Beli</a>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>


@endsection