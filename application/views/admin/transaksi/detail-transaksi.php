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
				<div class="col-md-5">
					<table class="table table-striped">
						<h3>Detail Data Transaksi</h3>
						<thead>
						<?php foreach ($kom as $key) {
							$kode_vertifikasi = $key->id_transaksi;
						?>
							<tr>
								<th>
									<div class="form-group">
										<label for="user">Nama Pelanggan</label>
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
										<label for="user">No.Rekening</label>
										<input type="text" class="form-control" name="no_rekening" value="<?php echo $key->no_rekening; ?>" readonly>
									</div>
								</th>
							</tr>
							<tr>
								<th>
									<div class="form-group">
										<label for="user">Kode Vertifikasi</label>
										<input type="text" class="form-control" name="kode_vertifikasi" value="<?php echo $key->kode_vertifikasi; ?>" readonly>
									</div>
								</th>
								<th>
									<div class="form-group">
										<label for="user">Tanggal Beli</label>
										<input type="text" class="form-control" name="tanggal_transaksi" value="<?php echo $key->tanggal_transaksi; ?>" readonly>
									</div>
								</th>
							</tr>
							<tr>
								<th>
									<div class="form-group">
										<label for="user">Bank</label>
										<input type="text" class="form-control" name="tanggal_transaksi" value="<?php echo $key->bank; ?>" readonly>
									</div>
								</th>
								<th>
									<div class="form-group">
										<?php echo form_open_multipart('admin2/update_ststransaksi'); ?>
											<label for="user">Status</label>
											<input type="hidden" name="id_transaksi" value="<?php echo $key->id_transaksi; ?>">
											<!--<input type="text" class="form-control" name="status" value="<?php echo $key->status; ?>" readonly>-->
											<select class="form-control" name="status">
												<option value="<?php echo $key->status; ?>"><?php echo $key->status; ?></option>
												<option value="DONE">DONE</option>
												<option value="PENDING">PENDING</option>
											</select>
											<button type="submit" class="form-control btn btn-primary">perbarui status</button>
										</form>
									</div>
								</th>
							</tr>
							<?php } ?>
						</thead>
					</table>
				</div>
				<div class="col-md-7">
					<table class="table table-striped">
						<h3>Daftar Pembelian oleh <?php echo $key->nama_pelanggan; ?></h3>
						<thead>
							<tr>
								<th>Barang Beli</th>
								<th>Jumlah Beli</th>
								<th>Total Harga</th>
							</tr>
						</thead>
						<tbody>
						<?php 
						$total =0;
						$where = array('pesanan.id_transaksi' => $kode_vertifikasi );

						$this->db->select('*');
						$this->db->from('pesanan');
						$this->db->join('pengiriman', 'pesanan.id_transaksi = pengiriman.id_transaksi');
						$this->db->where($where);
						$query = $this->db->get()->result();
						//$query = $this->db->query("SELECT * FROM pesanan WHERE id_transaksi='$kode_vertifikasi'")->result();
						foreach ($query as $lue) {
						?>
							<tr>
								<td><?php echo $lue->nama_barang; ?></td>
								<td><?php echo $lue->qty_pesanan; ?></td>
								<td>Rp <?php echo number_format($lue->total_harga,2,',','.'); ?>,-</td>
							</tr>
						<?php $total += $lue->total_harga;
							  $tot_hasil = $total + $lue->biaya;
						} ?>
						</tbody>
						<footer>
							<tr>
								<td colspan="2" align="center">Ongkir</td>
								<td>Rp <?php echo number_format($lue->biaya,2,',','.'); ?></td>
							</tr>
							<tr>
								<td colspan="2" align="center">Sub Total</td>
								<td>Rp <?php echo number_format($tot_hasil,2,',','.'); ?>,-</td>
							</tr>
						</footer>
					</table>
				</div>
			</div>
			<a href="<?php echo base_url('index.php/admin2/viewtransaksi'); ?>" class="btn btn-danger"><span class="fa fa-undo"></span> Kembali</a>
		</div>
	</div>
	<?php $this->load->view('admin/bottom.php'); ?>
</body>
</html>