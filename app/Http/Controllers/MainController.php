<?php

namespace App\Http\Controllers;

use App\Models\Permohonan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MainController extends Controller
{
    public function index(): RedirectResponse
    {
        if (Auth::user()->role == 'ADMIN') {
            return redirect()->route('admin.home');
        } else {
            return redirect()->route('user.home');
        }
    }

    public function home(): View
    {
        $user = Auth::user();

        if ($user->role == 'ADMIN') {
            $balikNama = Permohonan::where('layanan', '=', 'blk')->count();
            $akta = Permohonan::where('layanan', '=', 'akt')->count();
            $izin = Permohonan::where('layanan', '=', 'izn')->count();
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
            $balikNama = Permohonan::where('layanan', '=', 'blk')
                ->where('id', '=', $user->id)
                ->count();
            $akta = Permohonan::where('layanan', '=', 'akt')
                ->where('id', '=', $user->id)
                ->count();
            $izin = Permohonan::where('layanan', '=', 'izn')
                ->where('id', '=', $user->id)
                ->count();
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
        return view('admin.home', [

            'user' => $user->full_name,
            'balikCount' => $balikNama,
            'aktaCount' => $akta,
            'izinCount' => $izin,
            'routes' => $routes,
        ]);
    }
}
