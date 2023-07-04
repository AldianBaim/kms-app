@extends('layouts.app')

@section('content')

<section class="p-3">
    <h4>Manage Users</h4>
    <p><small>Disini deskripsi list apa nya.</small></p>

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
        <div class="col-md-6">
            <div class="text-end">
                <a href="{{ url('/admin/users/create') }}" class="btn btn-info text-white"><i class="fa fa-plus"></i> New Users</a>
            </div>
        </div>
    </div>

    <div class="table-responsive">
       <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role name</th>
                    <th>Address</th>
                    <th>Avatar</th>
                    <th>Job</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody class="content">

                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role_name }}</td>
                    <td>{{ $user->address }}</td>
                    <td><a href="{{ url('storage/image/avatar/' . $user->avatar) }}" target="_blank"><i class="fa fa-image"></i> See avatar</a></td>
                    <td>{{ $user->job }}</td>
                    <td><a href="{{ url('admin/users/edit/'. $user->id) }}">Edit<a> . <a onclick="return confirm('This record will be deleted, sure?')" href="{{ url('admin/users/delete/'. $user->id) }}">Delete<a></td>
                </tr>

                @endforeach
                
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {{ $users->links() }}
        </div>
    </div>

</section>

@endsection