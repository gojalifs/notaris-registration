@extends('layout')

@section('main-content')
    <div>
        @if (Session::get('success'))
            <div class="fixed bottom-10 right-10">
                <div id="toast-success"
                    class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
                    role="alert">
                    <div
                        class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                        </svg>
                        <span class="sr-only">Check icon</span>
                    </div>
                    <div class="ms-3 text-sm font-normal">{{ Session::get('success') }}</div>
                    <button type="button"
                        class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                        data-dismiss-target="#toast-success" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            </div>
        @endif
        @if (Session::get('error'))
            <div class="fixed bottom-10 right-10">
                <div id="toast-danger"
                    class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
                    role="alert">
                    <div
                        class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
                        </svg>
                        <span class="sr-only">Error icon</span>
                    </div>
                    <div class="ms-3 text-sm font-normal">{{ Session::get('error') }}</div>
                    <button type="button"
                        class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                        data-dismiss-target="#toast-danger" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            </div>
        @endif

        <div
            class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px">
                <li class="me-2">
                    <a href="{{ route('user.permohonan.status', ['name' => 'blk']) }}"
                        class="inline-block p-4
                        {{ $layanan == 'blk' ? 'text-blue-600 border-b-2 border-blue-600 rounded-t-lg active' : 'hover:text-gray-600 hover:border-gray-300  border-b-2' }}">
                        Balik Nama
                    </a>
                </li>
                <li class="me-2">
                    <a href="{{ route('user.permohonan.status', ['name' => 'akt']) }}"
                        class="inline-block p-4 
                        {{ $layanan == 'akt' ? 'text-blue-600 border-b-2 border-blue-600 rounded-t-lg active' : 'hover:text-gray-600 hover:border-gray-300  border-b-2' }}"
                        aria-current="page">Akta Pendirian Perusahaan</a>
                </li>
                <li class="me-2">
                    <a href="{{ route('user.permohonan.status', ['name' => 'izn']) }}"
                        class="inline-block p-4
                        {{ $layanan == 'izn' ? 'text-blue-600 border-b-2 border-blue-600 rounded-t-lg active' : 'hover:text-gray-600 hover:border-gray-300  border-b-2' }}">
                        Izin CV Perusahaan
                    </a>
                </li>
            </ul>
        </div>

        {{-- Table Data --}}
        <div>
            <table class="table-auto min-w-full">
                <thead>
                    <th class="border px-2 py-1">No. Registrasi</th>
                    <th class="border px-2 py-1">Nama Pemohon</th>
                    <th class="border px-2 py-1">Status</th>
                    <th class="border px-2 py-1">Keterangan</th>
                    <th class="border px-2 py-1">Aksi</th>
                </thead>
                <tbody>
                    @foreach ($collection as $item)
                        
                    @endforeach
                    <tr class="py-2 my-2">
                        <td class="border px-2">BN-2024-07-1</td>
                        <td class="border px-2">Nisya</td>
                        <td class="border px-2">
                            <span class="bg-green-400 px-2 py-px w-min">Diterima</span>
                            <span class="bg-yellow-200 px-2 py-px">Menunggu</span>
                            <span class="bg-red-400 px-2 py-px">Ditolak</span>
                        </td>
                        <td class="border px-2">Data kurang lengkap</td>
                        <td class="border px-2" class="flex py-2">
                            <button class="bg-sky-400 px-2 py-px shadow- sm">Lihat Berkas</button>
                        </td>
                    </tr>
                </tbody>
            </table>

            {{ $permohonan->links() }}

        </div>
    </div>
@endsection
