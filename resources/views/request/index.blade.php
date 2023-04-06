@extends('layouts.app')

@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

<section>
    <h4>Request Materi</h4>
    <p><small>Silakan tanyakan dan ajukan materi mengenai Aglaonema yang ingin diketahui. Stakeholder terkait akan membantu kamu mendapatkan jawabannya. Bapak/ibu bisa bertanya mengenai pembibitan, waktu tanam, kondisi cuaca, teknik budidaya, penyakit dan lainnya.</small></p>

    <form>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Kategori Materi</label>
            <select name="category" class="form-control">
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
            <label for="exampleInputPassword1" class="form-label">Ditujukan Kepada</label>
            <select name="category" class="form-control">
                <option value="" selected>Pilih ..</option>
                <option value="Semua">Semua</option>
                <option value="Dinas Terkait">Dinas Terkait</option>
                <option value="Rekan Petani">Rekan Petani</option>
                <option value="Lainnya">Lainnya</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Rincian</label>
            <textarea class="form-control" name="detail"></textarea>
            <div class="form-text">Jelaskan materi yang diinginkan lebih rinci lagi</div>
        </div>
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
            <div class="col">
                <div class="pull-right">
                    <a href="#">Riwayat Pengajuan <span class="fa fa-long-arrow-right"></span></a>
                </div>
            </div>
        </div>
    </form>
</section>

@endsection