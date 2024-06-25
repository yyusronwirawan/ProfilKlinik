<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogCategory;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\User_Controller;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\LamaranController;
use App\Http\Controllers\ElibraryController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\BlogGuestController;
use App\Http\Controllers\jadwalDokterController;
use App\Http\Controllers\LayananImageController;
use App\Http\Controllers\LayananDetailController;
use App\Http\Controllers\FasilitasLayananController;
use App\Http\Controllers\LayananUnggulanController;
use App\Http\Controllers\LayananPoliklinikController;
use App\Http\Controllers\PartnershipController;
use App\Http\Controllers\KategoriGaleriController;
use App\Http\Controllers\YtLinkController;

// halaman guest
Route::get('/', [MainController::class, 'index'])->middleware('guest');
Route::get('/tentang', [MainController::class, 'tentang'])->middleware('guest');


//blog guest
Route::get('/artikel', [BlogGuestController::class, 'index'])->middleware('guest');
Route::get('/artikel/{blog}', [BlogGuestController::class, 'show'])->middleware('guest');

// dokter guest
Route::get('/dokter/profil', [MainController::class, 'profilDokter'])->middleware('guest');
Route::get('/dokter/jadwal', [MainController::class, 'jadwalDokter'])->middleware('guest');
Route::get('/dokter/profil/{dokter}', [MainController::class, 'profilDokterDetail'])->middleware('guest');

// layanan guest
Route::get('/services', [MainController::class, 'layananIndex'])->middleware('guest');
Route::get('/services/detail/{layanan}', [MainController::class, 'layananDetail'])->middleware('guest');
Route::get('/services/layanan-poliklinik', [MainController::class, 'layananPoliklinik'])->middleware('guest');
Route::get('/services/layanan-poliklinik/detail/{layanan_poliklinik}', [MainController::class, 'layananPoliklinikDetail'])->middleware('guest');
Route::get('/services/fasilitas-layanan', [MainController::class, 'fasilitasLayanan'])->middleware('guest');

// elibrary
Route::get('/e-library', [MainController::class, 'elibraryIndex'])->middleware('guest');

// karir guest
Route::get('/karir', [MainController::class, 'karirIndex'])->middleware('guest');
Route::get('/karir/{lowongan}', [MainController::class, 'karirShow'])->middleware('guest');
Route::post('/karir', [MainController::class, 'store'])->middleware('guest');

// galeri guest
Route::get('/galeri', [MainController::class, 'galeriIndex'])->middleware('guest');

// partnership
Route::get('/partnership', [MainController::class, 'partnerIndex'])->middleware('guest');

// <-- Bagian Admin -->

// form login dan logout
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'auth']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/create-admin', [User_Controller::class, 'createAdmin'])->name('create.admin');
Route::get('/admin', [AdminController::class, 'index'])->middleware('auth');

// Blog
Route::get('/blog', [BlogController::class, 'index'])->middleware('auth');
Route::get('/blogCreate', [BlogController::class, 'create'])->middleware('auth');
Route::post('/blogCreate', [BlogController::class, 'store']);

// ..............
Route::resource('/dashboard/blog', BlogController::class)->middleware('auth');

Route::get('/blogCategory', [BlogCategory::class, 'index'])->middleware('auth');
Route::post('/blogCategory', [BlogCategory::class, 'store']);

// users
Route::resource('/dashboard/user', User_Controller::class)->middleware('auth');

// banner
Route::resource('/dashboard/banner', BannerController::class)->middleware('auth');

// Dokter
Route::resource('/dashboard/dokter', DokterController::class)->middleware('auth');

// jadwal dokter
Route::get('/dashboard/dokter-jadwal/{dokter}', [jadwalDokterController::class, 'index'])->middleware('auth');
Route::get('/dashboard/jadwal-edit/{id}', [jadwalDokterController::class, 'edit'])->middleware('auth');
Route::resource('/dashboard/jadwal-edit', jadwalDokterController::class,)->middleware('auth');
Route::post('/dashboard/dokter-jadwal', [jadwalDokterController::class, 'store'])->middleware('auth');

// lowongan
Route::resource('/dashboard/lowongan', LowonganController::class)->middleware('auth');
Route::get('/dashboard/lamaran/{lowongan}', [LamaranController::class, 'index'])->middleware('auth');
Route::resource('/dashboard/lamaran', LamaranController::class)->middleware('auth');

// layanan-poliklinik
Route::resource('/dashboard/layanan-poliklinik', LayananPoliklinikController::class)->middleware('auth');

// fasilitas layanan
Route::resource('/dashboard/fasilitas-layanan', FasilitasLayananController::class)->middleware('auth');

// layanan Unggulan
Route::resource('/dashboard/layanan-unggulan', layananUnggulanController::class)->middleware('auth');

// layanan
Route::resource('/dashboard/layananImage', LayananImageController::class)->middleware('auth');
Route::get('/dashboard/layanan/detail/{layanan_poliklinik}', [LayananDetailController::class, 'index'])->middleware('auth');

// galeri
Route::resource('/dashboard/galeri', GaleriController::class)->middleware('auth');
Route::resource('/dashboard/galeri-kategori', KategoriGaleriController::class)->middleware('auth');

// e-library
Route::resource('/dashboard/e-library', ElibraryController::class)->middleware('auth');
Route::resource('/dashboard/e-library/folder', FolderController::class)->middleware('auth');

// partnership
Route::resource('/dashboard/partnership', PartnershipController::class)->middleware('auth');

// yt links
Route::resource('/dashboard/yt', YtLinkController::class)->middleware('auth');
