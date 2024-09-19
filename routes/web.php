<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\SuperAdmin\SuperAdminController;
use App\Http\Controllers\Mahasiswa\UserController as MhsUserController;
use App\Http\Controllers\Guest\CareerController as GuestCareerController;
use App\Http\Controllers\Mahasiswa\CareerController as MhsCareerController;
use App\Http\Controllers\Mahasiswa\PekerjaController as MhsPekerjaController;
use App\Http\Controllers\Guest\QuestionerController as GuestQuestionerController;
use App\Http\Controllers\Guest\SertifikatController as GuestSertifikatController;
use App\Http\Controllers\Mahasiswa\WirausahaController as MhsWirausahaController;
use App\Http\Controllers\Mahasiswa\PendidikanController as MhsPendidikanController;
use App\Http\Controllers\Mahasiswa\QuestionerController as MhsQuestionerController;
use App\Http\Controllers\Mahasiswa\SertifikatController as MhsSertifikatController;
use App\Http\Controllers\SuperAdmin\LaporanController as SuperAdminLaporanController;
use App\Http\Controllers\Mahasiswa\PerjalananKarirController as MhsPerjalananKarirController;


Route::get('/', [LandingController::class, 'index']);
Route::get('/career', [GuestCareerController::class, 'index']);
Route::get('/career/{career:slug}', [GuestCareerController::class, 'show'])->name('career.publicShow');

Route::get('/sertifikat/{qr_url}', [GuestSertifikatController::class, 'show']);

Route::middleware(['guest', 'no-cache'])->group(function () {
  Route::get('/login', [LoginController::class, 'index'])->name('login');
  Route::post('/login', [LoginController::class, 'authenticate']);

  Route::get('/questioner/{questioner:token}', [GuestQuestionerController::class, 'show']);
  Route::post('/questioner/{questioner:token}', [GuestQuestionerController::class, 'store']);
});

//dashboard routes
Route::middleware(['auth', 'no-cache'])->prefix('dashboard')->group(function () { 
  Route::get('/logout', [LoginController::class, 'logout']);

  Route::get('/', fn() => view('dashboard.index'))->name('dashboard');

  Route::middleware('is-mahasiswa')->group(function () {
    Route::get('/profile', [MhsUserController::class, 'index']);
    Route::get('/profile/edit', [MhsUserController::class, 'edit']);
    Route::patch('/profile/edit', [MhsUserController::class, 'update']);

    Route::get('/career/checkSlug', [MhsCareerController::class, 'checkSlug']);
    Route::delete('/hapusBelumKerja', [MhsPerjalananKarirController::class, 'destroyBelumKerja']);
  
    Route::resource('/career', MhsCareerController::class);
    Route::resource('/perjalanan-karir', MhsPerjalananKarirController::class)->only(['index', 'create', 'store']);
    Route::resource('/pekerja', MhsPekerjaController::class)->except(['index', 'create', 'store']);
    Route::resource('/wirausaha', MhsWirausahaController::class)->except(['index', 'create', 'store']);
    Route::resource('/pendidikan', MhsPendidikanController::class)->except(['index']);

    Route::get('/sertifikat', [MhsSertifikatController::class, 'show']);
  });

  Route::get('/profile/edit/password', [UserController::class, 'showUpdatePassword']);
  Route::patch('/profile/edit/password', [UserController::class, 'updatePassword']);



  Route::get('/questioner', [MhsQuestionerController::class, 'index']);
  Route::post('/questioner', [MhsQuestionerController::class, 'store']);


  Route::get('/visual', function () {
    return view('dashboard.visual');
  });

  // admin routes
  Route::middleware('is-admin')->group(function () {
    Route::resource('/admin/laporan', SuperAdminLaporanController::class)->except(['show']);
    Route::resource('/admin', SuperAdminController::class)->except(['create', 'store', 'destroy'])->parameters(['admin' => 'user']);
  });
  
});