@extends('layouts.app')

@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<section class="p-3">
    <h4>Katalog.</h4>
    <p><small>Publikasikan barang dan stok untuk pelanggan</small></p>

    <div class="my-3 text-end">
        <a href="{{ url('/forum/create') }}" class="btn btn-sm btn-info text-white"><i class="fa fa-plus"></i> Tambah barang baru</a>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card h-100">
                <img src="https://ik.imagekit.io/6ix6n7mhslj/KMS/Screenshot%202024-03-27%20at%2014.50.33_fqhjxy0Gv.png?updatedAt=1711525869538" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Super White Besar</h5>
                    <p class="card-text">
                        Aglaonema Super White adalah varietas tanaman hias yang menonjol dengan daun berwarna putih yang memikat dan sedikit sentuhan hijau, menciptakan kontras yang indah
                    </p>
                    <p class="card-text text-right"><b>Rp 55.000</b></p>
                    <p class="card-text text-right">
                        <div class="row">
                            <div class="col"><span  class="text-muted small">Kota Bandung</span></div>
                            <div class="col"><span class="text-muted small">Stok : 50 Buah</span></div>
                        </div>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100">
               <img src="https://ik.imagekit.io/6ix6n7mhslj/KMS/Screenshot%202024-03-27%20at%2015.04.24__P2Mqin4b.png?updatedAt=1711526682613" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Philo Birkin</h5>
                    <p class="card-text">
                        Aglaonema Pirlo Birkin adalah varietas tanaman hias Aglaonema yang menonjol dengan daun berpola unik yang menyerupai corak daun birkin
                    </p>
                    <p class="card-text text-right"><b>Rp 50.000</b></p>
                    <p class="card-text text-right">
                        <div class="row">
                            <div class="col"><span  class="text-muted small">Kota Bandung</span></div>
                            <div class="col"><span class="text-muted small">Stok : 20 Buah</span></div>
                        </div>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100">
               <img src="https://ik.imagekit.io/6ix6n7mhslj/KMS/Screenshot%202024-03-27%20at%2015.09.07_27jYXuv_r.png?updatedAt=1711526962091" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Aglaonema butterfly</h5>
                    <p class="card-text">
                        Aglaonema Butterfly adalah varietas tanaman hias Aglaonema yang terkenal karena corak unik pada daunnya yang menyerupai motif kupu-kupu.
                    </p>
                    <p class="card-text text-right"><b>Rp 45.000</b></p>
                    <p class="card-text text-right">
                        <div class="row">
                            <div class="col"><span  class="text-muted small">Kota Bandung</span></div>
                            <div class="col"><span class="text-muted small">Stok : 10 Buah</span></div>
                        </div>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 mt-4">
               <img src="https://ik.imagekit.io/6ix6n7mhslj/KMS/Screenshot%202024-03-27%20at%2016.43.38_m3pfMg-_z.png?updatedAt=1711532654861" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Aglonema Suksom Jaipong</h5>
                    <p class="card-text">
                        Aglonema Suksom Jaipong. Ukuran Dewasa Daun 6 7 8. Tanaman Sehat,Akar Bnyak dan Bagus
                    <p class="card-text text-right"><b>Rp 70.000</b></p>
                    <p class="card-text text-right">
                        <div class="row">
                            <div class="col"><span  class="text-muted small">Kota Bandung</span></div>
                            <div class="col"><span class="text-muted small">Stok : 15 Buah</span></div>
                        </div>
                    </p>
                </div>
            </div>
        </div>

    </div>

</section>

@endsection