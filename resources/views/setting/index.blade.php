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
                <p class="text-subtitle text-muted">Update data profile</p>
            </div>
        </div>
    </div>

    <div class="row match-height">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{ url('pengaturan') }}/{{ $user->id }}" method="POST" enctype="multipart/form-data" class="form form-horizontal">
                            @method('PUT')
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Nama</label>
                                    </div>
                                    <div class="col-md-8 mb-2">
                                        <div class="form-group has-icon-left">
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
                                    </div>
                                    <div class="col-md-4">
                                        <label>Alamat</label>
                                    </div>
                                    <div class="col-md-8 mb-2">
                                        <div class="form-group has-icon-left">
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
                                    </div>
                                    <div class="col-md-4">
                                        <label>Pekerjaan</label>
                                    </div>
                                    <div class="col-md-8 mb-2">
                                        <div class="form-group has-icon-left">
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
                                    </div>
                                    <div class="col-md-4">
                                        <label>Avatar</label>
                                    </div>
                                    <div class="col-md-8 mb-2">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input class="form-control @error('avatar') is-invalid @enderror" name="avatar" type="file" id="img-source" onchange="previewImage();">
                                            </div>
                                            @error('avatar')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                            <img id="img-preview" src="{{ $user->avatar ? asset('storage/image/avatar/' . $user->avatar) : asset('/image/avatar-default.png') }}" width="150" class="img-thumbnail my-2">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-8 mb-2">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}" placeholder="" id="first-name-icon">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-envelope"></i>
                                                </div>
                                            </div>
                                            @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Peran</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group mb-4">
                                            <div class="input-group">
                                                <select name="role_name" class="form-control">
                                                    <option value="petani" {{ $user->role_name == 'petani' ? 'selected' : '' }}>Petani</option>
                                                    <option value="pedagang" {{ $user->role_name == 'pedagang' ? 'selected' : '' }}>Pedagang</option>
                                                    <option value="penyuluh" {{ $user->role_name == 'penyuluh' ? 'selected' : '' }}>Penyuluh</option>
                                                    <option value="dinas" {{ $user->role_name == 'dinas' ? 'selected' : '' }}>Dinas Pertanian</option>
                                                    <option value="kelompok" {{ $user->role_name == 'kelompok' ? 'selected' : '' }}>Kelompok Petani</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-4">
                                        <label>Password</label>
                                    </div>
                                    <div class="col-md-8 mb-2">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-lock"></i>
                                                </div>
                                            </div>
                                            @error('password')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Konfirmasi Password</label>
                                    </div>
                                    <div class="col-md-8 mb-2">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="password" name="password_confirm" class="form-control @error('password_confirm') is-invalid @enderror" placeholder="">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-lock"></i>
                                                </div>
                                            </div>
                                            @error('password_confirm')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div> -->
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection