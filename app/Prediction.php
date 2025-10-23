<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prediction extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'tanggal',
        'plant_type',
        'price'
    ];
    
    protected $casts = [
        'tanggal' => 'date',
        'price' => 'decimal:2'
    ];
    
    /**
     * Get unique plant types with caching
     */
    public static function getPlantTypes()
    {
        return cache()->remember('prediction_plant_types', 3600, function () {
            return static::distinct('plant_type')
                ->orderBy('plant_type')
                ->pluck('plant_type');
        });
    }
    
    /**
     * Get optimized chart data by plant type with yearly aggregation
     */
    public static function getChartData($plantType = null)
    {
        $cacheKey = 'chart_data_' . ($plantType ?? 'all');
        
        return cache()->remember($cacheKey, 1800, function () use ($plantType) {
            $query = static::selectRaw('YEAR(tanggal) as year, AVG(price) as avg_price')
                ->groupBy('year')
                ->orderBy('year');
                
            if ($plantType) {
                $query->where('plant_type', $plantType);
            }
            
            $yearlyData = $query->get();
            
            // Convert to format expected by frontend
            $result = collect();
            foreach ($yearlyData as $data) {
                $result->push((object)[
                    'tanggal' => $data->year . '-01-01', // Use January 1st as representative date
                    'price' => round($data->avg_price, 2)
                ]);
            }
            
            return $result;
        });
    }
}
