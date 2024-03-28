@extends('layouts.app')

@section('content')

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap5.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap5.css">

@if (session('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <span>{{ session('status') }} <i class="fa fa-fw fa-circle-check"></i></span>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<section class="p-3">
    <h4>Prediction</h4>
    <p><small>Prediksi informasi penting seputar Aglaonema, dalam beberapa tahun kedepan.</small></p>

    <div class="row">
        <div class="col">

        </div>
        <div class="col">
            <div class="pull-right"><a href="" onclick="location.reload()"><span class="fa fa-refresh"></span> Refresh data</a></div>
        </div>
    </div>

    <h5>Grafik Umum</h5>

    <div class="row">

        <div class="col-md-6">
            Harga Jenis Ayugreen
            <img class="w-100" src="https://ik.imagekit.io/6ix6n7mhslj/KMS/Data%20Mining/WhatsApp%20Image%202024-03-24%20at%2014.06.34_BAKj9KDIE.jpeg?updatedAt=1711529895563" />
        </div>

        <div class="col-md-6">
            Harga Prediksi & Aktual Global
            <img class="w-100" src="https://ik.imagekit.io/6ix6n7mhslj/KMS/Data%20Mining/WhatsApp%20Image%202024-03-26%20at%2020.25.29_iyr-OOPDO.jpeg?updatedAt=1711529895460" />
        </div>
    </div>

    <h5 class="mt-4">Prediksi Harga Aglaonema Berdasarkan Jenis</h5>

    <div class="table-responsive" style="max-height:600px;overflow:y;">
        <table id="prediction" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <td>Tanggal</td> 	
                    <td>Suksom Jaipong</td> 	
                    <td>Suksom Merapi</td> 	 	
                    <td>Ruby Super Pink</td> 		
                    <td>Red Spider</td> 	 	
                    <td>Catrina</td> 		
                    <td>Red Venus</td> 		
                    <td>Big Apple</td> 		
                    <td>Khanza</td> 		
                    <td>Wulandari</td> 		
                    <td>Redluck</td> 	 	
                    <td>Moonlight </td> 	
                    <td>Bidadari </td> 		
                    <td>Boxing </td> 		
                    <td>Cinta 	</td> 	
                    <td>Sexylia </td> 		
                    <td>Ayugreen </td> 		
                    <td>Philo Birkin </td> 		
                    <td>Bigpapa 	</td> 	
                    <td>Claudia</td> 	
                </tr>
            </thead>
            <tbody>
            @foreach($predictions as $row)
                <tr>
                    <td>{{ $row[0] }}</td>
                    <td>{{ $row[1] }}</td>
                    <td>{{ $row[2] }}</td>
                    <td>{{ $row[3] }}</td>
                    <td>{{ $row[4] }}</td>
                    <td>{{ $row[5] }}</td>
                    <td>{{ $row[6] }}</td>
                    <td>{{ $row[7] }}</td>
                    <td>{{ $row[8] }}</td>
                    <td>{{ $row[9] }}</td>
                    <td>{{ $row[10] }}</td>
                    <td>{{ $row[11] }}</td>
                    <td>{{ $row[12] }}</td>
                    <td>{{ $row[13] }}</td>
                    <td>{{ $row[14] }}</td>
                    <td>{{ $row[15] }}</td>
                    <td>{{ $row[16] }}</td>
                    <td>{{ $row[17] }}</td>
                    <td>{{ $row[18] }}</td>
                    <td>{{ $row[19] }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</section>

<script>
new DataTable('#prediction');
</script>

@endsection