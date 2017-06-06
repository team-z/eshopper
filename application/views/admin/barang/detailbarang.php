<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('admin/top.php'); ?>
	<title>Detail Barang</title>
</head>
<body>
	<div id="wrapper">
		<?php $this->load->view('admin/sidebar.php'); ?>
		<div id="main-panel">
			<?php $this->load->view('admin/navigasi.php'); ?>

			<div class="row">
				<form method="POST" action="<?php echo base_url('index.php/admin/info'); ?>">
					<div class="col-md-3">
					<?php foreach ($data as $key) {?>
						<img id="preview" src="<?php if ($key->image == "") {
	                                    echo base_url('uploads/me.PNG');
	                                } else {
	                                    echo base_url('uploads/'.$key->image);
	                                } ?>" height="200" width="200" class="img-circle" alt="User Image"/>
	                <?php } ?>
					</div>
					<div class="col-md-6">
							<table class="table table-striped">
								<div class="form-group">
								<thead>
								<?php foreach ($data as $key) {?>
									<tr>
										<th>Nama Barang</th>
										<th>:</th>
										<th>
										<input type="hidden" name="id_barang" value="<?php echo $key->id_barang; ?>">
										<input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang" value="<?php echo $key->nama_barang; ?>"></th>
									</tr>
									<tr>
										<th>Kategori</th>
										<th>:</th>
										<th><input type="text" class="form-control" name="kategori" placeholder="kategori" value="<?php echo $key->kategori; ?>" readonly></th>
									</tr>
									<tr>
										<th>Harga Barang</th>
										<th>:</th>
										<th><input type="text" class="form-control" name="harga_barang" placeholder="Rp." value="<?php echo $key->harga_barang; ?>" readonly></th>
									</tr>
									<tr>
										<th>Discount</th>
										<th>:</th>
										<th><input type="text" class="form-control" name="discount" placeholder="%" value="<?php echo $key->discount; ?>"></th>
									</tr>
									<tr>
										<th>Spesifikasi</th>
										<th>:</th>
										<th><textarea class="form-control" name="spesifikasi" placeholder="spesifikasi lengkap"><?php echo $key->spesifikasi; ?></textarea></th>
									</tr>
									<?php } ?>
								</thead>
								</div>
							</table>
							<button class="btn btn-primary"><span></span>Simpan Perubahan</button>
							<a href="<?php echo base_url('index.php/admin/viewbarang'); ?>" class="btn btn-danger"><span class="fa fa-undo"></span> Keluar</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php $this->load->view('admin/bottom.php'); ?>
</body>
</html>