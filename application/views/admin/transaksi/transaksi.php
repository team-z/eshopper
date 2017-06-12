<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('admin/top.php'); ?>
	<title>Transaksi</title>
</head>
<body>
	<div id="wrapper">
		<?php $this->load->view('admin/sidebar.php'); ?>
		<div id="main-panel">
			<?php $this->load->view('admin/navigasi.php'); ?>

			<h1><center>Transaksi</center></h1>
			<table class="table table-striped">
				<thead>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td>
							<a href="" class="btn btn-warning"><span class="fa fa-arrow-circle-up"></span> Eksport</a>
						</td>
					</tr>
					<tr>
						<th>No.</th>
						<th>Nama Pelanggan</th>
						<th>Barang Beli</th>
						<th>Jumlah Bli</th>
						<th>Opsi</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$no=1; 
						foreach ($transaksi as $isi) {
					?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $isi->nama_pelanggan; ?></td>
						<td><?php echo $isi->barang_beli; ?></td>
						<td><?php echo $isi->qty_beli; ?></td>
						<td>
							<a href="<?php echo base_url('index.php/admin2/dtltransaksi/').$isi->id_transaksi; ?>" class="btn btn-default"><span></span> Info</a>		
							<a href="<?php echo base_url('index.php/admin2/hapustransaksi/').$isi->id_transaksi; ?>" class="btn btn-danger"><span class="fa fa-trash-o"></span> Hapus</a>
						</td>
					</tr>
					<?php  }?>
				</tbody>
			</table>
		</div>
	</div>
	<?php $this->load->view('admin/bottom.php'); ?>
</body>
</html>