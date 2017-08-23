<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('admin/top'); ?>
	<title>View Export</title>
</head>
<body>
<div id="wrapper">
	<?php $this->load->view('admin/sidebar'); ?>
	<div id="main-panel">
		<?php $this->load->view('admin/navigasi'); ?>
		<h3><center>Export PDF</center></h3><br>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<a href="<?php echo base_url('index.php/admin/unduh_pdf'); ?>" target="_blank" class="form-control btn btn-danger btn-lg"><span class="fa fa-file-pdf-o"></span> Barang(FULL)</a>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<a href="" class="form-control btn-danger btn btn-lg" data-toggle="modal" data-target="#myModal1"><span class="fa fa-file-pdf-o"></span> Transaksi(Filter)</a>

					<!-- Modal -->
		            <div id="myModal1" class="modal fade" role="dialog">
		                <div class="modal-dialog">
		                <!-- konten modal-->
		              		<div class="modal-content">
		                   	<!-- heading modal -->
		                    	<div class="modal-header">
		                    		<button class="close" data-dismiss="modal">&times;</button>
		                    		<h4 class="modal-title" align="center">Export PDF</h4>
		                    	</div>
		                    	<!-- body modal -->
		                    	<div class="modal-body">
		                    		<form class="form-horizontal" target="_blank" action="<?php echo base_url('index.php/export/unduh_pdf'); ?>" method="POST">
		                    			<div class="form-group">
											<label class="col-sm-2 control-label">Bulan</label>
											<div class="col-sm-10">
												<select name="bulan" class="form-control" name="bulan">
													<option value="">-----Pilih Bulan-----</option>
													<option value="01">Januari</option>
													<option value="02">Febuari</option>
													<option value="03">Maret</option>
													<option value="04">April</option>
													<option value="05">Mei</option>
													<option value="06">Juni</option>
													<option value="07">July</option>
													<option value="08">Agustus</option>
													<option value="09">September</option>
													<option value="10">Oktober</option>
													<option value="11">November</option>
													<option value="12">Desember</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">Email</label>
											<div class="col-sm-10">
												<input type="tahun" class="form-control input-lg" name="tahun" placeholder="Tahun">
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-offset-2 col-sm-10">
												<button type="submit" class="btn btn-primary">kirim</button>
											</div>
										</div>
		                    		</form>
		                    	</div>
		                    </div>
		                </div>
		            </div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<a href="<?php echo base_url('index.php/export/unduh_pdf1'); ?>" target="_blank" class="form-control btn btn-danger btn-lg"><span class="fa fa-file-pdf-o"></span> Pengiriman(FULL)</a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<a href="" class="form-control btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal3"><span class="fa fa-file-pdf-o"></span> Barang(Filter)</a>

					<!-- Modal -->
		            <div id="myModal3" class="modal fade" role="dialog">
		                <div class="modal-dialog">
		                <!-- konten modal-->
		              		<div class="modal-content">
		                   	<!-- heading modal -->
		                    	<div class="modal-header">
		                    		<button class="close" data-dismiss="modal">&times;</button>
		                    		<h4 class="modal-title" align="center">Export PDF</h4>
		                    	</div>
		                    	<!-- body modal -->
		                    	<div class="modal-body">
		                    		<form class="form-horizontal" target="_blank" action="<?php echo base_url('index.php/export/unduh_pdf3'); ?>" method="POST">
		                    			<div class="form-group">
											<label class="col-sm-2 control-label">Kategori</label>
											<div class="col-sm-10">
												<select name="kategori" class="form-control">
														<option>-----Kategori-----</option>
												<?php  
													$data = $this->db->get('kategori')->result();

													foreach ($data as $key) {
												?>
													<option value="<?php echo $key->nama; ?>"><?php echo $key->nama; ?></option>
												<?php } ?>
												</select>
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-offset-2 col-sm-10">
												<button type="submit" class="btn btn-primary">kirim</button>
											</div>
										</div>
		                    		</form>
		                    	</div>
		                    </div>
		                </div>
		            </div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<a href="<?php echo base_url('index.php/admin2/unduh_pdf'); ?>" target="_blank" class="form-control btn btn-danger btn-lg"><span class="fa fa-file-pdf-o"></span> Transaksi(FULL)</a>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<a href="" class="form-control btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal2"><span class="fa fa-file-pdf-o"></span> Pengiriman(Filter)</a>

					<!-- Modal -->
		            <div id="myModal2" class="modal fade" role="dialog">
		                <div class="modal-dialog">
		                <!-- konten modal-->
		              		<div class="modal-content">
		                   	<!-- heading modal -->
		                    	<div class="modal-header">
		                    		<button class="close" data-dismiss="modal">&times;</button>
		                    		<h4 class="modal-title" align="center">Export PDF</h4>
		                    	</div>
		                    	<!-- body modal -->
		                    	<div class="modal-body">
		                    		<form class="form-horizontal" target="_blank" action="<?php echo base_url('index.php/export/unduh_pdf2'); ?>" method="POST">
		                    			<div class="form-group">
											<label class="col-sm-2 control-label">Bulan</label>
											<div class="col-sm-10">
												<select name="bulan" class="form-control">
													<option value="">-----Pilih Bulan-----</option>
													<option value="01">Januari</option>
													<option value="02">Febuari</option>
													<option value="03">Maret</option>
													<option value="04">April</option>
													<option value="05">Mei</option>
													<option value="06">Juni</option>
													<option value="07">July</option>
													<option value="08">Agustus</option>
													<option value="09">September</option>
													<option value="10">Oktober</option>
													<option value="11">November</option>
													<option value="12">Desember</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">Email</label>
											<div class="col-sm-10">
												<input type="tahun" class="form-control input-lg" name="tahun" placeholder="Tahun">
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-offset-2 col-sm-10">
												<button type="submit" class="btn btn-primary">kirim</button>
											</div>
										</div>
		                    		</form>
		                    	</div>
		                    </div>
		                </div>
		            </div>
				</div>
			</div>
		</div>
	</div>
<?php $this->load->view('admin/bottom'); ?>
</div>
</body>
</html>