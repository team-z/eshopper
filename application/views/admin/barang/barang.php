<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('admin/top.php'); ?>
	<title>Barang</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/css/print.css'); ?>" media="print">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/css/style.css'); ?>" media="screen">
	<script>
        (function($) {
            // fungsi dijalankan setelah seluruh dokumen ditampilkan
            $(document).ready(function(e) {
                 
                // aksi ketika tombol cetak ditekan
                $("#cetak").bind("click", function(event) {
                    // cetak data pada area <div id="#data-mahasiswa"></div>
                    $('#barang').printArea();
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
			
			<h2><center>BARANG</center></h2>
			<div id="barang">
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
							<form action="<?php echo base_url('index.php/admin/cari_barang'); ?>" method="GET">
								<div class="input-group">
							      <input type="text" name="key" class="form-control">
							      <span class="input-group-btn">
							        <button class="btn btn-default" type="submit"><span class="fa fa-search"></span></button>
							      </span>
							    </div>
							</form>
						</td>
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
						<td>
							<div class="row">	
							<div class="form-group">
								<a href="<?php echo base_url('index.php/admin/viewimport'); ?>" class="btn btn-success"><span class="fa fa-arrow-circle-down"></span> Import Data</a>

								<button id="cetak" target="_blank" class="btn btn-warning"><span class="fa fa-file-pdf-o"></span> Cetak PDF</button>
							</div>
						</td>
					</tr>
					<tr>
						<th>No.</th>
						<th>Nama Barang</th>
						<th>Kategori</th>
						<th>Harga</th>
						<th>Stok</th>
						<th>Suplier</th>
						<th class="action">Opsi</th>
					</tr>
				</thead>
				<tbody>
				<?php
				if (empty($barang)) {
				?>
					<tr>
						<td colspan="7">data tidak ditemukan</td>
					</tr>
				<?php
				}
				
				$no=$this->uri->segment('3') + 1; 
				foreach ($barang as $isi) {
				?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $isi->nama_barang; ?></td>
						<td><?php echo $isi->kategori; ?></td>
						<td>Rp.<?php echo number_format($isi->harga_barang,2,'.',','); ?> ,-</td>
						<td><?php echo $isi->qty; ?></td>
						<td><?php echo $isi->suplier; ?></td>
						<td class="action">
							<a href="<?php echo base_url('index.php/admin/edit/').$isi->id_barang; ?>" class="btn btn-default"><span></span> Detail</a>
							<a href="<?php echo base_url('index.php/admin/hapus/').$isi->id_barang; ?>" class="btn btn-danger" onclick="return confirm ('Hapus <?php echo $isi->nama_barang;?> ini ?');"title="Hapus"><span class="fa fa-trash-o"></span> Hapus</a>
						</td>
					</tr>
				</tbody>
				<?php } ?>
			</table>
			</div>
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