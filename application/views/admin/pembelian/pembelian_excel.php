<?php  
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=pembelian.xls");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1><center>Pembelian Barang</center></h1>
	<table border="1">
		<thead>
			<tr>
				<th>Id Pembelian</th>
				<th>Nama Pembeli</th>
				<th>Barang Beli</th>
				<th>Jumlah Beli</th>
				<th>Total Harga</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($pemb as $key) {?>
			<tr>
				<td><?php echo $key->id_pembelian; ?></td>
				<td><?php echo $key->nama_pembeli; ?></td>
				<td><?php echo $key->barang_pembeli; ?></td>
				<td><?php echo $key->qty_pembeli; ?></td>
				<td>Rp. <?php echo number_format($key->total_harga,2,',','.'); ?>,-</td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
</body>
</html>