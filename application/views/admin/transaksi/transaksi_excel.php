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
				<th>Tanggal Transaksi</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($transaksi as $i) {
		?>
			<tr>
				<td><?= $i->id_transaksi ?></td>
				<td><?= $i->nama_pelanggan ?></td>
				<td><?= $i->email_pelanggan ?></td>
				<td><?= $i->no_hp ?></td>
				<td>Rp <?= number_format($i->total_harga,2,',','.') ?>,-</td>
				<td><?= $i->no_rekening ?></td>
				<td><?= $i->bank ?></td>
				<td><?= $i->tanggal_transaksi ?></td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
</body>
</html>