@extends('layouts.app')

@section('content')

<section>
    <h4>Manage Files</h4>
    <p><small>Disini deskripsinya.</small></p>

    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <form action="{{ url('admin/files/update') }}" enctype="multipart/form-data" method="POST">

        @csrf <!-- {{ csrf_field() }} -->

        <input type="hidden" class="form-control" name="id" value="{{ $file->id }}" required />

        
		<div class="mb-3">
			<label for="User id" class="form-label">User id</label>
			<input type="number" class="form-control" value="{{ $file->user_id }}" name="user_id" required />
			<div class="form-text">Penjelasan tentang User id</div>
		</div>
		<div class="mb-3">
			<label for="Title" class="form-label">Title</label>
			<input type="text" class="form-control" value="{{ $file->title }}" name="title" required />
			<div class="form-text">Penjelasan tentang Title</div>
		</div>
		<div class="mb-3">
			<label for="Category" class="form-label">Category</label>
			<input type="text" class="form-control" value="{{ $file->category }}" name="category" required />
			<div class="form-text">Penjelasan tentang Category</div>
		</div>
		<div class="mb-3">
			<label for="Attachment" class="form-label">Attachment</label>
			<input type="text" class="form-control" value="{{ $file->attachment }}" name="attachment" required />
			<div class="form-text">Penjelasan tentang Attachment</div>
		</div>
		<div class="mb-3">
			<label for="Status" class="form-label">Status</label>
			<select class="form-control" name="status" required />
			<option value="Ditunda">Ditunda</option>
			<option value="Diterima">Diterima</option>
			</select>
			<div class="form-text">Penjelasan tentang Status</div>
		</div>
        
        <button type="submit" class="btn btn-primary" name="save" value="save_edit">Save, and edit</button>
        <button type="submit" class="btn btn-success" name="save" value="save">Save</button>
    </form>
</section>

@endsection