<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\KepegawaianController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminPegawaiController;
use App\Http\Controllers\KinerjaKepegawaianController;
use App\Http\Controllers\IjazahController;
use App\Http\Controllers\SertifikatController;
use App\Http\Controllers\SKController;
use App\Http\Controllers\InformasiPegawaiController;
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
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/postLogin', [LoginController::class, 'postLogin'])->name("postLogin");
Route::get('/logout', [LoginController::class, 'logout'])->name("logout");

Route::group(['middleware' => ['auth','CekLevel:super-admin']], function () {
    // dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name("dashboard");
    // pegawai
    Route::get('/kepegawaian', [KepegawaianController::class, 'index'])->name("kepegawaian");
    Route::get('/kepegawaian/create', [KepegawaianController::class, 'create'])->name("kepegawaianCreate"); 
    Route::post('/kepegawaian/store', [KepegawaianController::class, 'store'])->name("kepegawaianStore");
    Route::get('/kepegawaian/show/{id}', [KepegawaianController::class, 'show'])->name("kepegawaianShow");
    Route::post('/kepegawaian/update', [KepegawaianController::class, 'update'])->name("kepegawaianUpdate");
    Route::get('/kepegawaian/password/{id}', [KepegawaianController::class, 'edit'])->name("kepegawaianPassword");
    Route::post('/kepegawaian/changePassword', [KepegawaianController::class, 'password'])->name("passwordKepegawaian");
    Route::get('/kepegawaian/destroy/{id}', [KepegawaianController::class, 'destroy'])->name("kepegawaianDestroy");
    // admin-pegawai
    Route::get('/adminPegawai', [AdminPegawaiController::class, 'index'])->name("adminPegawai");
    Route::get('/adminPegawai/create', [AdminPegawaiController::class, 'create'])->name("adminPegawaiCreate");
    Route::post('/adminPegawai/store', [AdminPegawaiController::class, 'store'])->name("adminPegawaiStore");
    Route::get('/adminPegawai/show/{id}', [AdminPegawaiController::class, 'show'])->name("adminPegawaiShow");
    Route::post('/adminPegawai/update', [AdminPegawaiController::class, 'update'])->name("adminPegawaiUpdate");
    Route::get('/adminPegawai/password/{id}', [AdminPegawaiController::class, 'edit'])->name("adminPegawaiPassword");
    Route::post('/adminPegawai/changePassword', [AdminPegawaiController::class, 'password'])->name("passwordAdminPegawai");
    Route::get('/adminPegawai/destroy/{id}', [AdminPegawaiController::class, 'destroy'])->name("adminPegawaiDestroy");
    // super-admin
    Route::get('/superAdmin', [SuperAdminController::class, 'index'])->name("superAdmin");
    Route::get('/superAdmin/create', [SuperAdminController::class, 'create'])->name("superAdminCreate");
    Route::post('/superAdmin/store', [SuperAdminController::class, 'store'])->name("superAdminStore");
    Route::get('/superAdmin/show/{id}', [SuperAdminController::class, 'show'])->name("superAdminShow");
    Route::post('/superAdmin/update', [SuperAdminController::class, 'update'])->name("superAdminUpdate");
    Route::get('/superAdmin/password/{id}', [SuperAdminController::class, 'edit'])->name("superAdminPassword");
    Route::post('/superAdmin/changePassword', [SuperAdminController::class, 'password'])->name("passwordSuperAdmin");
    Route::get('/superAdmin/destroy/{id}', [SuperAdminController::class, 'destroy'])->name("superAdminDestroy");
});

