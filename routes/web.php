<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Resources\Views\Auth\login;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/masuk', function () {
    return view('masuk');
})->name('masuk');


require __DIR__.'/auth.php';