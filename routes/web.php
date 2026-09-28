<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EkskulController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// ==================================================
// AUTH
// ==================================================

Route::get('/login', [LoginController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [LoginController::class, 'login'])
    ->name('login.process');

Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');


// ==================================================
// HALAMAN AWAL
// ==================================================

Route::get('/', function () {
    return redirect()->route('login');
});


// ==================================================
// MY PROFILE
// ==================================================

Route::get('/my-profile', [UserController::class, 'myProfile'])
    ->middleware('auth.custom')
    ->name('my-profile');


// ==================================================
// DASHBOARD
// ==================================================

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth.custom', 'role:Admin,Operator'])
    ->name('admin.dashboard');


// ==================================================
// PROFILE SEKOLAH
// ==================================================

// Admin & Operator - lihat profile
Route::get('/profile', [ProfileController::class, 'index'])
    ->middleware(['auth.custom', 'role:Admin,Operator'])
    ->name('admin.profile.index');

// Admin - tambah profile
Route::get('/profile/create', [ProfileController::class, 'create'])
    ->middleware(['auth.custom', 'role:Admin'])
    ->name('admin.profile.create');

// Admin - simpan profile
Route::post('/profile', [ProfileController::class, 'store'])
    ->middleware(['auth.custom', 'role:Admin'])
    ->name('admin.profile.store');

// Admin - edit profile
Route::get('/profile/{profile}/edit', [ProfileController::class, 'edit'])
    ->middleware(['auth.custom', 'role:Admin'])
    ->name('admin.profile.edit');

// Admin - update profile
Route::put('/profile/{profile}', [ProfileController::class, 'update'])
    ->middleware(['auth.custom', 'role:Admin'])
    ->name('admin.profile.update');


/// ==================================================
// GURU
// ==================================================

// Admin & Operator - lihat daftar guru
Route::get('/guru', [GuruController::class, 'index'])
    ->middleware(['auth.custom', 'role:Admin,Operator'])
    ->name('admin.guru.index');

// Admin - tambah guru
Route::get('/guru/create', [GuruController::class, 'create'])
    ->middleware(['auth.custom', 'role:Admin'])
    ->name('admin.guru.create');

// Admin - simpan guru
Route::post('/guru', [GuruController::class, 'store'])
    ->middleware(['auth.custom', 'role:Admin'])
    ->name('admin.guru.store');

// Admin & Operator - lihat detail guru
Route::get('/guru/{guru}', [GuruController::class, 'show'])
    ->middleware(['auth.custom', 'role:Admin,Operator'])
    ->name('admin.guru.show');

// Admin - edit guru
Route::get('/guru/{guru}/edit', [GuruController::class, 'edit'])
    ->middleware(['auth.custom', 'role:Admin'])
    ->name('admin.guru.edit');

// Admin - update guru
Route::put('/guru/{guru}', [GuruController::class, 'update'])
    ->middleware(['auth.custom', 'role:Admin'])
    ->name('admin.guru.update');

// Admin - hapus guru
Route::delete('/guru/{guru}', [GuruController::class, 'destroy'])
    ->middleware(['auth.custom', 'role:Admin'])
    ->name('admin.guru.destroy');


// ==================================================
// SISWA
// ==================================================

// Admin & Operator - lihat daftar siswa
Route::get('/siswa', [SiswaController::class, 'index'])
    ->middleware(['auth.custom', 'role:Admin,Operator'])
    ->name('admin.siswa.index');

// Admin - tambah siswa
Route::get('/siswa/create', [SiswaController::class, 'create'])
    ->middleware(['auth.custom', 'role:Admin'])
    ->name('admin.siswa.create');

// Admin - simpan siswa
Route::post('/siswa', [SiswaController::class, 'store'])
    ->middleware(['auth.custom', 'role:Admin'])
    ->name('admin.siswa.store');

// Admin & Operator - lihat detail siswa
Route::get('/siswa/{siswa}', [SiswaController::class, 'show'])
    ->middleware(['auth.custom', 'role:Admin,Operator'])
    ->name('admin.siswa.show');

// Admin - edit siswa
Route::get('/siswa/{siswa}/edit', [SiswaController::class, 'edit'])
    ->middleware(['auth.custom', 'role:Admin'])
    ->name('admin.siswa.edit');

// Admin - update siswa
Route::put('/siswa/{siswa}', [SiswaController::class, 'update'])
    ->middleware(['auth.custom', 'role:Admin'])
    ->name('admin.siswa.update');

// Admin - hapus siswa
Route::delete('/siswa/{siswa}', [SiswaController::class, 'destroy'])
    ->middleware(['auth.custom', 'role:Admin'])
    ->name('admin.siswa.destroy');


// ==================================================
// USER
// Hanya Admin
// ==================================================

Route::resource('user', UserController::class)
    ->parameters([
        'user' => 'user',
    ])
    ->names('admin.user')
    ->middleware([
        'auth.custom',
        'role:Admin',
    ]);


// ==================================================
// BERITA
// ==================================================

Route::resource('/admin/berita', BeritaController::class)
    ->parameters([
        'berita' => 'berita',
    ])
    ->names('admin.berita')->middleware(['auth.custom', 'role:Admin,Operator']);


// ==================================================
// EKSKUL
// ==================================================

Route::resource('/admin/ekskul', EkskulController::class)
    ->parameters([
        'ekskul' => 'ekskul',
    ])
    ->names('admin.ekskul')->middleware(['auth.custom', 'role:Admin,Operator']);


// ==================================================
// GALERI
// ==================================================

Route::resource('/admin/galeri', GaleriController::class)
    ->parameters([
        'galeri' => 'galeri',
    ])
    ->names('admin.galeri')->middleware(['auth.custom', 'role:Admin,Operator']);


// ==================================================
// PRESTASI
// ==================================================

Route::resource('/admin/prestasi', PrestasiController::class)
    ->parameters([
        'prestasi' => 'prestasi',
    ])
    ->names('admin.prestasi')->middleware(['auth.custom', 'role:Admin,Operator']);


// ==================================================
// PENGUMUMAN
// ==================================================

Route::resource('/admin/pengumuman', PengumumanController::class)
    ->parameters([
        'pengumuman' => 'pengumuman',
    ])
    ->names('admin.pengumuman')
    ->middleware(['auth.custom', 'role:Admin,Operator']);
