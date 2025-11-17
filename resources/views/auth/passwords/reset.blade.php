@extends('layouts.app')

@section('content')
<section class="bg-light">
    <div class="container p-4">
        <div class="row justify-content-center align-items-center" style="height: 100vh">
            <div class="col-lg-4">
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="card p-4 border-0 shadow-sm">
                        <div class="text-center mb-4" style="margin-top: -10vh">
                            <img src="{{ asset('image/icon/sidebar/profile.png') }}" width="80" class="rounded-circle p-3 mb-4 bg-secondary shadow" />
                            <h4>KMS Aglaonema</h4>
                            <h6 class="text-muted">Masukkan password baru untuk akun Anda.</h6>
                        </div>

                        <div class="form-group mb-4">
                            <div class="input-group">
                                <input id="email" type="email" class="form-control border-0 border border-bottom @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="Email" />
                                <span class="input-group-text bg-white border-0 border-bottom border-1">@</span>
                            </div>
                            @error('email')
                            <small class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </small>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <div class="input-group">
                                <input id="password" type="password" class="form-control border-0 border border-bottom @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Kata Sandi Baru" />
                                <span class="input-group-text bg-white border-0 border-bottom border-1">🔒</span>
                            </div>
                            @error('password')
                            <small class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </small>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <div class="input-group">
                                <input id="password-confirm" type="password" class="form-control border-0 border border-bottom" name="password_confirmation" required autocomplete="new-password" placeholder="Konfirmasi Kata Sandi" />
                                <span class="input-group-text bg-white border-0 border-bottom border-1">🔒</span>
                            </div>
                        </div>

                        <div class="d-grid mt-3">
                            <button type="submit" class="btn btn-danger shadow-sm">Reset Password</button>
                        </div>
                    </div>
                </form>
                <div class="text-center mt-2 small">
                    <a href="{{ route('login') }}" class="text-decoration-none">Kembali ke Login</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
