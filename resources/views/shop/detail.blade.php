@extends('layouts.shop')

@section('content')

<section class="my-3">
    <div class="card">
        <img src="{{ url('storage/image/catalogue/' . $product->image) }}" class="w-100" style="height:300px;object-fit:cover" alt="">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h4>{{ $product->title }}</h4>
                <div>{{ $product->city }}</div>
            </div>
            <small>Stock : {{ $product->stock }}</small>
            <p class="mt-2">{{ $product->description }}</p>
            <p class="text-right"><b>Rp {{ number_format($product->price) }}</b></p>
            <a href="/shop/checkout/{{ $product->slug }}" class="btn btn-primary pull-right">Checkout</a>
        </div>
    </div>
</section>


@endsection