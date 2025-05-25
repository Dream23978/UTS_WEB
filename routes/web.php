<?php

use App\Http\Controllers\LaporanController;

Route::get('/laporan', [LaporanController::class, 'create'])->name('laporan.create');
Route::post('/laporan', [LaporanController::class, 'store'])->name('laporan.store');