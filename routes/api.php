<?php

use App\Http\Controllers\TracerController;
use App\Http\Controllers\VisualisasiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});

Route::get('/questions', [TracerController::class, 'getQuestions']);
Route::get('/questions/category/{question:category}', [TracerController::class, 'getQuestionByCategory']);
Route::get('/questions/type/{question:type}', [TracerController::class, 'getQuestionByType']);

Route::get('/visualisasi/wirausaha', [VisualisasiController::class, 'dataWirausaha']);
Route::get('/visualisasi/pekerja', [VisualisasiController::class, 'dataPekerja']);
Route::get('/visualisasi/pendidikan', [VisualisasiController::class, 'dataPendidikan']);