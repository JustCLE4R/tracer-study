<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\TracerController;
use App\Http\Controllers\PerjalananKarirController;

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

Route::view('/', 'landing');
Route::get('/career', fn() => view('career'));

Route::get('/login', [LoginController::class, 'index'])->middleware(['no-cache', 'guest'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware(['no-cache', 'guest']);
Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('/dashboard', fn() => view('dashboard.index'))->middleware(['no-cache', 'auth'])->name('dashboard');

Route::get('/dashboard/tracer', [TracerController::class, 'index'])->middleware('auth');
Route::post('/dashboard/tracer', [TracerController::class, 'receviceAnswer'])->middleware('auth');

Route::get('/dashboard/profile', [fn() => view('dashboard.profile')])->middleware('auth');
Route::get('/dashboard/edit-profile', function () {
  return view('dashboard.edit-profile');
})->middleware('auth');

Route::get('/dashboard/career/checkSlug', [CareerController::class, 'checkSlug'])->middleware('auth');

Route::resource('/dashboard/perjalanan-karir', PerjalananKarirController::class)->middleware('auth');
Route::resource('/dashboard/career', CareerController::class)->middleware('auth');
