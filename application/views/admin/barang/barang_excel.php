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
				<th>harga_barang</th>
				<th>discount</th>
				<th>spesifikasi</th>
				<th>suplier</th>
				<th>alamat_suplier</th>
				<th>image</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			foreach ($barang as $isi) {
			?>
			<tr>	
				<td><?php echo $isi->id_barang; ?></td>
				<td><?php echo $isi->nama_barang; ?></td>
				<td><?php echo $isi->kategori; ?></td>
				<td><?php echo $isi->qty; ?></td>
				<td><?php echo $isi->harga_barang; ?></td>
				<td><?php echo $isi->discount; ?></td>
				<td><?php echo $isi->spesifikasi; ?></td>
				<td><?php echo $isi->suplier; ?></td>
				<td><?php echo $isi->alamat_suplier; ?></td>
				<td><img src="<?php echo base_url('uploads/'.$isi->image); ?>" height="100" width="100" alt="User Image"></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</body>
</html>