<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
  return view('landing');
});

Route::get('/career', function () {
  return view('career');
});

Route::get('/register', [RegisterController::class, 'index']);
Route::get('login', [LoginController::class, 'index']);
Route::post('login', [LoginController::class, 'authenticate']);

Route::get('/dashboard', function () {
  return view('dashboard.index');
});

Route::get('/dashboard/tracer', function () {
  return view('dashboard.tracer');
});

Route::get('/dashboard/career', function () {
  return view('dashboard.career');
});
