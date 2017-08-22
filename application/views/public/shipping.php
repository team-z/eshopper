<!DOCTYPE html>
<html>
<head>
	<?php include "head.php" ; ?>
</head>
<body>
	<header id="header"><!--header-->
		<!--/header_top-->
		<?php include "header-top.php"; ?>
		<!--/header-middle-->
	    <?php include "header-middle.php"; ?>
		<!--/header-bottom-->
		<?php include "header-bottom.php"; ?>
	</header>
	<div class="container">
		<div class="row">
			<div class="col-md-7">
			<h1>Data Pelanggan</h1><br>
				<table class="table table-striped table-bordered">
					<thead style="background-color: orange;color: white">
						<tr>
							<td>Tanggal Transaksi</td>
							<td>Nomor Pesanan</td>
							<td>Nama Pelanggan</td>
							<td>Email Pelanggan</td>
							<td>No Rekening</td>
							<td>Bank</td>
							<td>Status</td>
						</tr>
					</thead>
					<tbody>
					<?php 
						foreach ($user as $u) {
					?>
						<tr>
							<td><?php echo $u->tanggal_transaksi ; ?></td>
							<td><?php echo $u->no_pesanan; ?></td>
							<td><?php echo $u->nama_pelanggan; ?></td>
							<td><?php echo $u->email_pelanggan; ?></td>
							<td><?php echo $u->no_rekening; ?></td>
							<td><?php echo $u->bank; ?></td>
							<td><?php echo $u->status; ?></td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>