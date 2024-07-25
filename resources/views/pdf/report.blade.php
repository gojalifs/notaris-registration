<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Registrasi Notaris</title>

    <style>
        .title {
            text-align: center;
            font-size: 18px;
            line-height: 28px;
        }

        table {
            width: 100%;
            margin-top: 1rem;
            border-collapse: collapse;
        }

        tr {
            text-align: center;
        }

        th,
        td {
            border: 5px solid rgb(107, 114, 128);
            border-width: 1px;
            --tw-border-opacity: 1;
            padding: 0.25rem 0.5rem;
        }
    </style>

</head>

<body>
    <div>
        <div>
            <img src="logo.png" alt="" style="float: left; margin-right: 16px; height: 100px; width: auto;">
            <div style="height: 100px; align-items: center">
                <div style="font-size: 24px; line-height: 32px; font-weight: 500; width: fit-content">
                    Notaris & PPAT
                </div>
                <div style="font-size: 18px; line-height: 28px; width: fit-content">
                    Tiara Vita, S.H., M.Kn.
                </div>
                <div>Jl. Raya Lemah Abang No. 01, Pasir Gombong, Cikarang Utara, Bekasi, Jawa Barat</div>
                <div>HP : 081297462058</div>
            </div>
        </div>
        <hr style="background-color: black; height: 0.25rem; margin-top: 1rem; margin-bottom: 1rem;">
        <div class="title">
            {{ $title }}
        </div>

        <table>
            <thead>
                <th>No.</th>
                <th>Nama Pemohon</th>
                <th>Telpon</th>
                <th>Alamat</th>
                <th>Tanggal</th>
            </thead>
            <tbody>
                @foreach ($permohonan as $key => $p)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $p->fn }} </td>
                        <td>{{ $p->phone }}</td>
                        <td>{{ $p->address }}</td>
                        <td>{{ $p->formatted_date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
