<!DOCTYPE html>
<html>
<head>
	<?php include "top.php"; ?>
	<title>Akun Admin</title>
</head>
<body>
	<div id="wrapper">
		<?php include "sidebar.php"; ?>
		<div id="main-panel">
			<?php include "navigasi.php"; ?>

			<div class="row">
				<?php foreach ($admin as $key) {?>
				<div class="col-md-4">
					<img id="preview" src="<?php $image = $key->image; if ($image == "") {
		                                  echo base_url('uploads/f11.jpg');
		                              } else {
		                                  echo base_url('uploads/'.$image);
		                              } ?>" height="200" width="200" class="img-circle" alt="User Image"/>
					<!--<input accept="image/*" class="input"  onchange="tampilkanPreview(this,'preview')" type="file" name="gambar">-->
					<a href="<?php echo base_url('index.php/admin/view_imgadmn/').$this->session->userdata('id_admin'); ?>" class="btn btn-default"><span class="fa fa-picture-o"></span> Update Gambar</a>
				</div>
				<?php echo form_open_multipart('admin/edit_admin'); ?>
				<div class="col-md-8">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>
									<div class="form-group">
										<label for="user">Nama 	Lengkap</label>
										<input type="hidden" name="id_admin" value="<?php echo $this->session->userdata('id_admin'); ?>">

										<input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap" value="<?php echo $key->nama_lengkap; ?>">
									</div>
								</th>
								<th>
									<div class="form-group">
										<label for="user">Username</label>
										<input type="text" class="form-control" name="nama_user" placeholder="Username" value="<?php echo $key->nama_user; ?>">
									</div>
								</th>
								<th>
									<div class="form-group">
										<label for="user">Password</label>
										<input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo $key->password; ?>">
									</div>
								</th>
							</tr>
							<tr>
								<th>
									<div class="form-group">
										<label for="user">Tempat Kelahiran</label>
										<input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Kelahiran" value="<?php echo $key->tempat_lahir; ?>">
									</div>
								</th>
								<th>
									<div class="form-group">
										<label for="user">Tanggal Lahir</label>
										<input type="date" class="form-control" name="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo $key->tanggal_lahir; ?>">
									</div>
								</th>
								<th>
									<div class="form-group">
										<label for="user">No. Handphone</label>
										<input type="text" class="form-control" name="no_hp" placeholder="No. Handphone" value="<?php echo $key->no_hp; ?>">
									</div>
								</th>
							</tr>
							<tr>
								<th>
									<div class="form-group">
										<label for="user">No. Telepon</label>
										<input type="text" class="form-control" name="no_telepon" placeholder="No. Telepon" value="<?php echo $key->no_telepon; ?>">
									</div>
								</th>
								<th>
									<div class="form-group">
										<label for="user">Email</label>
										<input type="text" class="form-control" name="email" placeholder="email" value="<?php echo $key->email; ?>">
									</div>
								</th>
							</tr>
							<tr>
								<th>
									<div class="form-group">
										<label for="user">Alamat Lengkap</label>
										<textarea class="form-control" name="alamat_lengkap" placeholder="Alamat Lengkap Admin"><?php echo $key->alamat_lengkap; ?></textarea>
									</div>
								</th>
							</tr>
						</thead>
					</table>
					<button type="" class="btn btn-primary"><span class="fa fa-floppy-o"></span> Simpan Perubahan</button>
					<a href="<?php echo base_url('index.php/admin/index'); ?>" class="btn btn-danger"><span class="fa fa-undo"></span> Keluar</a>
				</div>
				</form>
			</div>
			<?php } ?>
		</div>
	</div>
<?php include "bottom.php"; ?>
</body>
</html>