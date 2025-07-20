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

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';