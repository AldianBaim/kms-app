@extends('layouts.app')

@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data User</h3>
                <p class="text-subtitle text-muted">Informasi mengenai data user <strong>KMS</strong></p>
            </div>
        </div>
    </div>
    <section class="section">
        <!-- <div class="my-3 text-end">
            <a href="{{ url('/user/create') }}" class="btn btn-sm btn-info text-white"><i class="fa fa-plus"></i> Tambah user</a>
        </div> -->
        <div class="table-responsive my-3">
            <table class="table table-bordered align-middle">
                <thead>
                    <tr>
                        <th>Avatar</th>
                        <th>Nama</th>
                        <th>Peran</th>
                        <th>Pekerjaan</th>
                        <th>Pesan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td width="100"><img src="https://www.gravatar.com/avatar/94d093eda664addd6e450d7e9881bcad?s=32&d=mp&r=PG" width="50" alt=""></td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->role_name}}</td>
                        <td>{!! $user->job ?? '<i>Pekerjaan belum diisi</i>' !!}</td>
                        <td width="140">
                            <a href="" class="btn btn-sm btn-outline-primary"><i class="fa fa-envelope-open-text"></i> Kirim Pesan</a>
                        </td>
                        <!-- <td>
                            <a href="{{ url('user/'. $user->id . '/edit') }}" class="badge bg-primary"><i class="fa fa-pencil"></i></a>
                            <form action="{{ url('user/' . $user->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Apakah anda yakin akan dihapus?')" class="badge bg-danger" style="border: 0px"><i class="fa fa-trash"></i></button>
                            </form>
                        </td> -->
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $users->links() }}
            </div>
        </div>
    </section>
</div>

@endsection