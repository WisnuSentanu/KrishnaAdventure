<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NavbarHeaderController;
use App\Http\Controllers\MarineAdventureController;
use App\Http\Controllers\PromosiController;
use App\Http\Controllers\VerifikasiPembayaranController;

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

// Menampilkan halaman utama
Route::get('/', [HomeController::class, 'LandingPage']);
Route::post('/', [HomeController::class, 'LandingPage']);

//Mengakses halaman detail kegiatan marine adventure
Route::get('/buy-marine-adventure/{id}', [HomeController::class, 'tourMarine'])->name('marine.show');

//Mengakses halaman detail kegiatan land adventure
Route::get('/buy-land-adventure/{id}', [HomeController::class, 'tourLand'])->name('land.show');

//Mengakses halaman detail transport & tour
Route::get('/buy-transport-tour/{id}', [HomeController::class, 'transportTour'])->name('transport.show');

//Mengakses halaman detail transport & tour
Route::get('/buy-place-stay/{id}', [HomeController::class, 'placeStay'])->name('place.show');

//Mengakses halaman seluruh konten kegiatan marine adventure
Route::get('Marine-Adventure', [NavbarHeaderController::class, 'indexMarine']);

//Mengakses halaman seluruh konten kegiatan land adventure
Route::get('Land-Adventure', [NavbarHeaderController::class, 'indexLand']);

//Mengakses halaman seluruh konten kegiatan land adventure
Route::get('Transport-Tour', [NavbarHeaderController::class, 'indexTransTour']);

//Mengakses halaman seluruh konten kegiatan land adventure
Route::get('Place-To-Stay', [NavbarHeaderController::class, 'indexPlaceStay']);

//Mengakses halaman contact us
Route::get('Contact-Us', [NavbarHeaderController::class, 'contactUs']);

// Route untuk submit booking
Route::post('/booking/submit', [BookingController::class, 'submitBooking'])->name('booking.submit');

/* ============================== MENU PROSES LOGIN & LOGOUT ==================================== */
// Proses Login
Route::get('login', [LoginController::class, 'index']);
// Memproses login
Route::post('/login/process', [LoginController::class, 'process']); 
// Memproses logout
Route::get('/logout', [LoginController::class, 'logout']);

/* ============================== MENU HALAMAN DASHBOARD ==================================== */
// Menampilkan halaman dashboard admin
Route::get('/admin/dashboard', [DashboardController::class, 'DashboardAdmin']);

Route::post('/admin/dashboard', [DashboardController::class, 'DashboardAdmin']);


/* ============================== MENU KELOLA KEGIATAN ==================================== */
// Menampilkan halaman kelola kegiatan
Route::get('/kegiatan/daftarKegiatan', [KegiatanController::class, 'indexKegiatan']);

Route::post('/kegiatan/daftarKegiatan', [KegiatanController::class, 'indexKegiatan']);

// Menampilkan Form Tambah Kegiatan
Route::get('/kegiatan/tambahKegiatan', [KegiatanController::class, 'tambahKegiatan']);

// Memproses Tambah Kegiatan
Route::post('/kegiatan/tambahKegiatan', [KegiatanController::class, 'prosesTambahKegiatan']);

// Memproses upload gambar pada summernote
Route::post('/upload-image', [KegiatanController::class, 'uploadImage'])->name('upload-image');

// Menampilkan Form Edit Kegiatan
Route::get('/kegiatan/editKegiatan/{id}', [KegiatanController::class, 'editKegiatan']);

// Memproses Edit Kegiatan
Route::post('/kegiatan/updateKegiatan/{id}', [KegiatanController::class, 'updateKegiatan']);

// Memproses Hapus Kegiatan
Route::post('/kegiatan/hapusKegiatan/{id}', [KegiatanController::class, 'hapusKegiatan']);

// Menampilkan Form Tambah Promo
Route::get('/kegiatan/tambahPromosi/{id}', [KegiatanController::class, 'tambahPromosi'])->name('kegiatan.tambahPromosi');

// Memproses Form Tambah Promo
Route::post('/kegiatan/storePromosi/{id}', [KegiatanController::class, 'storePromosi'])->name('kegiatan.storePromosi');

/* ============================== MENU VERIFIKASI PEMBAYARAN ==================================== */
// Menampilkan halaman kelola pembayaran
Route::get('/pembayaran/verifikasiPembayaran', [VerifikasiPembayaranController::class, 'indexPembayaran']);

Route::post('/pembayaran/verifikasiPembayaran', [VerifikasiPembayaranController::class, 'indexPembayaran']);

// Menampilkan Form Detail Paket Seleksi
Route::get('/pembayaran/detail/{id}', [VerifikasiPembayaranController::class, 'detailPembayaran'])->name('detail.pembayaran');

// Memproses konfirmasi pembayaran
Route::post('/pembayaran/konfirmasi', [VerifikasiPembayaranController::class, 'konfirmasiPembayaran'])->name('pembayaran.konfirmasi');

Route::post('/bayar/tolak', [VerifikasiPembayaranController::class, 'tolakPembayaran'])->name('pembayaran.tolak');

/* ============================== PROSES BOOKING ==================================== */
// Memproses booking kegiatan
Route::post('/booking/submit', [BookingController::class, 'submitBooking'])->name('booking.submit');
