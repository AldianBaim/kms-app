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
            <a href="" class="btn btn-primary btn-block">Add to Cart</a>
            <a href="" class="btn btn-secondary btn-block">View Cart</a>
        </div>
    </div>
</section>


@endsection