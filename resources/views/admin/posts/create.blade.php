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

    <form action="{{ url('admin/posts/store') }}" enctype="multipart/form-data" method="POST">

        @csrf <!-- {{ csrf_field() }} -->

        
		<div class="mb-3">
			<label for="Title" class="form-label">Title</label>
			<input type="text" class="form-control" name="title" required />
			<div class="form-text">Penjelasan tentang Title</div>
		</div>
		<div class="mb-3">
			<label for="Type" class="form-label">Type</label>
			<select class="form-control" name="type" required />
			<option value="article">Article</option>
			<option value="photo">Photo</option>
			<option value="video">Video</option>
			</select>
			<div class="form-text">Masukan jenis posting</div>
		</div>

		<div class="mb-3">
			<label for="Type" class="form-label">Category</label>
			<select class="form-control" name="category" required />
				@foreach($categories as $category) 
					<option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
				@endforeach
			</select>
			<div class="form-text">Masukan kategori</div>
		</div>

		<div class="mb-3">
			<label for="Cover" class="form-label">Cover</label>
			<input type="file" class="form-control" name="cover" required />
			<div class="form-text">Masukan cover artikel</div>
		</div>
		<div class="mb-3">
			<label for="Status" class="form-label">Status</label>
			<select class="form-control" name="status" required />
			<option value="Ditunda">Ditunda</option>
			<option value="Diterima">Diterima</option>
			</select>
			<div class="form-text">Pilih status</div>
		</div>
		<div class="mb-3">
			<label for="Attachment" class="form-label">Attachment</label>
			<input type="file" class="form-control" name="attachment" required />
			<div class="form-text">Unggah lampiran jika ada.</div>
		</div>
		<div class="mb-3">
			<label for="Content" class="form-label">Content</label>
			<textarea id="summernote" cols="5" rows="5" class="form-control" name="content" required /></textarea>
			<div class="form-text">Isikan selengkap-lengkapnya</div>
		</div>
		
        <button type="submit" class="btn btn-success" name="save" value="save">Simpan</button>
    </form>
</section>

@endsection