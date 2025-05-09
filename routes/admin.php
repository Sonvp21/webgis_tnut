<?php

use App\Http\Controllers\Admin\ActivityController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CommuneController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\FilePond\FilePondController;
use App\Http\Controllers\Admin\ActivityImageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NotifyController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PostCategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductionFacilityController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\Support\TinymceController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\WebsiteLinkController;
use App\Http\Controllers\CampusController;
use App\Http\Controllers\CantineController;
use App\Http\Controllers\ConferenceController;
use App\Http\Controllers\GateController;
use App\Http\Controllers\GiangduongController;
use App\Http\Controllers\HoitruongController;
use App\Http\Controllers\ImageSearchController;
use App\Http\Controllers\KTXController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ThuvienController;
use App\Http\Controllers\VpkhoaController;
use App\Http\Controllers\XuongController;
use App\Http\Controllers\YteController;
use Illuminate\Support\Facades\Route;

Route::get('/admin', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->name('admin.')->group(function () {
        ///Tài khoản
        // Route::resource('users', UserController::class);
        Route::get('users', [UserController::class, 'index'])->name('users.index');
        Route::get('users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('users', [UserController::class, 'store'])->name('users.store');
        Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

        //contact
        Route::resource('contacts', ContactController::class);

        Route::resource('ktxs', KTXController::class);
        Route::resource('campus', CampusController::class);
        Route::resource('cantine', CantineController::class);
        Route::resource('conference', ConferenceController::class);
        Route::resource('gate', GateController::class);
        Route::resource('giangduong', GiangduongController::class);
        Route::resource('hoitruong', HoitruongController::class);
        Route::resource('thuvien', ThuvienController::class);
        Route::resource('vpkhoa', VpkhoaController::class);
        Route::resource('xuong', XuongController::class);
        Route::resource('yte', YteController::class);

        /*
         *  KEEP THESE AT THE END OF THE FILE
         */
        Route::post('tinymce-attachment', TinymceController::class)->name('tinymce.attachment');
    });
});

// routes/web.php
require __DIR__ . '/auth.php';
