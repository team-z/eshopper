<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('admin/top'); ?>
	<title>Detail Pengiriman</title>
</head>
<body>
	<div id="wrapper">
		<?php $this->load->view('admin/sidebar'); ?>
		<div id="main-panel">
			<?php $this->load->view('admin/navigasi'); ?>
			<div class="row">
				<div class="col-md-6">
					<table class="table table-striped">
					<h2>Detail Pengiriman</h2>
					<?php foreach ($data as $key) {
						$id_transaksi = $key->id_transaksi;
					?>
						<thead>
							<tr>
								<th>
									<div class="form-group">
										<label for="user">Nama Pelanggan</label>
										<input type="text" class="form-control" name="nama_pelanggan" value="<?php echo $key->nama_pelanggan; ?>" readonly>
									</div>
								</th>
								<th>
									<div class="form-group">
										<label for="user">Email Pelanggan</label>
										<input type="text" class="form-control" name="email_pelanggan" value="<?php echo $key->email_pelanggan; ?>" readonly>
									</div>
								</th>
							</tr>
							<tr>
								<th>
									<div class="form-group">
										<label for="user">No. HandPhone</label>
										<input type="text" class="form-control" name="no_hp" value="<?php echo $key->no_hp; ?>" readonly>
									</div>
								</th>
								<th>
									<div class="form-group">
										<label for="user">Bank</label>
										<input type="text" class="form-control" name="bank" value="<?php echo $key->bank; ?>" readonly>
									</div>
								</th>
							</tr>
							<tr>
								<th colspan="2">
									<div class="form-group">
										<label for="user">No. Rekening</label>
										<input type="text" class="form-control" name="no_rekening" value="<?php echo $key->no_rekening; ?>" readonly>
									</div>
								</th>
							</tr>
							<tr>
								<th colspan="2">
									<div class="form-group">
										<label for="user">Provinsi</label>
										<input type="text" class="form-control" name="provinsi" value="<?php echo $key->provinsi; ?>" readonly>
									</div>
								</th>
							</tr>
							<tr>
								<th colspan="2">
									<div class="form-group">
										<label for="user">Kabupaten</label>
										<input type="text" class="form-control" name="kabupaten" value="<?php echo $key->kabupaten_kota; ?>" readonly>
									</div>
								</th>
							</tr>
							<tr>
								<th colspan="1">
									<div class="form-group">
										<label for="user">Kecamatan</label>
										<input type="text" class="form-control" name="kecamatan" value="<?php echo $key->kecamatan; ?>" readonly>
									</div>
								</th>
								<th>
									<div class="form-group">
										<label for="user">Kode Pos</label>
										<input type="text" class="form-control" name="kode_pos" value="<?php echo $key->kodepos; ?>" readonly>
									</div>
								</th>
							</tr>
							<tr>
								<th colspan="2">
									<div class="form-group">
										<label for="user">Alamat Lengkap Pengiriman</label>
										<textarea class="form-control" name="alamat_lengkap" readonly><?php echo $key->alamat_lengkap; ?></textarea>
									</div>
								</th>
							</tr>
						</thead>
						<?php } ?>
					</table>
				<a href="<?php echo base_url('index.php/admin3/join'); ?>" class="btn btn-danger"><span class="fa fa-undo"></span> Keluar</a>
				</div>
				<div class="col-md-6">
					<table class="table table-striped">
					<h2>Daftar Beli</h2>
						<thead>
							<tr>
								<th>No.</th>
								<th>Barang</th>
								<th>Jumlah Beli</th>
								<th>Total Harga</th>
							</tr>
						</thead>
						<?php 
						$total = 0;
						$no = 1;
						$where = array('id_transaksi' => $id_transaksi );
						$variable = $this->db->get('pesanan', $where)->result();
						foreach ($variable as $tot) { 
						?>
						<tbody>
							<tr>
								<td><?php echo $no++; ?></td>
								<td><?php echo $tot->nama_barang; ?></td>
								<td><?php echo $tot->qty_pesanan; ?> Unit</td>
								<td>Rp. <?php echo number_format($tot->total_harga,2,',','.'); ?>,-</td>
							</tr>
						</tbody>
						<?php $total += $tot->total_harga; } ?>
						<footer>
							<tr>
								<td colspan="3" align="center">Subtotal</td>
								<td>Rp. <?php echo number_format($total,2,',','.'); ?>,-</td>
							</tr>
						</footer>
					</table>
				</div>
			</div>
		</div>
	</div>
<?php $this->load->view('admin/bottom'); ?>
</body>
</html>