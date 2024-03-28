@extends('layouts.app')

@section('content')

<section class="p-3">
    <h4>Database Penyakit Aglaonema</h4>
    <p><small>Daftar berbagai penyakit yang sering menyerang Aglaonema</small></p> 

    <div class="row">

        <div class="col-md-4">
            <div class="card h-100">
                <img src="https://ik.imagekit.io/6ix6n7mhslj/KMS/Penyakit/Screenshot%202024-03-28%20at%2015.45.43_ZWC5HxpKm.png?updatedAt=1711615589856" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5>Penyakit Daun Keriting</h5>
                    <p class="small">Salah satu gejala yang sering muncul pada Aglaonema adalah daun yang mengalami keriting. Hal ini bisa disebabkan oleh beberapa faktor, termasuk kelembaban rendah, serangan hama seperti kutu daun, atau bahkan penyakit lain yang mempengaruhi tanaman</p>
                    <button class="btn btn-warning btn-sm pull-right"> Lebih Lengkap</button>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100">
                <img src="https://ik.imagekit.io/6ix6n7mhslj/KMS/Penyakit/Screenshot%202024-03-28%20at%2016.04.14_gQvgvhGFK.png?updatedAt=1711616687632" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5>Daun Berwarna Kuning</h5>
                    <p class="small">Gejala lain yang sering ditemui adalah daun yang berubah warna menjadi kuning. Penyebabnya bisa bervariasi, mulai dari kelebihan air hingga kekurangan unsur hara tertentu</p>
                    <button class="btn btn-warning btn-sm pull-right"> Lebih Lengkap</button>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100">
                <img src="https://ik.imagekit.io/6ix6n7mhslj/KMS/Penyakit/Screenshot%202024-03-28%20at%2015.47.46_GZnyrCzjI.png?updatedAt=1711615679557" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5>Penyakit Busuk Akar</h5>
                    <p class="small">Penyakit ini dapat menyebabkan tanaman layu dan daun menjadi lemah karena akarnya membusuk. Hal ini umumnya disebabkan oleh tanah terlalu basah atau terlalu banyak air, yang memicu pertumbuhan jamur patogen</p>
                    <button class="btn btn-warning btn-sm pull-right"> Lebih Lengkap</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card h-100">
                <img src="https://ik.imagekit.io/6ix6n7mhslj/KMS/Penyakit/Screenshot%202024-03-28%20at%2015.48.50_PasXEsYsS.png?updatedAt=1711615744158" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5>Penyakit Nekrosis Daun</h5>
                    <p class="small">Daun yang mengalami nekrosis akan memiliki bercak coklat atau hitam pada tepinya. Penyebabnya bisa beragam, mulai dari kelembaban yang tidak stabil hingga infeksi bakteri atau jamur.</p>
                    <button class="btn btn-warning btn-sm pull-right"> Lebih Lengkap</button>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card h-100">
                <img src=" https://ik.imagekit.io/6ix6n7mhslj/KMS/Penyakit/Screenshot%202024-03-28%20at%2015.50.26_zSg2u6BZe.png?updatedAt=1711615838737" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5>Penyakit Layu Bakteri</h5>
                    <p class="small">Penyakit ini disebabkan oleh bakteri yang menyerang sistem vaskular tanaman, menyebabkan tanaman layu cepat dan daun berubah warna menjadi kecoklatan.</p>
                    <button class="btn btn-warning btn-sm pull-right"> Lebih Lengkap</button>
                </div>
            </div>
        </div>
    </div>
   
</section>

@endsection