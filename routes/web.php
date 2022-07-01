<?php

use App\Mail\welcomeMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ResiPembayaran;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\ContactController;
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

Route::get('/', [App\Http\Controllers\LandingController::class, 'index']);
Route::get('detail', [App\Http\Controllers\LandingController::class, 'detail']);
Route::match(['get', 'post'], 'contact', [App\Http\Controllers\LandingController::class,  'storeContactForm']);
// Route::get('contact-form', [App\Http\Controllers\LandingController::class, 'contactForm'])->name('contact-form');
// Route::post('contact-form', [App\Http\Controllers\LandingController::class,  'storeContactForm'])->name('contact-form.store');

//LOGIN === REGISTER
Auth::routes();
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'create']);
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);

Route::group([
    'middleware' => ['auth', 'is_admin'],
], function() {
    Route::get('/admin', [App\Http\Controllers\AdminControllers::class, 'index'])->name('admin');
    Route::get('gantistatus/{id}', [App\Http\Controllers\PemesananController::class, 'gantistatus']);
    Route::get('gantirefund/{id}', [App\Http\Controllers\PemesananController::class, 'gantirefund']);
    Route::get('selesai/{id}', [App\Http\Controllers\PemesananController::class, 'selesai']);

    //CRUD USER
    Route::resource('tbl_user', '\App\Http\Controllers\UserController');

    //CRUD KEGIATAB
    Route::resource('tbl_kegiatan', '\App\Http\Controllers\KegiatanController');

    //CRUD FASILITAS
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

    //CRUD TIKET
    // Route::resource('tbl_contact', '\App\Http\Controllers\ContactController');

    //cetak laporan
    Route::get('laporan', [App\Http\Controllers\PemesananController::class, 'cetakLaporan'])->name('laporan');
    Route::post('laporan', [App\Http\Controllers\PemesananController::class, 'sortir']);
    Route::get('cetaklaporan/{start}/{end}', [App\Http\Controllers\PemesananController::class, 'cetakLaporanPemesanan']);
    //Route::get('laporanpertanggal/{tanggal_awal}/{tanggal_akhir}', [App\Http\Controllers\PemesananController::class, 'tanggal'])->name('laporanpertanggal');
}
);

Route::group([
    'middleware' => ['auth', 'is_user'],
], function() {
    Route::get('/user_view', [App\Http\Controllers\HomeController::class, 'index'])->name('user_view');
    Route::resource('pemesanan', '\App\Http\Controllers\Pemesanan_user');
    
    //Route::post('pemesanan', [App\Http\Controllers\Pemesanan_user::class, 'coba']);
    
    Route::get('persetujuan/{id}', [App\Http\Controllers\Pemesanan_user::class, 'refund']);
    Route::get('cetak/{id}', [App\Http\Controllers\HomeController::class, 'download']);
    Route::get('tiket', [App\Http\Controllers\HomeController::class, 'tiket']);
    Route::get('detail/{id}', [App\Http\Controllers\HomeController::class, 'detail']);

    Route::post('/user_view', [App\Http\Controllers\ContactController::class, 'storeContactForm'])->name('contact-form.store'); 
    // Route::match(['get', 'post'], 'contact-form', [App\Http\Controllers\HomeController::class,  'storeContactForm']);
    // Route::get('sendem', Function()
    // {
    //     Mail::to('ditarossiyana12@gmail.com')->send(new welcomeMail());
    //     return new welcomeMail();
    // });
}
   
);

//LOGOUT
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

//ROUTE FOR MAILING
Route::get('/email', Function()
{
    Mail::to('ditarossiyana12@gmail.com')->send(new welcomeMail());
    return new welcomeMail();
});

//Route::get('/contact-forms', [App\Http\Controllers\ContactController::class, 'contactForm'])->name('contact-form'); 

Route::post('/', [App\Http\Controllers\ContactController::class, 'storeContactForm'])->name('contact-form.store'); 
// Route::post('/', [App\Http\Controllers\HomeController::class, 'storeContactForm'])->name('contact-form.store'); 
// Route::post('/', [App\Http\Controllers\ContactController::class, 'storeContactForm'])->name('contact-form.store'); 
