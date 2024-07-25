@extends('layout')

@section('content')
    <div>
        <div class="flex items-center justify-between text-2xl max-w-[800px] mx-auto">
            Cetak Laporan
        </div>
        <div class="border rounded-md max-w-[800px] mx-auto my-8 space-y-4">
            <div class="p-2 flex justify-between items-center">
                Silahkan pilih data yang ingin dicetak
                <div>
                    Periode :
                    <span>
                        <input type="month" name="month" id="month" class="rounded-sm border-gray-200" required>
                    </span>
                </div>
            </div>
            <hr>
            <div class="flex justify-between p-2 items-center">
                Cetak Daftar Permintaan Balik Nama
                <a id="blk">
                    <div class="flex bg-gray-300 hover:bg-gray-400 cursor-pointer p-2">
                        <div>
                            <img src="static_img/print.svg" alt="print" class="w-6 h-6">
                        </div>
                        Cetak
                    </div>
                </a>
            </div>
            <div class="flex justify-between p-2 items-center">
                Cetak Daftar Pembuatan Akta Pendirian Perusahaan
                <a id="akt">
                    <div class="flex bg-gray-300 p-2 hover:bg-gray-400 cursor-pointer">
                        <div>
                            <img src="static_img/print.svg" alt="print" class="w-6 h-6">
                        </div>
                        Cetak
                    </div>
                </a>
            </div>
            <div class="flex justify-between p-2 items-center">
                Cetak Daftar Pembuatan Izin CV Perusahaan
                <a id="izn">
                    <div class="flex bg-gray-300 p-2 hover:bg-gray-400 cursor-pointer">
                        <div>
                            <img src="static_img/print.svg" alt="print" class="w-6 h-6">
                        </div>
                        Cetak
                    </div>
                </a>
            </div>
        </div>
    </div>

    <script>
        $('#akt').click(function(e) {
            e.preventDefault();
            const month = document.getElementById('month').value;
            if (month == '') {
                alert('Silahkan pilih periode terlebih dahulu');
                return false;
            }

            const route = `/report?type=akt&month=${month}`;
            console.log(`routenya ${route}`);
            window.location.href = route;
        })

        $('#izn').click(function(e) {
            e.preventDefault();
            const month = document.getElementById('month').value;
            if (month == '') {
                alert('Silahkan pilih periode terlebih dahulu');
                return false;
            }

            const route = `/report?type=izn&month=${month}`;
            console.log(`routenya ${route}`);
            window.location.href = route;
        })
        $('#blk').click(function(e) {
            e.preventDefault();
            const month = document.getElementById('month').value;
            if (month == '') {
                alert('Silahkan pilih periode terlebih dahulu');
                return false;
            }

            const route = `/report?type=blk&month=${month}`;
            console.log(`routenya ${route}`);
            window.location.href = route;
        })

        function submit(type) {
            const month = document.getElementById('month');
            if (month.value == '') {
                alert("Silahkan pilih periode");
                return false;
            }

            const data = {
                'type': type,
                'month': month.value,
            };

            console.log(data);

            const route = '/cetak';
            fetch(route, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Laravel CSRF token
                },
                body: JSON.stringify(data)
            }).then((result) => {
                result.json().then((res) => {

                }).catch((err) => {

                });
            }).catch((err) => {

            });
        }
    </script>
@endsection
