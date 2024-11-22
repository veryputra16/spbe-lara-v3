<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HakaksesController;
use App\Http\Controllers\KatappController;
use App\Http\Controllers\KatdbController;
use App\Http\Controllers\KatplatformController;
use App\Http\Controllers\KatserverController;
use App\Http\Controllers\LokasiserverController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/', function () {
//     return redirect('/login');
// });

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'aplikasi'])->name('dashboard');
    Route::get('/dashboard-app', [DashboardController::class, 'aplikasi'])->name('dashboard-app');
    Route::get('/dashboard-spbe', [DashboardController::class, 'spbe'])->name('dashboard-spbe');

    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/change-password', [ProfileController::class, 'changepassword'])->name('profile.change-password');
    Route::put('/profile/password', [ProfileController::class, 'password'])->name('profile.password');

    Route::prefix('masterapp')->name('masterapp.')->group(function () {
        Route::resource('katapp', KatappController::class);
        Route::resource('katdb', KatdbController::class);
        Route::resource('katserver', KatserverController::class);
        Route::resource('katplatform', KatplatformController::class);
    });

    Route::get('/hakakses', [HakaksesController::class, 'index'])->name('hakakses.index')->middleware('superadmin');
    Route::get('/hakakses/edit/{id}', [HakaksesController::class, 'edit'])->name('hakakses.edit')->middleware('superadmin');
    Route::put('/hakakses/update/{id}', [HakaksesController::class, 'update'])->name('hakakses.update')->middleware('superadmin');
    Route::delete('/hakakses/delete/{id}', [HakaksesController::class, 'destroy'])->name('hakakses.delete')->middleware('superadmin');
});
