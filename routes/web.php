<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Web\ContactController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\MapController;
use App\Http\Controllers\Web\UserController;
use Illuminate\Support\Facades\Route;

// map 
Route::get('/', [MapController::class, 'index'])->name('home');
Route::get('/map/{layer}.geojson', [MapController::class, 'layer']);

Route::get('/gioi-thieu', [HomeController::class, 'indexAbout'])->name('web.about.index');
Route::get('/lien-he', [ContactController::class, 'index'])->name('web.contacts.index');
Route::post('/lien-he', [ContactController::class, 'store'])->name('web.contacts.store');

//Đăng ký nộp hồ sơ hội thi stkt và sáng kiến
Route::middleware(['auth'])->group(function () {
    Route::get('/thong-tin-ca-nhan/htkhkt/{dossier}/edit', [UserController::class, 'editTechnicalInnovationDossier'])->name('web.dossier.kythuat.edit');
    Route::put('/thong-tin-ca-nhan/htkhkt/{dossier}', [UserController::class, 'updateTechnicalInnovationDossier'])->name('web.dossier.kythuat.update');
    Route::get('/thong-tin-ca-nhan/sang-kien/{initiative}/edit', [UserController::class, 'editSangKienDossier'])->name('web.dossier.sangkien.edit');
    Route::put('/thong-tin-ca-nhan/sang-kien/{initiative}', [UserController::class, 'updateSangKienDossier'])->name('web.dossier.sangkien.update');

    Route::get('/thong-tin-ca-nhan', [UserController::class, 'show'])->name('web.profile.show');
    Route::get('/thong-tin-ca-nhan/{user}/edit', [UserController::class, 'edit'])->name('web.users.edit');
    Route::put('/thong-tin-ca-nhan/{user}', [UserController::class, 'update'])->name('web.users.update');

});

require __DIR__.'/admin.php';
