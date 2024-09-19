<?php

use App\Http\Controllers\Api\QuestionController;
use App\Http\Controllers\Api\VisualisasiController;
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

Route::get('/questions', [QuestionController::class, 'getQuestions']);
Route::get('/questions/category/{question:category}', [QuestionController::class, 'getQuestionByCategory']);
Route::get('/questions/type/{question:type}', [QuestionController::class, 'getQuestionByType']);

Route::prefix('visualisasi')->group(function () {
    Route::get('/wirausaha', [VisualisasiController::class, 'dataWirausaha']);
    Route::get('/pekerja', [VisualisasiController::class, 'dataPekerja']);
    Route::get('/pendidikan', [VisualisasiController::class, 'dataPendidikan']);
    Route::get('/questioner', [VisualisasiController::class, 'dataQuestioner']);
    Route::get('/stakeholder', [VisualisasiController::class, 'dataStakeholder']);
    Route::get('/perbandingan', [VisualisasiController::class, 'dataPerbandingan']);
});
