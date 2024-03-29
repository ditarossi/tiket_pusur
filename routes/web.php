<?php

use App\Mail\welcomeMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ResiPembayaran;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\OrderController;

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
Route::get('profile', [App\Http\Controllers\LandingController::class, 'profile']);
Route::get('portfolio-details', [App\Http\Controllers\LandingController::class, 'portfoliodetails']);
Route::get('portfolio-details2', [App\Http\Controllers\LandingController::class, 'portfoliodetails2']);
Route::get('portfolio-details3', [App\Http\Controllers\LandingController::class, 'portfoliodetails3']);
Route::match(['get', 'post'], 'contact', [App\Http\Controllers\LandingController::class,  'storeContactForm']);
// Route::get('contact-form', [App\Http\Controllers\LandingController::class, 'contactForm'])->name('contact-form');
// Route::post('contact-form', [App\Http\Controllers\LandingController::class,  'storeContactForm'])->name('contact-form.store');

//LOGIN === REGISTER
Auth::routes();
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'create']);
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::get('/form-login', [App\Http\Controllers\Auth\LoginController::class, 'index']);

Route::group([
    'middleware' => ['auth', 'is_admin'],
], function() {
    // Route::get('/admin', [App\Http\Controllers\AdminControllers::class, 'index'])->name('admin');
    Route::get('/admin', [App\Http\Controllers\AdminControllers::class, 'DashboardAdminController'])->name('admin');
    Route::get('gantistatus/{id}', [App\Http\Controllers\PemesananController::class, 'gantistatus']);
    Route::get('gantirefund/{id}', [App\Http\Controllers\PemesananController::class, 'gantirefund']);
    Route::get('selesai/{id}', [App\Http\Controllers\PemesananController::class, 'selesai']);

    //CRUD USER
    Route::resource('tbl_user', '\App\Http\Controllers\UserController');

    //CRUD KEGIATAN
    Route::resource('tbl_kegiatan', '\App\Http\Controllers\KegiatanController');

    //CRUD FASILITAS
    Route::resource('tbl_fasilitas', '\App\Http\Controllers\FasilitasController');

    //CRUD WISATA
    Route::resource('tbl_wisata', '\App\Http\Controllers\WisataControllers');

    //CRUD DETAIL
    Route::resource('tbl_detail', '\App\Http\Controllers\DetailController');

    //CRUD TRANSAKSI
    Route::resource('tbl_pemesanan', '\App\Http\Controllers\PemesananController');

    Route::get('pending', '\App\Http\Controllers\PemesananController@pending');
    Route::get('verifikasi', '\App\Http\Controllers\PemesananController@verifikasi');
    Route::get('reschedule', '\App\Http\Controllers\PemesananController@reschedule');
    Route::post('validasiqrcode', [App\Http\Controllers\PemesananController::class, 'validasiqrcode'])->name('validasiqrcode');
    Route::get('cek_qr', '\App\Http\Controllers\PemesananController@cek_qr');
    Route::get('pemesananselesai', '\App\Http\Controllers\PemesananController@pemesananselesai');
    Route::get('detail_transaksi/{id}', '\App\Http\Controllers\PemesananController@detail');

    //CRUD TRANSAKSI FASILITAS
    Route::resource('tbl_transaksiFasilitas', '\App\Http\Controllers\TransaksiFasilitasController');

    //CRUD RESI PEMBAYARAN
    Route::resource('tbl_resi', '\App\Http\Controllers\ResiPembayaran');

    //CRUD BUKTI TRANSAKSI
    Route::resource('tbl_bukti', '\App\Http\Controllers\BuktiTfController');

    //CRUD TIKET
    Route::resource('tbl_tiket', '\App\Http\Controllers\TiketController');

    //CRUD KONTAK
    Route::resource('tbl_contact', '\App\Http\Controllers\KontakController');

    //CRUD PIVOT
    Route::resource('tbl_fasilitasWisata', '\App\Http\Controllers\FasilitasWisataController');

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
    Route::get('checkout', [App\Http\Controllers\Pemesanan_user::class, 'checkout']);

    //ROUTE DEPENDENT DROPDOWN
    Route::get('order', [App\Http\Controllers\OrderController::class, 'index']);
    Route::get('con_order', [App\Http\Controllers\OrderController::class, 'con_order']);
    Route::post('order/fetch', [App\Http\Controllers\OrderController::class, 'fetch'])->name('order.fetch');
    Route::post('order/detail', [App\Http\Controllers\OrderController::class, 'detail'])->name('order.detail');
    Route::post('order/fasilitas', [App\Http\Controllers\OrderController::class, 'fasilitas'])->name('order.fasilitas');
    
    Route::post('check', [App\Http\Controllers\OrderController::class, 'check']);
    Route::post('check-reschedule/{id}', [App\Http\Controllers\OrderController::class, 'checkreschedule']);

    Route::get('persetujuan/{id}', [App\Http\Controllers\Pemesanan_user::class, 'refund']);
    Route::get('foto/{id}', [App\Http\Controllers\Pemesanan_user::class, 'foto']);
    Route::get('informasi_pembayaran/{id}', [App\Http\Controllers\Pemesanan_user::class, 'informasi_pembayaran']);
    Route::get('cetak/{id}', [App\Http\Controllers\HomeController::class, 'download']);
    Route::get('lihat/{id}', [App\Http\Controllers\HomeController::class, 'lihat']);
    Route::get('tiket', [App\Http\Controllers\HomeController::class, 'tiket']);
    Route::get('riwayat', [App\Http\Controllers\HomeController::class, 'riwayat']);

    Route::get('riwayat_pemesanan', [App\Http\Controllers\HomeController::class, 'riwayat_pemesanan']);

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
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

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
