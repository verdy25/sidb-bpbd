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

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th {
            height: 50px;
        }
    </style>
    <header style="margin-left: 60%; margin-top:3cm">
        <p>Banyuwangi, {{$tanggal}}<br />
            Kepada<br />
            Yth. Kepala Pelaksana BPBD Kab. Banyuwangi<br />
            Selaku Pengguna Anggaran<br />
            di Banyuwangi</p>
    </header>

    <table class='table border border-dark'>
        <tr>
            <th>No</th>
            <th>Barang</th>
            <th>Merk</th>
            <th>Volume</th>
            <th>Satuan</th>
            <th>Harga Satuan (Rp)</th>
            <th>Jumlah (Rp)</th>
        </tr>
        @foreach ($details as $key => $detail)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{Str::lower($detail->barang->nama)}} {{Str::lower($detail->barang->spesifikasi)}}</td>
            <td>{{Str::lower($detail->barang->merk)}}</td>
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
    </table>

    <footer class="mx-5">
        <div class="row">
            <div class="col" style="margin-left: 5%;">
                <p>Yang Menerima,<br />
                    Pengurus Barang Pengguna<br /><br /><br /><br><br>
                    {{$nota->penerima->nama}}<br />
                    NIP. {{$nota->penerima->nip}}</p>

            </div>
            <div class="col" style="margin-left: 65%;">
                <p>Yang Menyerahkan,<br />
                    {{$nota->pihak_ketiga}}<br /><br /><br /><br><br>
                    {{$nota->nama_perwakilan}}<br />
                    {{$nota->jabatan_perwakilan}}</p>
            </div>
        </div>
    </footer>

</body>

</html>