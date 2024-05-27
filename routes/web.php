<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PekerjaController;
use App\Http\Controllers\WirausahaController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\PerjalananKarirController;
use App\Http\Controllers\QuestionerController;

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

Route::middleware(['guest', 'no-cache'])->group(function () {
  Route::get('/login', [LoginController::class, 'index'])->name('login');
  Route::post('/login', [LoginController::class, 'authenticate']);

  Route::get('/questioner/{questioner:token}', [QuestionerController::class, 'getPublicQuestioner']);
  Route::post('//{questioner:token}', [QuestionerController::class, 'postPublicQuestioner']);
});

//dashboard routes
Route::middleware(['auth', 'no-cache'])->prefix('dashboard')->group(function () { 
  Route::get('/logout', [LoginController::class, 'logout']);

  Route::get('/', fn() => view('dashboard.index'))->name('dashboard');

  Route::get('/profile', [UserController::class, 'index']);
  Route::get('/profile/edit', [UserController::class, 'edit']);
  Route::patch('/profile/edit', [UserController::class, 'update']);

  Route::get('/career/checkSlug', [CareerController::class, 'checkSlug']);
  Route::delete('/hapusBelumKerja', [PerjalananKarirController::class, 'destroyBelumKerja']);

  Route::resource('/career', CareerController::class);
  Route::resource('/perjalanan-karir', PerjalananKarirController::class)->only(['index', 'create', 'store']);
  Route::resource('/pekerja', PekerjaController::class)->except(['index', 'create', 'store']);
  Route::resource('/wirausaha', WirausahaController::class)->except(['index', 'create', 'store']);
  Route::resource('/pendidikan', PendidikanController::class)->except(['index']);

  Route::get('/questioner', [QuestionerController::class, 'index']);
  Route::post('/questioner', [QuestionerController::class, 'store']);

  Route::get('/visual', function () {
    return view('dashboard.visual');
  });

  // admin routes
  Route::middleware('is-admin')->group(function () {
    Route::resource('/admin/laporan', LaporanController::class)->except(['show']);
    Route::resource('/admin', AdminController::class)->except(['create', 'store', 'destroy'])->parameters(['admin' => 'user']);
  });
  
});