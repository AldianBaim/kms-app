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

    <div class="mt-4">

        <div class="row">

        @foreach ($posts as $post)
            <div class="col-md-4">
                <div class="card mb-4">
                    <video style="width:100%;" height="240" controls>
                        <source src="{{ url('videos/' . $post->attachment) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video> 

                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <small>Dibuat pada {{ $post->created_at }}</small>
                    </div>
                </div>
            </div>
        @endforeach

        </div>
    </div>
</section>

@endsection