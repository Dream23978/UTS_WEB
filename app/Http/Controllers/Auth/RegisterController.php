<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('Register.Register');
    }

    public function register(Request $request)
    {
        // Validasi dengan aturan tambahan
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        Auth::login($user);

        return redirect()->route('dashboard')->with('success', 'Registrasi berhasil!');

    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],

            // Email harus unik, valid, dan hanya dari domain yang diperbolehkan
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users',
                'regex:/^[a-zA-Z0-9._%+-]+@(gmail\.com|yahoo\.com|outlook\.com)$/'
            ],

            // Password minimal 8 dan harus sama dengan konfirmasi
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],
        [
            // Pesan error kustom
            'email.regex' => 'Email harus menggunakan domain @gmail.com, @yahoo.com, atau @outlook.com.',
            'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}

