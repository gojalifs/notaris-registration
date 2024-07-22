<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function initUserData(): object
    {
        $user = Auth::user();

        if ($user->role == 'ADMIN') {
            $routes = (object) [
                (object) [
                    'title' => 'Dashboard',
                    'routeName' => 'admin.home'
                ],
                (object) [
                    'title' => 'Permohonan',
                    'routeName' => 'admin.permohonan.index'
                ],
                (object) [
                    'title' => 'Cetak Laporan',
                    'routeName' => 'admin.cetak.index'
                ],
            ];

        } else {
            $routes = (object) [
                (object) [
                    'title' => 'Dashboard',
                    'routeName' => 'admin.home'
                ],
                (object) [
                    'title' => 'Layanan',
                    'routeName' => 'user.permohonan.index'
                ],
                (object) [
                    'title' => 'Status Layanan',
                    'routeName' => 'user.permohonan.status'
                ],
            ];

        }

        return $routes;
    }

    public function getUserName()
    {
        $user = Auth::check() ? Auth::user()->full_name : 'Yuser';
        return $user;
    }
}
