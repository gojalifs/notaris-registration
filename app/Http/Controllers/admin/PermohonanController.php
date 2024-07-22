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

    public function __construct()
    {
        $this->user = Auth::check() ? Auth::user()->full_name : 'Ngadimin';
    }

    public function index(): View
    {
        $layanan = request('name') ?: 'blk';
        $permohonan = Permohonan::where('layanan', '=', $layanan)
            ->orderByDesc('created_at')->paginate(10);

        return view('admin.permohonan', [
            'user' => $this->user,
            'layanan' => $layanan,
            'permohonans' => $permohonan,
        ]);
    }

    public function cetak(): View
    {
        return view('admin.cetak', [
            'user' => $this->user
        ]);
    }

    public function download(Request $request)
    {
        // Generate pdf here


    }
}
