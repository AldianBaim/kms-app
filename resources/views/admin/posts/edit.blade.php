@extends('layouts.app')

@section('content')

<section>
    <h4>Manage Posts</h4>
    <p><small>Disini deskripsinya.</small></p>

    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <form action="{{ url('admin/posts/update') }}" enctype="multipart/form-data" method="POST">

        @csrf <!-- {{ csrf_field() }} -->

        <input type="hidden" class="form-control" name="id" value="{{ $post->id }}" required />

        
		<div class="mb-3">
			<label for="Title" class="form-label">Title</label>
			<input type="text" class="form-control" value="{{ $post->title }}" name="title" required />
			<div class="form-text">Penjelasan tentang Title</div>
		</div>
		<div class="mb-3">
			<label for="Type" class="form-label">Type</label>
			<select class="form-control" name="type" required />
			<option value="article">Article</option>
			<option value="photo">Photo</option>
			<option value="video">Video</option>
			</select>
			<div class="form-text">Penjelasan tentang Type</div>
		</div>
		<div class="mb-3">
			<label for="Cover" class="form-label">Cover</label>
			<input type="file" class="form-control" value="{{ $post->cover }}" name="cover" />
			<a href="{{ url('storage/files/knowledge/' . $post->cover) }}" target="_blank"><i class="fa fa-image"></i> See cover</a>
		</div>
		<div class="mb-3">
			<label for="Status" class="form-label">Status</label>
			<select class="form-control" name="status" required />
			<option value="Ditunda">Ditunda</option>
			<option value="Diterima">Diterima</option>
			</select>
			<div class="form-text">Penjelasan tentang Status</div>
		</div>
		<div class="mb-3">
			<label for="Attachment" class="form-label">Attachment</label>
			<input type="file" class="form-control" value="{{ $post->attachment }}" name="attachment" />
			<a href="{{ url('storage/files/knowledge/' . $post->attachment) }}" target="_blank"><i class="fa fa-file"></i> See attachment</a>
		</div>
		<div class="mb-3">
			<label for="Content" class="form-label">Content</label>
			<textarea cols="5" rows="5" class="form-control" name="content" required />{{ $post->content }}</textarea>
			<div class="form-text">Penjelasan tentang Content</div>
		</div>
		<div class="mb-3">
			<label for="Total read" class="form-label">Total read</label>
			<input type="number" class="form-control" value="{{ $post->total_read }}" name="total_read" required />
			<div class="form-text">Penjelasan tentang Total read</div>
		</div>
        
        <button type="submit" class="btn btn-primary" name="save" value="save_edit">Save, and edit</button>
        <button type="submit" class="btn btn-success" name="save" value="save">Save</button>
    </form>
</section>

@endsection