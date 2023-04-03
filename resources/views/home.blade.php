@extends('layouts.app')

@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<div class="banner">
    <img src="{{asset('image/banner.png')}}" class="w-100" alt="" />
</div>
<div class="program my-4">
    <div class="row">
        <div class="col-3 col-lg-2 text-center">
            <img src="{{asset('image/icon/content/siren-ga.png')}}" class="w-75" />
            <div class="label">SIREN-GA</div>
        </div>
        <div class="col-3 col-lg-2 text-center">
            <img src="{{asset('image/icon/content/ling-ga.png')}}" class="w-75" />
            <div class="label">LING-GA</div>
        </div>
        <div class="col-3 col-lg-2 text-center">
            <img src="{{asset('image/icon/content/fungsi-ga.png')}}" class="w-75" />
            <div class="label">FUNGSI-GA</div>
        </div>
        <div class="col-3 col-lg-2 text-center">
            <img src="{{asset('image/icon/content/tahan-ga.png')}}" class="w-75" />
            <div class="label">TAHAN-GA</div>
        </div>
        <div class="col-3 col-lg-2 text-center">
            <img src="{{asset('image/icon/content/aksi-ga.png')}}" class="w-75" />
            <div class="label">AKSI-GA</div>
        </div>
        <div class="col-3 col-lg-2 text-center">
            <img src="{{asset('image/icon/content/resiliensi-ga.png')}}" class="w-75" />
            <div class="label">RESILIENSI-GA</div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-3 col-lg-2 text-center">
            <img src="{{asset('image/icon/content/siap-ga.png')}}" class="w-75" />
            <div class="label">SIAP-GA</div>
        </div>
        <div class="col-3 col-lg-2 text-center">
            <img src="{{asset('image/icon/content/nilai-anak.png')}}" class="w-75" />
            <div class="label">NILAI ANAK</div>
        </div>
        <div class="col-3 col-lg-2 text-center">
            <img src="{{asset('image/icon/content/perilaku-koping-ketahanan-pangan-keluarga.png')}}" class="w-75" />
            <div class="label">
                PERILAKU KOPING KETAHANAN PANGAN KELUARGA
            </div>
        </div>
        <div class="col-3 col-lg-2 text-center">
            <img src="{{asset('image/icon/content/tekanan-ekonomi-keluarga-subjektif.png')}}" class="w-75" />
            <div class="label">TEKANAN EKONOMI KELUARGA SUBJEKTIF</div>
        </div>
        <div class="col-3 col-lg-2 text-center">
            <img src="{{asset('image/icon/content/sejahtera-ga.png')}}" class="w-75" />
            <div class="label">SEJAHTERA-GA</div>
        </div>
        <div class="col-3 col-lg-2 text-center">
            <img src="{{asset('image/icon/content/kehidupan-antar-umat-beragam.png')}}" class="w-75" />
            <div class="label">KEHADIRAN ANTAR UMAT BERAGAM</div>
        </div>
    </div>
</div>

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