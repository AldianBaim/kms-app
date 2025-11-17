@extends('layouts.app')

@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

<section>
    <h4>Knowledge Sharing.</h4>
    <p><small>Bapak/ibu dapat membagikan berbagai pengetahuan penting seputar Aglaonema, dalam bentuk sumbangan konten artikel, video, dan audio.</small></p>

    <div class="row">
        <div class="col">

        </div>
        <div class="col">
            <div class="pull-right">
                <a href="{{ url('knowledge-capturing') }}">Riwayat Kontribusi Konten <span class="fa fa-long-arrow-right"></span></a>
            </div>
        </div>
    </div>

    <form action="{{ url('knowledge/store') }}" enctype="multipart/form-data" method="POST">

        @csrf <!-- {{ csrf_field() }} -->

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Judul</label>
            <input type="text" class="form-control" name="title" required />
            <div class="form-text">Judul materi selengkap-lengkapnya</div>
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Kover</label>
            <input type="file" class="form-control" name="cover" required />
            <div class="form-text">Kover untuk konten.</div>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Kategori Materi</label>
            <select name="category" class="form-control" required>
                <option value="" selected>Pilih ..</option>
                <option value="Pembibitan">Pembibitan</option>
                <option value="Waktu Tanam">Waktu Tanam</option>
                <option value="Kondisi Cuaca">Kondisi Cuaca</option>
                <option value="Teknik Budidaya">Teknik Budidaya</option>
                <option value="Penyakit">Penyakit</option>
                <option value="Lainnya">Lainnya</option>
            </select>
            <div class="form-text">Pilih kategori terkait materi.</div>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tipe Konten</label>
            <select name="type" class="form-control" required>
                <option value="" selected>Pilih ..</option>
                <option value="article">Artikel</option>
                <option value="photo">Foto</option>
                <option value="video">Video</option>
            </select>
            <div class="form-text">Pilih tipe materi.</div>
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Lampiran</label>
            <input type="file" class="form-control" name="attachment" required />
            <div class="form-text">Lampiran berkas foto, video.</div>
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Konten Isi</label>
            <textarea id="summernote" class="form-control" name="content" rows="5" required></textarea>
            <div class="form-text">Jelaskan materi yang diinginkan lebih rinci lagi</div>
        </div>
        <button type="submit" class="btn btn-primary">Kirim</button>
    </form>
</section>

@endsection