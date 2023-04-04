@extends('layouts.app')

@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

<div class="program" style="padding:20px;background:#FFF;">
    <h4>{{ $post->title }}</h4>
    <small><b>{{ $post->total_read }}</b> kali dibaca</small> . <small>Dibuat pada 13 Maret 2023</small>
   
    <div class="mt-4"><p>{{ $post->content }}</p></div>

    <div class="mt-5">
        <small><a href="{{ url('/knowledge') }}">Kembali</a></small>
    </div>
</div>

@endsection