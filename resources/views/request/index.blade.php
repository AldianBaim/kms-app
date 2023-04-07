@extends('layouts.app')

@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

<section>
    <h4>Materi Diajukan</h4>
    <p><small>Berikut adalah daftar permintaan materi yang bapak/ibu kirim.</small></p>

    <div class="my-3 text-end">
        <a href="{{ url('/request/create') }}" class="btn btn-sm btn-info text-white"><i class="fa fa-plus"></i> Request Baru</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Tujuan</th>
                    <th>Detail</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($requests as $index => $request)
                <tr>
                    <td>{{ $index+1 }}</td>
                    <td>{{ $request->category }}</td>
                    <td>{{ $request->destination }}</td>
                    <td>{{ $request->detail }}</td>
                    <td>{{ Str::ucfirst($request->status) }}</td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            
        </div>
    </div>
    
</section>

@endsection