<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('admin/top'); ?>
</head>
<body>
<div id="content">
	<div class="container-fluid">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Profile Toko</h3>
					<span class="text-grey">Isi form dibawah</span>
				</div>
				<?php foreach ($toko as $lue) {?>
				<div class="panel-body">
					<form action="<?php echo base_url('index.php/opsi_pengaturan/update_profile'); ?>" method="POST">
						<input type="hidden" name="id" value="<?php echo $lue->id; ?>">
							<div class="form-group">
								<label for="">Nama Toko</label>
								<input type="text" name="nama_toko" class="form-control input-lg" placeholder="masukkan Nama Toko Anda" value="<?php echo $lue->nama_toko; ?>" size="15" maxlength="20">
							</div>
							<div class="row">
								<div class="form-group">
									<div class="col-xs-4">
										<label for="">Whatapps</label>
										<input type="text" name="wa" class="form-control input-lg" placeholder="masukkan No. Whatapps anda" value="<?php echo $lue->wa; ?>">
									</div>
									<div class="col-xs-4">
										<label for="">BBM</label>
										<input type="text" name="bbm" class="form-control input-lg" placeholder="masukkan Pin BBM anda" value="<?php echo $lue->bbm; ?>">
									</div>
									<div class="col-xs-4">
										<label for="">Line</label>
										<input type="text" name="line" class="form-control input-lg" placeholder="masukkan Id Line" value="<?php echo $lue->line; ?>">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="">Instagram</label>
								<input type="text" name="instagram" class="form-control input-lg" placeholder="@nama_instagramu" value="<?php echo $lue->instagram; ?>">
							</div>
							<div class="form-group">
								<label for="">Facebook</label>
								<input type="text" name="facebook" class="form-control input-lg" placeholder="masukkan nama facebook anda" value="<?php echo $lue->facebook; ?>">
							</div>
							<div class="form-group">
								<label for="">Lokasi Sekarang</label>
								<input type="text" name="lokasi_sekarang" class="form-control input-lg" placeholder="Lokasi Terbaru Toko anda saat ini" value="<?php echo $lue->lokasi_sekarang; ?>">
							</div>
							<div class="form-group">
								<label for="">Alamat Lengkap Toko</label>
								<textarea name="alamat_toko" class="form-control input-lg" placeholder="alamat toko saat ini"><?php echo $lue->alamat_toko; ?></textarea>
							</div>
							<div class="form-group">
								<button class="btn btn-primary" type="submit"><span class="fa fa-floppy-o"></span> Masukkan</button>
								<a href="<?php echo base_url('index.php/admin/index'); ?>" class="btn btn-danger"><span class="fa fa-undo"> Kembali ke Dashboard</span></a>
							</div>
					</form>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('admin/bottom'); ?>
</body>
</html>