<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('admin/top.php'); ?>
	<title>Update Foto Admin</title>
</head>
<body>
	<div id="wrapper">
	<?php $this->load->view('admin/sidebar.php'); ?>
		<div id="main-panel">
			<?php $this->load->view('admin/navigasi.php'); ?>
			<div class="row">
				<div class="col-md-4">
					
				</div>
				<div class="col-md-3">
				<h3>Update Foto Admin</h3><br>
					<div class="form-group">
						<?php echo form_open_multipart('admin/update_imgadmn'); ?>
							<input type="hidden" name="id_admin" value="<?php echo $this->session->userdata('id_admin'); ?>">
							<?php foreach ($img as $key) {?>

							<img id="preview" src="<?php $image = $key->image; if ($image == "") {
				                                  echo base_url('uploads/f11.jpg');
				                              } else {
				                                  echo base_url('uploads/'.$image);
				                              } ?>" height="200" width="200" class="img-circle" alt="User Image"/>

							<input accept="image/*" class="input"  onchange="tampilkanPreview(this,'preview')" type="file" name="gambar">

							<?php } ?>
							<button type="submit" class="btn btn-block btn-primary"><span class="fa fa-floppy-o"></span> Simpan Perubahan</button>
							<a href="<?php echo base_url('index.php/admin/profil_admin/').$this->session->userdata('id_admin'); ?>" class="btn btn-block btn-danger"><span class="fa fa-undo"></span> Keluar</a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $this->load->view('admin/bottom.php'); ?>
</body>
</html>