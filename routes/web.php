<?php

use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\PermohonanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\user\PermohonanUserController;
use App\Http\Controllers\user\UserHomeController;
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

Route::middleware('auth')->group(function () {

    Route::get('/', [MainController::class, 'index'])->name('home');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.home');
        Route::get('/permohonan/{layanan?}', [PermohonanController::class, 'index'])->name('admin.permohonan.index');
        Route::get('/cetak', [PermohonanController::class, 'cetak'])->name('admin.cetak.index');
    });

    Route::middleware('user')->group(function () {
        Route::get('/home', [HomeController::class, 'index'])->name('user.home');
        Route::get('/permohonan', [PermohonanUserController::class, 'index'])->name('user.permohonan.index');
        Route::get('/status', [PermohonanUserController::class, 'status'])->name('user.permohonan.status');
    });
});


