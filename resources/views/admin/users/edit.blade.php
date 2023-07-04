@extends('layouts.app')

@section('content')

<section>
    <h4>Manage Users</h4>
    <p><small>Disini deskripsinya.</small></p>

    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <form action="{{ url('admin/users/update') }}" enctype="multipart/form-data" method="POST">

        @csrf <!-- {{ csrf_field() }} -->

        <input type="hidden" class="form-control" name="id" value="{{ $user->id }}" required />

        
		<div class="mb-3">
			<label for="Name" class="form-label">Name</label>
			<input type="text" class="form-control" value="{{ $user->name }}" name="name" required />
			<div class="form-text">Penjelasan tentang Name</div>
		</div>
		<div class="mb-3">
			<label for="Email" class="form-label">Email</label>
			<input type="text" class="form-control" value="{{ $user->email }}" name="email" required />
			<div class="form-text">Penjelasan tentang Email</div>
		</div>
		<div class="mb-3">
			<label for="Password" class="form-label">Password</label>
			<input type="text" class="form-control" value="{{ $user->password }}" name="password" required />
			<div class="form-text">Penjelasan tentang Password</div>
		</div>
		<div class="mb-3">
			<label for="Role name" class="form-label">Role name</label>
			<input type="text" class="form-control" value="{{ $user->role_name }}" name="role_name" required />
			<div class="form-text">Penjelasan tentang Role name</div>
		</div>
		<div class="mb-3">
			<label for="Address" class="form-label">Address</label>
			<input type="text" class="form-control" value="{{ $user->address }}" name="address" required />
			<div class="form-text">Penjelasan tentang Address</div>
		</div>
		<div class="mb-3">
			<label for="Avatar" class="form-label">Avatar</label>
			<input type="file" class="form-control" value="{{ $user->avatar }}" name="avatar" required />
			<a href="{{ url('storage/image/avatar/' . $user->avatar) }}" target="_blank"><i class="fa fa-image"></i> See avatar</a>
		</div>
		<div class="mb-3">
			<label for="Job" class="form-label">Job</label>
			<input type="text" class="form-control" value="{{ $user->job }}" name="job" required />
			<div class="form-text">Penjelasan tentang Job</div>
		</div>
        
        <button type="submit" class="btn btn-primary" name="save" value="save_edit">Save, and edit</button>
        <button type="submit" class="btn btn-success" name="save" value="save">Save</button>
    </form>
</section>

@endsection