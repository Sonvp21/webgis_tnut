<?php

use App\Http\Controllers\MapController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KTXController;
use App\Http\Controllers\CampusController;
use App\Http\Controllers\CantineController;
use App\Http\Controllers\conferenceController;
use App\Http\Controllers\gateController;
use App\Http\Controllers\giangduongController;
use App\Http\Controllers\hoitruongController;
use App\Http\Controllers\thuvienController;
use App\Http\Controllers\vpkhoaController;
use App\Http\Controllers\xuongController;
use App\Http\Controllers\yteController;
Route::get('/', function () {
    return view('maps.index');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/api/search-geojson', [MapController::class, 'search'])->name('search.geojson');

Route::get('/search', [MapController::class, 'search']);

// 🆕 Route trang Giới thiệu TNUT
Route::view('/gioi-thieu', 'gioi-thieu')->name('gioi-thieu');
///Bản đồ
Route::get('/map', [MapController::class, 'index'])->name('map');
Route::get('/map/{layer}.geojson', [MapController::class, 'layer']);

// 🆕 Route trang Liên hệ TNUT
Route::view('/lien-he', 'contact')->name('lien-he');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});
Route::resource('ktx', KTXController::class);
Route::resource('campus', CampusController::class);
Route::resource('cantine', CantineController::class);
Route::resource('conference', ConferenceController::class);
Route::resource('gate', GateController::class);
Route::resource('giangduong', giangduongController::class);
Route::resource('hoitruong', hoitruongController::class);
Route::resource('thuvien', thuvienController::class);
Route::resource('vpkhoa', vpkhoaController::class);
Route::resource('xuong', xuongController::class);
Route::resource('yte', yteController::class);
Route::post('/tinymce/upload', [App\Http\Controllers\TinymceController::class, 'upload'])->name('tinymce.upload');


require __DIR__.'/auth.php';
