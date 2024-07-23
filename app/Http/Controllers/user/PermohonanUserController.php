<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Dokumen;
use App\Models\Permohonan;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Log;

class PermohonanUserController extends Controller
{

    public function index(): View
    {
        return view('user.layanan', [
            'routes' => parent::initUserData(),
            'user' => parent::getUserName()
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $jenis = $request->jenis;
        $jenisUppr = strtoupper($jenis);

        $fullName = $request->full_name;
        $phone = $request->hp;
        $address = $request->address;

        $ktp = $request->file("KTP-{$jenisUppr}");
        $kk = $request->file("KK-{$jenisUppr}");

        $npwpbpjs = $request->file("NPWP&BPJS-{$jenisUppr}");
        $sertifikat = $request->file("SERTIPIKAT-{$jenisUppr}");
        $pbb = $request->file("PBB-{$jenisUppr}");

        $npwpdir = $request->file("NPWP_DIREKTUR-{$jenisUppr}");
        $imb = $request->file("IMB-{$jenisUppr}");

        $now = Carbon::now();
        $year = $now->year;
        $month = $now->month;
        $date = $now->day;

        $count = Permohonan::where('layanan', '=', $jenis)
            ->whereDate('created_at', '=', "$year-$month-$date")
            ->count() + 1;

        $reg = "{$jenisUppr}-{$year}-{$month}-{$count}";

        try {
            DB::beginTransaction();
            $permohonan = new Permohonan();
            $permohonan->no_registrasi = $reg;
            $permohonan->layanan = $jenis;
            $permohonan->full_name = $fullName;
            $permohonan->phone = $phone;
            $permohonan->address = $address;
            $permohonan->save();

            switch ($jenis) {
                case 'blk':
                    $tipe = [
                        [
                            'name' => 'KTP',
                            'file' => $ktp,
                        ],
                        [
                            'name' => 'KK',
                            'file' => $kk,
                        ],
                        [
                            'name' => "NPWP&BPJS",
                            'file' => $npwpbpjs
                        ],
                        [
                            'name' => 'SERTIPIKAT',
                            'file' => $sertifikat
                        ],
                        [
                            'name' => 'PBB',
                            'file' => $pbb
                        ]
                    ];
                    break;

                case 'izn':
                    $tipe = [
                        [
                            'name' => 'KTP',
                            'file' => $ktp,
                        ],
                        [
                            'name' => 'KK',
                            'file' => $kk,
                        ],
                        [
                            'name' => 'NPWP_DIREKTUR',
                            'file' => $npwpdir
                        ],
                        [
                            'name' => 'IMB',
                            'file' => $imb
                        ],
                    ];
                    break;

                case 'akt':
                    $tipe = [
                        [
                            'name' => 'KTP',
                            'file' => $ktp,
                        ],
                        [
                            'name' => 'KK',
                            'file' => $kk,
                        ],
                        [
                            'name' => 'NPWP_DIREKTUR',
                            'file' => $npwpdir
                        ],
                        [
                            'name' => 'IMB',
                            'file' => $imb
                        ],
                        [
                            'name' => 'SERTIPIKAT',
                            'file' => $sertifikat
                        ],
                    ];
                    break;

                default:
                    # code...
                    break;
            }

            foreach ($tipe as $v) {
                $file = new Dokumen();
                $file->name = $v['name'];
                $file->permohonan_id = $permohonan->id;
                $ext = $v['file']->extension();

                // dd("{$reg}_{$v['name']}.{$v['file']->extension()}");
                $filename = "{$reg}_{$v['name']}.{$ext}";
                // dd($filename);

                $path = $v['file']->storeAs(
                    'permohonan',
                    $filename
                );

                $file->path = $path;

                $file->save();
            }

            DB::commit();

            return redirect()
                ->route('user.permohonan.status')
                ->with('success', 'Data Permohonan berhasil disimpan!');

        } catch (\Throwable $th) {
            DB::rollBack();

            Log::error($th->getMessage());

            return redirect()
                ->route('user.permohonan.status')
                ->with('error', 'Data Permohonan gagal disimpan!');
        }
    }

    public function status(): View
    {
        return view('user.status', [
            'routes' => parent::initUserData(),
            'user' => parent::getUserName()
        ]);
    }
}
