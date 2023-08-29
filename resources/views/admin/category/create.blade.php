@extends('layouts.app')

@section('content')

<section>
    <h4>Manage Category</h4>
    <p><small>Insert new category on post</small></p>

    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <form action="{{ url('admin/category/store') }}" enctype="multipart/form-data" method="POST">

        @csrf <!-- {{ csrf_field() }} -->

		<div class="mb-3">
			<label for="Name" class="form-label">Name</label>
			<input type="text" class="form-control" name="category_name" required />
			<div class="form-text">Masukan category dengan jelas</div>
		</div>
		
        <button type="submit" class="btn btn-success" name="save" value="save">Simpan</button>
    </form>
</section>

@endsection