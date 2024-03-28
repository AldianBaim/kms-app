@extends('layouts.app')

@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src=https://ik.imagekit.io/z5w8c5jluyvp/Aglaonema%20banner_vEJdBciYN.jpg?updatedAt=1690796785393" class="d-block w-100" alt="...">
      </div>
      <!-- <div class="carousel-item">
        <img src="https://i.postimg.cc/c4f8tnFK/Add-a-heading.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="https://i.postimg.cc/wj4Tjjg7/Untitled-design-1.png" class="d-block w-100" alt="...">
      </div> -->
    </div>
    <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button> -->
  </div>

<div class="banner">
    <img src="" class="w-50" alt="" />
</div>


@if (Auth::user()->role_name == 'petani')

<div class="program my-4">
    <div class="row">
        <div class="col-3 col-lg-2 text-center">
            <a href="{{ url("catalogue") }}">
                <img src="{{asset('image/icon/content/pembibitan.png')}}" class="w-75 rounded" />
                <div class="label">SUBMIT KATALOG</div>
            </a>
        </div>
        <div class="col-3 col-lg-2 text-center">
            <a href="{{ url("user") }}">
                <img src="{{asset('image/icon/content/anggota-komunitas.png')}}" class="w-75 rounded" />
                <div class="label">TEMAN TANI</div>
            </a>
        </div>
        <div class="col-3 col-lg-2 text-center">
            <a href="{{ url("knowledge") }}">
                <img src="{{asset('image/icon/content/artikel-terbaru.png')}}" class="w-75 rounded" />
                <div class="label">BERITA TERBARU</div>
            </a>
        </div>
        <div class="col-3 col-lg-2 text-center">
            <a href="{{ url("knowledge/detail/2") }}">
                <img src="{{asset('image/icon/content/teknik-budidaya.png')}}" class="w-75 rounded" />
                <div class="label">TEKNIK BUDIDAYA</div>
            </a>
        </div>
        <div class="col-3 col-lg-2 text-center">
            <a href="{{ url("page/diseases") }}">
                <img src="{{asset('image/icon/content/penyakit-aglaonema.png')}}" class="w-75 rounded" />
                <div class="label">PENYAKIT AGLAONEMA</div>
            </a>
        </div>
        <div class="col-3 col-lg-2 text-center">
            <a href="{{ url("page/most-active") }}">
                <img src="{{asset('image/icon/content/anggota-teraktif.png')}}" class="w-75 rounded" />
                <div class="label">ANGGOTA TERAKTIF</div>
            </a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-3 col-lg-2 text-center">
            <a href="{{ url("knowledge/detail/3") }}">
                <img src="{{asset('image/icon/content/permodalan.png')}}" class="w-75 rounded rounded" />
                <div class="label">PESANAN MASUK</div>
            </a>
        </div>
        <div class="col-3 col-lg-2 text-center">
            <a href="{{ url("page/shop") }}" target="_blank">
                <img src="{{asset('image/icon/content/bibit.png')}}" class="w-75 rounded" />
                <div class="label">KEBUTUHAN TANI</div>
            </a>
        </div>
        <div class="col-3 col-lg-2 text-center">
            <a href="https://www.youtube.com/watch?v=DWNnE6f3N0E" target="_blank">
                <img src="{{asset('image/icon/content/pengembangan.png')}}" class="w-75 rounded" />
                <div class="label">
                    PENGEMBANGAN BISNIS
                </div>
            </a>
        </div>
        <div class="col-3 col-lg-2 text-center">
            <a href="{{ url('prediction') }}">
                <img src="{{asset('image/icon/content/prediksi.png')}}" class="w-75 rounded" />
                <div class="label">PREDIKSI HARGA</div>
            </a>
        </div>
        <div class="col-3 col-lg-2 text-center">
            <a href="{{ url('kritik-dan-saran') }}">
                <img src="{{asset('image/icon/content/kritik.png')}}" class="w-75 rounded" />
                <div class="label">KRITIK DAN SARAN</div>
            </a>
        </div>
        <div class="col-3 col-lg-2 text-center">
            <a href="{{ url('message') }}">
                <img src="{{asset('image/icon/content/pesan-masuk.png')}}" class="w-75 rounded" />
                <div class="label">PESAN MASUK</div>
            </a>
        </div>
    </div>
