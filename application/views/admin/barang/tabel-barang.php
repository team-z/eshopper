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
		<tr>	
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
	</tbody>
</table>
<p>
    * id_barang mohon untuk jangan diisi karena dapat mengganggu sistem<br>
    * ketika diimport pastikan file anda disimpan dalam format .csv(Comma delimited)<br>
    * ketika ingin mengimport mohon untuk menghapus kata-kata ini karena dapat mengganggu sistem<br>
</p>
</body>
</html>