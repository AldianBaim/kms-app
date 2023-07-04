@extends('layouts.app')

@section('content')

<section>
    <h4>Manage Nations</h4>
    <p><small>Disini deskripsinya.</small></p>

    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <form action="{{ url('admin/nations/update') }}" enctype="multipart/form-data" method="POST">

        @csrf <!-- {{ csrf_field() }} -->

        <input type="hidden" class="form-control" name="id" value="{{ $nation->id }}" required />

        
		<div class="mb-3">
			<label for="Name" class="form-label">Name</label>
			<input type="text" class="form-control" value="{{ $nation->name }}" name="name" required />
			<div class="form-text">Penjelasan tentang Name</div>
		</div>
		<div class="mb-3">
			<label for="User id" class="form-label">User id</label>
			<input type="number" class="form-control" value="{{ $nation->user_id }}" name="user_id" required />
			<div class="form-text">Penjelasan tentang User id</div>
		</div>
		<div class="mb-3">
			<label for="Total people" class="form-label">Total people</label>
			<input type="number" class="form-control" value="{{ $nation->total_people }}" name="total_people" required />
			<div class="form-text">Penjelasan tentang Total people</div>
		</div>
		<div class="mb-3">
			<label for="Continent" class="form-label">Continent</label>
			<select class="form-control" name="continent" required />
			<option value="asia">Asia</option>
			<option value="europe">Europe</option>
			<option value="africa">Africa</option>
			<option value="america">America</option>
			</select>
			<div class="form-text">Penjelasan tentang Continent</div>
		</div>
        
        <button type="submit" class="btn btn-primary" name="save" value="save_edit">Save, and edit</button>
        <button type="submit" class="btn btn-success" name="save" value="save">Save</button>
    </form>
</section>

@endsection