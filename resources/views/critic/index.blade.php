@extends('layouts.app')

@section('content')

@if (session('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <span>{{ session('status') }}</span>
    <i class="fa fa-check"></i>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<section>
    <h2>Formulir kritik dan saran</h2>
    <div class="row">
        <div class="col-lg-7">
            <form action="/kritik-dan-saran" method="POST">
                @csrf
                <div class="form-group">
                    <label for="" class="form-label">Subjek</label>
                    <input type="text" name="subject" value="{{ old('subject') }}" class="form-control">
                    @error('subject')
                    <small class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </small>
                    @enderror
                </div>
                <div class="form-group my-3">
                    <label for="" class="form-label">Pesan</label>
                    <textarea name="message" class="form-control" cols="30" rows="6">{{ old('message') }}</textarea>
                    @error('message')
                    <small class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </small>
                    @enderror
                </div>
                <div class="form-group my-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection