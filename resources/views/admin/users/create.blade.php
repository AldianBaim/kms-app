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

    <form action="{{ url('admin/users/store') }}" enctype="multipart/form-data" method="POST">

        @csrf <!-- {{ csrf_field() }} -->

        
		<div class="mb-3">
			<label for="Name" class="form-label">Name</label>
			<input type="text" class="form-control" name="name" required />
			<div class="form-text">Penjelasan tentang Name</div>
		</div>
		<div class="mb-3">
			<label for="Email" class="form-label">Email</label>
			<input type="text" class="form-control" name="email" required />
			<div class="form-text">Penjelasan tentang Email</div>
		</div>
		<div class="mb-3">
			<label for="Password" class="form-label">Password</label>
			<input type="text" class="form-control" name="password" required />
			<div class="form-text">Penjelasan tentang Password</div>
		</div>
		<div class="mb-3">
			<label for="Role name" class="form-label">Role name</label>
			<select name="role_name" class="form-control">
				<option value="admin">Admin</option>
				<option value="petani">Petani</option>
				<option value="pedagang">Pedagang</option>
				<option value="penyuluh">Penyuluh</option>
				<option value="dinas">Dinas Pertanian</option>
				<option value="kelompok">Kelompok Petani</option>
			</select>
			<div class="form-text">Penjelasan tentang Role name</div>
		</div>
		<div class="mb-3">
			<label for="Address" class="form-label">Address</label>
			<input type="text" class="form-control" name="address" required />
			<div class="form-text">Penjelasan tentang Address</div>
		</div>
		<div class="mb-3">
			<label for="Avatar" class="form-label">Avatar</label>
			<input type="file" class="form-control" name="avatar" required />
			<div class="form-text">Penjelasan tentang Avatar</div>
		</div>
		<div class="mb-3">
			<label for="Job" class="form-label">Job</label>
			<input type="text" class="form-control" name="job" required />
			<div class="form-text">Penjelasan tentang Job</div>
		</div>
        
        <button type="submit" class="btn btn-success" name="save" value="save">Simpan</button>
    </form>
</section>

@endsection