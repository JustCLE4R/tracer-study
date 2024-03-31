<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PekerjaController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\PerjalananKarirController;
use App\Http\Controllers\TracerController;
use App\Http\Controllers\UserController;

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

Route::get('/', [LandingController::class, 'index']);
Route::get('/career', [CareerController::class, 'publicIndex']);
Route::get('/career/{career:slug}', [CareerController::class, 'publicShow'])->name('career.publicShow');
Route::get('/show', function () {
  return view('publicCareer/show');
});


Route::middleware(['guest', 'no-cache'])->group(function () {
  Route::get('/login', [LoginController::class, 'index'])->name('login');
  Route::post('/login', [LoginController::class, 'authenticate']);
});

Route::middleware(['auth', 'no-cache'])->group(function () {
  Route::get('/logout', [LoginController::class, 'logout']);

  Route::get('/dashboard', fn() => view('dashboard.index'))->name('dashboard');
  Route::get('dashboard/perjalanan-karir', [PerjalananKarirController::class, 'index']); //menampilkan semua karir dia

  Route::get('/dashboard/tracer', [TracerController::class, 'index']);
  Route::post('/dashboard/tracer', [TracerController::class, 'receviceAnswer']);

  Route::get('/dashboard/profile', [UserController::class, 'index']);
  Route::get('/dashboard/profile-edit', [UserController::class, 'edit']);
  Route::patch('/dashboard/profile-edit', [UserController::class, 'update']);

  Route::get('/dashboard/career/checkSlug', [CareerController::class, 'checkSlug']);

  Route::resource('/dashboard/pekerja', PekerjaController::class);
  Route::resource('/dashboard/pendidikan', PendidikanController::class);
  Route::resource('/dashboard/career', CareerController::class);
});
