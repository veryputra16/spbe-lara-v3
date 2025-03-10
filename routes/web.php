<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BahasaprogramController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrameworkappController;
use App\Http\Controllers\HakaksesController;
use App\Http\Controllers\KatappController;
use App\Http\Controllers\KatdbController;
use App\Http\Controllers\KatpenggunaController;
use App\Http\Controllers\KatplatformController;
use App\Http\Controllers\KatserverController;
use App\Http\Controllers\LayananappController;
use App\Http\Controllers\OpdController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubdomainController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    // jangan lupa untuk dihapus
    Route::get('/dashboard', [DashboardController::class, 'aplikasi'])->name('dashboard');

    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('/d-app', [DashboardController::class, 'aplikasi'])->name('dashboard-app');
        Route::get('/d-spbe', [DashboardController::class, 'spbe'])->name('dashboard-spbe');
    });

    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/change-password', [ProfileController::class, 'changepassword'])->name('profile.change-password');
    Route::put('/profile/password', [ProfileController::class, 'password'])->name('profile.password');

    Route::prefix('system')->name('system.')->group(function () {
        // Route::resource('aplikasi', ApplicationController::class);
        Route::resource('subdomain', SubdomainController::class);
    });

    Route::prefix('masterapp')->name('masterapp.')->group(function () {
        Route::resource('katapp', KatappController::class);
        Route::resource('katdb', KatdbController::class);
        Route::resource('katserver', KatserverController::class);
        Route::resource('katplatform', KatplatformController::class);
        Route::resource('katpengguna', KatpenggunaController::class);
        Route::resource('bahasaprogram', BahasaprogramController::class);
        Route::resource('frameworkapp', FrameworkappController::class);
        Route::resource('layananapp', LayananappController::class);
    });

    Route::prefix('settings')->name('settings.')->group(function () {
        Route::resource('opd', OpdController::class);
        Route::resource('user', UserController::class);
    });

    Route::get('/hakakses', [HakaksesController::class, 'index'])->name('hakakses.index')->middleware('superadmin');
    Route::get('/hakakses/edit/{id}', [HakaksesController::class, 'edit'])->name('hakakses.edit')->middleware('superadmin');
    Route::put('/hakakses/update/{id}', [HakaksesController::class, 'update'])->name('hakakses.update')->middleware('superadmin');
    Route::delete('/hakakses/delete/{id}', [HakaksesController::class, 'destroy'])->name('hakakses.delete')->middleware('superadmin');
});
