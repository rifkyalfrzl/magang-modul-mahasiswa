<?php

use App\Http\Controllers\DaftarLamaranController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\SessionController;

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

Route::get('/', [HalamanController::class, 'beranda']);
Route::get('/beranda', [HalamanController::class, 'beranda']);
Route::get('/tentang-magang', [HalamanController::class, 'tentangMagang']);
Route::get('/tahap-pendaftaran-magang', [HalamanController::class, 'tahapPendaftaran']);
Route::get('/plot-pembimbing', [HalamanController::class, 'plotPembimbing']);
Route::get('/tahap-persiapan-magang', [HalamanController::class, 'tahapPersiapan']);
Route::get('/tahap-pelaksanaan-magang', [HalamanController::class, 'tahapPelaksanaan']);

Route::post('/logout', 'App\Http\Controllers\SessionController@logout')->name('logout');
Route::get('/detail-lowongan/{id}', [JobController::class, 'showDetail'])->where('id', '[0-9]+');
Route::get('/pendaftaran-magang', [JobController::class, 'index']);


Route::middleware(['isLogin'])->group(function () {
   // Daftar URL yang memerlukan autentikasi untuk diakses
   Route::get('/daftar-lamaran', [DaftarLamaranController::class, 'index']);
   Route::post('/apply-job/{id}', [JobController::class, 'applyJob'])->name('apply.job');
   Route::get('/panduan-magang', [HalamanController::class, 'panduanMagang']);
});
Route::middleware(['isTamu'])->group(function () {
   Route::get('/login-page', [SessionController::class, 'showLoginForm'])->name('login'); 
   Route::post('/login', [SessionController::class, 'login'])->name('login.post');
});
