@extends('layouts.app')

@section('content')

<section class="p-3">
    <h4>Manage Requests</h4>
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
                <a href="{{ url('/admin/requests/create') }}" class="btn btn-info text-white"><i class="fa fa-plus"></i> New Requests</a>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>User</th>
                    <th>Category</th>
                    <th>Destination</th>
                    <th>Detail</th>
                    <th>Status</th>
                    <th>Created at</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody class="content">

                @foreach ($requests as $request)
                <tr>
                    <td>{{ $request->id }}</td>
                    <td>{{ $request->name }}</td>
                    <td>{{ $request->category }}</td>
                    <td>{{ $request->destination }}</td>
                    <td>{{ $request->detail }}</td>
                    <td>
                        @if($request->status == 'Diajukan')
                            <span class="badge bg-warning">{{ $request->status }}</span>
                        @elseif($request->status == 'Dijawab')
                            <span class="badge bg-success">{{ $request->status }}</span>
                        @endif
                    </td>
                    <td>{{ $request->created_at }}</td>
                    <td><a href="{{ url('admin/requests/edit/'. $request->id) }}">Edit<a> . <a onclick="return confirm('This record will be deleted, sure?')" href="{{ url('admin/requests/delete/'. $request->id) }}">Delete<a></td>
                </tr>

                @endforeach
                
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {{ $requests->links() }}
        </div>
    </div>

</section>

@endsection