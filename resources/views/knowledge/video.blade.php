@extends('layouts.app')

@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<section class="p-3">
    <h4>Tonton Video.</h4>
    <p><small>Pelajari Aglaonema melalui video</small></p>

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
            <div class="col-md-6">

                <div class="mb-4">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $post->attachment }}?rel=0" allowfullscreen></iframe>
                    </div>

                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <small>100 kali ditonton</small> . <small>Diunggah pada {{ $post->created_at }}</small>

                </div>

            </div>

        @endforeach

        </div>
    </div>
</section>

@endsection