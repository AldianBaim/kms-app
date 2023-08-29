@extends('layouts.app')

@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<section class="p-3">
    <h4>Galeri Foto.</h4>
    <p><small>Pengetahuan mengenai Aglaonema melalui galeri foto.</small></p>

    <div class="mb-3 mt-3" style="background:#f0f0f0;padding:10px;border-radius:5px;">
        <span class="">Kategori :<br/></span>
        <ul>
        @foreach ($categories as $category)
            <li><a href="#"><strong>{{ $category->category_name }}</strong></a></li>
        @endforeach
        </ul>

    </div>

    <div class="mt-4">

        <div class="row">

        @foreach ($posts as $post)
            <div class="col-md-4">
                <div class="card mb-4">
                    <a data-fancybox="gallery" data-caption="{{ $post->title }}" data-src="{{ url('image/' . $post->attachment) }}">
                        <img style="width:100%;" src="{{ url('image/' . $post->attachment) }}" />
                    </a>
                        
                    <div class="card-body">
                        <div class="pull-right">
                            <a href="{{ url('image/' . $post->attachment) }}" target="_blank" download><span class="fa fa-download"></span> Unduh</a>    
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        </div>
    </div>
</section>

@endsection