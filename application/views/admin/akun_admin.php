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
				<form enctype="" method="" action="">
					<div class="col-md-4">
						<img id="preview" src="" height="200" width="200" class="img-circle" alt="User Image"/>
						<input accept="image/*" class="input"  onchange="tampilkanPreview(this,'preview')" type="file" name="gambar">
					</div>
					<div class="col-md-8">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>
										<div class="form-group">
											<label for="user">Nama 	Lengkap</label>
											<input type="hidden" name="id_admin" value="">
											<input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap" value="<?php  ?>">
										</div>
									</th>
									<th>
										<div class="form-group">
											<label for="user">Username</label>
											<input type="text" class="form-control" name="nama_user" placeholder="Username" value="<?php echo $this->session->userdata('nama_user'); ?>">
										</div>
									</th>
									<th>
										<div class="form-group">
											<label for="user">Password</label>
											<input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo $this->session->userdata('password'); ?>">
										</div>
									</th>
								</tr>
								<tr>
									<th>
										<div class="form-group">
											<label for="user">Tempat Kelahiran</label>
											<input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Kelahiran" value="<?php echo $this->session->userdata('tempat_lahir');; ?>">
										</div>
									</th>
									<th>
										<div class="form-group">
											<label for="user">Tanggal Lahir</label>
											<input type="text" class="form-control" name="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php  ?>">
										</div>
									</th>
									<th>
										<div class="form-group">
											<label for="user">No. Handphone</label>
											<input type="text" class="form-control" name="no_hp" placeholder="No. Handphone" value="">
										</div>
									</th>
								</tr>
								<tr>
									<th>
										<div class="form-group">
											<label for="user">No. Telepon</label>
											<input type="text" class="form-control" name="no_telepon" placeholder="No. Telepon" value="">
										</div>
									</th>
									<th>
										<div class="form-group">
											<label for="user">Email</label>
											<input type="text" class="form-control" name="email" placeholder="email" value="">
										</div>
									</th>
								</tr>
								<tr>
									<th>
										<div class="form-group">
											<label for="user">Alamat Lengkap</label>
											<textarea class="form-control" name="alamat_lengkap" placeholder="Alamat Lengkap Admin"><?php  ?></textarea>
										</div>
									</th>
								</tr>
							</thead>
						</table>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php include "bottom.php"; ?>
</body>
</html>