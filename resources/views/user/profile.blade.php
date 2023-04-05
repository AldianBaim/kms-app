@extends('layouts.app')

@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Profile</h3>
                <p class="text-subtitle text-muted">Informasi mengenai data profile</p>
            </div>
        </div>
    </div>
    <section class="my-4">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card p-3 border-0 shadow-sm bg-secondary" style="background-color:#eaeaea">
                    <img src="{{ asset('/image/Group 2.png') }}" class="rounded-circle objectfit-cover mx-auto shadow" alt="Profile">
                    <div class="text-center my-2">
                        <h5>{{ $user->name }}</h5>
                        <h6 class="text-muted">{{ $user->role_name }}</h6>
                        <a href="{{ url('/pengaturan') }}" class="btn btn-sm btn-info text-white my-2"><i class="fa fa-arrows-rotate"></i> Edit Profile</a>

                    </div>
                    <div class="small">
                        <div>Alamat : {!! $user->address ? $user->address : '<i>Alamat belum diisi</i>' !!}</div>
                        <div>Pekerjaan : {!! $user->job ? $user->job : '<i>Pekerjaan belum diisi</i>' !!}</div>
                        <div class="mb-2">Email : {{ $user->email }}</div>
                        <div>Biodata : </div>
                        <div>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vitae provident neque, aspernatur similique voluptates aliquam assumenda nobis mollitia fugit saepe?</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection