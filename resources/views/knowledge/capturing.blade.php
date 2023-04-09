@extends('layouts.app')

@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

<section class="p-3">
    <h4>Knowledge Capturing.</h4>
    <p><small>Bapak/ibu dapat membagikan berbagai pengetahuan penting seputar Aglaonema, dalam bentuk sumbangan konten artikel, video, dan audio.</small></p>

    <div class="my-3 text-end">
        <a href="{{ url('/knowledge/create') }}" class="btn btn-sm btn-info text-white"><i class="fa fa-plus"></i> Tambah Baru</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Tipe</th>
                    <th>Berkas</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($posts as $index => $post)
                <tr>
                    <td>{{ $index+1 }}</td>
                    <td>{{ $post->title }}<br/><small class="text-muted">Dikirim pada tanggal {{ $post->created_at }}</small></td>
                    <td>
                        @if($post->type == 'article') 
                            <i class="fa-solid fa-newspaper text-info"></i>
                        @endif

                        @if($post->type == 'video') 
                            <i class="fa-solid fa-video text-danger"></i>
                        @endif

                        @if($post->type == 'photo') 
                            <i class="fa-solid fa-photo-film"></i>
                        @endif
                        
                    <td>{{ $post->attachment }}</td>
                    <td>
                        <a href="{{ url('knowledge/create') }}" class="">Edit</a>
                        <a href="{{ url('') }}" class="text-danger" onclick="confirm('Serius ingin dihapus?')">Hapus</a>
                    </td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            
        </div>
    </div>

</section>

@endsection