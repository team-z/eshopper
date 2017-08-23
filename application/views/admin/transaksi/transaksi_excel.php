<?php  
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=transaksi.xls");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h3><center>Transaksi</center></h3><br>
	<table border="1">
		<thead>
			<tr>			
				<th>Id Transaksi</th>
				<th>Nama Pelanggan</th>
				<th>Email Pelanggan</th>
				<th>No.Hp</th>
				<th>Total Beli</th>
				<th>No. Rekening</th>
				<th>Bank</th>
				<th>Provinsi</th>
				<th>Kabupaten/Kota</th>
				<th>Kecamatan</th>
				<th>Kelurahan</th>
				<th>Kode Pos</th>
				<th>Alamat Lengkap Pengiriman</th>
				<th>Tanggal Transaksi</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($transaksi as $i) {
		?>
			<tr>
				<td align="right"><?= $i->id_transaksi ?></td>
				<td align="right"><?= $i->nama_pelanggan ?></td>
				<td align="right"><?= $i->email_pelanggan ?></td>
				<td align="right"><?= $i->no_hp ?></td>
				<td align="right">Rp <?= number_format($i->total_harga,2,',','.') ?>,-</td>
				<td align="right"><?= $i->no_rekening ?></td>
				<td align="right"><?= $i->bank ?></td>
				<td align="right"><?= $i->provinsi ?></td>
				<td align="right"><?= $i->kabupaten_kota?></td>
				<td align="right"><?= $i->kecamatan?></td>
				<td align="right"><?= $i->kelurahan ?></td>
				<td align="right"><?= $i->kodepos ?></td>
				<td align="right"><?= $i->alamat_lengkap?></td>
				<td align="right"><?= $i->tanggal_transaksi ?></td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
</body>
</html>