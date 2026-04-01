<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AsesorController;
use App\Http\Controllers\AsesiController;
use App\Http\Controllers\TukController;
use App\Http\Controllers\SkemaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JadwalUjikomController;
use App\Http\Controllers\PermohonanSertifikasiController;
use App\Http\Controllers\TahunAktifController;
use App\Http\Controllers\KopSuratController;
use App\Http\Controllers\AsesorSkemaController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::middleware(['auth', 'role:admin'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Asesor - Custom routes before resource routes
    Route::get('asesor/export-data', [AsesorController::class, 'exportData'])->name('asesor.export');
    Route::get('asesor/import', [AsesorController::class, 'importView'])->name('asesor.import');
    Route::post('asesor/import-data', [AsesorController::class, 'importData'])->name('asesor.import-data');
    Route::get('asesor/download-template', [AsesorController::class, 'downloadTemplate'])->name('asesor.download-template');
    Route::resource('asesor', AsesorController::class);
    
    // Asesi - Custom routes before resource routes
    Route::get('asesi/export-data', [AsesiController::class, 'exportData'])->name('asesi.export');
    Route::get('asesi/import', [AsesiController::class, 'importView'])->name('asesi.import');
    Route::post('asesi/import-data', [AsesiController::class, 'importData'])->name('asesi.import-data');
    Route::get('asesi/download-template', [AsesiController::class, 'downloadTemplate'])->name('asesi.download-template');
    Route::resource('asesi', AsesiController::class);
    
    // TUK
    Route::resource('tuk', TukController::class);
    
    // Skema
    Route::resource('skema', SkemaController::class);
    
    // User Management
    Route::resource('users', UserController::class);
    Route::post('users/{user}/reset-password', [UserController::class, 'resetPassword'])->name('users.reset-password');
    
    // Jadwal Ujikom
    Route::resource('jadwal-ujikom', JadwalUjikomController::class);
    
    // Permohonan Sertifikasi
    Route::resource('permohonan', PermohonanSertifikasiController::class);
    Route::patch('permohonan/{permohonan}/update-status', [PermohonanSertifikasiController::class, 'updateStatus'])->name('permohonan.update-status');
    
    // Tahun Aktif
    Route::resource('tahun-aktif', TahunAktifController::class);
    Route::post('tahun-aktif/{tahunAktif}/activate', [TahunAktifController::class, 'activate'])->name('tahun-aktif.activate');
    
    // Kop Surat
    Route::get('kop-surat', [KopSuratController::class, 'index'])->name('kop-surat.index');
    Route::get('kop-surat/create', [KopSuratController::class, 'create'])->name('kop-surat.create');
    Route::post('kop-surat', [KopSuratController::class, 'store'])->name('kop-surat.store');
    Route::get('kop-surat/{kopSurat}/edit', [KopSuratController::class, 'edit'])->name('kop-surat.edit');
    Route::put('kop-surat/{kopSurat}', [KopSuratController::class, 'update'])->name('kop-surat.update');
    
    // Asesor Skema
    Route::get('asesor-skema', [AsesorSkemaController::class, 'index'])->name('asesor-skema.index');
    Route::post('asesor-skema', [AsesorSkemaController::class, 'store'])->name('asesor-skema.store');
    Route::delete('asesor-skema/{asesorSkema}', [AsesorSkemaController::class, 'destroy'])->name('asesor-skema.destroy');
    
    // Profile
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
});