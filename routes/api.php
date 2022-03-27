<?php

namespace App\Http\Controller;

use App\Http\Controllers\ApiBarangController;
use App\Http\Controllers\ApiBKController;
use App\Http\Controllers\ApiBMController;
use App\Http\Controllers\Apipeminjaman;
use App\Http\Controllers\Apipengembalian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::resource('user', UserController::class);
Route::resource('barang', ApiBarangController::class);
Route::resource('barangmasuk', ApiBMController::class);
Route::resource('barangkeluar', ApiBKController::class);
Route::resource('peminjaman', Apipeminjaman::class);
Route::resource('pengembalian', Apipengembalian::class);
