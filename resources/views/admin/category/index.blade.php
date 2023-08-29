@extends('layouts.app')

@section('content')

<section class="p-3">
    <h4>Manage Category</h4>
    <p><small>Manajemen Kategori pada Setiap Posting di KMS</small></p>

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
                <a href="{{ url('/admin/category/create') }}" class="btn btn-info text-white"><i class="fa fa-plus"></i> New Category</a>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        
        
        <table class="table table-bordered">
        <thead>
        <tr>
            <th>Id</th>
            <th>Category Name</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th>Opsi</th>
        </tr>
        </thead>
            <tbody class="content">

            @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->category_name }}</td>
                <td>{{ $category->created_at }}</td>
                <td>{{ $category->updated_at }}</td>
                <td><a href="{{ url('admin/category/edit/'. $category->id) }}">Edit<a> . <a onclick="return confirm('This record will be deleted, sure?')" href="{{ url('admin/category/delete/'. $category->id) }}">Delete<a></td></tr>
            @endforeach
                    
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {{ $categories->links() }}
        </div>
    </div>

</section>

@endsection