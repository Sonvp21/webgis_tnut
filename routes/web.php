<?php

use App\Http\Controllers\MapController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('maps.index');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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

require __DIR__.'/auth.php';
