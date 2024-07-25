<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Dokumen;
use App\Models\Permohonan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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

    public function cetakReport()
    {
        ob_end_clean();

        $type = request('type');
        $month = request('month');
        $bulan = Carbon::parse($month)->month;
        $tahun = Carbon::parse($month)->year;

        $permohonan = Permohonan
            ::join('users', 'permohonans.user_id', '=', 'users.id')
            ->where('permohonans.status', '=', 'Diterima')
            ->where('permohonans.layanan', '=', 'izn')
            ->whereMonth('permohonans.created_at', '=', $bulan)
            ->whereYear('permohonans.created_at', '=', $tahun)
            ->select(['permohonans.full_name as fn', 'permohonans.phone as phone', 'permohonans.address as address'])
            ->selectRaw("DATE_FORMAT(permohonans.created_at, '%d/%m/%Y') AS formatted_date")
            ->get();

        switch ($type) {
            case 'akt':
                $title = 'Daftar Permohonan Akta Pendirian Perusahaan';
                break;

            case 'izn':
                $title = 'Daftar Pembuatan Izin CV Perusahaan';
                break;

            case 'blk':
                $title = 'Daftar Permintaan Balik Nama';
                break;

            default:
                $title = 'Error';
                break;
        }

        $now = Carbon::now();

        // return view('pdf.report', [
        //     'title' => $title,
        //     'permohonan' => $permohonan
        // ]);

        $pdf = Pdf::loadView('pdf.report', [
            'title' => $title,
            'permohonan' => $permohonan
        ])->setPaper('a4');

        $now = Carbon::now();
        return $pdf->download("Laporan_{$type}_{$month}_" . uniqid(rand(), true) . ".pdf");
    }
}
