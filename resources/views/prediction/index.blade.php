@extends('layouts.app')

@section('content')

@if (session('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <span>{{ session('status') }} <i class="fa fa-fw fa-circle-check"></i></span>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<section class="p-3">
    <h4>Prediction</h4>
    <p><small>Prediksi informasi penting seputar Aglaonema, dalam beberapa tahun kedepan.</small></p>

    <div class="row">
        <div class="col">

        </div>
        <div class="col">
            <div class="pull-right"><a href="" onclick="location.reload()"><span class="fa fa-refresh"></span> Refresh data</a></div>
        </div>
    </div>

    <div class="mb-3 mt-3">

    <div class="row">

        <div class="col-md-6">
            <img class="w-100" src="https://i.postimg.cc/ZK4d6Kgw/Whats-App-Image-2023-04-09-at-07-24-41.jpg" />
            <img class="w-100" src="https://i.postimg.cc/B65vv2q4/Whats-App-Image-2023-04-09-at-20-55-09-1.jpg" />
            <img class="w-100" src="https://i.postimg.cc/DZ4qpjd5/Whats-App-Image-2023-04-09-at-07-23-48.jpg" />
        </div>

        <div class="col-md-6">
            <img class="w-100" src="https://i.postimg.cc/c1KDPT4p/Whats-App-Image-2023-04-09-at-07-23-26.jpg" />
            <img class="w-100" src="https://i.postimg.cc/T3kgdMtC/Whats-App-Image-2023-04-09-at-07-24-22.jpg" />
        </div>

    </div>
</section>

@endsection