<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Resources\Views\Auth\login;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/masuk', function () {
    return view('masuk');
})->name('masuk');


Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('daftar');
Route::post('/register', [RegisterController::class, 'register']);



require __DIR__.'/auth.php';
