<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Resources\Views\Auth\login;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\LaporanController;


use App\Livewire\Actions\Logout;

Route::get('/', function () {
    return view('index');
})->name('index');
Route::get('/cekstatus', function () {
    return view('cekstatus');
})->name('cekstatus');

Route::get('/masuk', function () {
    return view('masuk');
})->name('masuk');


Route::get('/daftar', [DaftarController::class, 'showRegistrationForm'])->name('daftar');
Route::post('/daftar', [DaftarController::class, 'register']);




Route::get('/laporan', [LaporanController::class, 'create'])->name('laporan.create');
Route::post('/laporan', [LaporanController::class, 'store'])->name('laporan.store');

require __DIR__.'/auth.php';