</div>
    
@else
    
<div class="program my-4">
    <div class="row">
        <div class="col-3 col-lg-2 text-center">
            <a href="{{ url("knowledge/detail/1") }}">
                <img src="{{asset('image/icon/content/pembibitan.png')}}" class="w-75 rounded" />
                <div class="label">PEMBIBITAN</div>
            </a>
        </div>
        <div class="col-3 col-lg-2 text-center">
            <a href="{{ url("user") }}">
                <img src="{{asset('image/icon/content/anggota-komunitas.png')}}" class="w-75 rounded" />
                <div class="label">ANGGOTA KOMUNITAS</div>
            </a>
        </div>
        <div class="col-3 col-lg-2 text-center">
            <a href="{{ url("knowledge") }}">
                <img src="{{asset('image/icon/content/artikel-terbaru.png')}}" class="w-75 rounded" />
                <div class="label">ARTIKEL TERBARU</div>
            </a>
        </div>
        <div class="col-3 col-lg-2 text-center">
            <a href="{{ url("knowledge/detail/2") }}">
                <img src="{{asset('image/icon/content/teknik-budidaya.png')}}" class="w-75 rounded" />
                <div class="label">TEKNIK BUDIDAYA</div>
            </a>
        </div>
        <div class="col-3 col-lg-2 text-center">
            <a href="{{ url("page/diseases") }}">
                <img src="{{asset('image/icon/content/penyakit-aglaonema.png')}}" class="w-75 rounded" />
                <div class="label">PENYAKIT AGLAONEMA</div>
            </a>
        </div>
        <div class="col-3 col-lg-2 text-center">
            <a href="{{ url("page/most-active") }}">
                <img src="{{asset('image/icon/content/anggota-teraktif.png')}}" class="w-75 rounded" />
                <div class="label">ANGGOTA TERAKTIF</div>
            </a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-3 col-lg-2 text-center">
            <a href="{{ url("knowledge/detail/3") }}">
                <img src="{{asset('image/icon/content/permodalan.png')}}" class="w-75 rounded rounded" />
                <div class="label">PERMODALAN</div>
            </a>
        </div>
        <div class="col-3 col-lg-2 text-center">
            <a href="https://www.youtube.com/watch?v=EqnMqabanvA" target="_blank">
                <img src="{{asset('image/icon/content/bibit.png')}}" class="w-75 rounded" />
                <div class="label">BIBIT UNGGUL</div>
            </a>
        </div>
        <div class="col-3 col-lg-2 text-center">
            <a href="https://www.youtube.com/watch?v=DWNnE6f3N0E" target="_blank">
                <img src="{{asset('image/icon/content/pengembangan.png')}}" class="w-75 rounded" />
                <div class="label">
                    PENGEMBANGAN BISNIS
                </div>
            </a>
        </div>
        <div class="col-3 col-lg-2 text-center">
            <a href="{{ url('prediction') }}">
                <img src="{{asset('image/icon/content/prediksi.png')}}" class="w-75 rounded" />
                <div class="label">PREDIKSI HARGA</div>
            </a>
        </div>
        <div class="col-3 col-lg-2 text-center">
            <a href="{{ url('kritik-dan-saran') }}">
                <img src="{{asset('image/icon/content/kritik.png')}}" class="w-75 rounded" />
                <div class="label">KRITIK DAN SARAN</div>
            </a>
        </div>
        <div class="col-3 col-lg-2 text-center">
            <a href="{{ url('message') }}">
                <img src="{{asset('image/icon/content/pesan-masuk.png')}}" class="w-75 rounded" />
                <div class="label">PESAN MASUK</div>
            </a>
        </div>
    </div>
</div>

@endif

<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card my-5">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> -->

@endsection