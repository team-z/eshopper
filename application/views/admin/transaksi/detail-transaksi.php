<!DOCTYPE html>
<html>
<head>
	<title>Detail Transaksi</title>
	<?php $this->load->view('admin/top.php'); ?>
</head>
<body>
	<div id="wrapper">
		<?php $this->load->view('admin/sidebar.php'); ?>
		<div id="main-panel">
			<?php $this->load->view('admin/navigasi.php'); ?>

			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-7">
					<table class="table table-striped">
						<thead>
						<?php foreach ($kom as $key) {?>
							<tr>
								<th>
									<div class="form-group">
										<label for="user">Nama Pelanggan</label>
										<input type="hidden" name="id_transaksi" value="<?php echo $key->nama_pelanggan; ?>">
										<input type="text" class="form-control" name="nama_pelanggan" value="<?php echo $key->nama_pelanggan; ?>" readonly>
									</div>
								</th>
								<th>
									<div class="form-group">
										<label for="user">Email</label>
										<input type="text" class="form-control" name="email_pelanggan" value="<?php echo $key->email_pelanggan; ?>" readonly>
									</div>
								</th>
							</tr>
							<tr>
								<th>
									<div class="form-group">
										<label for="user">No.Handphone</label>
										<input type="text" class="form-control" name="no_hp" value="<?php echo $key->no_hp; ?>" readonly>
									</div>
								</th>
								<th>
									<div class="form-group">
										<label for="user">Barang Beli</label>
										<input type="text" class="form-control" name="barang_beli" value="<?php echo $key->barang_beli; ?>" readonly>
									</div>
								</th>
							</tr>
							<tr>
								<th>
									<div class="form-group">
										<label for="user">Total Beli</label>
										<input type="text" class="form-control" name="total_beli" value="Rp <?php echo number_format($key->total_beli,2,',','.'); ?> ,-" readonly>
									</div>
								</th>
								<th>
									<div class="form-group">
										<label for="user">Jumlah Beli</label>
										<input type="text" class="form-control" name="qty_beli" value="<?php echo $key->qty_beli; ?>" readonly>
									</div>
								</th>
							</tr>
							<tr>
								<th>
									<div class="form-group">
										<label for="user">No.Rekening</label>
										<input type="text" class="form-control" name="no_rekening" value="<?php echo $key->no_rekening; ?>" readonly>
									</div>
								</th>
								<th>
									<div class="form-group">
										<label for="user">Kode Vertifikasi</label>
										<input type="text" class="form-control" name="kode_vertifikasi" value="<?php echo $key->kode_vertifikasi; ?>" readonly>
									</div>
								</th>
							</tr>
							<tr>
								<th>
									<div class="form-group">
										<label for="user">Status</label>
										<input type="text" class="form-control" name="status" value="<?php echo $key->status; ?>" readonly>
									</div>
								</th>
								<th>
									<div class="form-group">
										<label for="user">Tanggal Beli</label>
										<input type="text" class="form-control" name="tanggal_transaksi" value="<?php echo $key->tanggal_transaksi; ?>" readonly>
									</div>
								</th>
							</tr>
							<?php } ?>
						</thead>
					</table>
					<a href="<?php echo base_url('index.php/admin2/viewtransaksi'); ?>" class="btn btn-danger"><span class="fa fa-undo"></span> Keluar</a>
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view('admin/bottom.php'); ?>
</body>
</html>