<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('admin/top.php'); ?>
	<title>Transaksi</title>
</head>
<body>
	<div id="wrapper">
		<?php $this->load->view('admin/sidebar.php'); ?>
		<div id="main-panel">
			<?php $this->load->view('admin/navigasi.php'); ?>
			<h1><center>Transaksi</center></h1>
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
			                        						<a href="<?php echo base_url('index.php/admin2/unduh_excel'); ?>" class="btn btn-success form-control"><span class="fa fa-download"></span> Unduh Versi Excel</a>
			                        					</div>
			                        					<div class="col-md-6">
			                        						<a href="<?php echo base_url('index.php/admin2/unduh_pdf'); ?>" class="btn btn-danger form-control"><span class="fa fa-download"></span> Unduh Versi PDF</a>
			                        					</div>
		                        					</div>
		                        				</div>
		                                    </div>
		                                 </div>
		                            </div>
		                        </div>
		                        <div class="row">
		                        	<div class="col-md-4"></div>
		                        	<div class="col-md-offset-9">
		                        		<a href="#" class="btn btn-warning" data-toggle="modal" data-target="#myModal"><span class="fa fa-arrow-circle-up"></span> Eksport Data</a>
		                        		<a href="#" class="btn btn-success" data-toggle="modal" data-target="#myModal"><span class="fa fa-arrow-circle-down"></span> Import Data</a>	
		                        	</div>
		                        </div><br>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>No.</th>
						<th>Tanggal Beli</th>
						<th>Nama Pelanggan</th>
						<th>Jumlah Bli</th>
						<th>Status</th>
						<th>Opsi</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$no=1; 
						foreach ($transaksi as $isi) {
					?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $isi->tgl_beli; ?></td>
						<td><?php echo $isi->nama_pelanggan; ?></td>
						<td>Rp <?php echo number_format($isi->total_beli,2,',','.'); ?></td>
						<td>
						<?php if ($isi->status!='Done') { ?>
						<div style="background-color: red;color: white;padding: 3px;"><?php echo $isi->status ; ?></div>
						<?php }elseif($isi->status='Done'){ ?>
						<div style="background-color: green;color: white;padding: 3px;"><?php echo $isi->status ; ?></div>
						<?php } ?>
						</td>
						<td>
							<a href="<?php echo base_url('index.php/admin2/dtltransaksi/').$isi->id_transaksi; ?>" class="btn btn-default"><span></span> Detail</a>		
							<a href="<?php echo base_url('index.php/admin2/hapustransaksi/').$isi->id_transaksi; ?>" class="btn btn-danger"><span class="fa fa-trash-o"></span> Hapus</a>
						</td>
					</tr>
					<?php  }?>
				</tbody>
			</table>
		</div>
	</div>
	<?php $this->load->view('admin/bottom.php'); ?>
</body>
</html>