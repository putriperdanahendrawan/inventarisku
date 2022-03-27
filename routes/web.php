<?php
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangkeluarController;
use App\Http\Controllers\BarangmasukController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(
    [
        'register' => false,
    ]
);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function () {
    Route::get('/', function () {
        return 'halaman admin';
    });
    Route::get('profile', function () {
        return 'halaman profile admin';

    });

    Route::resource('barang', BarangController::class);
    Route::resource('bmasuk', BarangmasukController::class);
    Route::resource('bkeluar', BarangkeluarController::class);
    Route::resource('pinjam', PeminjamController::class);
    Route::resource('kembali', PengembalianController::class);
    Route::get('cetak-laporan', [LaporanController::class, 'form']);
    Route::post('view', [LaporanController::class, 'view'])->name('view.view');
    Route::get('view', [LaporanController::class, 'cetak'])->name('view.cetak');
    Route::post('cetak', [LaporanController::class, 'laporan'])->name('cetak.laporan');
    // Route::get('/Dashboard', [DashboardController::class, 'index'])->name('Dashboard');
});
