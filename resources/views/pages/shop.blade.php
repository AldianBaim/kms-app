@extends('layouts.app')

@section('content')

<section class="p-3">
    <h4>Beli Kebutuhan Tani</h4>
    <p><small>Belanja kebutuhan tani dari penyedia terpercaya, kurasi dari organisasi, dengan harga terjangkau</small></p> 

    <div class="row">

        <div class="col-md-4">
            <div class="card">
                <img src="https://ik.imagekit.io/6ix6n7mhslj/KMS/Kebutuhan%20Tani/Screenshot%202024-03-28%20at%2008.35.48_uVxMsWmCr.png?updatedAt=1711589795486" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Pupuk Ultradap Pak Tani</h5>
                    <p class="card-text text-right">Rp 50.000</p>
                    <p class="card-text text-right">
                        <div class="row">
                            <div class="col"><span  class="text-muted small">Tangerang</span></div>
                        </div>
                    </p>
                    <button class="btn btn-warning btn-sm pull-right"><span class="fa fa-cart-shopping"></span> Beli</button>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <img src="https://ik.imagekit.io/6ix6n7mhslj/KMS/Kebutuhan%20Tani/Screenshot%202024-03-28%20at%2008.40.48_65nyl_ORQ.png?updatedAt=1711590064825" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">1 kg Sekam Bakar / Media Tanam</h5>
                    <p class="card-text text-right">Rp 10.000</p>
                    <p class="card-text text-right">
                        <div class="row">
                            <div class="col"><span  class="text-muted small">Jakarta</span></div>
                        </div>
                    </p>
                    <button class="btn btn-warning btn-sm pull-right"><span class="fa fa-cart-shopping"></span> Beli</button>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mb-4">
                <img src="https://ik.imagekit.io/6ix6n7mhslj/KMS/Kebutuhan%20Tani/Screenshot%202024-03-28%20at%2008.42.22_dYRDC-mdm.png?updatedAt=1711590156910" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Jaring atap/teduh Paranet shade net 75% list terpal mata ayam</h5>
                    <p class="card-text text-right"><strike>Rp 30.000</strike> Rp 14.000</p>
                    <p class="card-text text-right">
                        <div class="row">
                            <div class="col"><span  class="text-muted small">Jakarta</span></div>
                        </div>
                    </p>
                    <button class="btn btn-warning btn-sm pull-right"><span class="fa fa-cart-shopping"></span> Beli</button>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <img src="https://ik.imagekit.io/6ix6n7mhslj/KMS/Kebutuhan%20Tani/Screenshot%202024-03-28%20at%2008.45.47__nDB8Pif-.png?updatedAt=1711590364564" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Tanaman Hias Bibit Superwhite</h5>
                    <p class="card-text text-right"><strike>Rp 100.000</strike> Rp 85.000</p>
                    <p class="card-text text-right">
                        <div class="row">
                            <div class="col"><span  class="text-muted small">Bandung</span></div>
                        </div>
                    </p>
                    <button class="btn btn-warning btn-sm pull-right"><span class="fa fa-cart-shopping"></span> Beli</button>
                </div>
            </div>
        </div>
    </div>
    
</section>

@endsection