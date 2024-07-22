<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Permohonan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PermohonanController extends Controller
{
    protected $user;
    protected $routes;

    public function __construct()
    {
        $this->user = Auth::check() ? Auth::user()->full_name : 'Ngadimin';

        $this->routes = (object) [
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
    }

    public function index(): View
    {
        $layanan = request('name') ?: 'blk';
        $permohonan = Permohonan::where('layanan', '=', $layanan)
            ->orderByDesc('created_at')->paginate(10);

        return view('admin.permohonan', [
            'routes' => $this->routes,
            'user' => $this->user,
            'layanan' => $layanan,
            'permohonans' => $permohonan,
        ]);
    }

    public function cetak(): View
    {
        return view('admin.cetak', [
            'routes' => $this->routes,
            'user' => $this->user
        ]);
    }

    public function download(Request $request)
    {
        // Generate pdf here


    }
}
