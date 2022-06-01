<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\DusunController;
use App\Http\Controllers\AgamaController;
use App\Http\Controllers\KematianController;

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
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);

Route::resource('penduduk', PendudukController::class);
Route::resource('dusun', DusunController::class);
Route::resource('agama', AgamaController::class);
Route::resource('kematian', KematianController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
