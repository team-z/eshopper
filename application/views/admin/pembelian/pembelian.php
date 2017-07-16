<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('admin/top.php'); ?>
	<title>Pembelian</title>
</head>
<body>
	<div id="wrapper">
		<?php $this->load->view('admin/sidebar.php'); ?>
		<div id="main-panel">
			<?php $this->load->view('admin/navigasi.php'); ?>

			<h1><center>Pembelian Barang</center></h1>
			<table class="table table-striped">
				<thead>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td>
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
			                        						<a href="<?php echo base_url('index.php/admin4/unduh_excel'); ?>" class="btn btn-success form-control"><span class="fa fa-download"></span> Unduh Versi Excel</a>
			                        					</div>
			                        					<div class="col-md-6">
			                        						<a href="<?php echo base_url('index.php/admin4/unduh_pdf'); ?>" class="btn btn-danger form-control"><span class="fa fa-download"></span> Unduh Versi PDF</a>
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
						<th>Nama Pembeli</th>
						<th>Barang Beli</th>
						<th>Jumlah Beli</th>
						<th>Total Harga</th>
						<th>Opsi</th>
					</tr>
				</thead>
				<tbody>
				<?php $no=1; foreach ($pemb as $key) {?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $key->nama_pembeli; ?></td>
						<td><?php echo $key->barang_pembeli; ?></td>
						<td><?php echo $key->qty_pembeli; ?></td>
						<td>Rp. <?php echo number_format($key->total_harga,2,',','.'); ?>,-</td>
						<td>
							<a href="<?php echo base_url('index.php/admin4/hapuspembelian/').$key->id_pembelian; ?>" class="btn btn-danger" onclick="return confirm ('Hapus <?php echo $key->nama_pembeli;?> ini ?');"title="Hapus"><span class="fa fa-trash-o"></span> Hapus</a>
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
			<ul class="pagination">
				<?php echo $this->pagination->create_links(); ?>
			</ul>
		</div>
	</div>
<?php $this->load->view('admin/bottom.php'); ?>
</body>
</html>