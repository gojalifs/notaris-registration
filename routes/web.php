<?php

use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\PermohonanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\user\PermohonanUserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('doLogin');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('doRegister');

Route::get('/forgot', function () {
    return view('auth.forgot-password');
})->name('forgot');
Route::post('/send_reset', [AuthController::class, 'reset'])->name('send_reset_link');

Route::get('/reset-password/{token}', function (string $token) {
    return view('auth.reset', ['token' => $token]);
})->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPwd'])->name('reset.now');

Route::middleware('auth')->group(function () {

    Route::get('/', [MainController::class, 'index'])->name('home');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::post('/permohonan/dl', [PermohonanController::class, 'download'])->name('admin.permohonan.download');

    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', [MainController::class, 'home'])->name('admin.home');
        Route::get('/permohonan/{layanan?}', [PermohonanController::class, 'index'])->name('admin.permohonan.index');
        Route::post('/permohonan/setujui', [PermohonanController::class, 'setujui'])->name('admin.permohonan.setujui');
        Route::post('/permohonan/tolak', [PermohonanController::class, 'tolak'])->name('admin.permohonan.tolak');
        Route::get('/cetak', [PermohonanController::class, 'cetak'])->name('admin.cetak.index');
        Route::post('/cetak', [PermohonanController::class, 'report'])->name('admin.cetak.download');
        Route::get('/report', [PermohonanController::class, 'cetakReport'])->name('admin.cetak.report');
    });

    Route::middleware('user')->group(function () {
        Route::get('/home', [MainController::class, 'home'])->name('user.home');
        Route::get('/permohonan-layanan', [PermohonanUserController::class, 'index'])->name('user.permohonan.index');
        Route::post('/permohonan-layanan', [PermohonanUserController::class, 'store'])->name('user.permohonan.save');
        Route::get('/status/{layanan?}', [PermohonanUserController::class, 'status'])->name('user.permohonan.status');
    });
});


