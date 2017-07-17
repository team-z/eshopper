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
						<td>
							<div class="form-group">
								<a href="#" data-toggle="modal" data-target="#kategori" class="btn btn-default"><span class="fa fa-plus-square"></span> Tambah Kategori</a>
							</div>
						</td>
						<td>&nbsp</td>
						<td>&nbsp</td>
						<td>&nbsp</td>
						<td>
							<div class="row">	
							<div class="form-group">
								<a href="<?php echo base_url('index.php/admin/viewimport'); ?>" class="btn btn-success"><span class="fa fa-arrow-circle-down"></span> Import Data</a>

								<a href="#" class="btn btn-warning" data-toggle="modal" data-target="#myModal"><span class="fa fa-arrow-circle-up"></span> Eksport Data</a>	
								
		                        <!-- Modal -->
		                        <div id="myModal" class="modal fade" role="dialog">
		                        	<div class="modal-dialog">
		                            <!-- konten modal-->
		                    			<div class="modal-content">
		                    				<!-- heading modal -->
		                                    <div class="modal-header">
		                    					<button class="close" data-dismiss="modal">&times;</button>
		                    					<h4 class="modal-title" align="center">Ekspor Data</h4>
		                                    </div>
		                                    <!-- body modal -->
		                                    <div class="modal-body">
		                        				<div class="row">
		                        					<div class="form-group">
			                        					<div class="col-md-6">
			                        						<a href="<?php echo base_url('index.php/admin/unduh_excel'); ?>" class="btn btn-success form-control"><span class="fa fa-download"></span> Unduh Versi Excel</a>
			                        					</div>
			                        					<div class="col-md-6">
			                        						<a href="<?php echo base_url('index.php/admin/unduh_pdf'); ?>" class="btn btn-danger form-control"><span class="fa fa-download"></span> Unduh Versi PDF</a>
			                        					</div>
		                        					</div>
		                        				</div>
		                                    </div>
		                                 </div>
		                            </div>
		                        </div>
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
				$no=$this->uri->segment('3') + 1; 
				foreach ($barang as $isi) {
				?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $isi->nama_barang; ?></td>
						<td><?php echo $isi->kategori; ?></td>
						<td>Rp.<?php echo number_format($isi->harga_barang,2,'.',','); ?> ,-</td>
						<td><?php echo $isi->suplier; ?></td>
						<td>
							<a href="<?php echo base_url('index.php/admin/edit/').$isi->id_barang; ?>" class="btn btn-default"><span></span> Detail</a>
							<a href="<?php echo base_url('index.php/admin/hapus/').$isi->id_barang; ?>" class="btn btn-danger" onclick="return confirm ('Hapus <?php echo $isi->nama_barang;?> ini ?');"title="Hapus"><span class="fa fa-trash-o"></span> Hapus</a>
						</td>
					</tr>
				</tbody>
				<?php } ?>
			</table>
			<ul class="pagination">
				<?php echo $this->pagination->create_links(); ?>
			</ul>
		</div>
	</div>
	<?php $this->load->view('admin/bottom'); ?>
	<!-- Modal -->
		                        <div id="kategori" class="modal fade" role="dialog">
		                        	<div class="modal-dialog">
		                            <!-- konten modal-->
		                    			<div class="modal-content">
		                    				<!-- heading modal -->
		                                    <div class="modal-header">
		                    					<button class="close" data-dismiss="modal">&times;</button>
		                    					<h4 class="modal-title" align="center">Tambah Kategori</h4>
		                                    </div>
		                                    <!-- body modal -->
		                                    <div class="modal-body">
		                        				<form method="post" action="<?php echo base_url('index.php/admin/tambahkategori'); ?>">
		                        					<label class="label-control">Masukkan Kategori Baru</label>
		                        					<div class="form-group">
		                        						<input type="text" class="form-control" placeholder="Nama Kategori" name="kategori">
		                        					</div>
		                        					<div class="form-group">
		                        						<button type="submit" class="btn btn-primary">Tambahkan !</button>
		                        					</div>
		                        				</form>
		                                    </div>
		                                 </div>
		                            </div>
		                        </div>
</body>
</html>