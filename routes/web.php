<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Mahasiswa\UserController as MhsUserController;
use App\Http\Controllers\Guest\CareerController as GuestCareerController;
use App\Http\Controllers\Mahasiswa\CareerController as MhsCareerController;
use App\Http\Controllers\Mahasiswa\PekerjaController as MhsPekerjaController;
use App\Http\Controllers\AdminProdi\UserController as AdminProdiUserController;
use App\Http\Controllers\SuperAdmin\UserController as SuperAdminUserController;
use App\Http\Controllers\Guest\QuestionerController as GuestQuestionerController;
use App\Http\Controllers\Guest\SertifikatController as GuestSertifikatController;
use App\Http\Controllers\Mahasiswa\WirausahaController as MhsWirausahaController;
use App\Http\Controllers\VisualisasiController as SuperAdminVisualisasiController;
use App\Http\Controllers\AdminProdi\CareerController as AdminProdiCareerController;
use App\Http\Controllers\Mahasiswa\PendidikanController as MhsPendidikanController;
use App\Http\Controllers\Mahasiswa\QuestionerController as MhsQuestionerController;
use App\Http\Controllers\Mahasiswa\SertifikatController as MhsSertifikatController;
use App\Http\Controllers\SuperAdmin\CareerController as SuperAdminCareerController;
use App\Http\Controllers\AdminFakultas\UserController as AdminFakultasUserController;
use App\Http\Controllers\SuperAdmin\LaporanController as SuperAdminLaporanController;
use App\Http\Controllers\AdminFakultas\CareerController as AdminFakultasCareerController;
use App\Http\Controllers\SuperAdmin\ImportUserController as SuperAdminImportUserController;
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
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/logout', [LoginController::class, 'logout']);

    Route::get('/profile/edit/password', [UserController::class, 'showUpdatePassword']);
    Route::patch('/profile/edit/password', [UserController::class, 'updatePassword']);

    Route::get('/career/checkSlug', [MhsCareerController::class, 'checkSlug']);
    
    // mahasiswa routes
    Route::middleware('is-mahasiswa')->group(function () {
        Route::get('/profile', [MhsUserController::class, 'index']);
        Route::get('/profile/edit', [MhsUserController::class, 'edit']);
        Route::patch('/profile/edit', [MhsUserController::class, 'update']);

        Route::delete('/hapusBelumKerja', [MhsPerjalananKarirController::class, 'destroyBelumKerja']);

        Route::resource('/career', MhsCareerController::class);

        Route::resource('/perjalanan-karir', MhsPerjalananKarirController::class)->only(['index', 'create', 'store']);
        Route::resource('/pekerja', MhsPekerjaController::class)->except(['index', 'create', 'store']);
        Route::resource('/wirausaha', MhsWirausahaController::class)->except(['index', 'create', 'store']);
        Route::resource('/pendidikan', MhsPendidikanController::class)->except(['index']);

        Route::get('/questioner', [MhsQuestionerController::class, 'index']);
        Route::post('/questioner', [MhsQuestionerController::class, 'store']);

        Route::get('/sertifikat', [MhsSertifikatController::class, 'show']);
    });

    // admin prodi routes
    Route::middleware('is-admin-prodi')->prefix('admin/prodi')->group(function () {
        Route::resource('/user', AdminProdiUserController::class);
        Route::post('/user/search', [AdminProdiUserController::class, 'searchUser']);

        Route::prefix('career')->group(function () {
            Route::get('/{career}/judge', [AdminProdiCareerController::class, 'judgeCareer']);
            Route::patch('/{career}/judge', [AdminProdiCareerController::class, 'updateJudge']);
            Route::get('/pending', [AdminProdiCareerController::class, 'pendingCareers']);
            Route::get('/rejected', [AdminProdiCareerController::class, 'rejectedCareers']);
            Route::get('/approved', [AdminProdiCareerController::class, 'approvedCareers']);
        });

        Route::resource('/career', AdminProdiCareerController::class)->except(['index']);
    });

    // admin fakultas routes
    Route::middleware('is-admin-fakultas')->prefix('admin/fakultas')->group(function () {
        Route::resource('/user', AdminFakultasUserController::class);

        Route::prefix('career')->group(function () {
            Route::get('/{career}/judge', [AdminFakultasCareerController::class, 'judgeCareer']);
            Route::patch('/{career}/judge', [AdminFakultasCareerController::class, 'updateJudge']);
            Route::get('/pending', [AdminFakultasCareerController::class, 'pendingCareers']);
            Route::get('/rejected', [AdminFakultasCareerController::class, 'rejectedCareers']);
            Route::get('/approved', [AdminFakultasCareerController::class, 'approvedCareers']);
        });

        Route::resource('/career', AdminFakultasCareerController::class)->except(['index']);
    });

    // super admin routes
    Route::middleware('is-super-admin')->prefix('admin/super')->group(function () {
        Route::get('/visual', [SuperAdminVisualisasiController::class, 'index']);

        Route::resource('/laporan', SuperAdminLaporanController::class)->except(['show']);
        Route::get('/laporan/checkSlug', [SuperAdminLaporanController::class, 'checkSlug']);

        Route::resource('/user', SuperAdminUserController::class);

        Route::prefix('career')->group(function () {
            Route::get('/{career}/judge', [SuperAdminCareerController::class, 'judgeCareer']);
            Route::patch('/{career}/judge', [SuperAdminCareerController::class, 'updateJudge']);
            Route::get('/pending', [SuperAdminCareerController::class, 'pendingCareers']);
            Route::get('/rejected', [SuperAdminCareerController::class, 'rejectedCareers']);
            Route::get('/approved', [SuperAdminCareerController::class, 'approvedCareers']);
        });

        Route::resource('/career', SuperAdminCareerController::class)->except(['index']);

        Route::prefix('import')->group(function () {
            Route::get('/', [SuperAdminImportUserController::class, 'index']);
            
            Route::get('/full-time', [SuperAdminImportUserController::class, 'importFullTime']);
            Route::post('/full-time', [SuperAdminImportUserController::class, 'storeFullTime']);

            Route::get('/wirausaha', [SuperAdminImportUserController::class, 'importWirausaha']);
            Route::post('/wirausaha', [SuperAdminImportUserController::class, 'storeWirausaha']);

            Route::get('/lanjut-studi', [SuperAdminImportUserController::class, 'importLanjutStudi']);
            Route::post('/lanjut-studi', [SuperAdminImportUserController::class, 'storeLanjutStudi']);

            Route::get('/mhs-questioner', [SuperAdminImportUserController::class, 'importMhsQuestioner']);
            Route::post('/mhs-questioner', [SuperAdminImportUserController::class, 'storeMhsQuestioner']);
            
            Route::get('/stk-questioner', [SuperAdminImportUserController::class, 'importStkQuestioner']);
            Route::post('/stk-questioner', [SuperAdminImportUserController::class, 'storeStkQuestioner']);
        });
    });
});