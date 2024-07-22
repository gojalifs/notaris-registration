<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Permohonan;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PermohonanController extends Controller
{
    public function index(): View
    {
        $layanan = request('name') ?: 'blk';
        $permohonan = Permohonan::where('layanan', '=', $layanan)
            ->orderByDesc('created_at')->paginate(10);

        return view('admin.permohonan', [
            'layanan' => $layanan,
            'permohonans' => $permohonan,
        ]);
    }
}
