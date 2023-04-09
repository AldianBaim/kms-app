@extends('layouts.app')

@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

<section>
    <h4>Inbox</h4>
    <p><small>Riwayat pesan yang bapak/ibu kirim.</small></p>

    <div>
        Under construction.
    </div>
</section>

@endsection