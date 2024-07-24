<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Dokumen;
use App\Models\Permohonan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PermohonanController extends Controller
{
    public function index(): View
    {
        $layanan = request('name') ?: 'blk';
        $permohonan = Permohonan::where('layanan', '=', $layanan)
            ->orderByDesc('created_at')
            ->paginate(10);

        $permohonan->appends(['name' => $layanan]);
        $docs = [];

        foreach ($permohonan as $value) {
            $doc = Dokumen::where('permohonan_id', '=', $value->id)
                ->get();

            array_push($docs, $doc);
            $value->doc = $doc;
        }

        $permohonan->docs = $docs;
     
        return view('admin.permohonan', [
            'routes' => parent::initUserData(),
            'user' => parent::getUserName(),
            'layanan' => $layanan,
            'permohonans' => $permohonan,
            'docs' => (object) [],
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
        return Storage::download($request->path);
    }

    public function setujui(Request $request)
    {
        $permohonan = Permohonan::find($request->id);
        $permohonan->status = 'Diterima';
        $permohonan->save();

        return redirect()->route('admin.permohonan.index');
    }

    public function tolak(Request $request)
    {
        $permohonan = Permohonan::find($request->id);
        $permohonan->status = 'Ditolak';
        $permohonan->keterangan = $request->catatan;
        $permohonan->save();

        return redirect()->route('admin.permohonan.index');
    }
}
