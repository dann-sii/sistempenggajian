<?php

use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\GajiPokokController;
use App\Http\Controllers\GajiLemburController;
use App\Http\Controllers\GajiBonusController;
use App\Http\Controllers\PotonganGajiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/karyawan', [KaryawanController::class , 'index'])->name('karyawan.index');
Route::post('/karyawan', [KaryawanController::class , 'store'])->name('karyawan.store');
Route::put('/karyawan/{id}', [KaryawanController::class , 'update'])->name('karyawan.update');
Route::delete('/karyawan/{id}', [KaryawanController::class , 'destroy'])->name('karyawan.destroy');
Route::get('/presensi', [PresensiController::class , 'index'])->name('presensi.index');
Route::get('/gaji-pokok', [GajiPokokController::class , 'index'])->name('gaji_pokok.index');
Route::get('/gaji-lembur', [GajiLemburController::class , 'index'])->name('gaji_lembur.index');
Route::get('/gaji-bonus', [GajiBonusController::class , 'index'])->name('gaji_bonus.index');
Route::get('/potongan-gaji', [PotonganGajiController::class , 'index'])->name('potongan_gaji.index');
Route::get('/penggajian', [\App\Http\Controllers\PenggajianController::class , 'index'])->name('penggajian.index');
Route::get('/detail-penggajian', [\App\Http\Controllers\DetailPenggajianController::class , 'index'])->name('detail_penggajian.index');
Route::get('/laporan-penggajian', [\App\Http\Controllers\LaporanPenggajianController::class , 'index'])->name('laporan_penggajian.index');
