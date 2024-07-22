<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $user = 'Ngadimin';
        
        return view('admin.home', [
            'user' => $user
        ]);
    }
}
