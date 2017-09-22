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
			<th class="table th">Id Barang</th>
			<th class="table th">Nama Barang</th>
			<th class="table th">Kategori</th>
			<th class="table th">QTY</th>
			<th class="table th">Harga Barang(Rp.)</th>
			<th class="table th">Discount(%)</th>
			<th class="table th">Spesifikasi</th>
			<th class="table th">Suplier</th>
			<th class="table th">Alamat Suplier</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($barang as $isi) {?>
		<tr>
			<td class="table td" align="center"><?php echo $isi->id_barang; ?></td>
			<td class="table td"><?php echo $isi->nama_barang; ?></td>
			<td class="table td"><?php echo $isi->kategori; ?></td>
			<td class="table td" align="center"><?php echo $isi->qty; ?></td>
			<td class="table td" align="right"><?php echo number_format($isi->harga_barang,2,',','.'); ?></td>
			<td class="table td" align="center"><?php echo $isi->discount; ?></td>
			<td class="table td"><?php echo $isi->spesifikasi; ?></td>
			<td class="table td"><?php echo $isi->suplier; ?></td>
			<td class="table td"><?php echo $isi->alamat_suplier; ?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</body>
</html>