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

    <div class="mt-4">

        <div class="row">

        @foreach ($posts as $post)
            <div class="col-md-4">
                <div class="card mb-4">
                    <a href="{{ $post->attachment }}" class="grouped_elements">
                        <img style="width:100%;" src="{{ $post->attachment }}" />
                    </a>
                        
                    <div class="card-body">
                        <div class="pull-right">
                            <a href="{{ $post->attachment }}" target="_blank" download><span class="fa fa-download"></span> Unduh</a>    
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        </div>
    </div>
</section>

@endsection