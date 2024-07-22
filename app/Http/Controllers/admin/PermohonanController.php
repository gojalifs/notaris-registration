<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PermohonanController extends Controller
{
    public function index(): View
    {
        $layanan = request('name') ?: 'balik-nama';

        return view('admin.permohonan', [
            'layanan' => $layanan
        ]);
    }
}
