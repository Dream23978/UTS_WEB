<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Resources\Views\Auth\login;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Controllers\DaftarController;


use App\Livewire\Actions\Logout;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/masuk', function () {
    return view('masuk');
})->name('masuk');


Route::get('/daftar', [DaftarController::class, 'showRegistrationForm'])->name('daftar');
Route::post('/daftar', [DaftarController::class, 'register']);

require __DIR__.'/auth.php';
