@extends('layouts.app')

@section('content')

<section class="p-3">
    <h4>Anggota Paling Aktif</h4>
    <p><small>Daftar anggota paling aktif di KMS Aglaonema</small></p> 


    <div class="d-flex" style="background:#f0f0f0;padding:15px;margin-bottom:15px;border-radius:5px;">
        <div class="flex-shrink-0">
          <img src="https://i.postimg.cc/bJCNNy1C/Screenshot-2023-07-10-at-11-54-51.png" alt="..." width="100">
        </div>
        <div class="flex-grow-1 ms-3">
            <div><b>Eko Budiono</b></div>
            <div>Kegiatan :
                <ul>
                    <li>Terdaftar sejak 4 Juni 2020</li>
                    <li>Membuat 15 konten pengetahuan</li>
                    <li>Membagikan 20 files</li>
                </ul>  
            </div>  
        </div>
    </div>

    <div class="d-flex" style="background:#f0f0f0;padding:15px;margin-bottom:15px;border-radius:5px;">
        <div class="flex-shrink-0">
          <img src="https://media.licdn.com/dms/image/C5103AQHqsFKnkH-7Aw/profile-displayphoto-shrink_800_800/0/1536542692183?e=2147483647&v=beta&t=TQob7y4A20ALvRK5SDXK2bJb7nwosGrIKGKo8_O50T0" alt="..." width="100">
        </div>
        <div class="flex-grow-1 ms-3">
            <div><b>Chandra Trio Pamungkas</b></div>
            <div>Kegiatan :
                <ul>
                    <li>Terdaftar sejak 20 Januari 2021</li>
                    <li>Membuat 10 konten pengetahuan</li>
                    <li>Membagikan 15 files</li>
                </ul>  
            </div>  
        </div>
    </div>

    <div class="d-flex" style="background:#f0f0f0;padding:15px;margin-bottom:15px;border-radius:5px;">
        <div class="flex-shrink-0">
          <img src="http://kms.test/storage/image/avatar/Ivin.jpg" alt="..." width="100">
        </div>
        <div class="flex-grow-1 ms-3">
            <div><b>Cahaya Arifin</b></div>
            <div>Kegiatan :
                <ul>
                    <li>Terdaftar sejak 4 Desember 2021</li>
                    <li>Membuat 5 konten pengetahuan</li>
                    <li>Membagikan 8 files</li>
                </ul>  
            </div>  
        </div>
    </div>
</section>

@endsection