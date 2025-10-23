@extends('layouts.app')

@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap5.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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

    <h5>Grafik Interaktif Prediksi Harga</h5>
    
    <div class="row mb-4">
        <div class="col-12">
            <form class="row g-3 align-items-end">
                <div class="col-md-4">
                    <label for="plantTypeSelect" class="form-label">Pilih Jenis Tanaman:</label>
                    <select class="form-select" id="plantTypeSelect">
                        <option value="">Semua Jenis Tanaman</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-primary w-100" onclick="updateChart()">
                        <i class="fa fa-chart-line me-1"></i>Update
                    </button>
                </div>
            </form>
        </div>
    </div>
    
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="height: 400px;">
                    <canvas id="predictionChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <h5 class="mt-4">Top 10 Tanaman Berdasarkan Rata-rata Harga</h5>
    
    <div class="row mb-4">
        <div class="col-12">
            <form class="row g-3 align-items-end">
                <div class="col-md-4">
                    <label for="yearSelect" class="form-label">Filter Tahun:</label>
                    <select class="form-select" id="yearSelect">
                        <option value="">Semua Tahun</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                        <option value="2027">2027</option>
                        <option value="2028">2028</option>
                        <option value="2029">2029</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-success w-100" onclick="updateDoughnutChart()">
                        <i class="fa fa-chart-pie me-1"></i>Update
                    </button>
                </div>
            </form>
        </div>
    </div>
    
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="height: 400px;">
                    <canvas id="topPlantsChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <h5 class="mt-4">Analisis Pola Musiman (Seasonal Trend)</h5>
    
    <div class="row mb-4">
        <div class="col-12">
            <form class="row g-3 align-items-end">
                <div class="col-md-3">
                    <label for="seasonalPlantSelect" class="form-label">Pilih Jenis Tanaman:</label>
                    <select class="form-select" id="seasonalPlantSelect">
                        <option value="">Semua Jenis Tanaman</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="seasonalYearSelect" class="form-label">Filter Tahun:</label>
                    <select class="form-select" id="seasonalYearSelect">
                        <option value="">Semua Tahun</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                        <option value="2027">2027</option>
                        <option value="2028">2028</option>
                        <option value="2029">2029</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-warning w-100" onclick="updateSeasonalChart()">
                        <i class="fa fa-chart-bar me-1"></i>Analisis
                    </button>
                </div>
            </form>
        </div>
    </div>
    
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="height: 400px;">
                    <canvas id="seasonalChart"></canvas>
                </div>
            </div>
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
                    <td>{{ $row[1] ? 'Rp ' . number_format((int)$row[1], 0, ',', '.') : '-' }}</td>
                    <td>{{ $row[2] ? 'Rp ' . number_format((int)$row[2], 0, ',', '.') : '-' }}</td>
                    <td>{{ $row[3] ? 'Rp ' . number_format((int)$row[3], 0, ',', '.') : '-' }}</td>
                    <td>{{ $row[4] ? 'Rp ' . number_format((int)$row[4], 0, ',', '.') : '-' }}</td>
                    <td>{{ $row[5] ? 'Rp ' . number_format((int)$row[5], 0, ',', '.') : '-' }}</td>
                    <td>{{ $row[6] ? 'Rp ' . number_format((int)$row[6], 0, ',', '.') : '-' }}</td>
                    <td>{{ $row[7] ? 'Rp ' . number_format((int)$row[7], 0, ',', '.') : '-' }}</td>
                    <td>{{ $row[8] ? 'Rp ' . number_format((int)$row[8], 0, ',', '.') : '-' }}</td>
                    <td>{{ $row[9] ? 'Rp ' . number_format((int)$row[9], 0, ',', '.') : '-' }}</td>
                    <td>{{ $row[10] ? 'Rp ' . number_format((int)$row[10], 0, ',', '.') : '-' }}</td>
                    <td>{{ $row[11] ? 'Rp ' . number_format((int)$row[11], 0, ',', '.') : '-' }}</td>
                    <td>{{ $row[12] ? 'Rp ' . number_format((int)$row[12], 0, ',', '.') : '-' }}</td>
                    <td>{{ $row[13] ? 'Rp ' . number_format((int)$row[13], 0, ',', '.') : '-' }}</td>
                    <td>{{ $row[14] ? 'Rp ' . number_format((int)$row[14], 0, ',', '.') : '-' }}</td>
                    <td>{{ $row[15] ? 'Rp ' . number_format((int)$row[15], 0, ',', '.') : '-' }}</td>
                    <td>{{ $row[16] ? 'Rp ' . number_format((int)$row[16], 0, ',', '.') : '-' }}</td>
                    <td>{{ $row[17] ? 'Rp ' . number_format((int)$row[17], 0, ',', '.') : '-' }}</td>
                    <td>{{ $row[18] ? 'Rp ' . number_format((int)$row[18], 0, ',', '.') : '-' }}</td>
                    <td>{{ $row[19] ? 'Rp ' . number_format((int)$row[19], 0, ',', '.') : '-' }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</section>

<script>
new DataTable('#prediction');

let predictionChart;
const chartCanvas = document.getElementById('predictionChart');

// Initialize chart
function initChart() {
    if (!chartCanvas) {
        console.error('Chart canvas not found!');
        return;
    }
    console.log('Initializing chart on canvas:', chartCanvas);
    
    const ctx = chartCanvas.getContext('2d');
    predictionChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [],
            datasets: []
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Tahun'
                    },
                    type: 'category'
                },
                y: {
                    title: {
                        display: true,
                        text: 'Harga (Rp)'
                    },
                    ticks: {
                        callback: function(value, index, values) {
                            return 'Rp ' + Math.round(value).toLocaleString('id-ID');
                        }
                    }
                }
            },
            plugins: {
                title: {
                    display: true,
                    text: 'Prediksi Harga Aglaonema'
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return context.dataset.label + ': Rp ' + Math.round(context.parsed.y).toLocaleString('id-ID');
                        },
                        title: function(context) {
                            return 'Tahun ' + context[0].label;
                        }
                    }
                }
            }
        }
    });
}

