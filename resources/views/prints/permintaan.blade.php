<!DOCTYPE html>
<html>

<head>
	<title>Nota permintaan barang</title>
	<style type="text/css">
		body {
			font-family: Arial, Helvetica, sans-serif;
			font-size: 12px;
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
		<p><b>NOTA PERMINTAAN BARANG</b></p>
	</header>
	<br>
	<br>

	<table class="no-border">
		<tr class="no-border">
			<td class="no-border" style="padding-right:1cm">Kepada</td>
			<td class="no-border">: Pengguna Barang</td>
		</tr>
		<tr class="no-border">
			<td class="no-border">Pemohon</td>
			<td class="no-border">: {{$permintaan->pemohon_user->nama}}</td>
		</tr>
		<tr class="no-border">
			<td class="no-border">Tanggal</td>
			<td class="no-border">: {{$tanggal}}</td>
		</tr>
		<tr class="no-border">
			<td class="no-border">Nomor</td>
			<td class="no-border">: {{$permintaan->nomor}}</td>
		</tr>
		<tr class="no-border">
			<td class="no-border">Perihal</td>
			<td class="no-border">: {{$permintaan->perihal}}</td>
		</tr>
	</table>
	<br>
	<br>
	
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
				Pemohon, <br /><br /><br /><br><br>
				<u>{{$permintaan->pemohon_user->nama}}</u><br />
				NIP. {{$permintaan->pemohon_user->nip}}</p>
		</div>
	</footer>
</body>

</html>