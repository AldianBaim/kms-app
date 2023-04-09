@extends('layouts.app')

@section('content')

<section class="bg-light">
    <div class="container p-4">
        <div class="row justify-content-center align-items-center" style="height: 100vh">
            <div class="col-lg-4">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="card p-4 border-0 shadow-sm">
                        <div class="text-center mb-4" style="margin-top: -10vh">
                            <img src="{{ asset('image/icon/sidebar/profile.png')}}" width="80" class="rounded-circle p-3 mb-4 bg-secondary shadow" />
                            <h4>KMS Aglaonema</h4>
                            <h6 class="text-muted">Daftar dan dapatkan berbagai informasi bermanfaat seputar Aglaonema. Gratis!</h6>
                        </div>
                        <div class="form-group mb-4">
                            <div class="input-group">
                                <input type="text" class="form-control border-0 border border-bottom @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nama" />
                                <span class="input-group-text bg-white border-0 border-bottom border-1">
                                    👤
                                </span>
                            </div>
                            @error('name')
                            <small class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </small>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <div class="input-group">
                                <input type="email" class="form-control border-0 border border-bottom @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email" />
                                <span class="input-group-text bg-white border-0 border-bottom border-1">
                                    @
                                </span>
                            </div>
                            @error('email')
                            <small class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </small>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <div class="input-group">
                                <input type="phone" class="form-control border-0 border border-bottom @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus placeholder="Telepon" />
                                <span class="input-group-text bg-white border-0 border-bottom border-1">
                                    ☎
                                </span>
                            </div>
                            @error('email')
                            <small class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </small>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <div class="input-group">
                                <input type="password" class="form-control border-0 border border-bottom @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus placeholder="Kata Sandi" />
                                <span class="input-group-text bg-white border-0 border-bottom border-1">
                                    🔒
                                </span>
                            </div>
                            @error('password')
                            <small class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </small>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <div class="input-group">
                                <input type="password" class="form-control border-0 border border-bottom @error('confirm_password') is-invalid @enderror" name="password_confirmation" value="{{ old('password_confirmation') }}" required autocomplete="password_confirmation" autofocus placeholder="Konfirmasi Sandi" />
                                <span class="input-group-text bg-white border-0 border-bottom border-1">
                                    🔒
                                </span>
                            </div>
                            @error('password_confirmation')
                            <small class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </small>
                            @enderror
                        </div>

                        <hr />

                        <div class="mb-2">Daftar sebagai :</div>

                        <div class="form-group mb-4">
                            <div class="input-group">
                                <select name="role_name" class="form-control">
                                    <option value="petani">Petani</option>
                                    <option value="pedagang">Pedagang</option>
                                    <option value="penyuluh">Penyuluh</option>
                                    <option value="dinas">Dinas Pertanian</option>
                                    <option value="kelompok">Kelompok Petani</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="d-grid mt-3">
                        <button type="submit" class="btn btn-danger shadow-sm">Daftar</button>
                    </div>
                </form>
                <div class="text-center mt-4 small">
                    Sudah punya akun?
                    <a href="{{ route('login') }}" class="text-decoration-none"> Masuk </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection