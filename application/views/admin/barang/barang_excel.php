<?php  
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=barang.xls");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h3><center>Barang</center></h3>
	<table border="1">
		<thead>
			<tr>
				<th>id_barang</th>
				<th>nama_barang</th>
				<th>kategori</th>
				<th>qty</th>
				<th>harga_barang(Rp.)</th>
				<th>discount(%)</th>
				<th>spesifikasi</th>
				<th>suplier</th>
				<th>alamat_suplier</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			foreach ($barang as $isi) {
			?>
			<tr>	
				<td align="right"><?php echo $isi->id_barang; ?></td>
				<td align="right"><?php echo $isi->nama_barang; ?></td>
				<td align="right"><?php echo $isi->kategori; ?></td>
				<td align="right"><?php echo $isi->qty; ?></td>
				<td align="right"><?php echo number_format($isi->harga_barang,2,',','.'); ?></td>
				<td align="right"><?php echo $isi->discount; ?></td>
				<td align="right"><?php echo $isi->spesifikasi; ?></td>
				<td align="right"><?php echo $isi->suplier; ?></td>
				<td align="right"><?php echo $isi->alamat_suplier; ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</body>
</html>