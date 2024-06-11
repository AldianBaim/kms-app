@extends('layouts.shop')

@section('content')

@push('styles')
<style>
    .swiper-button-next, .swiper-button-prev {
        color: green !important; /* Change button color */
        background: rgba(255, 255, 255, 0.8) ; /* Change button background */
        border-radius: 50%; /* Make buttons circular */
        width: 40px !important;
        height: 40px !important;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .swiper-button-next::after, .swiper-button-prev::after {
        font-size: 20px !important; /* Change arrow size */
    }

    .swiper-pagination-bullet {
        background: #0000ff !important; /* Change pagination bullet color */
    }

    .swiper-pagination-bullet-active {
        background: #0000ff !important; /* Change active pagination bullet color */
    }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
@endpush

<section class="my-3">
    <div class="container p-3 p-lg-4">
        
    @foreach($categories as $category)
    
        @php
            $categoryProducts = $products->filter(function ($product) use ($category) {
                return $product->category == $category;
            });
        @endphp

        
        <div class="mb-4 px-4 px-lg-1">
            <h5 class="mb-3 fw-bold">{{ $category }}</h5>
            <div class="row">
                @if($categoryProducts->isEmpty())
                <p class="text-muted">No products available in this category.</p>
                @else
                <div class="swiper mySwiper px-2">
                    <div class="swiper-wrapper">
                        @foreach($categoryProducts as $product)
                        <div class="swiper-slide">
                            <a href="{{ url('/shop/product/' . $product->slug) }}">
                                <div class="card card-hover border-0 rounded shadow-sm h-100">
                                    <img src="{{ url('storage/image/catalogue/' . $product->image) }}" class="card-img-top" alt="{{ $product->title }}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $product->title }}</h5>
                                        <p class="card-text">{{ $product->description }}</p>
                                        <p class="card-text text-right"><b>Rp {{ number_format($product->price) }}</b></p>
                                        <p class="card-text text-right">
                                            <div class="row">
                                                <div class="col"><span class="text-muted small">Kota<br/><b>Bandung</b></span></div>
                                                <div class="col"><span class="text-muted small">Stok<br/><b>{{ $product->stock }} Buah</b></span></div>
                                            </div>
                                        </p>
                                        <div class="d-grid mt-4">
                                            <a href="{{ url('shop/checkout/' . $product->slug) }}" class="btn btn-sm btn-outline-success rounded-pill">Lihat Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
        
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
        
                </div>
                @endif
            </div>
        </div>
    @endforeach

    </div>
</section>

@push('script')
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    let swiper = new Swiper('.mySwiper', {
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        slidesPerView: 1.5,
        spaceBetween: 10,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
</script>

@endpush

@endsection