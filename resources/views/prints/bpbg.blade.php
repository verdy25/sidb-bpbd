<!DOCTYPE html>
<html>

<head>
	<title>Bukti Pengambilan Barang dari Gudang</title>
	<style type="text/css">
		body {
			font-family: Arial, Helvetica, sans-serif;
			font-size: 12px;
			padding-left: 5%;
			padding-right: 5%;
		}

		table,
		td,
		th {
			border: 1px solid black;
		}

		.no-border {
			border: none;
		}

		table {
			border-collapse: collapse;
		}

		th {
			height: 50px;
			text-align: center;
		}

		.center {
			text-align: center;
		}

		.grid-container {
			display: grid;
			grid-template-columns: auto auto;
			grid-gap: 10px;
		}
	</style>
</head>

<body>
	<header class="center">
		<p>
			<b>PEMERINTAH KABUPATEN BANYUWANGI</b><br>
			<b style="font-size: 16px">BADAN PENANGGULANGAN BENCANA DAERAH</b><br>
			Jl. Jaksa Agung Suprapto 71, Telepon (0333) 415567<br>
			<span style="font-size: 10px">www.banyuwangikab.go.id Email : bpbdkabbwi@yahoo.co.id</span><br>
			<b>BANYUWANGI - 68416</b>
		</p>
		<hr>
		<p>
			<b><u>BUKTI PENGAMBILAN BARANG DARI GUDANG</b></u><br>
			<b>No. {{$pengeluaran->nomor_ambil}}</b>
		</p>
	</header>
	<br>
	<table style="width: 100%;">
		<tr>
			<th>Tanggal Penyeraham barang Menurut Permintaan</th>
			<th>Barang diterima dari Gudang</th>
			<th>Nama Barang</th>
			<th>Satuan</th>
			<th>Volume</th>
			<th>Harga Satuan</th>
			<th>Jumlah</th>
		</tr>
		@foreach ($details as $key => $detail)
		<tr>
			<td>{{$tanggal}}</td>
			<td>{{$tanggal}}</td>
			<td>{{$detail->barang->nama}} {{$detail->barang->merk}}</td>
			<td class="center">{{$detail->barang->satuan}}</td>
			<td class="center">{{$detail->jumlah}}</td>
			<td style="text-align: right;">{{$harga_satuan[$key]}}</td>
			<td style="text-align: right;">{{$jumlah[$key]}}</td>
		</tr>
		@endforeach
	</table><br><br><br>

	<footer>
		<table style="width: 100%; border: none;">
			<tr style="border: none;">
				<td style="border: none; padding-left: 20%">
					<p>
						Banyuwangi, {{$tanggal}}<br /><br>
						Yang Menerima, <br />
						{{$pengeluaran->permintaan->pemohon_user->jabatan}}
						<br /><br /><br><br>
						<u>{{$pengeluaran->permintaan->pemohon_user->nama}}</u><br />
						NIP. {{$pengeluaran->permintaan->pemohon_user->nip}}
					</p>
				</td>
				<td style="border: none; padding-left: 20%;">
					<p>
						Banyuwangi, {{$tanggal}}<br /><br>
						Yang Menyerahkan, <br />
						{{$pengeluaran->kepada}}
						<br /><br /><br><br>
						<u>{{$pengeluaran->penyerah->nama}}</u><br />
						NIP. {{$pengeluaran->penyerah->nip}}
					</p>
				</td>
			</tr>
			<tr style="border: none;">
				<td style="border: none;" colspan="2">
					<p class="center">
						Mengetahui<br>
						{{$pengeluaran->dari}}<br>
						<br><br><br><br>
						<u>{{$pengeluaran->dari_user->nama}}</u><br />
						NIP. {{$pengeluaran->dari_user->nip}}
					</p>
				</td>
			</tr>
		</table>
	</footer>
</body>

</html>