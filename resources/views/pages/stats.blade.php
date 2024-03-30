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
            <h6>Jumlah Total</h6>
            <canvas id="member"></canvas>
        </div>
    </div>

</section>
  
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const member = document.getElementById('member');
const payment = document.getElementById('payment');

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
</script>  

@endsection