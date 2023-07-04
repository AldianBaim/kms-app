@extends('layouts.app')

@section('content')

<section>
    <h4>Manage Requests</h4>
    <p><small>Disini deskripsinya.</small></p>

    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <form action="{{ url('admin/requests/store') }}" enctype="multipart/form-data" method="POST">

        @csrf <!-- {{ csrf_field() }} -->

        
		<div class="mb-3">
			<label for="User id" class="form-label">User</label>
			<select name="user_id" class="form-control" required>
				@foreach($users as $user)
				<option value="{{ $user->id }}">{{ $user->name }}</option>
				@endforeach
			</select>
			<div class="form-text">Penjelasan tentang User id</div>
		</div>
		<div class="mb-3">
			<label for="Category" class="form-label">Category</label>
			<input type="text" class="form-control" name="category" required />
			<div class="form-text">Penjelasan tentang Category</div>
		</div>
		<div class="mb-3">
			<label for="Destination" class="form-label">Destination</label>
			<input type="text" class="form-control" name="destination" required />
			<div class="form-text">Penjelasan tentang Destination</div>
		</div>
		<div class="mb-3">
			<label for="Detail" class="form-label">Detail</label>
			<textarea cols="5" rows="5" class="form-control" name="detail" required /></textarea>
			<div class="form-text">Penjelasan tentang Detail</div>
		</div>
		<div class="mb-3">
			<label for="Status" class="form-label">Status</label>
			<select class="form-control" name="status" required />
			<option value="Diajukan">Diajukan</option>
			<option value="Dijawab">Dijawab</option>
			</select>
			<div class="form-text">Penjelasan tentang Status</div>
		</div>
        
        <button type="submit" class="btn btn-success" name="save" value="save">Simpan</button>
    </form>
</section>

@endsection