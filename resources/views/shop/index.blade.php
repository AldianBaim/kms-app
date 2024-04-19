@extends('layouts.shop')

@section('content')

<section>
    <div class="position-relative mb-3">
        <div class="d-flex justify-content-between align-items-center py-3 position-absolute mt-2" style="z-index: 10;left: 50%;transform: translateX(-50%);width:90%" role="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">
            <div class="d-flex align-items-center gap-3">
                <i class="fa fa-lg fa-location-dot text-warning"></i>
                <div class="d-flex flex-column text-white">
                    <small>Dikirim ke Cimahi</small>
                    <small><strong>Hari ini</strong> 07:00 - 08:00</small>
                </div>
                <i class="fa fa-chevron-down"></i>
            </div>
            <i class="fa fa-lg fa-heart text-danger"></i>
        </div>
        <div class="form-group mb-2 position-absolute" style="z-index: 10;right: 50%;transform: translateX(50%);width:90%;margin-top:90px">
            <input type="text" class="form-control rounded-pill" placeholder="Cari aglaonema yang kamu suka">
        </div>
        <div id="carouselExampleControls" style="z-index: 1;" class="carousel slide position-relative" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://ik.imagekit.io/8jggdaymrs/KMS/WhatsApp%20Image%202024-04-18%20at%2014.03.42.jpeg" class="d-block w-100" style="height: 350px;object-fit:cover" alt="Cover">
                </div>
                <div class="carousel-item">
                    <img src="https://ik.imagekit.io/8jggdaymrs/KMS/WhatsApp%20Image%202024-04-18%20at%2014.03.41.jpeg" class="d-block w-100" style="height: 350px;object-fit:cover" alt="Cover">
                </div>
                <div class="carousel-item">
                    <img src="https://ik.imagekit.io/8jggdaymrs/KMS/WhatsApp%20Image%202024-04-18%20at%2014.03.42%20(1).jpeg" class="d-block w-100" style="height: 350px;object-fit:cover" alt="Cover">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="mb-3 px-3">
        <div class="row text-center">
            <div class="col-2 mb-3 card-hover">
                <img src="https://ik.imagekit.io/8jggdaymrs/KMS/category/semua-product.webp" class="w-100 rounded-circle" alt="">
                <small>Semua Produk</small>
            </div>
            <div class="col-2 mb-3 card-hover">
                <img src="https://ik.imagekit.io/8jggdaymrs/KMS/category/suksom-jaipong.jpeg" class="w-100 rounded-circle" alt="">
                <small>Suksom Jaipong</small>
            </div>
            <div class="col-2 mb-3 card-hover">
                <img src="https://ik.imagekit.io/8jggdaymrs/KMS/category/suksom-merapi.jpeg" class="w-100 rounded-circle" alt="">
                <small>Suksom Merapi</small>
            </div>
            <div class="col-2 mb-3 card-hover">
                <img src="https://ik.imagekit.io/8jggdaymrs/KMS/category/red-venus.jpeg" class="w-100 rounded-circle" alt="">
                <small>Red Venus</small>
            </div>
            <div class="col-2 mb-3 card-hover">
                <img src="https://ik.imagekit.io/8jggdaymrs/KMS/category/red-spider.jpeg" class="w-100 rounded-circle" alt="">
                <small>Red Spider</small>
            </div>
            <div class="col-2 mb-3 card-hover">
                <img src="https://ik.imagekit.io/8jggdaymrs/KMS/category/catrina.jpeg" class="w-100 rounded-circle" alt="">
                <small>Catrina</small>
            </div>
        </div>
    </div>
    <div class="p-3 bg-light">
        <h5 class="mb-3">Rekomendasi Untukmu</h5>
        <div class="row">
            @foreach($products as $product)
            <div class="col-lg-6 mb-4">
                <a href="{{ url('/shop/product/' . $product->slug) }}">
                    <div class="card card-hover border-0 rounded shadow-sm h-100">
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
                                <a href="{{ url('/shop/product/' . $product->slug) }}" class="btn btn-sm btn-outline-success rounded-pill">Beli</a>
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