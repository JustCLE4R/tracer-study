<?php

use App\Http\Controllers\CareerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TracerController;
use App\Http\Controllers\PerjalananController;
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
Route::get('/login', [LoginController::class, 'index'])->middleware('no-cache')->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('/dashboard', function () {
  return view('dashboard.index');
})->middleware('no-cache')->middleware('auth')->name('dashboard');

Route::get('/dashboard/tracer', [TracerController::class, 'index']);
Route::post('/dashboard/tracer', [TracerController::class, 'receviceAnswer']);

// Perjalanan
Route::get('/dashboard/perjalanan', [PerjalananController::class, 'index']);



Route::get('/dashboard/career/checkSlug', [CareerController::class, 'checkSlug'])->middleware('auth');

Route::resource('/dashboard/career', CareerController::class)->middleware('auth');
