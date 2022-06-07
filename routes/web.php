<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\ResiPembayaran;
use App\Http\Controllers\Auth\LoginController;

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

// Route::get('/', function () {
//     return view('landing.isi');
// });

Route::get('/', [App\Http\Controllers\LandingController::class, 'index']);

//LOGIN === REGISTER
Auth::routes();
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'create']);
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);

Route::group([
    'middleware' => ['auth', 'is_admin'],
], function() {
    Route::get('/admin', [App\Http\Controllers\AdminControllers::class, 'index'])->name('admin');
}
);

Route::group([
    'middleware' => ['auth', 'is_user'],
], function() {
    Route::get('/user_view', [App\Http\Controllers\HomeController::class, 'index'])->name('user_view');
    Route::resource('pemesanan', '\App\Http\Controllers\Pemesanan_user');
    Route::get('cetak', [App\Http\Controllers\HomeController::class, 'download']);
    Route::get('tiket', [App\Http\Controllers\HomeController::class, 'tiket']);
}
);

//user
//Route::view('/user_view', 'user_view.isi');
// Route::view('/sejarah', 'user_view.sejarah');
// Route::view('/struktur', 'user_view.struktur');
// Route::view('/komunitas', 'user_view.komunitas');
// Route::view('/kerjasama', 'user_view.kerjasama');

//CRUD USER
Route::resource('tbl_user', '\App\Http\Controllers\UserController');

//CRUD WISATA
Route::resource('tbl_fasilitas', '\App\Http\Controllers\FasilitasController');

//CRUD WISATA
Route::resource('tbl_wisata', '\App\Http\Controllers\WisataControllers');

//CRUD DETAIL
Route::resource('tbl_detail', '\App\Http\Controllers\DetailController');

//CRUD PEMESANAN
Route::resource('tbl_pemesanan', '\App\Http\Controllers\PemesananController');

//CRUD RESI PEMBAYARAN
Route::resource('tbl_resi', '\App\Http\Controllers\ResiPembayaran');

//CRUD BUKTI TRANSAKSI
Route::resource('tbl_bukti', '\App\Http\Controllers\BuktiTfController');

//CRUD TIKET
Route::resource('tbl_tiket', '\App\Http\Controllers\TiketController');

//LOGOUT
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

