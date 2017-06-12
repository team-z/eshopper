<!DOCTYPE html>
<html>
<head>
	<title>Pengiriman</title>
	<?php $this->load->view('admin/top.php'); ?>
</head>
<body>
	<div id="wrapper">
		<?php $this->load->view('admin/sidebar.php'); ?>
		<div id="main-panel">
			<?php $this->load->view('admin/navigasi.php'); ?>

			<div class="row">
				<div class="">
				<h1><center>Pengiriman</center></h1>
					<table class="table table-striped">
						<thead>
							<tr>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th>
									<a href="" class="btn btn-warning"><span class="fa fa-arrow-circle-up"></span> Eksport</a>
								</th>
							</tr>
							<tr>
								<th>No.</th>
								<th>Id Transaksi</th>
								<th>Nama Pelanggan</th>
								<th>Tanggal Beli</th>
								<th>Opsi</th>
							</tr>
						</thead>
						<tbody>
						<?php $no=1; foreach ($data as $key) {?>
							<tr>
								<td><?php echo $no++; ?></td>
								<td><?php echo $key->id_transaksi; ?></td>
								<td><?php echo $key->nama_pelanggan; ?></td>
								<td><?php echo $key->tanggal; ?></td>
								<td>
									<a href="" class="btn btn-default" data-toggle="modal" data-target="#myModal">Detail</a>
		                             <!-- Modal -->
		                            <div id="myModal" class="modal fade" role="dialog">
		                                <div class="modal-dialog">
		                                    <!-- konten modal-->
		                                    <div class="modal-content">
		                                        <!-- heading modal -->
		                                        <div class="modal-header">
		                                            <button class="close" data-dismiss="modal">&times;</button>
		                                            <h4 class="modal-title" align="center">Detail Alamat Pengiriman</h4>
		                                        </div>
		                                        <!-- body modal -->
		                                        <div class="modal-body">
		                        					<div class="row">
		                        						<div class="form-group">
		                        							<label for="user">Provinsi</label>
		                        							<input type="text" class="form-control" value="<?= $key->provinsi ?>" readonly>

		                        							<label for="user">Kabupaten/Kota</label>
		                        							<input type="text" class="form-control" value="<?= $key->kabupaten_kota ?>" readonly>

		                        							<label for="user">Kecamatan</label>
		                        							<input type="text" class="form-control" value="<?= $key->kecamatan ?>" readonly>

		                        							<label for="user">Kode Pos</label>
		                        							<input type="text" class="form-control" value="<?= $key->kodepos ?>" readonly>

		                        							<label for="user">Alamat Lengkap</label>
		                        							<textarea class="form-control" readonly=""><?= $key->alamat_lengkap ?></textarea>
		                        						</div>
		                        					</div>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
									<a href="<?php echo base_url('index.php/admin3/deletepengiriman/').$key->id_transaksi; ?>" class="btn btn-danger"><span class="fa fa-trash-o"></span> Hapus</a>
								</td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
				</div>
		</div>
	</div>
	<?php $this->load->view('admin/bottom.php'); ?>
</body>
</html>