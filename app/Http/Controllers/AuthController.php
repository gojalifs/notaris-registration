<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function index(): View
    {
        $session = Session::get('success');
        return view('auth.login', ['success' => $session]);
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

    public function store(Request $request): RedirectResponse
    {
        try {
            $fullName = $request->full_name;
            $name = $request->name;
            $email = $request->email;
            $password = Hash::make($request->password);

            $user = new User();
            $user->name = $name;
            $user->full_name = $fullName;
            $user->email = $email;
            $user->password = $password;

            $user->save();

            return redirect()->route('login', ['success', 'Sukses membuat akun. Silahkan masuk.']);
        } catch (\Throwable $th) {
            return redirect()->route('register', ['error', $th->getMessage()]);
        }
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();


        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
