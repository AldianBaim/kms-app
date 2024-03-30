@extends('layouts.app')

@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<section class="p-3">

    @if(Session::has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <h4>Katalog.</h4>
    <p><small>Publikasikan barang dan stok untuk pelanggan</small></p>

    <div class="my-3 text-end">
        <a href="{{ url('/catalogue/create') }}" class="btn btn-sm btn-info text-white"><i class="fa fa-plus"></i> Tambah katalog baru</a>
    </div>

    <div class="row">
        @foreach ($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="{{ url('storage/image/catalogue/' . $product->image) }}" class="card-img-top" alt="{{ $product->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->title }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                    <p class="card-text text-right"><b>Rp {{ $product->price }}</b></p>
                    <p class="card-text text-right">
                        <div class="row">
                            <div class="col"><span  class="text-muted small">Kota Bandung</span></div>
                            <div class="col"><span class="text-muted small">Stok : {{ $product->stock }} Buah</span></div>
                        </div>
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</section>

@endsection