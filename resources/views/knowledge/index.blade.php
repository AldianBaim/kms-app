@extends('layouts.app')

@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<section class="p-3">
    <h4>Knowledge.</h4>
    <p><small>Pusat informasi mengenai Aglaonema</small></p>

    <div class="mt-5 input-group">
        <input type="text" id="search" class="form-control" placeholder="Cari judul yang kamu butuhkan ...">
        <button class="btn btn-success" type="button">Cari</button>
    </div>

    <div class="mb-3 mt-3" style="background:#f0f0f0;padding:10px;border-radius:5px;">
        <span class="">Kategori :<br/></span>

        <ul>
        @foreach ($categories as $category)
            <li><a href="{{ url('knowledge/?category=' . $category->category_name) }}" class="category" category="{{ $category->category_name }}"><strong>{{ $category->category_name }}</strong></a></li>
        @endforeach
        </ul>

    </div>
 
    @foreach ($posts as $post)
        <div class="mb-2 content" style="padding:10px 10px 10px 0px;border-bottom:1px solid #dedede;">
            <a href="{{ url('knowledge/detail/' . $post->id) }}">{{ $post->title }}</a>

            <p class="mt-2">{{ Str::words($post->content, 20, '..') }}</p>

            <small>Kategori : <b>{{ $post->category }}</b></small><br/>
            <div class="mt-4">
                <small>Dibuat pada {{ $post->created_at }}</small> . <small><b>{{ $post->total_read }}</b> kali dibaca</small> . <small><a href="{{ url('knowledge/detail/' . $post->id) }}">Baca</a></small>
            </div>
        </div>
    @endforeach

</section>

@endsection