@extends('layouts.app')

@section('content')

@if (session('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <span>{{ session('status') }} <i class="fa fa-fw fa-circle-check"></i></span>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<section class="p-3">
    <h4>Prediction</h4>
    <p><small>Prediksi informasi penting seputar Aglaonema, dalam beberapa tahun kedepan.</small></p>

    <div>

        Test.
    
    </div>
</section>

@endsection