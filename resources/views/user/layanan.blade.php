@extends('layout')

@section('main-content')
    <div>
        <div class="text-xl">Data Pemohon</div>
        <form action="{{ route('user.permohonan.save') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="border rounded-sm p-4 max-w-[600px] mx-auto space-y-4 shadow-md">
                <div class="flex items-center">
                    <div class="w-2/3">Nama Lengkap pemohon</div>
                    <input type="text" name="full_name" id="full_name" class="w-full" required>
                </div>
                <div class="flex items-center">
                    <div class="w-2/3">Nomor Telepon</div>
                    <input type="text" name="hp" id="hp" class="w-full" required>
                </div>
                <div class="flex items-center">
                    <div class="w-2/3">Alamat Lengkap</div>
                    <textarea name="address" id="address" rows="3" placeholder="Ketikkan alamat lengkap..." class="w-full" required></textarea>
                </div>
            </div>
            <div class="border rounded-sm p-4 max-w-[600px] mx-auto mt-4 space-y-4 shadow-md">
                <div class="text-center">Silahkan pilih jenis layanan</div>
                <div class="flex items-center">
                    <div class="w-1/3">Pilih layanan</div>
                    <select name="jenis" id="jenis" class="w-full" onchange="showSelect(this.value)" required>
                        <option value="blk">Balik Nama</option>
                        <option value="izn">Pembuatan izin perusahaan</option>
                        <option value="akt">Pembuatan Akta Pendirian Perusahaan</option>
                    </select>
                </div>
                <hr>

                {{-- Pengajuan Balik Nama --}}
                <div id="balik-nama">
                    <div class="text-center text-lg">
                        Pembuatan Balik Nama Sertifikat
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <div>Scan KTP Suami & Istri</div>
                        <div>
                            <input type="file" name="KTP-BLK" id="KTP" accept="application/pdf">
                        </div>
                    </div>
                    <div class="flex justify-between items-center mt-4" id="kk-div">
                        <div>Scan Kartu keluarga</div>
                        <div>
                            <input type="file" name="KK-BLK" id="KK" accept="application/pdf">
                        </div>
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <div>Scan NPWP & BPJS</div>
                        <div>
                            <input type="file" name="NPWP&BPJS-BLK" id="NPWP&BPJS" accept="application/pdf">
                        </div>
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <div>Scan Sertifikat</div>
                        <div>
                            <input type="file" name="SERTIPIKAT-BLK" id="SERTIPIKAT" accept="application/pdf">
                        </div>
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <div>Scan PBB</div>
                        <div>
                            <input type="file" name="PBB-BLK" id="PBB" accept="application/pdf">
                        </div>
                    </div>
                </div>

                {{-- Akta Pendirian Perusahaan --}}
                <div id="akta">
                    <div class="text-center text-lg">
                        Pembuatan Akta Pendirian Perusahaan
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <div>Scan KTP</div>
                        <div>
                            <input type="file" name="KTP-AKT" id="KTP" accept="application/pdf">
                        </div>
                    </div>
                    <div class="flex justify-between items-center mt-4" id="kk-div">
                        <div>Scan Kartu keluarga</div>
                        <div>
                            <input type="file" name="KK-AKT" id="KK" accept="application/pdf">
                        </div>
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <div>Scan NPWP (Direktur & Pengurus)</div>
                        <div>
                            <input type="file" name="NPWP_DIREKTUR-AKT" id="NPWP_DIREKTUR" accept="application/pdf">
                        </div>
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <div>Scan IMB</div>
                        <div>
                            <input type="file" name="IMB-AKT" id="IMB" accept="application/pdf">
                        </div>
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <div>Scan Sertifikat</div>
                        <div>
                            <input type="file" name="SERTIPIKAT-AKT" id="SERTIPIKAT" accept="application/pdf">
                        </div>
                    </div>
                </div>

                {{-- Izin Perusahaan --}}
                <div id="cv">
                    <div class="text-center text-lg">
                        Pembuatan Izin Perusahaan
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <div>Scan KTP</div>
                        <div>
                            <input type="file" name="KTP-IZN" id="KTP" accept="application/pdf">
                        </div>
                    </div>
                    <div class="flex justify-between items-center mt-4" id="kk-div">
                        <div>Scan Kartu keluarga</div>
                        <div>
                            <input type="file" name="KK-IZN" id="KK" accept="application/pdf">
                        </div>
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <div>Scan NPWP (Direktur & Pengurus)</div>
                        <div>
                            <input type="file" name="NPWP_DIREKTUR-IZN" id="NPWP_DIREKTUR" accept="application/pdf">
                        </div>
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <div>Scan IMB</div>
                        <div>
                            <input type="file" name="IMB-IZN" id="IMB" accept="application/pdf">
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <button class="bg-black text-white px-3 py-1 hover:bg-gray-700">Simpan</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        setTimeout(function() {
            $('#toast-success').fadeOut('fast');
            $('#toast-error').fadeOut('fast');
        }, 3000); // <-- time in milliseconds

        const layanan = document.getElementById('jenis');

        const balikNama = document.getElementById('balik-nama');
        const akta = document.getElementById('akta');
        const izinCv = document.getElementById('cv');

        balikNama.classList.remove('hidden');
        akta.classList.add('hidden');
        izinCv.classList.add('hidden');

        function showSelect(v) {
            switch (v) {
                case 'blk':
                    balikNama.classList.remove('hidden');
                    akta.classList.add('hidden');
                    izinCv.classList.add('hidden');
                    break;

                case 'izn':
                    balikNama.classList.add('hidden');
                    akta.classList.add('hidden');
                    izinCv.classList.remove('hidden');
                    break;

                case 'akt':
                    balikNama.classList.add('hidden');
                    akta.classList.remove('hidden');
                    izinCv.classList.add('hidden');
                    break;

                default:
                    balikNama.classList.remove('hidden');
                    akta.classList.add('hidden');
                    izinCv.classList.add('hidden');
                    break;
            }
        }
    </script>
@endsection