// Load plant types
function loadPlantTypes() {
    fetch('/api/predictions/plant-types', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {
        console.log('Plant types received:', data.length, 'items');
        const select = document.getElementById('plantTypeSelect');
        data.forEach(plantType => {
            const option = document.createElement('option');
            option.value = plantType;
            option.textContent = plantType;
            // Set Adelia as default selected
            if (plantType === 'Adelia') {
                option.selected = true;
            }
            select.appendChild(option);
        });
    })
    .catch(error => {
        console.error('Error loading plant types:', error);
        alert('Error loading plant types: ' + error.message);
        // Fallback to some common plant types if API fails
        const commonPlants = ['Ayugreen', 'Suksom Jaipong', 'Ruby Super Pink', 'Catrina', 'Bidadari'];
        const select = document.getElementById('plantTypeSelect');
        commonPlants.forEach(plantType => {
            const option = document.createElement('option');
            option.value = plantType;
            option.textContent = plantType;
            select.appendChild(option);
        });
    });
}

// Update chart based on selected plant type
function updateChart(defaultPlantType = null) {
    const selectedPlantType = document.getElementById('plantTypeSelect').value || defaultPlantType || 'Adelia';
    const url = '/api/predictions/chart-data' + (selectedPlantType ? '?plant_type=' + encodeURIComponent(selectedPlantType) : '');
    
    fetch(url, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {
        console.log('Raw chart data received:', data);
        
        // Convert string prices to numbers
        if (data.datasets && data.datasets.length > 0) {
            data.datasets[0].data = data.datasets[0].data.map(price => parseFloat(price));
        }
        
        // Extract years from dates for X-axis
        const years = data.labels.map(dateStr => {
            const date = new Date(dateStr);
            return date.getFullYear();
        });
        
        // Group data by year (take average if multiple entries per year)
        const yearlyData = {};
        years.forEach((year, index) => {
            if (!yearlyData[year]) {
                yearlyData[year] = [];
            }
            if (data.datasets && data.datasets[0] && data.datasets[0].data[index]) {
                yearlyData[year].push(data.datasets[0].data[index]);
            }
        });
        
        // Calculate average per year
        const uniqueYears = Object.keys(yearlyData).sort();
        const averageData = uniqueYears.map(year => {
            const prices = yearlyData[year];
            return prices.reduce((sum, price) => sum + price, 0) / prices.length;
        });
        
        // Update chart with yearly data
        const processedData = {
            labels: uniqueYears,
            datasets: [{
                label: selectedPlantType || 'Semua Jenis',
                data: averageData,
                borderColor: 'rgb(75, 192, 192)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                tension: 0.1,
                fill: false
            }]
        };
        
        console.log('Processed chart data:', processedData);
        
        predictionChart.data = processedData;
        predictionChart.update();
    })
    .catch(error => {
        console.error('Error updating chart:', error);
        alert('Error loading chart data: ' + error.message);
    });
}

