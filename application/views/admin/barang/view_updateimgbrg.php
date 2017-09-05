<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('admin/top.php'); ?>
	<title>Update Image Barang</title>
</head>
<body>
	<div id="wrapper">
		<?php $this->load->view('admin/sidebar.php'); ?>
		<div id="main-panel">
			<?php $this->load->view('admin/navigasi.php'); ?>

			<div class="row">
			<h3 align="center">Update Image Barang</h3><br><br>
				<div class="col-md-4">
					
				</div>
				<div class="col-md-4">
					<?php echo form_open_multipart('admin/update_image'); ?>
						<?php foreach ($view as $key) {?>
							<input type="hidden" name="id_barang" value="<?php echo $key->id_barang; ?>">
							<input type="hidden" name="image" value="<?php echo $key->image; ?>">
							<img id="preview" src="<?php if ($key->image == "") {
			                                   echo base_url('uploads/barang.jpg');
			                               } else {
			                                   echo base_url('uploads/'.$key->image);
			                               } ?>" height="200" width="200" class="img-circle" alt="User Image"/>
			                   <input accept="image/*" class="input"  onchange="tampilkanPreview(this,'preview')" type="file" name="gambar" value="">
						<?php } ?>
						<div class="form-group">
							<button type="submit" class="btn btn-block btn-primary"><span class="fa fa-floppy-o"></span> Simpan Perubahan</button>
							<a href="<?php echo base_url('index.php/admin/edit/'.$key->id_barang); ?>" class="btn btn-block btn-danger" ><span class="fa fa-undo"></span> Keluar</a>
						</div>
					</form>
				</div>
			</div>

		</div>
	</div>
<?php $this->load->view('admin/bottom.php'); ?>
</body>
</html>