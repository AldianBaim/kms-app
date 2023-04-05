@extends('layouts.app')

@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

<section>
    <h4>{{ $post->title }}</h4>
    <small><b>{{ $post->total_read }}</b> kali dibaca</small> . <small>Dibuat pada {{ $post->created_at }}</small>
   
    <div class="mt-4"><p>{{ $post->content }}</p></div>

    <div class="mt-5">
        <small><a href="{{ url('/knowledge') }}">Kembali</a></small>
    </div>
</section>

@endsection