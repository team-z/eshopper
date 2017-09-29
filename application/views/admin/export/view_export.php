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
		<h3><center>Laporan</center></h3><br>
		<div class="row">
			<section class="content">
			    <div>
			        <?php echo @$pesan; ?>
			    </div>
			</section>
			<div class="col-md-4">
				<a href="" class="form-control btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal1"><span class="fa fa-file-pdf-o"></span> Laporan Barang</a>

					<!-- Modal -->
		            <div id="myModal1" class="modal fade" role="dialog">
		                <div class="modal-dialog">
		                <!-- konten modal-->
		              		<div class="modal-content">
		                   	<!-- heading modal -->
		                    	<div class="modal-header">
		                    		<button class="close" data-dismiss="modal">&times;</button>
		                    		<h4 class="modal-title" align="center">Laporan Barang</h4>
		                    	</div>
		                    	<!-- body modal -->
		                    	<div class="modal-body">
		                    		<form class="form-horizontal" target="_blank" action="<?php echo base_url('index.php/export/laporan_barang'); ?>" method="POST">
		                    			<div class="form-group">
											<label class="col-sm-2 control-label">Kategori</label>
											<div class="col-sm-10">
												<select name="kategori" class="form-control">
														<option>-----Kategori-----</option>
														<option value="semua">Semua</option>
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
											<div class="col-sm-2">
											</div>
											<div class="col-sm-10">
												<label class="radio-inline">
                                                    <input type="radio" name="laporan" value="excel">Excel
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="laporan" value="pdf">PDF
                                                </label>
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
			<div class="col-md-4">
				<a href="" class="form-control btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal2"><span class="fa fa-file-pdf-o"></span> Laporan Transaksi</a>

					<!-- Modal -->
		            <div id="myModal2" class="modal fade" role="dialog">
		                <div class="modal-dialog">
		                <!-- konten modal-->
		              		<div class="modal-content">
		                   	<!-- heading modal -->
		                    	<div class="modal-header">
		                    		<button class="close" data-dismiss="modal">&times;</button>
		                    		<h4 class="modal-title" align="center">Laporan Transaksi</h4>
		                    	</div>
		                    	<!-- body modal -->
		                    	<div class="modal-body">
		                    		<form class="form-horizontal" target="_blank" action="<?php echo base_url('index.php/export/laporan_transaksi'); ?>" method="POST">
		                    			<div class="form-group">
											<label class="col-sm-2 control-label">Bulan</label>
											<div class="col-sm-10">
												<select name="bulan" class="form-control">
														<option>-----Bulan-----</option>
														<option value="semua">Semua</option>
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
											<label class="col-sm-2 control-label">Tahun</label>
											<div class="col-sm-10">
												<select name="tahun" class="form-control">
														<option>-----Tahun-----</option>
														<option value="semua">Semua</option>
														<option value="1990">1990</option>
												     	<option value="1991">1991</option>
												     	<option value="1992">1992</option>
												     	<option value="1993">1993</option>
												     	<option value="1994">1994</option>
												     	<option value="1995">1995</option>
												     	<option value="1996">1996</option>
												     	<option value="1997">1997</option>
												     	<option value="1998">1998</option>
												     	<option value="1999">1999</option>
												     	<option value="2000">2000</option>
												     	<option value="2001">2001</option>
												     	<option value="2002">2002</option>
												     	<option value="2003">2003</option>
												     	<option value="2004">2004</option>
												     	<option value="2005">2005</option>
												     	<option value="2006">2006</option>
												     	<option value="2007">2007</option>
												     	<option value="2008">2008</option>
												     	<option value="2009">2009</option>
												     	<option value="2010">2010</option>
												     	<option value="2011">2011</option>
												     	<option value="2012">2012</option>
												     	<option value="2013">2013</option>
												     	<option value="2014">2014</option>
												     	<option value="2015">2015</option>
												     	<option value="2016">2016</option>
												     	<option value="2017">2017</option>
												     	<option value="2018">2018</option>
												     	<option value="2019">2019</option>
												     	<option value="2020">2020</option>
												     	<option value="2021">2021</option>
												     	<option value="2022">2022</option>
												     	<option value="2023">2023</option>
												     	<option value="2024">2024</option>
												     	<option value="2025">2025</option>
												     	<option value="2026">2026</option>
												     	<option value="2027">2027</option>
												     	<option value="2028">2028</option>
												     	<option value="2029">2029</option>
												     	<option value="2030">2030</option>
												     	<option value="2031">2031</option>
												     	<option value="2032">2032</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-2">
											</div>
											<div class="col-sm-10">
												<label class="radio-inline">
                                                    <input type="radio" name="laporan" value="excel">Excel
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="laporan" value="pdf">PDF
                                                </label>
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
			<div class="col-md-4">
					<a href="" class="form-control btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal3"><span class="fa fa-file-pdf-o"></span> Laporan Pengiriman</a>

					<!-- Modal -->
		            <div id="myModal3" class="modal fade" role="dialog">
		                <div class="modal-dialog">
		                <!-- konten modal-->
		              		<div class="modal-content">
		                   	<!-- heading modal -->
		                    	<div class="modal-header">
		                    		<button class="close" data-dismiss="modal">&times;</button>
		                    		<h4 class="modal-title" align="center">Laporan Pengiriman</h4>
		                    	</div>
		                    	<!-- body modal -->
		                    	<div class="modal-body">
		                    		<form class="form-horizontal" target="_blank" action="<?php echo base_url('index.php/export/laporan_pengiriman'); ?>" method="POST">
		                    			<div class="form-group">
											<label class="col-sm-2 control-label">Bulan</label>
											<div class="col-sm-10">
												<select name="bulan" class="form-control">
														<option>-----Bulan-----</option>
														<option value="semua">Semua</option>
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
											<label class="col-sm-2 control-label">Tahun</label>
											<div class="col-sm-10">
												<select name="tahun" class="form-control">
														<option>-----Tahun-----</option>
														<option value="semua">Semua</option>
														<option value="1990">1990</option>
												     	<option value="1991">1991</option>
												     	<option value="1992">1992</option>
												     	<option value="1993">1993</option>
												     	<option value="1994">1994</option>
												     	<option value="1995">1995</option>
												     	<option value="1996">1996</option>
												     	<option value="1997">1997</option>
												     	<option value="1998">1998</option>
												     	<option value="1999">1999</option>
												     	<option value="2000">2000</option>
												     	<option value="2001">2001</option>
												     	<option value="2002">2002</option>
												     	<option value="2003">2003</option>
												     	<option value="2004">2004</option>
												     	<option value="2005">2005</option>
												     	<option value="2006">2006</option>
												     	<option value="2007">2007</option>
												     	<option value="2008">2008</option>
												     	<option value="2009">2009</option>
												     	<option value="2010">2010</option>
												     	<option value="2011">2011</option>
												     	<option value="2012">2012</option>
												     	<option value="2013">2013</option>
												     	<option value="2014">2014</option>
												     	<option value="2015">2015</option>
												     	<option value="2016">2016</option>
												     	<option value="2017">2017</option>
												     	<option value="2018">2018</option>
												     	<option value="2019">2019</option>
												     	<option value="2020">2020</option>
												     	<option value="2021">2021</option>
												     	<option value="2022">2022</option>
												     	<option value="2023">2023</option>
												     	<option value="2024">2024</option>
												     	<option value="2025">2025</option>
												     	<option value="2026">2026</option>
												     	<option value="2027">2027</option>
												     	<option value="2028">2028</option>
												     	<option value="2029">2029</option>
												     	<option value="2030">2030</option>
												     	<option value="2031">2031</option>
												     	<option value="2032">2032</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-2">
											</div>
											<div class="col-sm-10">
												<label class="radio-inline">
                                                    <input type="radio" name="laporan" value="excel">Excel
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="laporan" value="pdf">PDF
                                                </label>
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
<?php $this->load->view('admin/bottom'); ?>
</div>
</body>
</html>