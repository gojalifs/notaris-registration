<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Permohonan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PermohonanController extends Controller
{
    public function index(): View
    {
        $layanan = request('name') ?: 'blk';
        $permohonan = Permohonan::where('layanan', '=', $layanan)
            ->orderByDesc('created_at')->paginate(10);

        return view('admin.permohonan', [
            'routes' => parent::initUserData(),
            'user' => parent::getUserName(),
            'layanan' => $layanan,
            'permohonans' => $permohonan,
        ]);
    }

    public function cetak(): View
    {
        return view('admin.cetak', [
            'routes' => parent::initUserData(),
            'user' => parent::getUserName()
        ]);
    }

    public function download(Request $request)
    {
        // Generate pdf here


    }
}
