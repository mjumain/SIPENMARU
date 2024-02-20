<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Modules\Admisi\Http\Controllers\Admin\DashboardAdminAdmisiController;
use Modules\Admisi\Http\Controllers\Admin\HasPKJAdminAdmisiController;
use Modules\Admisi\Http\Controllers\Admin\JalurPenerimaanAdmisiController;
use Modules\Admisi\Http\Controllers\Admin\KelasAdmisiController;
use Modules\Admisi\Http\Controllers\Admin\ProdiAdmisiController;
use Modules\Admisi\Http\Controllers\AdmisiController;
use Modules\Admisi\Http\Controllers\Agen\AgenController;
use Modules\Admisi\Http\Controllers\BiodataController;
use Modules\Admisi\Http\Controllers\PembayaranSPPController;
use Modules\Admisi\Http\Controllers\ProdiHasController;
use Modules\Admisi\Http\Controllers\RiwayatPembayaranController;
use Modules\Admisi\Http\Controllers\TesOnlineController;

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

Route::group(['middleware' => ['auth']], function () {
    Route::resource('admisi-dashboard', AdmisiController::class);
    Route::resource('admisi-biodata', BiodataController::class);
    Route::resource('admisi-tes-online', TesOnlineController::class);
    Route::resource('admisi-pembayaran-spp', PembayaranSPPController::class);
    Route::resource('admisi-riwayat-pembayaran', RiwayatPembayaranController::class);

    Route::get('prodi-kelas/{kode_prodi}/{jalur_id}', [ProdiHasController::class, 'getKelas']);
    Route::get('prodi-jalur/{kode_prodi}', [ProdiHasController::class, 'getJalur']);
    Route::get('get-npsn', [ProdiHasController::class, 'getNpsn']);
    Route::get('get-agen', [ProdiHasController::class, 'getAgen']);

    Route::resource('admin-agen-dashboard', AgenController::class);

    Route::resource('admin-admisi-dashboard', DashboardAdminAdmisiController::class);
    Route::resource('admin-admisi-jalur-penerimaan', JalurPenerimaanAdmisiController::class);
    Route::resource('admin-admisi-kelas', KelasAdmisiController::class);
    Route::resource('admin-admisi-prodi', ProdiAdmisiController::class);
    Route::resource('admin-admisi-prokeja', HasPKJAdminAdmisiController::class);
});
