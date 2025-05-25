<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Resources\Views\Auth\login;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('index');
})->name('index');
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

require __DIR__.'/auth.php';