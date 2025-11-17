@extends('layouts.app')

@section('content')
<section class="bg-light">
    <div class="container p-4">
        <div class="row justify-content-center align-items-center" style="height: 100vh">
            <div class="col-lg-4">
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="card p-4 border-0 shadow-sm">
                        <div class="text-center mb-4" style="margin-top: -10vh">
                            <img src="{{ asset('image/icon/sidebar/profile.png') }}" width="80" class="rounded-circle p-3 mb-4 bg-secondary shadow" />
                            <h4>KMS Aglaonema</h4>
                            <h6 class="text-muted">Masukkan email untuk menerima link reset kata sandi.</h6>
                        </div>

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="form-group mb-4">
                            <div class="input-group">
                                <input id="email" type="email" class="form-control border-0 border border-bottom @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email" />
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

                        <div class="d-grid mt-3">
                            <button type="submit" class="btn btn-danger shadow-sm">Kirim Link Reset</button>
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
