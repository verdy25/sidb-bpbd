<!DOCTYPE html>
<html>

<head>
	<title>Surat Perintah Pengeluaran / Penyaluran Barang</title>
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

		.no-border{
			border: none;
		}

		table {
			border-collapse: collapse;
		}

		th {
			height: 20px;
			text-align: center;
		}

		.center {
			text-align: center;
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
			Surat Perintah Pengeluaran / Penyaluran Barang<br>
			No. {{$pengeluaran->nomor_keluar}}
		</p>
	</header>
	<br>
	<br>

	<table class="no-border">
		<tr class="no-border">
			<td class="no-border" style="padding-right:1cm">Dari</td>
			<td class="no-border">: {{$pengeluaran->dari}}</td>
		</tr>
		<tr class="no-border">
			<td class="no-border">Kepada</td>
			<td class="no-border">: {{$pengeluaran->kepada}}</td>
		</tr>
	</table>
	<p style="text-align: justify">Harap dikeluarkan dari gudang dan disalurkan barang tersebut dalam daftar dibawah ini untuk Sekretariat pada Badan Penanggulangan Bencana Daerah Kabupaten Banyuwangi</p>
	<p style="text-align: justify">Berdasarkan Surat Permohonan Permintaan barang / jasa Nomor {{$pengeluaran->permintaan->nomor}} Tanggal {{$tanggal}}</p>	
	<table style="width: 100%;">
		<tr>
			<th>No</th>
			<th>Nama Barang</th>
			<th>Volume</th>
			<th>Satuan</th>
		</tr>
		@foreach ($details as $key => $detail)
		<tr>
			<td class="center">{{$key+1}}</td>
			<td>{{$detail->barang->nama}}</td>
			<td class="center">{{$detail->jumlah}}</td>
			<td class="center">{{$detail->barang->satuan}}</td>
		</tr>
		@endforeach
	</table><br><br><br>

	<footer>
		<div style="margin-left: 60%;">
			<p>Banyuwangi, {{$tanggal}}<br />
				{{$pengeluaran->dari}}, <br /><br /><br /><br><br>
				<u>{{$pengeluaran->dari_user->nama}}</u><br />
				NIP. {{$pengeluaran->dari_user->nip}}</p>
		</div>
	</footer>
</body>

</html>