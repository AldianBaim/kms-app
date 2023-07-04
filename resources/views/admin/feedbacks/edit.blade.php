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

    <form action="{{ url('admin/feedbacks/update') }}" enctype="multipart/form-data" method="POST">

        @csrf <!-- {{ csrf_field() }} -->

        <input type="hidden" class="form-control" name="id" value="{{ $feedback->id }}" required />

        
		<div class="mb-3">
			<label for="User id" class="form-label">User id</label>
			<input type="number" class="form-control" value="{{ $feedback->user_id }}" name="user_id" required />
			<div class="form-text">Penjelasan tentang User id</div>
		</div>
		<div class="mb-3">
			<label for="Subject" class="form-label">Subject</label>
			<input type="text" class="form-control" value="{{ $feedback->subject }}" name="subject" required />
			<div class="form-text">Penjelasan tentang Subject</div>
		</div>
		<div class="mb-3">
			<label for="Message" class="form-label">Message</label>
			<input type="text" class="form-control" value="{{ $feedback->message }}" name="message" required />
			<div class="form-text">Penjelasan tentang Message</div>
		</div>
        
        <button type="submit" class="btn btn-primary" name="save" value="save_edit">Save, and edit</button>
        <button type="submit" class="btn btn-success" name="save" value="save">Save</button>
    </form>
</section>

@endsection