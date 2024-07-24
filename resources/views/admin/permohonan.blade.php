@extends('layout')

@section('main-content')
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
                    @foreach ($permohonans as $p)
                        <tr class="py-2 my-2">
                            <td class="border px-2">{{ $p->no_registrasi }}</td>
                            <td class="border px-2">{{ $p->full_name }}</td>
                            <td class="border px-2">
                                @switch($p->status)
                                    @case('Diterima')
                                        <span class="bg-green-400 px-2 py-px w-min">Diterima</span>
                                    @break

                                    @case('Ditolak')
                                        <span class="bg-red-400 px-2 py-px">Ditolak</span>
                                    @break

                                    @default
                                        <span class="bg-yellow-200 px-2 py-px">Menunggu</span>
                                @endswitch
                            </td>
                            <td class="border px-2">{{ $p->keterangan }}</td>
                            <td class="border px-2" class="flex py-2">
                                <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                                    class="bg-sky-400 px-2 py-px shadow- sm" type="button">
                                    Lihat Data
                                </button>
                                {{-- <button class="bg-sky-400 px-2 py-px shadow- sm">Lihat Data</button> --}}
                                <button class="bg-red-400 px-2 py-px shadow-sm">Hapus</button>
                            </td>
                        </tr>

                        <!-- Main modal -->
                        <div id="crud-modal" tabindex="-1" aria-hidden="true"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="bg-white rounded-lg px-8 py-4">
                                <div class="text-2xl mb-4 md:min-w-[500px]">Berkas Pengajuan</div>
                                <div class="space-y-4 border rounded-md px-4 py-2">
                                    @foreach ($docs as $d)
                                        <div class="flex justify-between">
                                            <div>{{ $d->name }}</div>
                                            <form id="{{ $d->id }}"
                                                action="{{ route('admin.permohonan.download') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="path" id="path"
                                                    value="{{ $d->path }}">
                                                <button type="submit">
                                                    Lihat
                                                </button>
                                            </form>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="mt-4 text-center space-x-2 justify-center">
                                    <form action="{{ route('admin.permohonan.setujui') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" id="{{ $p->id }}"
                                            value="{{ $p->id }}">
                                        <button class="bg-green-400 px-2 py-1 rounded-md">Setujui</button>
                                    </form>
                                    <form action="{{ route('admin.permohonan.tolak') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" id="{{ $p->id }}"
                                            value="{{ $p->id }}">
                                        <input type="text" name="catatan" id="catatan"
                                            placeholder="Tambahkan catatan..." required>
                                        <button href="" class="bg-red-400 px-2 py-1 rounded-md">Tolak</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $permohonans->links() }}
        </div>

    </div>
@endsection
