<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', [UserController::class, 'index'])->middleware('auth:sanctum');;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/**
 * Knowledge.
 */
Route::get('/knowledge', [App\Http\Controllers\KnowledgeController::class, 'index']);
Route::get('/video', [App\Http\Controllers\KnowledgeController::class, 'video']);
Route::get('/photo', [App\Http\Controllers\KnowledgeController::class, 'photo']);
Route::get('/knowledge/detail/{id}', [App\Http\Controllers\KnowledgeController::class, 'detail']);


Route::get('/knowledge-capturing', [App\Http\Controllers\CapturingController::class, 'index']);

Route::get('/user', [App\Http\Controllers\UserController::class, 'index']);
Route::get('/user/create', [App\Http\Controllers\UserController::class, 'create']);
Route::get('/user/{id}/edit', [App\Http\Controllers\UserController::class, 'edit']);
Route::post('/user', [App\Http\Controllers\UserController::class, 'store']);
Route::put('/user/{id}', [App\Http\Controllers\UserController::class, 'update']);
Route::delete('/user/{id}', [App\Http\Controllers\UserController::class, 'destroy']);

Route::get('/request', [App\Http\Controllers\RequestController::class, 'index']);

Route::get('/kritik-dan-saran', [App\Http\Controllers\CriticController::class, 'index']);
Route::post('/kritik-dan-saran', [App\Http\Controllers\CriticController::class, 'store']);
