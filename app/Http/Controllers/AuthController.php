<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function index(): View
    {
        return view('auth.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $email = $request->email;
        $password = $request->password;

        $result = Auth::attempt(['email' => $email, 'password' => $password]);
        if ($result) {
            return redirect()->route('home');
        } else {
            return redirect()->route('login')->with('error', 'Login gagal. Periksa email dan kata sandi.');
        }
    }

    public function register(): View
    {
        return view('auth.register');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();


        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
