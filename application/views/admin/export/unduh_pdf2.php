<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<style>
	  .table{
	      border-collapse: collapse;
	      width: 100%;
	      margin: 0 auto;
	  }
	  .table .th{
	      border:1px solid #000;
	      padding: 3px;
	      font-weight: bold;
	      text-align: center;
	  }
	  .table .td{
	      border:1px solid #000;
	      padding: 3px;
	      vertical-align: top;
	  }
	</style>
</head>
<body>
<center>
	<h1>E-shopper</h1>
	<b>Loe Pasti Puas</b><br>
	...............<br>
	<hr width="100%" height="75"></hr><br>
</center>
<table border="1" class="table">
	<thead>
		<tr>
			<th class="table th">Id Transaksi</th>
			<th class="table th">Nama Pelanggan</th>
			<th class="table th">Provinsi</th>
			<th class="table th">Kabupaten/Kota</th>
			<th class="table th">Kecamatan</th>
			<th class="table th">Kelurahan</th>
			<th class="table th">Alamat Lengkap Pengiriman</th>
			<th class="table th">Kodepos</th>
			<th class="table th">Tanggal Pengiriman</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($pengiriman as $isi) {?>
		<tr>
			<td class="table td" align="center"><?php echo $isi->id_transaksi; ?></td>
			<td class="table td"><?php echo $isi->nama_pelanggan; ?></td>
			<td class="table td" align="center"><?php echo $isi->provinsi; ?></td>
			<td class="table td" align="center"><?php echo $isi->kabupaten_kota; ?></td>
			<td class="table td" align="center"><?php echo $isi->kecamatan; ?></td>
			<td class="table td" align="center"><?php echo $isi->kelurahan; ?></td>
			<td class="table td"><?php echo $isi->alamat_lengkap; ?></td>
			<td class="table td"><?php echo $isi->kodepos; ?></td>
			<td class="table td"><?php echo $isi->tanggal; ?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</body>
</html>
	<title></title>