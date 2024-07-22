@extends('app')

@section('content')
    <div>
        <form action="" method="post">
            @csrf
            <div class="flex items-center justify-between text-2xl max-w-[800px] mx-auto">
                Cetak Laporan
            </div>
            <div class="border rounded-md max-w-[800px] mx-auto my-8 space-y-4">
                <div class="p-2 flex justify-between items-center">
                    Silahkan pilih data yang ingin dicetak
                    <div>
                        Periode :
                        <span>
                            <a href="">
                                <input type="month" name="month" id="month" class="rounded-sm border-gray-200">
                            </a>
                        </span>
                    </div>
                </div>
                <hr>
                <div class="flex justify-between p-2 items-center">
                    Cetak Daftar Permintaan Balik Nama
                    <button type="submit">
                        <div class="flex bg-gray-300 p-2">
                            <div>
                                <img src="static_img/print.svg" alt="print" class="w-6 h-6">
                            </div>
                            Cetak
                        </div>
                    </button>
                </div>
                <div class="flex justify-between p-2 items-center">
                    Cetak Daftar Pembuatan Akta Pendirian Perusahaan
                    <button type="submit">
                        <div class="flex bg-gray-300 p-2">
                            <div>
                                <img src="static_img/print.svg" alt="print" class="w-6 h-6">
                            </div>
                            Cetak
                        </div>
                    </button>
                </div>
                <div class="flex justify-between p-2 items-center">
                    Cetak Daftar Pembuatan Izin CV Perusahaan
                    <button type="submit">
                        <div class="flex bg-gray-300 p-2">
                            <div>
                                <img src="static_img/print.svg" alt="print" class="w-6 h-6">
                            </div>
                            Cetak
                        </div>
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
