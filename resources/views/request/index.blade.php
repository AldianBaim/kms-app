@extends('layouts.app')

@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

<section>
    <h4>Pengajuan Materi</h4>
    <p><small>Small description about pengajuan materi</small></p>
</section>

@endsection