<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('admin/top'); ?>
	<title></title>
</head>
<body>
	<div id="wrapper">
		<?php $this->load->view('admin/sidebar'); ?>
		<div id="main-panel">
			<?php $this->load->view('admin/navigasi'); ?>
			<div class="panel panel-default">
				<div class="panel panel-heading">
					<h2><center>Hapus Data</center></h2>
				</div>
				<div class="panel panel-body">
					<table class="table table-condensed">
						<thead>
							<tr>
								<th>NO.</th>
								<th>Gambar 1</th>
								<th>Gambar 2</th>
								<th>Gambar 3</th>
								<th>Gambar 4</th>
								<th>Banner 1</th>
								<th>Banner 2</th>
								<th>Banner 3</th>
								<th>Opsi</th>
							</tr>
						</thead>
						<tbody>
						<?php 
						$no = 1;
						foreach ($img as $key) {
						?>
							<tr>
								<td><?php echo $no++; ?></td>
								<td><img src="<?php echo base_url('./uploads/'.$key->gambar1); ?>" height="200" width="200" alt=""/></td>
								<td><img src="<?php echo base_url('./uploads/'.$key->gambar2); ?>" height="200" width="200" alt=""/></td>
								<td><img src="<?php echo base_url('./uploads/'.$key->gambar3); ?>" height="200" width="200" alt=""/><input type="hidden" name="gambar3" value="<?php echo $key->gambar3; ?>"></td>
								<td><img src="<?php echo base_url('./uploads/'.$key->gambar4); ?>" height="200" width="200" alt=""/></td>
								<td><img src="<?php echo base_url('./uploads/'.$key->banner1); ?>" height="200" width="200" alt=""/></td>
								<td><img src="<?php echo base_url('./uploads/'.$key->banner2); ?>" height="200" width="200" alt=""/></td>
								<td><img src="<?php echo base_url('./uploads/'.$key->banner3); ?>" height="200" width="200" alt=""/></td>
								<td><a href="<?php echo base_url('index.php/iklan/proses_hapus/'.$key->id_iklan); ?>" class="btn btn-warning" onclick="return confirm ('Hapus gambar ini ?');"title="Hapus" ><span class="fa fa-trash-o"></span> Hapus</a></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
					<a href="<?php echo base_url('index.php/iklan/index'); ?>" class="btn btn-danger"><span class="fa fa-undo"></span> Kembali</a>
				</div>
			</div>
		</div>
	</div>
<?php $this->load->view('admin/bottom'); ?>
</body>
</html>