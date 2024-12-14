<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\Api\VisualisasiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::prefix('visualisasi')->group(function () {
    Route::get('/wirausaha', [VisualisasiController::class, 'dataWirausaha']);
    Route::get('/pekerja', [VisualisasiController::class, 'dataPekerja']);
    Route::get('/pendidikan', [VisualisasiController::class, 'dataPendidikan']);
    Route::get('/questioner', [VisualisasiController::class, 'dataQuestioner']);
    Route::get('/stakeholder', [VisualisasiController::class, 'dataStakeholder']);
    Route::get('/perbandingan', [VisualisasiController::class, 'dataPerbandingan']);
    Route::get('/ipk', [VisualisasiController::class, 'dataIpk']);
    Route::get('/career', [VisualisasiController::class, 'dataCareer']);
    Route::get('/lama-studi', [VisualisasiController::class, 'dataLamaStudi']);
    Route::get('/masa-tunggu', [VisualisasiController::class, 'dataMasaTunggu']);
});

Route::post('/visualisasi/export', [ExportController::class, 'export']);
