@extends('app')

@section('content')
    <div>
        <div class="flex justify-between text-lg border-b shadow-sm pb-4">
            <div class="flex items-center">
                <img src="static_img/profile.svg" width="40" height="40">
                <div class="ml-2">{{ $user }}</div>
            </div>
            <a href="" class="hover:text-red-400 hover:scale-95 content-center">
                <div class="flex space-x-2 items-center">
                    <div>Logout</div>
                    <div>
                        <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="text-yellow-200">
                            <path d="M21 12L13 12" stroke="#323232" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M18 15L20.913 12.087V12.087C20.961 12.039 20.961 11.961 20.913 11.913V11.913L18 9"
                                stroke="#323232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M16 5V4.5V4.5C16 3.67157 15.3284 3 14.5 3H5C3.89543 3 3 3.89543 3 5V19C3 20.1046 3.89543 21 5 21H14.5C15.3284 21 16 20.3284 16 19.5V19.5V19"
                                stroke="#323232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                </div>
            </a>
        </div>

        {{-- Content grid --}}
        <div class="grid grid-cols-3 mt-4 gap-8">
            <div class="bg-cyan-300 min-h-36 rounded-md relative flex flex-col justify-between p-2 overflow-hidden">
                <div class="font-medium text-5xl">10</div>
                <div>
                    <div class="font-medium text-xl">Balik Nama</div>
                    <div class="text-gray-600">Jumlah Permohonan</div>
                </div>
                <div class="absolute -bottom-4 right-0 mb-2 mr-2">
                    <img src="static_img/people.svg" class="md:w-36 md:h-36"/>
                </div>
            </div>
            <div class="bg-cyan-300 min-h-36 rounded-md relative flex flex-col justify-between p-2 overflow-hidden">
                <div class="font-medium text-5xl">2</div>
                <div>
                    <div class="font-medium text-xl">Akta Pendirian Perusahaan</div>
                    <div class="text-gray-600">Jumlah Permohonan</div>
                </div>
                <div class="absolute -bottom-4 right-0 mb-2 mr-2">
                    <img src="static_img/graph.svg" class="md:w-36 md:h-36"/>
                </div>
            </div>
            <div class="bg-cyan-300 min-h-36 rounded-md relative flex flex-col justify-between p-2 overflow-hidden">
                <div class="font-medium text-5xl">1</div>
                <div>
                    <div class="font-medium text-xl">Izin CV Perusahaan</div>
                    <div class="text-gray-600">Jumlah Permohonan</div>
                </div>
                <div class="absolute -bottom-4 right-0 mb-2 mr-2">
                    <img src="static_img/mail.svg" class="md:w-36 md:h-36"/>
                </div>
            </div>
        </div>
    </div>
@endsection
