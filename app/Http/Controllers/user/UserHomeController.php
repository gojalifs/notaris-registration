<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserHomeController extends Controller
{
    public function index(): View
    {
        $user = Auth::check() ? Auth::user()->full_name : 'Yuser';

        return view('user.home', [
            'user' => $user
        ]);
    }
}
