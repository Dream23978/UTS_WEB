<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('masuk');
    }
} return redirect()->route('index'); // atau ke route yang kamu punya


