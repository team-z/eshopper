<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('admin/top'); ?>
	<title></title>
</head>
<body>
	<div id="wrapper">
		<?php $this->load->view('admin/sidebar'); ?>
		<div id="main-panel">
			<?php $this->load->view('admin/navigasi'); ?>

			<div id="content">
				<div class="container-fluid">
					<div class="row">
					<?php 
					$cek = $this->db->get('toko')->result();

					if (count($cek) > 0) {

						$data['toko'] = $this->mod->tampil('toko')->result();
						$this->load->view('admin/opsi/pengaturan/edit_pengaturan', $data);

					} else { ?>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Profile Toko</h3>
								<span class="text-grey">Isi form dibawah</span>
							</div>
							<div class="panel-body">
								<form action="<?php echo base_url('index.php/opsi_pengaturan/input_profile'); ?>" method="POST">
									<div class="form-group">
										<label for="">Nama Toko</label>
										<input type="text" name="nama_toko" class="form-control input-lg" placeholder="masukkan Nama Toko Anda" size="15" maxlength="20">
									</div>
									<div class="row">
										<div class="form-group">
											<div class="col-xs-4">
												<label for="">Whatapps</label>
												<input type="text" name="wa" class="form-control input-lg" placeholder="masukkan No. Whatapps anda">
											</div>
											<div class="col-xs-4">
												<label for="">BBM</label>
												<input type="text" name="bbm" class="form-control input-lg" placeholder="masukkan Pin BBM anda">
											</div>
											<div class="col-xs-4">
												<label for="">Line</label>
												<input type="text" name="line" class="form-control input-lg" placeholder="masukkan Id Line">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="">Instagram</label>
										<input type="text" name="instagram" class="form-control input-lg" placeholder="@nama_instagramu">
									</div>
									<div class="form-group">
										<label for="">Facebook</label>
										<input type="text" name="facebook" class="form-control input-lg" placeholder="masukkan nama facebook anda">
									</div>
									<div class="form-group">
										<label for="">Lokasi Sekarang</label>
										<input type="text" name="lokasi_sekarang" class="form-control input-lg" placeholder="Lokasi Terbaru Toko anda saat ini">
									</div>
									<div class="form-group">
										<label for="">Alamat Lengkap Toko</label>
										<textarea name="alamat_toko" class="form-control input-lg" placeholder="alamat toko saat ini"></textarea>
									</div>
									<div class="form-group">
										<button class="btn btn-primary" type="submit"><span class="fa fa-floppy-o"></span> Masukkan</button>
										<a href="<?php echo base_url('index.php/admin/index'); ?>" class="btn btn-danger"><span class="fa fa-undo"> Keluar</span></a>
									</div>
								</form>
							</div>
						</div>
					<?php } ?>
					</div>
					
				</div>
			</div>
		</div>
	</div>
<?php $this->load->view('admin/bottom'); ?>
</body>
</html>