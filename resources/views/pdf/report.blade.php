<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Registrasi Notaris</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

</head>

<body class="antialiased">
    <div>
        <div class="flex space-x-4 items-center" style="background-color: red;">
            <div class="w-20 h-20" style="display: inline; background-color: blue;">
                <img src="logo.png" alt="" height="144" width="144">
            </div>
            <div style="display: inline; background-color: yellow;">
                <div class="text-2xl font-medium">Notaris & PPAT</div>
                <div class="text-lg">Tiara Vita, S.H., M.Kn.</div>
                <div>Jl. Raya Lemah Abang No. 01, Pasri Gombong, Cikarang Utara, Bekasi, Jawa Barat</div>
                <div>HP : 081297462058</div>
            </div>
        </div>
        <hr class="bg-black h-1 my-4">
        <div class="text-center text-lg">{{ $title }}</div>

        <table class="w-full mt-4">
            <thead>
                <th class="border border-gray-500 px-2 py-1">No.</th>
                <th class="border border-gray-500 px-2 py-1">Nama Pemohon</th>
                <th class="border border-gray-500 px-2 py-1">Telpon</th>
                <th class="border border-gray-500 px-2 py-1">Alamat</th>
                <th class="border border-gray-500 px-2 py-1">Tanggal</th>
            </thead>
            <tbody>
                @foreach ($permohonan as $key => $p)
                    <tr class="text-center">
                        <td class="border border-gray-500 px-2 py-1">{{ $key + 1 }}</td>
                        <td class="border border-gray-500 px-2 py-1">{{ $p->fn }} </td>
                        <td class="border border-gray-500 px-2 py-1">{{ $p->phone }}</td>
                        <td class="border border-gray-500 px-2 py-1">{{ $p->address }}</td>
                        <td class="border border-gray-500 px-2 py-1">{{ $p->formatted_date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
