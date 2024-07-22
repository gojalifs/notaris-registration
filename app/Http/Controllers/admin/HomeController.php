<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Permohonan;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $user = 'Ngadimin';

        $balikNama = Permohonan::where('layanan', '=', 'blk')->count();
        $akta = Permohonan::where('layanan', '=', 'akt')->count();
        $izin = Permohonan::where('layanan', '=', 'izn')->count();

        return view('admin.home', [
            'user' => $user,
            'balikCount' => $balikNama,
            'aktaCount' => $akta,
            'izinCount' => $izin,
        ]);
    }
}
