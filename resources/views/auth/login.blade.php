@extends('layouts.app')

@section('content')
<section class="bg-light">
    <div class="container p-4">
        <div class="row justify-content-center align-items-center" style="height: 100vh">
            <div class="col-lg-4">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="card p-4 border-0 shadow-sm">
                        <div class="text-center mb-4" style="margin-top: -10vh">
                            <img src="{{ asset('image/icon/sidebar/profile.png') }}" width="80" class="rounded-circle p-3 mb-4 bg-secondary shadow" />
                            <h4>KMS Aglaonema</h4>
                            <h6 class="text-muted">Selamat datang! Masuk dan temukan berbagai informasi dan wawasan penting seputar Aglaonema.</h6>
                            <img src="https://image.web.id/images/aglaonema.png" class="w-50"/>
                        </div>
                        <div class="form-group mb-4">
                            <div class="input-group">
                                <input class="form-control border-0 border border-bottom @error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email" />
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
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <input class="form-control border-0 border border-bottom @error('email') is-invalid @enderror" id="password" type="password" name="password" required placeholder="Kata Sandi" />
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
                    </div>
                    <div class="d-grid mt-3">
                        <button type="submit" class="btn btn-danger shadow-sm">Masuk</button>
                    </div>
                </form>
                <div class="text-center mt-2">
                    <a href="{{ route('password.request') }}" class="text-decoration-none">
                        Lupa kata sandi?
                    </a>
                </div>
                <div class="text-center mt-4 small">
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="text-decoration-none">
                        Daftar disini
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection