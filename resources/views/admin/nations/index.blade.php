@extends('layouts.app')

@section('content')

<section class="p-3">
    <h4>Manage Nations</h4>
    <p><small>Disini deskripsi list apa nya.</small></p>

    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <div class="row mb-3">
        <div class="col-md-6">
            <div class="input-group">
                <input type="text" id="search" class="form-control" placeholder="Cari judul yang kamu butuhkan ...">
                <button class="btn btn-info text-white" type="button">Search</button>
            </div>
        </div>
        <div class="col-md-6">
            <div class="text-end">
                <a href="{{ url('/admin/nations/create') }}" class="btn btn-info text-white"><i class="fa fa-plus"></i> New Nations</a>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        
        
        <table class="table table-bordered">
        <thead>
        <tr>
<th>Id</th>
<th>Name</th>
<th>User id</th>
<th>Total people</th>
<th>Continent</th>
<th>Created at</th>
<th>Updated at</th>
<th>Opsi</th>
        </tr>
        </thead>
        <tbody class="content">

        @foreach ($nations as $nation)
        <tr>
<td>{{ $nation->id }}</td>
<td>{{ $nation->name }}</td>
<td>{{ $nation->user_id }}</td>
<td>{{ $nation->total_people }}</td>
<td>{{ $nation->continent }}</td>
<td>{{ $nation->created_at }}</td>
<td>{{ $nation->updated_at }}</td>
<td><a href="{{ url('admin/nations/edit/'. $nation->id) }}">Edit<a> . <a onclick="return confirm('This record will be deleted, sure?')" href="{{ url('admin/nations/delete/'. $nation->id) }}">Delete<a></td></tr>

        @endforeach
                
        </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {{ $nations->links() }}
        </div>
    </div>

</section>

@endsection