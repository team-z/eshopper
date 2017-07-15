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
			<div class="row">
				<div class="col-md-5">
					<div class="form-group">
						<a href="<?php echo base_url('index.php/admin/tambahbarang'); ?>" class="btn btn-primary"><span class="fa fa-plus-square"></span> Tambah Barang</a>
						<a href="#my" data-target="#my" data-toggle="modal" class="btn btn-default"><i class="fa fa-plus"></i> Tambah Kategori Barang</a>
					</div>
				</div>
				<div class="col-md-2">
				</div>
				<div class="col-md-5">
					<div class="form-group">
								<a href="#myModal" class="btn btn-warning" data-toggle="modal" data-target="#myModal"><span class="fa fa-arrow-circle-up"></span> Eksport Data</a>	
								<a href="" class="btn btn-danger"><i class="fa fa-table"></i> Lihat Stok</a>
								<a href="<?php echo base_url('index.php/admin/viewimport'); ?>" class="btn btn-success"><span class="fa fa-arrow-circle-down"></span> Import Data</a>
								<!-- Modal -->
		                        <div id="my" class="modal fade" role="dialog">
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
		                        					<div class="form-group">
		                        						<input type="text" class="form-control" placeholder="Masukkan Kategori Baru" name="kategori">
		                        					</div>
		                        					<button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</button>
		                        				</form>
		                        		    </div>
		                                 </div>
		                            </div>
		                        </div>						
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
			</div>
			</div>
			<table class="table table-striped">
				<thead>
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
							<a href="<?php echo base_url('index.php/admin/edit/').$isi->id_barang; ?>" class="btn btn-primary"><span class="fa fa-refresh"></span> Update</a>
							<a href="<?php echo base_url('index.php/admin/edit/').$isi->id_barang; ?>" class="btn btn-default"><span></span> Detail</a>
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