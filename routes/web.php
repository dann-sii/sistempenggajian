<?php

use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\GajiPokokController;
use App\Http\Controllers\GajiLemburController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/karyawan', [KaryawanController::class , 'index'])->name('karyawan.index');
Route::post('/karyawan', [KaryawanController::class , 'store'])->name('karyawan.store');
Route::get('/presensi', [PresensiController::class , 'index'])->name('presensi.index');
Route::get('/gaji-pokok', [GajiPokokController::class , 'index'])->name('gaji_pokok.index');
Route::get('/gaji-lembur', [GajiLemburController::class , 'index'])->name('gaji_lembur.index');
