@extends('layouts.app')

@section('content')

<section>
    <h4>Manage Category</h4>
    <p><small>Edit data kategori</small></p>

    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <form action="{{ url('admin/category/update') }}" enctype="multipart/form-data" method="POST">

        @csrf <!-- {{ csrf_field() }} -->

        <input type="hidden" class="form-control" name="id" value="{{ $category->id }}" required />

		<div class="mb-3">
			<label for="Name" class="form-label">Name</label>
			<input type="text" class="form-control" value="{{ $category->category_name }}" name="category_name" required />
			<div class="form-text">Masukan kategori dengan jelas</div>
		</div>
		
        <button type="submit" class="btn btn-primary" name="save" value="save_edit">Save, and edit</button>
        <button type="submit" class="btn btn-success" name="save" value="save">Save</button>
    </form>
</section>

@endsection