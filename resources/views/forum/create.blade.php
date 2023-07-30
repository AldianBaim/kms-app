@extends('layouts.app')

@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

<section>
    <h4>Diskusi Baru.</h4>
    <p><small>Silakan buat diskusi baru berdasarkan kategori.</small></p>

    <form action="{{ url('forum/store') }}" enctype="multipart/form-data" method="POST">

        @csrf <!-- {{ csrf_field() }} -->

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Judul Diskusi</label>
            <input type="text" class="form-control" name="thread_name" required />
            <div class="form-text">Judul diskusi dengan jelas</div>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Kategori Diskusi</label>
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
            <label for="exampleInputPassword1" class="form-label">Konten Isi</label>
            <textarea id="summernote" class="form-control" name="thread_content" rows="5" required></textarea>
            <div class="form-text">Tuliskan awal mula bahan diskusi selengkap-lengkapnya.</div>
        </div>
        <button type="submit" class="btn btn-primary">Mulai Diskusi</button>
    </form>
</section>

@endsection