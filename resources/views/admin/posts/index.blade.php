@extends('layouts.app')

@section('content')

<section class="p-3">
    <h4>Manage Posts</h4>
    <p><small>Mengatur data knowledge, video, photo dan sebagainya</small></p>

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
                <a href="{{ url('/admin/posts/create') }}" class="btn btn-info text-white"><i class="fa fa-plus"></i> New Posts</a>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>User</th>
                    <th>Title</th>
                    <th>Type</th>
                    <th>Category</th>
                    <th>Cover</th>
                    <th>Status</th>
                    <th>Attachment</th>
                    <th>Total read</th>
                    <th>Created at</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody class="content">

            @foreach ($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->name }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->type }}</td>
                <td>{{ $post->category }}</td>
                <td><a href="{{ url('storage/files/knowledge/' . $post->cover) }}" target="_blank"><i class="fa fa-image"></i> See image</a></td>
                <td>
                    @if($post->status == 'Ditunda')
                        <span class="badge bg-warning">{{ $post->status }}</span>
                    @elseif($post->status == 'Diterima')
                        <span class="badge bg-success">{{ $post->status }}</span>
                    @endif
                </td>
                <td><a href="{{ url('storage/files/knowledge/' . $post->attachment) }}" target="_blank"><i class="fa fa-image"></i> See attachment</a></td>
                <td>{{ $post->total_read }}</td>
                <td>{{ $post->created_at }}</td>
                <td><a href="{{ url('admin/posts/edit/'. $post->id) }}">Edit<a> . <a onclick="return confirm('This record will be deleted, sure?')" href="{{ url('admin/posts/delete/'. $post->id) }}">Delete<a></td>
            </tr>
            @endforeach
                
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>

</section>

@endsection