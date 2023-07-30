@extends('layouts.app')

@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<section class="p-3">
    <h4>Discussion.</h4>
    <p><small>Berdiskusi seputar Algaonema</small></p>

    <div class="my-3 text-end">
        <a href="{{ url('/forum/create') }}" class="btn btn-sm btn-info text-white"><i class="fa fa-plus"></i> Buat diskusi baru</a>
    </div>

    <div class="mt-5 input-group">
        <input type="text" id="search" class="form-control" placeholder="Cari diskusi ...">
        <button class="btn btn-success" type="button">Cari</button>
    </div>

    <div class="mb-3 mt-3">
        <span class="">Kategori :</span>
        <a href="#"><strong>Pembibitan</strong></a>, 
        <a href="#"><strong>Teknik Budidaya</strong></a>, 
        <a href="#"><strong>Waktu Tanam</strong></a>, 
        <a href="#"><strong>Penyakit</strong></a>, 
        <a href="#"><strong>Lainnya</strong></a>
    </div>
 
    @foreach ($threads as $thread)
        <div class="mb-2 content" style="padding:10px 10px 10px 0px;border-bottom:1px solid #dedede;">
            <a href="{{ url('forum/detail/' . $thread->id) }}">{{ $thread->thread_name }}</a>

            <p class="mt-2">{!! Str::words($thread->thread_content, 20, '..') !!}</p>

            <div class="mt-4">
                <small>Dibuat pada {{ $thread->created_at }}</small> . <small><a href="{{ url('forum/detail/' . $thread->id) }}"><b>Tanggapi  <span class="fa fa-external-link"></span></b></a></small>
            </div>
        </div>
    @endforeach

</section>

@endsection