// Doughnut Chart for Top Plants
let topPlantsChart;
const doughnutCanvas = document.getElementById('topPlantsChart');

// Initialize doughnut chart
function initDoughnutChart() {
    if (!doughnutCanvas) {
        console.error('Doughnut chart canvas not found!');
        return;
    }
    console.log('Initializing doughnut chart on canvas:', doughnutCanvas);
    
    const ctx = doughnutCanvas.getContext('2d');
    topPlantsChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: [],
            datasets: []
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                title: {
                    display: true,
                    text: 'Top 10 Tanaman Berdasarkan Rata-rata Harga'
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return context.label + ': Rp ' + Math.round(context.parsed).toLocaleString('id-ID');
                        }
                    }
                },
                legend: {
                    position: 'right',
                    labels: {
                        usePointStyle: true,
                        padding: 15,
                        font: {
                            size: 12
                        }
                    }
                }
            }
        }
    });
}

// Update doughnut chart based on selected year
function updateDoughnutChart() {
    const selectedYear = document.getElementById('yearSelect').value;
    const url = '/api/predictions/top-plants-comparison' + (selectedYear ? '?year=' + selectedYear : '');
    
    fetch(url, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {
        console.log('Top plants data received:', data);
        
        topPlantsChart.data = data;
        topPlantsChart.update();
    })
    .catch(error => {
        console.error('Error updating doughnut chart:', error);
        alert('Error loading top plants data: ' + error.message);
    });
}

// Seasonal Bar Chart
let seasonalChart;
const seasonalCanvas = document.getElementById('seasonalChart');

// Initialize seasonal chart
function initSeasonalChart() {
    if (!seasonalCanvas) {
        console.error('Seasonal chart canvas not found!');
        return;
    }
    console.log('Initializing seasonal chart on canvas:', seasonalCanvas);
    
    const ctx = seasonalCanvas.getContext('2d');
    seasonalChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [],
            datasets: []
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                title: {
                    display: true,
                    text: 'Analisis Pola Musiman Harga Aglaonema'
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return context.dataset.label + ': Rp ' + Math.round(context.parsed.y).toLocaleString('id-ID');
                        }
                    }
                },
                legend: {
                    display: true,
                    position: 'top'
                }
            },
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Bulan'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Rata-rata Harga (Rp)'
                    },
                    ticks: {
                        callback: function(value, index, values) {
                            return 'Rp ' + Math.round(value).toLocaleString('id-ID');
                        }
                    }
                }
            }
        }
    });
}

// Load plant types for seasonal chart
function loadSeasonalPlantTypes() {
    fetch('/api/predictions/plant-types', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {
        console.log('Seasonal plant types received:', data.length, 'items');
        const select = document.getElementById('seasonalPlantSelect');
        data.forEach(plantType => {
            const option = document.createElement('option');
            option.value = plantType;
            option.textContent = plantType;
            select.appendChild(option);
        });
    })
    .catch(error => {
        console.error('Error loading seasonal plant types:', error);
    });
}

// Update seasonal chart
function updateSeasonalChart() {
    const selectedPlantType = document.getElementById('seasonalPlantSelect').value;
    const selectedYear = document.getElementById('seasonalYearSelect').value;
    
    let url = '/api/predictions/monthly-trend?';
    const params = [];
    
    if (selectedPlantType) {
        params.push('plant_type=' + encodeURIComponent(selectedPlantType));
    }
    if (selectedYear) {
        params.push('year=' + selectedYear);
    }
    
    url += params.join('&');
    
    fetch(url, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {
        console.log('Seasonal data received:', data);
        
        seasonalChart.data = data;
        seasonalChart.update();
    })
    .catch(error => {
        console.error('Error updating seasonal chart:', error);
        alert('Error loading seasonal data: ' + error.message);
    });
}

// Initialize everything when page loads
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM loaded, initializing charts...');
    initChart();
    initDoughnutChart();
    initSeasonalChart();
    loadPlantTypes();
    loadSeasonalPlantTypes();
    
    // Load initial chart data with defaults
    setTimeout(() => {
        console.log('Loading initial chart data with Adelia...');
        updateChart('Adelia');
        console.log('Loading initial doughnut chart data...');
        updateDoughnutChart();
        console.log('Loading initial seasonal chart data...');
        updateSeasonalChart();
    }, 1000);
});
</script>

@endsection