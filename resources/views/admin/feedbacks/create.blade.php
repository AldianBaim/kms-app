@extends('layouts.app')

@section('content')

<section>
    <h4>Manage Feedbacks</h4>
    <p><small>Disini deskripsinya.</small></p>

    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <form action="{{ url('admin/feedbacks/store') }}" enctype="multipart/form-data" method="POST">

        @csrf <!-- {{ csrf_field() }} -->

        
		<div class="mb-3">
			<label for="User id" class="form-label">User id</label>
			<input type="number" class="form-control" name="user_id" required />
			<div class="form-text">Penjelasan tentang User id</div>
		</div>
		<div class="mb-3">
			<label for="Subject" class="form-label">Subject</label>
			<input type="text" class="form-control" name="subject" required />
			<div class="form-text">Penjelasan tentang Subject</div>
		</div>
		<div class="mb-3">
			<label for="Message" class="form-label">Message</label>
			<input type="text" class="form-control" name="message" required />
			<div class="form-text">Penjelasan tentang Message</div>
		</div>
        
        <button type="submit" class="btn btn-success" name="save" value="save">Simpan</button>
    </form>
</section>

@endsection