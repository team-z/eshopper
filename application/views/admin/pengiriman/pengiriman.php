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
									<a href="#" class="btn btn-warning" data-toggle="modal" data-target="#myModal1"><span class="fa fa-arrow-circle-up"></span> Eksport Data</a>	
								
		                        <!-- Modal -->
		                        <div id="myModal1" class="modal fade" role="dialog">
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
			                        						<a href="<?php echo base_url('index.php/admin3/unduh_excel'); ?>" class="btn btn-success form-control"><span class="fa fa-download"></span> Unduh Versi Excel</a>
			                        					</div>
			                        					<div class="col-md-6">
			                        						<a href="<?php echo base_url('index.php/admin3/unduh_pdf'); ?>" class="btn btn-danger form-control"><span class="fa fa-download"></span> Unduh Versi PDF</a>
			                        					</div>
		                        					</div>
		                        				</div>
		                                    </div>
		                                 </div>
		                            </div>
		                        </div>
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
									<a href="<?php echo base_url('index.php/admin3/detail_pengiriman/').$key->id_transaksi; ?>" class="btn btn-default"><span></span> Detail</a>
									<a href="<?php echo base_url('index.php/admin3/deletepengiriman/').$key->id_transaksi; ?>" class="btn btn-danger"><span class="fa fa-trash-o"></span> Hapus</a>
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
		</div>
	</div>
	<?php $this->load->view('admin/bottom.php'); ?>
</body>
</html>