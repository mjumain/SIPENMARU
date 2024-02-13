<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Modules\Admisi\Http\Controllers\AdmisiController;
use Modules\Admisi\Http\Controllers\BiodataController;
use Modules\Admisi\Http\Controllers\ProdiHasController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([], function () {
    Route::resource('admisi-dashboard', AdmisiController::class);
    Route::resource('admisi-biodata', BiodataController::class);
    Route::get('prodi-kelas/{kode_prodi}/{jalur_id}', [ProdiHasController::class, 'getKelas']);
    Route::get('prodi-jalur/{kode_prodi}', [ProdiHasController::class, 'getJalur']);
    Route::get('get-npsn', [ProdiHasController::class, 'getNpsn']);
});
