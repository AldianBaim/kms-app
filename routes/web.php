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
    return redirect('login');
});

Route::get('/users', [UserController::class, 'index'])->middleware('auth:sanctum');;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/**
 * Knowledge.
 */
Route::get('/knowledge', [App\Http\Controllers\KnowledgeController::class, 'index']);
Route::get('/knowledge/create', [App\Http\Controllers\KnowledgeController::class, 'create']);
Route::post('/knowledge/store', [App\Http\Controllers\KnowledgeController::class, 'store']);
Route::get('/video', [App\Http\Controllers\KnowledgeController::class, 'video']);
Route::get('/photo', [App\Http\Controllers\KnowledgeController::class, 'photo']);
Route::get('/knowledge/detail/{id}', [App\Http\Controllers\KnowledgeController::class, 'detail']);
Route::get('/knowledge-capturing', [App\Http\Controllers\CapturingController::class, 'index']);

/**
 * User.
 */
Route::get('/user', [App\Http\Controllers\UserController::class, 'index']);
Route::get('/user/create', [App\Http\Controllers\UserController::class, 'create']);
Route::get('/user/{id}/edit', [App\Http\Controllers\UserController::class, 'edit']);
Route::post('/user', [App\Http\Controllers\UserController::class, 'store']);
Route::put('/user/{id}', [App\Http\Controllers\UserController::class, 'update']);
Route::delete('/user/{id}', [App\Http\Controllers\UserController::class, 'destroy']);
Route::get('/my-profile', [App\Http\Controllers\UserController::class, 'myProfile']);

/**
 * Request.
 */
Route::get('/request', [App\Http\Controllers\RequestController::class, 'index']);
Route::get('/request/create', [App\Http\Controllers\RequestController::class, 'create']);
Route::post('/request/store', [App\Http\Controllers\RequestController::class, 'store']);

/**
 * Feedback.
 */
Route::get('/kritik-dan-saran', [App\Http\Controllers\CriticController::class, 'index']);
Route::post('/kritik-dan-saran', [App\Http\Controllers\CriticController::class, 'store']);

/**
 * Setting.
 */
Route::get('/pengaturan', [App\Http\Controllers\SettingController::class, 'index']);
Route::put('/pengaturan/{id}', [App\Http\Controllers\SettingController::class, 'update']);

/**
 * File Manager.
 */
Route::get('/berbagi-berkas', [App\Http\Controllers\FileController::class, 'index']);
Route::post('/berbagi-berkas', [App\Http\Controllers\FileController::class, 'store']);
Route::put('/berbagi-berkas/{id}', [App\Http\Controllers\FileController::class, 'update']);
Route::delete('/berbagi-berkas/{id}', [App\Http\Controllers\FileController::class, 'destroy']);

/**
 * Message
 */
Route::get('/message', [App\Http\Controllers\MessageController::class, 'index']);

/**
 * Prediction
 */
Route::get('/prediction', [App\Http\Controllers\PredictionController::class, 'index']);

/**
 * Route for nations
 */
Route::get('/admin/nations', [App\Http\Controllers\Admin\NationsController::class, 'index']);
Route::get('/admin/nations/create', [App\Http\Controllers\Admin\NationsController::class, 'create']);
Route::get('/admin/nations/edit/{id}', [App\Http\Controllers\Admin\NationsController::class, 'edit']);
Route::post('/admin/nations/update', [App\Http\Controllers\Admin\NationsController::class, 'update']);
Route::post('/admin/nations/store', [App\Http\Controllers\Admin\NationsController::class, 'store']);
Route::get('/admin/nations/delete/{id}', [App\Http\Controllers\Admin\NationsController::class, 'delete']);

/**
 * Route for files
 */
Route::get('/admin/files', [App\Http\Controllers\Admin\FilesController::class, 'index']);
Route::get('/admin/files/create', [App\Http\Controllers\Admin\FilesController::class, 'create']);
Route::get('/admin/files/edit/{id}', [App\Http\Controllers\Admin\FilesController::class, 'edit']);
Route::post('/admin/files/update', [App\Http\Controllers\Admin\FilesController::class, 'update']);
Route::post('/admin/files/store', [App\Http\Controllers\Admin\FilesController::class, 'store']);
Route::get('/admin/files/delete/{id}', [App\Http\Controllers\Admin\FilesController::class, 'delete']);

/**
 * Route for files
 */
Route::get('/admin/files', [App\Http\Controllers\Admin\FilesController::class, 'index']);
Route::get('/admin/files/create', [App\Http\Controllers\Admin\FilesController::class, 'create']);
Route::get('/admin/files/edit/{id}', [App\Http\Controllers\Admin\FilesController::class, 'edit']);
Route::post('/admin/files/update', [App\Http\Controllers\Admin\FilesController::class, 'update']);
Route::post('/admin/files/store', [App\Http\Controllers\Admin\FilesController::class, 'store']);
Route::get('/admin/files/delete/{id}', [App\Http\Controllers\Admin\FilesController::class, 'delete']);


/**
 * Route for posts
 */
Route::get('/admin/posts', [App\Http\Controllers\Admin\PostsController::class, 'index']);
Route::get('/admin/posts/create', [App\Http\Controllers\Admin\PostsController::class, 'create']);
Route::get('/admin/posts/edit/{id}', [App\Http\Controllers\Admin\PostsController::class, 'edit']);
Route::post('/admin/posts/update', [App\Http\Controllers\Admin\PostsController::class, 'update']);
Route::post('/admin/posts/store', [App\Http\Controllers\Admin\PostsController::class, 'store']);
Route::get('/admin/posts/delete/{id}', [App\Http\Controllers\Admin\PostsController::class, 'delete']);

/**
 * Route for requests
 */
Route::get('/admin/requests', [App\Http\Controllers\Admin\RequestsController::class, 'index']);
Route::get('/admin/requests/create', [App\Http\Controllers\Admin\RequestsController::class, 'create']);
Route::get('/admin/requests/edit/{id}', [App\Http\Controllers\Admin\RequestsController::class, 'edit']);
Route::post('/admin/requests/update', [App\Http\Controllers\Admin\RequestsController::class, 'update']);
Route::post('/admin/requests/store', [App\Http\Controllers\Admin\RequestsController::class, 'store']);
Route::get('/admin/requests/delete/{id}', [App\Http\Controllers\Admin\RequestsController::class, 'delete']);

/**
 * Route for users
 */
Route::get('/admin/users', [App\Http\Controllers\Admin\UsersController::class, 'index']);
Route::get('/admin/users/create', [App\Http\Controllers\Admin\UsersController::class, 'create']);
Route::get('/admin/users/edit/{id}', [App\Http\Controllers\Admin\UsersController::class, 'edit']);
Route::post('/admin/users/update', [App\Http\Controllers\Admin\UsersController::class, 'update']);
Route::post('/admin/users/store', [App\Http\Controllers\Admin\UsersController::class, 'store']);
Route::get('/admin/users/delete/{id}', [App\Http\Controllers\Admin\UsersController::class, 'delete']);

/**
 * Route for feedbacks
 */
Route::get('/admin/feedbacks', [App\Http\Controllers\Admin\FeedbacksController::class, 'index']);
Route::get('/admin/feedbacks/create', [App\Http\Controllers\Admin\FeedbacksController::class, 'create']);
Route::get('/admin/feedbacks/edit/{id}', [App\Http\Controllers\Admin\FeedbacksController::class, 'edit']);
Route::post('/admin/feedbacks/update', [App\Http\Controllers\Admin\FeedbacksController::class, 'update']);
Route::post('/admin/feedbacks/store', [App\Http\Controllers\Admin\FeedbacksController::class, 'store']);
Route::get('/admin/feedbacks/delete/{id}', [App\Http\Controllers\Admin\FeedbacksController::class, 'delete']);