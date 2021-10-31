<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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

Route::get('/', [CommentsController::class, 'showPage']);

Route::post('/', [CommentsController::class, 'createComment']);

Route::match(['get', 'post'], '/login', [LoginController::class, 'login']);

Route::get('/logout', [LoginController::class, 'logout']);

Route::match(['get', 'post'], '/registration', [RegisterController::class, 'register']);

Route::match(['get', 'post'], '/delete/{id}', [CommentsController::class, 'delete']);

Route::post('/update/{id}', [CommentsController::class, 'update']);
