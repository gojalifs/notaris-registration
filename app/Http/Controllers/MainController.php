<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MainController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 'ADMIN') {
            return redirect()->route('admin.home');
        } else {
            return view('user.home');
        }
    }
}
