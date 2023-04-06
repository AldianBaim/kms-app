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
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    @if($user->avatar)
                    <img src="{{ asset('storage/image/avatar/' . $user->avatar) }}" class="img-fluid w-100 h-100 rounded-start" alt="...">
                    @else
                    <img src="{{ asset('/image/avatar-default.png') }}" class="img-fluid w-100 h-100 rounded-start" alt="...">
                    @endif
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title mb-0">{{ $user->name }}</h5>
                        <p class="card-text mb-0"><small class="text-muted">{{ $user->role_name }}</small></p>
                        <a href="{{ url('/pengaturan') }}" class="btn btn-sm btn-info text-white my-2"><i class="fa fa-arrows-rotate"></i> Edit Profile</a>
                        <p class="card-text m-0">Email : {{ $user->email }}</p>
                        <p class="card-text m-0">Alamat : {{ $user->address }}</p>
                        <p class="card-text m-0">Pekerjaan : {{ $user->job }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection