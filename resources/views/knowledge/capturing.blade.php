@extends('layouts.app')

@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<section class="p-3">
    <h4>Knowledge Capturing.</h4>
    <p><small>Small description about capturing</small></p>
</section>

@endsection