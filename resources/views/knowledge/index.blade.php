@extends('layouts.app')

@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<section class="p-3">
    <h4>Informasi.</h4>
    <p><small>Pusat informasi mengenai Aglaonema</small></p>

    <div class="mt-5 input-group">
        <input type="text" class="form-control" placeholder="Cari judul yang kamu butuhkan ...">
        <button class="btn btn-outline-secondary" type="button">Cari</button>
    </div>

    <div class="mt-4">

    @foreach ($posts as $post)
        <div class="mb-2" style="padding:10px 10px 10px 0px;border-bottom:1px solid #dedede;">
            <a href="{{ url('knowledge/detail/' . $post->id) }}">{{ $post->title }}</a>

            <p class="mt-2">{{ Str::words($post->content, 20, '..') }}</p>

            <div class="mt-4">
                <small>Dibuat pada {{ $post->created_at }}</small> . <small><b>{{ $post->total_read }}</b> kali dibaca</small> . <small><a href="{{ url('knowledge/detail/' . $post->id) }}">Baca</a></small>
            </div>
        </div>
    @endforeach

    </div>
</section>

@endsection