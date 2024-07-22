@extends('layout')

@section('main-content')
    <div>
        {{-- Content grid --}}
        <div class="grid grid-cols-3 mt-4 gap-8">
            <div class="bg-cyan-300 min-h-36 rounded-md relative flex flex-col justify-between p-2 overflow-hidden">
                <div class="font-medium text-5xl">{{ $balikCount }}</div>
                <div>
                    <div class="font-medium text-xl">Balik Nama</div>
                    <div class="text-gray-600">Jumlah Permohonan</div>
                </div>
                <div class="absolute -bottom-4 right-0 mb-2 mr-2">
                    <img src="static_img/people.svg" class="md:w-36 md:h-36" />
                </div>
            </div>
            <div class="bg-cyan-300 min-h-36 rounded-md relative flex flex-col justify-between p-2 overflow-hidden">
                <div class="font-medium text-5xl">{{ $aktaCount }} </div>
                <div>
                    <div class="font-medium text-xl">Akta Pendirian Perusahaan</div>
                    <div class="text-gray-600">Jumlah Permohonan</div>
                </div>
                <div class="absolute -bottom-4 right-0 mb-2 mr-2">
                    <img src="static_img/graph.svg" class="md:w-36 md:h-36" />
                </div>
            </div>
            <div class="bg-cyan-300 min-h-36 rounded-md relative flex flex-col justify-between p-2 overflow-hidden">
                <div class="font-medium text-5xl">{{ $izinCount }} </div>
                <div>
                    <div class="font-medium text-xl">Izin CV Perusahaan</div>
                    <div class="text-gray-600">Jumlah Permohonan</div>
                </div>
                <div class="absolute -bottom-4 right-0 mb-2 mr-2">
                    <img src="static_img/mail.svg" class="md:w-36 md:h-36" />
                </div>
            </div>
        </div>
    </div>
@endsection
