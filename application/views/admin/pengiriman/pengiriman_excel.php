<?php  
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=pengiriman.xls");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table border="1">
		<thead>
			<tr>
				<th>Id Transaksii</th>
				<th>Nama Pelanggan</th>
				<th>Tanggal Beli</th>
				<th>Provinsi</th>
				<th>Kabupaten/Kota</th>
				<th>Kecamatan</th>
				<th>Kode Pos</th>
				<th>Alamat Lengkap</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($pengiriman as $l) {
		?>
			<tr>
				<td><?php echo $l->id_transaksi; ?></td>
				<td><?php echo $l->nama_pelanggan; ?></td>
				<td><?php echo $l->tanggal; ?></td>
				<td><?php echo $l->provinsi; ?></td>
				<td><?php echo $l->kabupaten_kota; ?></td>
				<td><?php echo $l->kecamatan; ?></td>
				<td><?php echo $l->kodepos; ?></td>
				<td><?php echo $l->alamat_lengkap; ?></td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
</body>
</html>