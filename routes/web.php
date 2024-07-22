<?php

use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\LayananController;
use App\Http\Controllers\admin\PermohonanController;
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

Route::get('/', [HomeController::class, 'index'])->name('admin.home');

Route::get('/permohonan/{layanan?}', [PermohonanController::class, 'index'])->name('admin.permohonan.index');
Route::get('/cetak', [PermohonanController::class, 'cetak'])->name('admin.cetak.index');

