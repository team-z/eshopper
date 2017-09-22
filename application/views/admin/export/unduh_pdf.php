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
			<th class="table th">Email Pelanggan</th>
			<th class="table th">No.hp</th>
			<th class="table th">No.Rekening</th>
			<th class="table th">Bank</th>
			<th class="table th">Tanggal Transaksi</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($thn as $isi) {?>
		<tr>
			<td class="table td" align="center"><?php echo $isi->id_transaksi; ?></td>
			<td class="table td"><?php echo $isi->nama_pelanggan; ?></td>
			<td class="table td"><?php echo $isi->email_pelanggan; ?></td>
			<td class="table td" align="right"><?php echo $isi->no_hp; ?></td>
			<td class="table td" align="right"><?php echo $isi->no_rekening; ?></td>
			<td class="table td" align="center"><?php echo $isi->bank; ?></td>
			<td class="table td" align="left"><?php echo $isi->tanggal_transaksi; ?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</body>
</html>