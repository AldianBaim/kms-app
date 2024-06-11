@extends('layouts.shop')

@section('content')


<section class="my-2">
    <div class="container p-3 p-lg-4">
        
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <h4 class="mb-4">Informasi Akun</h4>
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <form action="{{ url('pengaturan') }}/{{ $user->id }}" method="POST" enctype="multipart/form-data" class="form form-horizontal">
                    @method('PUT')
                    @csrf
                    <div class="form-body">
                        <div class="form-group mb-3">
                            <label class="form-label">Nama</label>
                            <div class="position-relative">
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}" placeholder="" id="first-name-icon">
                                <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                </div>
                            </div>
                            @error('name')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Alamat</label>
                            <div class="position-relative">
                                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ $user->address }}" placeholder="" id="first-name-icon">
                                <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                </div>
                            </div>
                            @error('address')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Pekerjaan</label>
                            <div class="position-relative">
                                <input type="text" name="job" class="form-control @error('job') is-invalid @enderror" value="{{ $user->job }}" placeholder="" id="first-name-icon">
                                <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                </div>
                            </div>
                            @error('job')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Avatar</label>
                            <div class="position-relative">
                                <input class="form-control @error('avatar') is-invalid @enderror" name="avatar" type="file" id="img-source" onchange="previewImage();">
                            </div>
                            @error('avatar')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <img id="img-preview" src="{{ $user->avatar ? asset('storage/image/avatar/' . $user->avatar) : asset('/image/avatar-default.png') }}" width="150" class="img-thumbnail my-3">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Email</label>
                            <div class="position-relative">
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}" placeholder="" id="first-name-icon" readonly>
                                <div class="form-control-icon">
                                    <i class="bi bi-envelope"></i>
                                </div>
                            </div>
                            @error('email')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-outline-success me-1 mb-1">Perbaharui</button>
                        </div>
                    </div>
                </form>

                <hr/>

                <p>Keluar dari aplikasi?</p>

                <button class="btn btn-outline-danger btn-block mt-2" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="fa fa-fw fa-right-from-bracket"></i>
                    <span>Keluar</span>
                </button>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                        
            </div>
        </div>

    </div>
</section>


@endsection