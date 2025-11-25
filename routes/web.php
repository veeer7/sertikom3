<?php

use App\Http\Controllers\TahunAjarController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::redirect('/', 'dashboard');
Route::redirect('/register', 'login');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->withoutMiddleware('guest');
});

Route::middleware('auth')->group(function () {

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Tahun Ajar
    Route::resource('tahun-ajar', TahunAjarController::class);

    // Jurusan
    Route::resource('jurusan', JurusanController::class);

    // Kelas
    Route::resource('kelas', KelasController::class);

    // Siswa
    Route::resource('siswa', SiswaController::class);

    Route::post('/siswa/{id}/naik-kelas', [\App\Http\Controllers\SiswaController::class, 'naikKelas'])
    ->name('siswa.naikKelas');

    Route::post('/siswa/{id}/mutasi', [\App\Http\Controllers\SiswaController::class, 'mutasi'])
        ->name('siswa.mutasi');

    Route::post('/siswa/{id}/lulus', [\App\Http\Controllers\SiswaController::class, 'lulus'])
        ->name('siswa.lulus');


    // User Management
    Route::resource('user-management', UserController::class);
});

require __DIR__.'/auth.php';
