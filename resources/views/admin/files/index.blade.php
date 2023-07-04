@extends('layouts.app')

@section('content')

<section class="p-3">
    <h4>Manage Files</h4>
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
                <a href="{{ url('/admin/files/create') }}" class="btn btn-info text-white"><i class="fa fa-plus"></i> New Files</a>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        
        
        <table class="table table-bordered">
        <thead>
        <tr>
<th>Id</th>
<th>User id</th>
<th>Title</th>
<th>Category</th>
<th>Attachment</th>
<th>Status</th>
<th>Created at</th>
<th>Updated at</th>
<th>Opsi</th>
        </tr>
        </thead>
        <tbody class="content">

        @foreach ($files as $file)
        <tr>
<td>{{ $file->id }}</td>
<td>{{ $file->user_id }}</td>
<td>{{ $file->title }}</td>
<td>{{ $file->category }}</td>
<td>{{ $file->attachment }}</td>
<td>{{ $file->status }}</td>
<td>{{ $file->created_at }}</td>
<td>{{ $file->updated_at }}</td>
<td><a href="{{ url('admin/files/edit/'. $file->id) }}">Edit<a> . <a onclick="return confirm('This record will be deleted, sure?')" href="{{ url('admin/files/delete/'. $file->id) }}">Delete<a></td></tr>

        @endforeach
                
        </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {{ $files->links() }}
        </div>
    </div>

</section>

@endsection