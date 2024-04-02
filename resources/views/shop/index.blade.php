@extends('layouts.shop')

@section('content')

<section>
    <div class="position-relative mb-3">
        <div class="d-flex justify-content-between align-items-center py-3 position-absolute mt-2" style="z-index: 10;left: 50%;transform: translateX(-50%);width:90%" role="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">
            <div class="d-flex align-items-center gap-3">
                <i class="fa fa-lg fa-location-dot text-warning"></i>
                <div class="d-flex flex-column">
                    <small>Dikirim ke Cirendeu</small>
                    <small><strong>Hari ini</strong> 07:00 - 08:00</small>
                </div>
                <i class="fa fa-chevron-down"></i>
            </div>
            <i class="fa fa-lg fa-heart text-danger"></i>
        </div>
        <div class="form-group mb-2 position-absolute" style="z-index: 10;right: 50%;transform: translateX(50%);width:90%;margin-top:90px">
            <input type="text" class="form-control rounded-pill" placeholder="Cari produk terjadwal">
        </div>
        <div id="carouselExampleControls" style="z-index: 1;" class="carousel slide position-relative" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://assets-cloudflare.segari-ops.id/banners/it-NewCustomerOnboarding-lsbbsgxt-new-lugcw2y3.webp" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://assets-cloudflare.segari-ops.id/banners/it-104PersiapanLebaran-lucc835k-new-lucc85xx.webp" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://assets-cloudflare.segari-ops.id/banners/it-104HargaGila-luccax71-new-luccazo2.webp" class="d-block w-100" alt="...">
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
            <div class="col-lg-2 mb-3">
                <img src="https://s3-ap-southeast-1.amazonaws.com/assets.segari.id/categories/v2/semua-product.png?feature-name=category_item&page-route=products&platform=web" class="w-100" alt="">
                <small>Semua Produk</small>
            </div>
            <div class="col-lg-2 mb-3">
                <img src="https://s3-ap-southeast-1.amazonaws.com/assets.segari.id/categories/v2/buah.png?feature-name=category_item&page-route=products&platform=web" class="w-100" alt="">
                <small>Buah</small>
            </div>
            <div class="col-lg-2 mb-3">
                <img src="https://s3-ap-southeast-1.amazonaws.com/assets.segari.id/categories/v2/sayuran.png?feature-name=category_item&page-route=products&platform=web" class="w-100" alt="">
                <small>Sayuran</small>
            </div>
            <div class="col-lg-2 mb-3">
                <img src="https://s3-ap-southeast-1.amazonaws.com/assets.segari.id/categories/v2/daging.png?feature-name=category_item&page-route=products&platform=web" class="w-100" alt="">
                <small>Daging</small>
            </div>
            <div class="col-lg-2 mb-3">
                <img src="https://s3-ap-southeast-1.amazonaws.com/assets.segari.id/categories/v2/makanan-siap-saji.png?feature-name=category_item&page-route=products&platform=web" class="w-100" alt="">
                <small>Makanan Siap Saji</small>
            </div>
            <div class="col-lg-2 mb-3">
                <img src="https://s3-ap-southeast-1.amazonaws.com/assets.segari.id/categories/v2/bahan-pokok.png?feature-name=category_item&page-route=products&platform=web" class="w-100" alt="">
                <small>Bahan Pokok</small>
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