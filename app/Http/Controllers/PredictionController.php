<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Prediction;

class PredictionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['chartData', 'plantTypes', 'topPlantsComparison', 'monthlyTrend']);
    }

    /**
     * Prediction Feature.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $predictions = array_map('str_getcsv', file(storage_path('Prediction.csv')));
        
        return view('prediction.index', ['predictions' => $predictions]);
    }
    
    /**
     * Get chart data for predictions
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function chartData(Request $request)
    {
        $plantType = $request->get('plant_type');
        
        $data = Prediction::getChartData($plantType);
        
        $chartData = [
            'labels' => $data->pluck('tanggal'), // tanggal sudah dalam format string
            'datasets' => [
                [
                    'label' => $plantType ? $plantType : 'Semua Jenis',
                    'data' => $data->pluck('price'),
                    'borderColor' => 'rgb(75, 192, 192)',
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'tension' => 0.1
                ]
            ]
        ];
        
        return response()->json($chartData);
    }
    
    /**
     * Get available plant types
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function plantTypes()
    {
        $plantTypes = Prediction::getPlantTypes();
        
        return response()->json($plantTypes);
    }
    
    /**
     * Get top plants by average price for comparison chart (Optimized)
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function topPlantsComparison(Request $request)
    {
        $year = $request->get('year');
        $limit = $request->get('limit', 10); // Default 10 plants
        
        $cacheKey = 'top_plants_' . ($year ?? 'all') . '_' . $limit;
        
        $chartData = cache()->remember($cacheKey, 1800, function () use ($year, $limit) {
            $query = DB::table('predictions')
                ->select('plant_type')
                ->selectRaw('AVG(price) as avg_price, COUNT(*) as data_count')
                ->groupBy('plant_type')
                ->having('data_count', '>=', 5); // Only plants with at least 5 data points
                
            if ($year) {
                $query->whereYear('tanggal', $year);
            }
            
            $topPlants = $query->orderByDesc('avg_price')
                ->limit($limit)
                ->get();
            
            return [
                'labels' => $topPlants->pluck('plant_type'),
                'datasets' => [
                    [
                        'data' => $topPlants->pluck('avg_price')->map(function ($price) {
                            return round($price);
                        }),
                        'backgroundColor' => [
                            '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF',
                            '#FF9F40', '#FF6384', '#C9CBCF', '#4BC0C0', '#FF6384'
                        ],
                        'borderColor' => [
                            '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF',
                            '#FF9F40', '#FF6384', '#C9CBCF', '#4BC0C0', '#FF6384'
                        ],
                        'borderWidth' => 2
                    ]
                ]
            ];
        });
        
        return response()->json($chartData);
    }
    
    /**
     * Get monthly trend data for seasonal analysis (Optimized)
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function monthlyTrend(Request $request)
    {
        $plantType = $request->get('plant_type');
        $year = $request->get('year');
        
        $cacheKey = 'monthly_trend_' . ($plantType ?? 'all') . '_' . ($year ?? 'all');
        
        $chartData = cache()->remember($cacheKey, 1800, function () use ($plantType, $year) {
            // Use raw DB query for better performance
            $query = DB::table('predictions')
                ->selectRaw('MONTH(tanggal) as month, AVG(price) as avg_price, COUNT(*) as data_count')
                ->groupBy('month')
                ->having('data_count', '>=', 3) // Only months with at least 3 data points
                ->orderBy('month');
                
            if ($plantType) {
                $query->where('plant_type', $plantType);
            }
            
            if ($year) {
                $query->whereYear('tanggal', $year);
            }
            
            $monthlyData = $query->get();
            
            // Create array for all 12 months, fill missing months with 0
            $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            $monthlyPrices = array_fill(0, 12, 0);
            
            foreach ($monthlyData as $data) {
                $monthlyPrices[$data->month - 1] = round($data->avg_price);
            }
            
            return [
                'labels' => $months,
                'datasets' => [
                    [
                        'label' => $plantType ? $plantType . ' - Trend Musiman' : 'Semua Jenis - Trend Musiman',
                        'data' => $monthlyPrices,
                        'backgroundColor' => 'rgba(54, 162, 235, 0.6)',
                        'borderColor' => 'rgb(54, 162, 235)',
                        'borderWidth' => 2,
                        'borderRadius' => 5,
                        'borderSkipped' => false,
                    ]
                ]
            ];
        });
        
        return response()->json($chartData);
    }
}
