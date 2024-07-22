<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PermohonanUserController extends Controller
{

    public function index(): View
    {
        return view('user.layanan', [
            'routes' => parent::initUserData(),
            'user' => parent::getUserName()
        ]);
    }
}
