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
     * Get unique plant types
     */
    public static function getPlantTypes()
    {
        return static::distinct('plant_type')->pluck('plant_type')->sort()->values();
    }
    
    /**
     * Get data for chart by plant type
     */
    public static function getChartData($plantType = null)
    {
        $query = static::select('tanggal', 'price')
            ->orderBy('tanggal');
            
        if ($plantType) {
            $query->where('plant_type', $plantType);
        }
        
        return $query->get();
    }
}
