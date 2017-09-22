<html>
<head>
	<?php $this->load->view('admin/top'); ?>
	<title>Iklan</title>
</head>
<body>
	<div id="wrapper">
		<?php $this->load->view('admin/sidebar'); ?>
		<div id="main-panel">
			<?php $this->load->view('admin/navigasi'); ?>

			<div class="row">
				<div class="panel panel-info">
					<div class="panel panel-heading">
						<h2><center>Iklan</center></h2>
					</div>
					<div class="panel panel-body">
					 <a href="<?php echo base_url('index.php/iklan/view_hapus'); ?>" align="left" class="btn btn-default"><span class="fa fa-trash-o"></span> hapus Iklan</a>
						<div class="row" align="center">
							 <section class="content">
					            <div>
					                <?php echo @$pesan; ?>
					            </div>
					        </section>
							<div class="form-group">
								<!--<form action="<?php echo base_url('index.php/iklan/in_iklan'); ?>" method="POST" >-->

								<?php echo form_open_multipart('iklan/in_iklan');?>
									<img id="preview" src="<?php echo base_url('./assets/images/icon_ad.png'); ?>" height="300" width="500" alt="User Image"/>
					                <input accept="image/*" class="input btn"  onchange="tampilkanPreview(this,'preview')" type="file" name="gambar" value="">
					                <div class="col-md-3">
					                	
					                </div>
					                <div class="col-md-6">
						                <select name="posisi" class="form-control">
						                	<option>letakkan gambar pada tempat yang sesuai</option>
						                	<option value="gambar1">gambar iklan 1</option>
						                	<option value="gambar2">gambar iklan 2</option>
						                	<option value="gambar3">gambar iklan 3</option>
						                	<option value="gambar4">gambar iklan 4</option>
						                	<option value="banner1">banner iklan 1</option>
						                	<option value="banner2">banner iklan 2</option>
						                	<option value="banner3">banner iklan 3</option>
						                </select>
					                	<button type="submit" class="btn btn-block btn-info"><span class="fa fa-floppy-o"></span> Simpan Perubahan</button>
					                </div>
					                <div class="col-md-3">
					                	
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
</body>
</html>