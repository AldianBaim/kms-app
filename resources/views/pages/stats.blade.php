@extends('layouts.app')

@section('content')

<section class="p-3">
    <h4>Statistik</h4>
    
    <p><small>Berbagai informasi kesimpulan terkait ekosistem Tanaman Hias Aglaonema</small></p> 

    <div class="row mt-5">
        <div class="col">
            <h6>Jumlah Member</h6>
            <canvas id="member"></canvas>
        </div>
        <div class="col">
            <h6>Jumlah Transaksi.</h6>
            <canvas id="payment"></canvas>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col">
            <h6>Total Stok Seluruh Florist berdasarkan Jenis</h6>
            <canvas id="stock"></canvas>
        </div>
        <div class="col">
            <h6>Persebaran Stok</h6>
            <canvas id="city"></canvas>
        </div>
    </div>

    <div class="mt-4">
        <h6>Stok Berdasarkan Lokasi</h6>
        <table class="table table-striped table-bordered">
            <tr><th>Kota</th><th>Jumlah</th></tr>
            <tr><td>Bandung</td><td>1200</td></tr>
            <tr><td>Tangerang</td><td>840</td></tr>
            <tr><td>Jakarta Timur</td><td>210</td></tr>
            <tr><td>Medan</td><td>540</td></tr>
            <tr><td>Semarang</td><td>602</td></tr>
            <tr><td>Jogja</td><td>321</td></tr>
        </table>
    </div>

</section>
  
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const member = document.getElementById('member');
const payment = document.getElementById('payment');
const stock = document.getElementById('stock');
const city = document.getElementById('city');

// Setup payment.
new Chart(member, {
    type: 'bar',
    data: {
        labels: ['2019', '2020', '2021', '2022', '2023', '2024'],
        datasets: [{
            label: '# Jumlah anggota Florist',
            data: [500, 1000, 1435, 4500, 5000, 7700],
            borderWidth: 1,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)'
            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)'
            ],
        }]
    },
    options: {
        scales: {
            y: {
            beginAtZero: true
            }
        }
    }
});

// Setup member.
new Chart(payment, {
    type: 'line',
    data: {
        labels: ['2019', '2020', '2021', '2022', '2023', '2024'],
        datasets: [{
            label: '# Jumlah Transaksi',
            data: [1000, 5871, 15091, 22900, 35010, 51092],
            borderWidth: 1,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)'
            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)'
            ],
        }]
    },
    options: {
        scales: {
            y: {
            beginAtZero: true
            }
        }
    }
});

// Setup member.
new Chart(stock, {
    type: 'doughnut',
    data: {
        labels: [
            'Suksom Jaipong',
            'Catrina',
            'Red Venus',
            'Big Apple',
            'Khanza',
            'Wulandari',
            'Moonlight',
            'Bidadari',
            'Cinta',
            'Ayugreen',

        ],
        datasets: [{
            label: 'Jenis Aglaonema',
            data: [300, 50, 100, 20, 40, 100, 40, 20, 200, 40],
            backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(153, 255, 153)',
            'rgb(30, 205, 86)',
            'rgb(255, 205, 86)',
            'rgb(150, 40, 86)',
            'rgb(102, 153, 255)',
            'rgb(102, 0, 102)',
            'rgb(51, 204, 204)',
            'rgb(255, 205, 86)',
            'rgb(204, 0, 0)',
            ],
            hoverOffset: 4
        }]
    },
    options: {
        scales: {
            y: {
            beginAtZero: true
            }
        }
    }
});

// Setup location.
new Chart(city, {
    type: 'pie',
    data: {
        labels: [
            'Bandung',
            'Tangerang',
            'Jakarta Timur',
            'Medan',
            'Semarang',
            'Jogja'
        ],
        datasets: [{
            label: 'Stok',
            data: [1200, 840, 210, 540, 602, 321],
            backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(153, 255, 153)',
            'rgb(30, 205, 86)',
            'rgb(255, 205, 86)',
            'rgb(150, 40, 86)',
            'rgb(102, 153, 255)'
            ],
            hoverOffset: 4
        }]
    },
    options: {
        scales: {
            y: {
            beginAtZero: true
            }
        }
    }
});
</script>  

@endsection