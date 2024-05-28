<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\paketController;
use App\Http\Controllers\backend\pesanController;
use App\Http\Controllers\backend\pelangganController;
use App\Http\Controllers\backend\cekStatusController;
use App\Http\Controllers\backend\laporanController;
use App\Http\Controllers\backend\dashboardController;
use App\Http\Controllers\backend\adminController;


use App\Http\Controllers\frontend\homeController;
use App\Http\Controllers\frontend\semuapaketController;
use App\Http\Controllers\frontend\contactController;







// Route::get('/', function () {
//     return view('backend.index');
// });

Route::get('/', [homeController::class, 'index'])->name('home');
Route::get('/lacak', [homeController::class, 'lacakPesanan'])->name('lacak.pesanan');


Route::get('/semuapaket', [semuapaketController::class, 'index'])->name('semuaPaket.view');

Route::get('/contact', [contactController::class, 'index'])->name('contact.view');





// Route::get('/register', [adminController::class, 'showRegistrationForm'])->name('admin.registerForm');
// Route::post('/admin/register', [adminController::class, 'register'])->name('admin.register');
Route::get('/login', [adminController::class, 'showLoginForm'])->name('admin.loginForm');
Route::post('/admin/login', [adminController::class, 'login'])->name('admin.login');
Route::post('/logout', [adminController::class, 'logout'])->name('admin.logout');
Route::get('/admin/create', [AdminController::class, 'createAdmin']);



Route::middleware(['admin.auth'])->group(function () {
Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard');

Route::prefix('paket')->group(function(){
Route::get('/view', [paketController::class, 'index'])->name('paket.index');
Route::get('/add', [paketController::class, 'add'])->name('paket.add');
Route::get('/search', [paketController::class, 'search'])->name('paket.search');
Route::post('/store', [paketController::class, 'store'])->name('paket.store');
Route::get('/edit/{id}', [paketController::class, 'edit'])->name('paket.edit');
Route::post('/update/{id}', [paketController::class, 'update'])->name('paket.update');
Route::get('/delete/{id}', [paketController::class, 'delete'])->name('paket.delete');
});

Route::prefix('pesanan')->group(function(){
    Route::get('/view', [pesanController::class, 'index'])->name('pesanan.index');
    Route::get('/add', [pesanController::class, 'add'])->name('pesanan.add');
    Route::get('/search', [pesanController::class, 'search'])->name('pesanan.search');
    Route::post('/store', [pesanController::class, 'store'])->name('pesanan.store');
    Route::get('/edit/{id}', [pesanController::class, 'edit'])->name('pesanan.edit');
    Route::post('/update/{id}', [pesanController::class, 'update'])->name('pesanan.update');
    Route::get('/delete/{id}', [pesanController::class, 'delete'])->name('pesanan.delete');
    Route::post('/pesanan/update-status/{id}',[pesanController::class, 'updateStatus'])->name('pesanan.updateStatus');
    Route::get('invoice/{kd_transaksi}/pdf',[pesanController::class, 'invoice'])->name('pesanan.invoice');
    Route::get('download/{kd_transaksi}',[pesanController::class, 'download'])->name('pesanan.download');


});

Route::prefix('pelanggan')->group(function(){
    Route::get('/view', [pelangganController::class, 'index'])->name('pelanggan.index');
    Route::get('/add', [pelangganController::class, 'add'])->name('pelanggan.add');
    Route::get('/search', [pelangganController::class, 'search'])->name('pelanggan.search');
    Route::post('/store', [pelangganController::class, 'store'])->name('pelanggan.store');
    Route::get('/edit/{id}', [pelangganController::class, 'edit'])->name('pelanggan.edit');
    Route::post('/update/{id}', [pelangganController::class, 'update'])->name('pelanggan.update');
    Route::get('/delete/{id}', [pelangganController::class, 'delete'])->name('pelanggan.delete');
});

Route::prefix('laporan')->group(function(){
    Route::get('/index', [laporanController::class, 'index'])->name('laporan.index');
    Route::get('/show', [laporanController::class, 'show'])->name('laporan.show');
    Route::get('download/',[laporanController::class, 'download'])->name('laporan.download');
});
});