Route::group(['middleware' => ['auth','CekLevel:kepegawaian']], function () {
    // Informasi Ketenagaan
    Route::get('/informasiKetenagaan', [KinerjaKepegawaianController::class, 'index'])->name("informasiKetenagaan");
    Route::get('/informasiKetenagaan/show/{id}', [KinerjaKepegawaianController::class, 'show'])->name("informasiKetenagaanShow");
    Route::post('/informasiKetenagaan/store', [KinerjaKepegawaianController::class, 'store'])->name("tambahInformasi");
    Route::get('/informasiKetenagaan/pdf', [KinerjaKepegawaianController::class, 'pdf'])->name("informasiKetenagaanPDF");
    Route::get('/informasiKetenagaan/excel', [KinerjaKepegawaianController::class, 'excel'])->name("informasiKetenagaanExcel");
    
    // Ijazah
    Route::get('/ijazah', [IjazahController::class, 'index'])->name("ijazah");
    Route::get('/ijazah/create', [IjazahController::class, 'create'])->name("ijazahCreate");
    Route::post('/ijazah/store', [IjazahController::class, 'store'])->name("ijazahStore");
    Route::get('/ijazah/destroy/{id}', [IjazahController::class, 'destroy'])->name("ijazahDestroy");

    // Sertifikat
    Route::get('/sertifikat', [SertifikatController::class, 'index'])->name("sertifikat");
    Route::get('/sertifikat/create', [SertifikatController::class, 'create'])->name("sertifikatCreate");
    Route::post('/sertifikat/store', [SertifikatController::class, 'store'])->name("sertifikatStore");
    Route::get('/sertifikat/destroy/{id}', [SertifikatController::class, 'destroy'])->name("sertifikatDestroy");

    // SK
    Route::get('/sk', [SKController::class, 'index'])->name("sk");
    Route::get('/sk/create', [SKController::class, 'create'])->name("skCreate");
    Route::post('/sk/store', [SKController::class, 'store'])->name("skStore");
    Route::get('/sk/destroy/{id}', [SKController::class, 'destroy'])->name("skDestroy");
});

Route::group(['middleware' => ['auth','CekLevel:adminPegawai']], function () {
    // Informasi Pegawai
    Route::get('/informasiPegawai', [InformasiPegawaiController::class, 'index'])->name("informasiPegawai");
    Route::get('/informasiPegawai/pdf/{nuptk}', [InformasiPegawaiController::class, 'pdf'])->name("informasiPegawaiPDF");
    Route::get('/informasiPegawai/lengkapiData/{id}', [InformasiPegawaiController::class, 'lengkapiData'])->name("lengkapiData");
    Route::post('informasiPegawai/lengkapiDataPegawai',[InformasiPegawaiController::class, 'lengkapiDataPegawai'])->name('lengkapiDataPegawai');
    Route::get('/informasiPegawai/show/{nuptk}', [InformasiPegawaiController::class, 'show'])->name("adminShow");
    Route::post('/informasiPegawai/updateInformasi', [InformasiPegawaiController::class, 'update'])->name("updateInformasi");
    // Ijazah
    Route::get('/informasiPegawai/ijazah', [InformasiPegawaiController::class, 'ijazah'])->name('adminIjazah');
    Route::get('/informasiPegawai/ijazahCreate', [InformasiPegawaiController::class, 'ijazahCreate'])->name('informasiPegawaiIjazahCreate');
    Route::post('/informasiPegawai/ijazahStore', [InformasiPegawaiController::class, 'ijazahStore'])->name("adminIjazahStore");
    Route::get('/informasiPegawai/ijazahDestroy/{pdf}', [InformasiPegawaiController::class, 'ijazahDestroy'])->name("adminIjazahDestroy");
    // Sertifikat
    Route::get('/informasiPegawai/sertifikat', [InformasiPegawaiController::class, 'sertifikat'])->name('adminSertifikat');
    Route::get('/informasiPegawai/sertifikatCreate', [InformasiPegawaiController::class, 'sertifikatCreate'])->name('adminSertifikatCreate');
    Route::post('/informasiPegawai/sertifikatStore', [InformasiPegawaiController::class, 'sertifikatStore'])->name("adminSertifikatStore");
    Route::get('/informasiPegawai/sertifikatDestroy/{sertifikat}', [InformasiPegawaiController::class, 'sertifikatDestroy'])->name("adminSertifikatDestroy");
    // SK
    Route::get('/informasiPegawai/sk', [InformasiPegawaiController::class, 'sk'])->name('adminSk');
    Route::get('/informasiPegawai/createSk', [InformasiPegawaiController::class, 'createSk'])->name('adminSkCreate');
    Route::post('/informasiPegawai/skStore', [InformasiPegawaiController::class, 'skStore'])->name("adminSkStore");
    Route::get('/informasiPegawai/skDestroy/{sk}', [InformasiPegawaiController::class, 'skDestroy'])->name("adminSkDestroy");
});


