<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('admin/top.php'); ?>
	<title>Transaksi</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/css/print.css'); ?>" media="print">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/css/style.css'); ?>" media="screen">
	<script>
        (function($) {
            // fungsi dijalankan setelah seluruh dokumen ditampilkan
            $(document).ready(function(e) {
                 
                // aksi ketika tombol cetak ditekan
                $("#cetak").bind("click", function(event) {
                    // cetak data pada area <div id="#data-mahasiswa"></div>
                    $('#transaksi').printArea();
                });
            });
        }) (jQuery);
    </script>
</head>
<body>
	<div id="wrapper">
		<?php $this->load->view('admin/sidebar.php'); ?>
		<div id="main-panel">
			<?php $this->load->view('admin/navigasi.php'); ?>

			<h1><center>Transaksi</center></h1>
			<div id="transaksi">
			<div class="title">
				<center>
					<b></b> E-shopper<br>
					Loe Pasti Puas<br>
					MASCITRA.COM<br>
					Jl.Bungur N0.130, Gebang, Kec.Patrang, Kab.Jember<br>
					<hr size="2px" color="black" style="padding-bottom: 10px">
					<hr size="6px" color="black">
				</center>
			</div><br>
			<table class="table table-striped">
				<thead>
					<tr class="action">
						<td colspan="3">
							<form action="<?php echo base_url('index.php/admin2/cari_transaksi'); ?>" method="GET">
								<div class="input-group">
							      <input type="text" name="key" class="form-control">
							      <span class="input-group-btn">
							        <button class="btn btn-default" type="submit"><span class="fa fa-search"></span></button>
							      </span>
							    </div>
							</form>
						</td>
						<td></td>
						<td>
							<button id="cetak" target="_blank" class="btn btn-warning"><span class="fa fa-file-pdf-o"></span> Cetak PDF</button>
						</td>
						<td>
							<div class="row">

							
								<div class="form-group">
									<a href="<?php echo base_url('index.php/admin2/hapus_semua'); ?>" class="btn btn-danger"  onclick="return confirm ('Anda yakin ini menghapus semua data ini ?');"title="Hapus"><span class="fa fa-trash-o"></span> Hapus Semua</a>
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<th>No.</th>
						<th>No.Pesanan</th>
						<th>Kode Vertifikasi</th>
						<th>Nama Pelanggan</th>
						<th>Status</th>
						<th class="action">Opsi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if (empty($transaksi)) {
					?>
					<tr>
						<td colspan="6">Data tidak ditemukan</td>
					</tr>
					<?php
					} else {
						# code...
					}
					
						$no=1; 
						foreach ($transaksi as $isi) {
					?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $isi->no_pesanan; ?></td>
						<td><?php echo $isi->kode_vertifikasi; ?></td>
						<td><?php echo $isi->nama_pelanggan; ?></td>
						<td><?php echo $isi->status; ?></td>
						<td class="action">
							<a href="<?php echo base_url('index.php/admin2/dtltransaksi/').$isi->id_transaksi; ?>" class="btn btn-default"><span></span> Detail</a>
							<a href="" class="btn btn-info"  data-toggle="modal" data-target="#myModal<?= $no?>"><span class="fa fa-truck"></span> Pengiriman</a>	
							<!-- Modal -->
		                        <div id="myModal<?= $no ?>" class="modal fade" role="dialog">
		                        	<div class="modal-dialog">
		                            <!-- konten modal-->
		                    			<div class="modal-content">
		                    				<!-- heading modal -->
		                                    <div class="modal-header">
		                    					<button class="close" data-dismiss="modal">&times;</button>
		                    					<h4 class="modal-title" align="center">Pengiriman</h4>
		                                    </div>
		                                    <!-- body modal -->
		                                    <div class="modal-body">
		                        				<div class="row">
		                        				<h5>Pengiriman yang dilakukan oleh <i><?= $isi->nama_pelanggan ?></i> dikirim ke alamat dibawah ini</h5>
		                        					<div class="form-group">
		                        						<table>
		                        							<thead>
		                        								<tr>
								                                	<th colspan="2">
																		<div class="form-group">
																			<label for="user">Provinsi</label>
																			<input type="text" class="form-control" name="provinsi" value="<?php echo $isi->provinsi; ?>" readonly>
																		</div>
																	</th>
																</tr>
																<tr>
																	<th colspan="2">
																		<div class="form-group">
																			<label for="user">Kabupaten</label>
																			<input type="text" class="form-control" name="kabupaten" value="<?php echo $isi->kabupaten_kota; ?>" readonly>
																		</div>
																	</th>
																</tr>
																<tr>
																	<th colspan="1">
																		<div class="form-group">
																			<label for="user">Kecamatan</label>
																			<input type="text" class="form-control" name="kecamatan" value="<?php echo $isi->kecamatan; ?>" readonly>
																		</div>
																	</th>
																	<th>
																		<div class="form-group">
																			<label for="user">Kelurahan</label>
																			<input type="text" class="form-control" name="kelurahan" value="<?php echo $isi->kelurahan; ?>" readonly>
																		</div>
																	</th>
																</tr>
																<tr>
																	<th colspan="1">
																		<div class="form-group">
																			<label for="user">Kode Pos</label>
																			<input type="text" class="form-control" name="kode_pos" value="<?php echo $isi->kodepos; ?>" readonly>
																		</div>
																	</th>
																	<th>
																		<div class="form-group">
																			<label for="user">Ongkir</label>
																			<input type="text" class="form-control" name="ongkir" value="Rp.<?php echo number_format($isi->biaya,2,'.',','); ?> ,-" readonly>
																		</div>
																	</th>
																</tr>
																<tr>
																</tr>
																<tr>
																	<th colspan="2">
																		<div class="form-group">
																			<label for="user">Alamat Lengkap Pengiriman</label>
																			<textarea class="form-control" name="alamat_lengkap" readonly><?php echo $isi->alamat_lengkap; ?></textarea>
																		</div>
																	</th>
																</tr>
		                        							</thead>
		                        						</table>
		                        					</div>	
		                        				</div>
		                                    </div>
		                                 </div>
		                            </div>
		                        </div>	
							<a href="<?php echo base_url('index.php/admin2/hapustransaksi/').$isi->id_transaksi; ?>" class="btn btn-danger" onclick="return confirm ('Hapus Data ini ?');"title="Hapus"><span class="fa fa-trash-o"></span> Hapus</a>
						</td>
					</tr>
					<?php  }?>
				</tbody>
			</table>
			</div>
			<ul class="pagination">
				<?php echo $this->pagination->create_links(); ?>
			</ul>
		</div>
	</div>
	<?php $this->load->view('admin/bottom.php'); ?>
</body>
</html>