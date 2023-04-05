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
                <h3>Data user</h3>
                <p class="text-subtitle text-muted">Update data user <strong>KMS</strong></p>
            </div>
        </div>
    </div>
    
    <div class="row match-height">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Update informasi data mengenai user</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                    <form action="{{ url('user') }}/{{ $user->id }}" method="POST" class="form form-horizontal">
                            @method('PUT')
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                <div class="col-md-4">
                                        <label>Name</label>
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
                                    <div class="col-md-4">
                                        <label>User sejak</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <span>{{ date('d M Y H:i:s', strtotime($user->created_at)) }}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
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