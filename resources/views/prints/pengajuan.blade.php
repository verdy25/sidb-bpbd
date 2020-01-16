<!DOCTYPE html>
<html>

<head>
    <title>Laporan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>

<body>
    <style type="text/css">
        body {
            font-size: 9pt;
        }
    </style>
    <header style="margin-left: 60%; margin-top:1cm">
        <p>Banyuwangi, 04 Januari 2019<br />
            Kepada<br />
            Yth. Kepala Pelaksana BPBD Kab. Banyuwangi<br />
            Selaku Pengguna Anggaran<br />
            di Banyuwangi</p>
    </header>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Barang</th>
                <th>Merk</th>
                <th>Volume</th>
                <th>Satuan</th>
                <th>Harga Satuan (Rp)</th>
                <th>Jumlah (Rp)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($details as $key => $detail)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$detail->barang->nama}}</td>
                <td>{{$detail->barang->spesifikasi}}</td>
                <td>{{$detail->volume}}</td>
                <td>{{$detail->barang->satuan}}</td>
                <td class="text-right">{{$detail->harga}}</td>
                <td class="text-right">{{$jumlah[$key]}}</td>
            </tr>
            @endforeach
            <tr>
                <td class="text-right" colspan="6"><strong>Total</strong></td>
                <td class="text-right">{{$total}}</td>
            </tr>
        </tbody>
    </table>

    <footer class="mx-5">
        <div class="row">
            <div class="col" style="margin-left: 5%;">
                <p>Yang Menerima,<br />
                    Pengurus Barang Pengguna<br /><br /><br /><br><br>
                    WAWAN HERMANTO<br />
                    NIP. 1980101010 200901 1 025</p>

            </div>
            <div class="col" style="margin-left: 65%;">
                <p>Yang Menyerahkan,<br />
                    Nama CV<br /><br /><br /><br><br>
                    WAWAN HERMANTO<br />
                    NIP. 1980101010 200901 1 025</p>
            </div>
        </div>


</body>

</html>