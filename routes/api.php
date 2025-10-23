<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Prediction API routes - bebas diakses tanpa throttling
Route::withoutMiddleware(['throttle:api', 'throttle:60,1'])->group(function () {
    Route::get('/predictions/chart-data', [App\Http\Controllers\PredictionController::class, 'chartData']);
    Route::get('/predictions/plant-types', [App\Http\Controllers\PredictionController::class, 'plantTypes']);
    Route::get('/predictions/top-plants-comparison', [App\Http\Controllers\PredictionController::class, 'topPlantsComparison']);
    Route::get('/predictions/monthly-trend', [App\Http\Controllers\PredictionController::class, 'monthlyTrend']);
});
