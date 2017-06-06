<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('admin/top.php'); ?>
	<title>Barang</title>
</head>
<body>
	<div id="wrapper">
		<?php $this->load->view('admin/sidebar.php'); ?>
		<div id="main-panel">
			<?php $this->load->view('admin/navigasi.php'); ?>
			<div class="col-md-8">
				
			</div>
			<table class="table table-striped">
				<thead>
					<tr>
						<td>
							<div class="form-group">
								<a href="<?php echo base_url('index.php/admin/tambahbarang'); ?>" class="btn btn-primary"><span class="fa fa-plus-square"></span> Tambah Barang</a>
							</div>
						</td>
						<td>&nbsp</td>
						<td>&nbsp</td>
						<td>&nbsp</td>
						<td>&nbsp</td>
						<td>
							<div class="form-group">
								<a href="#" class="btn btn-success"><span class="fa fa-arrow-circle-down"></span> Import Data</a>
								<a href="#" class="btn btn-warning"><span class="fa fa-arrow-circle-up"></span> Eksport Data</a>	
							</div>
						</td>
					</tr>
					<tr>
						<th>No.</th>
						<th>Nama Barang</th>
						<th>Kategori</th>
						<th>Harga</th>
						<th>Suplier</th>
						<th>Opsi</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$no=1; 
				foreach ($barang as $isi) {
				?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $isi->nama_barang; ?></td>
						<td><?php echo $isi->kategori; ?></td>
						<td>Rp.<?php echo number_format($isi->harga_barang,2,'.',','); ?> ,-</td>
						<td><?php echo $isi->suplier; ?></td>
						<td>
							<a href="<?php echo base_url('index.php/admin/detailbarang/').$isi->id_barang; ?>" class="btn btn-default"><span> Info </span></a>
							<a href="<?php echo base_url('index.php/admin/edit/').$isi->id_barang; ?>" class="btn btn-primary"><span class="fa fa-refresh"></span> Update</a>
							<a href="<?php echo base_url('index.php/admin/hapus/').$isi->id_barang; ?>" class="btn btn-danger" onclick="return confirm ('Hapus <?php echo $isi->nama_barang;?> ini ?');"title="Hapus"><span class="fa fa-trash-o"></span> Hapus</a>
						</td>
					</tr>
				</tbody>
				<?php } ?>
			</table>
		</div>
	</div>
	<?php $this->load->view('admin/bottom'); ?>
</body>
</html>