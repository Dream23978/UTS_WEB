<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Resources\Views\Auth\login;
use App\Http\Controllers\LoginController;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

}
return redirect() ->back();




