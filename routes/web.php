<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;

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


Route::get('/', [ContactController::class, 'index']);
Route::get('/contact/show/{id}', [ContactController::class, 'show']);
Route::post('/contact/show', [ContactController::class, 'store']);
Route::post('/contact/up', [ContactController::class, 'up']);
Route::post('/contact/delete', [ContactController::class, 'delete']);

Route::get('/login', [LoginController::class, 'login']);
Route::post('/login/verify', [LoginController::class, 'viewUser']);

Route::get('/login/create', [LoginController::class, 'create']);
Route::post('/login/createUser', [LoginController::class, 'store']);


