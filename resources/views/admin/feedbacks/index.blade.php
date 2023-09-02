@extends('layouts.app')

@section('content')

<section class="p-3">
    <h4>Manage Feedbacks</h4>
    <p><small>Mengatur data umpan balik</small></p>

    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <div class="row mb-3">
        <div class="col-md-6">
            <div class="input-group">
                <input type="text" id="search" class="form-control" placeholder="Cari judul yang kamu butuhkan ...">
                <button class="btn btn-info text-white" type="button">Search</button>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>User</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Created at</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody class="content">

                @foreach ($feedbacks as $feedback)
                <tr>
                    <td>{{ $feedback->id }}</td>
                    <td>{{ $feedback->name }}</td>
                    <td>{{ $feedback->subject }}</td>
                    <td>{{ $feedback->message }}</td>
                    <td>{{ $feedback->created_at }}</td>
                    <td><a href="{{ url('admin/feedbacks/edit/'. $feedback->id) }}">Edit<a> . <a onclick="return confirm('This record will be deleted, sure?')" href="{{ url('admin/feedbacks/delete/'. $feedback->id) }}">Delete<a></td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $feedbacks->links() }}
        </div>
    </div>

</section>

@endsection