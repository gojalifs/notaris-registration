@extends('app')

@section('content')
    <div>
        <div
            class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px">
                <li class="me-2">
                    <a href="{{ route('admin.permohonan.index', ['name' => 'blk']) }}"
                        class="inline-block p-4
                        {{ $layanan == 'blk' ? 'text-blue-600 border-b-2 border-blue-600 rounded-t-lg active' : 'hover:text-gray-600 hover:border-gray-300  border-b-2' }}">
                        Balik Nama
                    </a>
                </li>
                <li class="me-2">
                    <a href="{{ route('admin.permohonan.index', ['name' => 'akt']) }}"
                        class="inline-block p-4 
                        {{ $layanan == 'akt' ? 'text-blue-600 border-b-2 border-blue-600 rounded-t-lg active' : 'hover:text-gray-600 hover:border-gray-300  border-b-2' }}"
                        aria-current="page">Akta Pendirian Perusahaan</a>
                </li>
                <li class="me-2">
                    <a href="{{ route('admin.permohonan.index', ['name' => 'izn']) }}"
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
                            <button class="bg-sky-400 px-2 py-px shadow- sm">Lihat Data</button>
                            <button class="bg-red-400 px-2 py-px shadow-sm">Hapus</button>
                        </td>
                    </tr>
                </tbody>
            </table>

            {{ $permohonans->links() }}

            {{-- <nav class="flex items-center flex-column flex-wrap md:flex-row justify-between pt-4"
                aria-label="Table navigation">
                <span
                    class="text-sm font-normal text-gray-500 dark:text-gray-400 mb-4 md:mb-0 block w-full md:inline md:w-auto">Showing
                    <span class="font-semibold text-gray-900 dark:text-white">1-10</span> of <span
                        class="font-semibold text-gray-900 dark:text-white">1000</span></span>
                <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
                    <li>
                        <a href="{{ URL::current() }}"
                            class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                    </li>
                    <li>
                        <a href="#" aria-current="page"
                            class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">4</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">5</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
                    </li>
                </ul>
            </nav> --}}
        </div>
    </div>
@endsection
