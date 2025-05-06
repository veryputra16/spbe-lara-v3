<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BahasaprogramController;
use App\Http\Controllers\ChangelogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FrameworkappController;
use App\Http\Controllers\HakaksesController;
use App\Http\Controllers\InteropController;
use App\Http\Controllers\KatappController;
use App\Http\Controllers\KatdbController;
use App\Http\Controllers\KatpenggunaController;
use App\Http\Controllers\KatplatformController;
use App\Http\Controllers\KatserverController;
use App\Http\Controllers\LayananappController;
use App\Http\Controllers\MonevappController;
use App\Http\Controllers\OpdController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SdmpengembangController;
use App\Http\Controllers\SdmTechnicController;
use App\Http\Controllers\SubdomainController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        // dashbaord
        Route::get('d-app', [DashboardController::class, 'aplikasi'])->name('d-app');
        Route::get('d-spbe', [DashboardController::class, 'spbe'])->name('d-spbe');
    });

    Route::prefix('admin')->name('admin.')->group(function () {
        // aplikasi
        Route::resource('application', ApplicationController::class);
        Route::resource('subdomain', SubdomainController::class);
        Route::resource('application/{application}/monevapp', MonevappController::class);
        Route::resource('application/{application}/sdmteknic', SdmTechnicController::class);
        Route::resource('application/{application}/sdmpengembang', SdmpengembangController::class);
        Route::resource('application/{application}/interop', InteropController::class);

        // helper
        Route::resource('faq', FaqController::class);
        Route::resource('changelog', ChangelogController::class);

        // Settings
        Route::resource('opd', OpdController::class);
        Route::resource('user', UserController::class);
        Route::resource('role', RoleController::class);
    });

    Route::prefix('masterapp')->name('masterapp.')->group(function () {
        // master aplikasi
        Route::resource('katapp', KatappController::class);
        Route::resource('katdb', KatdbController::class);
        Route::resource('katserver', KatserverController::class);
        Route::resource('katplatform', KatplatformController::class);
        Route::resource('katpengguna', KatpenggunaController::class);
        Route::resource('bahasaprogram', BahasaprogramController::class);
        Route::resource('frameworkapp', FrameworkappController::class);
        Route::resource('layananapp', LayananappController::class);
    });

    Route::prefix('helper')->name('helper.')->group(function () {
        // FAQ
        Route::get('faq', [FaqController::class, 'faqHelper'])->name('helper.faq');
        Route::get('changelog', [ChangelogController::class, 'changeLogHelper'])->name('helper.changelog');
    });

    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/change-password', [ProfileController::class, 'changepassword'])->name('profile.change-password');
    Route::put('/profile/password', [ProfileController::class, 'password'])->name('profile.password');

    Route::get('/hakakses', [HakaksesController::class, 'index'])->name('hakakses.index')->middleware('superadmin');
    Route::get('/hakakses/edit/{id}', [HakaksesController::class, 'edit'])->name('hakakses.edit')->middleware('superadmin');
    Route::put('/hakakses/update/{id}', [HakaksesController::class, 'update'])->name('hakakses.update')->middleware('superadmin');
    Route::delete('/hakakses/delete/{id}', [HakaksesController::class, 'destroy'])->name('hakakses.delete')->middleware('superadmin');
});
