<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Resources\Views\Auth\login;
use App\Http\Controllers\LoginController;

class LoginController extends Controller
{
    /**
     * Menampilkan halaman login
     */
    public function showLogin()
    {
        return view('masuk');
    }

}
return redirect() ->back();




